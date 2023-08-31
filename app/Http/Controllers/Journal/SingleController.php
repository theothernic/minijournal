<?php
    namespace App\Http\Controllers\Journal;

    class SingleController
    {
        public function __invoke()
        {
            return view('journal.single');
        }
    }
