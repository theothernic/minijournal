<?php
    namespace App\Http\Controllers\Journal;

    use App\Models\Entry;
    use App\Models\Slug;
    use App\Services\JournalService;
    use App\ViewModels\SingleEntryViewModel;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\DB;

    class SingleController
    {

        private JournalService $journalService;
        public function __construct(JournalService $journalService)
        {
            $this->journalService = $journalService;
        }

        public function __invoke(string $slug = '')
        {
            $page = $this->getEntryBySlug($slug);

            return view('journal.single', compact('page'));
        }

        public function latest()
        {
            $page = $this->getLatestEntry();
            return view('journal.single', compact('page'));
        }


        private function getEntryBySlug(string $slug)
        {
            if (!$slug = Slug::where('value', $slug)->first())
                abort(404);

            return $this->buildViewModel($slug->entry);
        }

        private function getLatestEntry(): SingleEntryViewModel
        {
            if (!$record = $this->journalService->latest())
                abort(404);


            return $this->buildViewModel($record);
        }

        private function buildViewModel(Entry $record): SingleEntryViewModel
        {
            $entryDate = $record->publish_at ?? $record->created_at;


            return new SingleEntryViewModel([
                'entryId' => $record->id,
                'title' => $record->title,
                'author' => $record->author->name,
                'slug' => $record->slug->value,
                'body' => $record->latestRevision()->body,
                'htmlBody' => $record->latestRevision()->htmlBody ?? '',
                'entryDate' => Carbon::make($entryDate)->format('F d, Y')
            ]);
        }
    }
