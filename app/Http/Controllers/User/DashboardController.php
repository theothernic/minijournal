<?php
    namespace App\Http\Controllers\User;

    use App\Http\Controllers\Controller;

    class DashboardController extends Controller
    {
        public function __invoke()
        {
            return view('user.dashboard');
        }
    }
