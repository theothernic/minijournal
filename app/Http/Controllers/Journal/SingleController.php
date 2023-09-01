<?php
    namespace App\Http\Controllers\Journal;

    use App\Models\Entry;
    use App\Models\Slug;
    use App\Services\JournalService;
    use App\View\Models\SingleEntryViewModel;
    use Illuminate\Support\Carbon;

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
            $formattedEntryDate = Carbon::make($entryDate)->timezone($record->author->tz)->format('F j, Y');

            return new SingleEntryViewModel([
                'layout' => 'simple',
                'entryId' => $record->id,
                'canonicalUrl' => url()->route('journal.entry', $record->slug->value),
                'title' => sprintf('Journal Entry: %s, written on %s', $record->title, $formattedEntryDate),
                'entryTitle' => $record->title,
                'author' => $record->author->name,
                'slug' => $record->slug->value,
                'body' => nl2br($record->latestRevision()->body),
                'htmlBody' => $record->latestRevision()->htmlBody ?? '',
                'entryDate' => $formattedEntryDate
            ]);
        }
    }
