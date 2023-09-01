<?php
    namespace App\View\Models;

    class SingleEntryViewModel extends Page
    {
        public string $id;
        public string $entryId = '';

        public string $slug = '';

        public string $body;
        public string $htmlBody;

        public string $author = '';

        public string $entryDate = '';
        public string $entryTitle = '';

        public function __construct(mixed $data)
        {
            parent::__construct($data);

            $this->id = sprintf('entry-single--%s', $this->entryId ?? substr(md5(date('s')), 0, 8));
        }

        public function hasHtmlBody()
        {
            return (!empty($this->htmlBody));
        }
    }
