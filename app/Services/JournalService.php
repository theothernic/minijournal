<?php
    namespace App\Services;

    use App\Models\Entry;
    use App\Models\Revision;
    use Illuminate\Support\Facades\Auth;

    class JournalService
    {
        public function createEntry(array $data)
        {
            $entry = Entry::create([
                'title' => $data['title'],
                'user_id' => Auth::user()->id,
            ]);

            $entry->revisions()->save(new Revision([
                'body' => $data['body']
            ]));


            return $entry;
        }


        public function latest()
        {
            return Entry::orderBy('created_at', 'desc')->first();
        }
    }
