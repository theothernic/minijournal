<?php
    namespace App\Http\Controllers\Journal;

    use App\Services\JournalService;
    use App\ViewModels\SingleEntryViewModel;
    use Illuminate\Support\Carbon;

    class SingleController
    {

        private JournalService $journalService;
        public function __construct(JournalService $journalService)
        {
            $this->journalService = $journalService;
        }

        public function __invoke(mixed $key = '')
        {
            return view('journal.single');
        }

        public function latest()
        {
            $page = $this->getLatestEntry();

            return view('journal.single', compact('page'));
        }

        private function getLatestEntry(): SingleEntryViewModel
        {
            $record = $this->journalService->latest();

            $entryDate = $record->publish_at ?? $record->created_at;

            return new SingleEntryViewModel([
                'title' => $record->title,
                'author' => $record->author->name,
                'body' => $record->latestRevision()->body,
                'htmlBody' => $record->latestRevision()->htmlBody ?? '',
                'entryDate' => Carbon::make($entryDate)->format('F d, Y')
            ]);
        }
    }
