<?php
    namespace App\ViewModels;

    class Page extends ViewModel
    {
        public string $title = '';

        public array $meta = [
            'keywords' => '',
            'description' => ''
        ];
    }
