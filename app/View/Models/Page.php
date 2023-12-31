<?php
    namespace App\View\Models;

    class Page extends ViewModel
    {
        public string $title = '';

        public array $meta = [
            'keywords' => '',
            'description' => ''
        ];

        public string $layout = 'default';

        public string $canonicalUrl = '';
    }
