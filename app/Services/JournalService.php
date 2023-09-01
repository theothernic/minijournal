<?php
    namespace App\Services;

    use App\Models\Entry;
    use App\Models\Revision;
    use App\Models\Slug;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Str;

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

            $entry->slug()->save(new Slug([
                'value' => Str::slug($data['title'])
            ]));

            return $entry;
        }


        public function latest()
        {
            return Entry::orderBy('created_at', 'desc')->first();
        }

        public function findBySlug(string $slug)
        {
            return Entry::with([
                'slug' => function ($q) use ($slug) {
                        $q->where('value', $slug);
                    }
                ])->first();
        }
    }
