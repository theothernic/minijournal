<?php
    namespace App\ViewModels;

    class SingleEntryViewModel extends Page
    {
        public string $body;
        public string $htmlBody;

        public string $author = '';

        public string $entryDate = '';

        public function hasHtmlBody()
        {
            return (!empty($this->htmlBody));
        }
    }
