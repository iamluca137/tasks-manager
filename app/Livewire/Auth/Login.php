<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth-layout')]
class Login extends Component
{
    public $email = '';
    public $password = '';

    // Form validation
    protected function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    // Custom error messages
    protected function messages()
    {
        return [
            'email.required' => 'The email are missing.',
            'email.email' => 'The email must be a valid email address.',
            'password.required' => 'The password are missing.',
            'password.min' => 'The password must be at least :min characters.',
        ];
    }

    public function submit()
    {
        // Validate the form
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        // Attempt to log the user in
        if (!Auth::attempt($credentials)) {
            $this->addError('email', 'Email or password is incorrect.');
            return;
        }

        return redirect()->intended(route('calendar'));
    }

    public function signout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
