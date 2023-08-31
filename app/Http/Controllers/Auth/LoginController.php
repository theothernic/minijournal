<?php
    namespace App\Http\Controllers\Auth;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class LoginController
    {
    public function __invoke()
    {
        return view('auth.login');
    }

        public function handle(Request $request)
        {
            $credentials = $request->only('email', 'password');
            if (!Auth::attempt($credentials))
                abort(403);

            return redirect()->route('dashboard');
        }
    }
