<?php
    namespace App\View\Components\Page;


    use Illuminate\View\Component;

    class Canonical extends Component
    {
        public function __construct(
            public string $url
        ) { }

        public function render()
        {
            return view('components.page.canonical');
        }
    }
