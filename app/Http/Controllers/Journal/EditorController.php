<?php
    namespace App\Http\Controllers\Journal;

    use App\Http\Requests\StoreEntryRequest;
    use App\Services\JournalService;

    class EditorController
    {
        private JournalService $journalService;

        public function __construct(JournalService $journalService)
        {
            $this->journalService = $journalService;
        }

        public function __invoke()
        {
            if (!Auth::check())
                return redirect()->route('home');

            return view('journal.editor');
        }


        public function store(StoreEntryRequest $request)
        {
            $data = $request->validated();

            if (!$entry = $this->journalService->createEntry($data))
                abort(500);

            return redirect()->route('dashboard');

        }


    }
