<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth-layout')]
class Register extends Component
{
    public $username = '';
    public $email = '';
    public $password = '';

    // Form validation
    protected function rules()
    {
        return [
            'username' => 'required|min:5|max:20|unique:users,username|regex:/^\w+$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:20|regex:/^[A-Za-z\d@$!%*?&]{8,20}$/',
        ];
    }

    // Custom error messages
    protected function messages()
    {
        return [
            'username.required' => 'The username are missing.',
            'username.min' => 'The username must be at least :min characters.',
            'username.max' => 'The username may not be greater than :max characters.',
            'username.unique' => 'The username has already been taken.',
            'username.regex' => 'The username may only contain letters, numbers, and underscores.',
            'email.required' => 'The email are missing.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password are missing.',
            'password.min' => 'The password must be at least :min characters.',
            'password.max' => 'The password may not be greater than :max characters.',
            'password.regex' => 'The password may only contain letters, numbers, and the following special characters: @ $ ! % * ? &',
        ];
    }

    public function submit()
    {
        // Validate the form
        $this->validate();

        // Create a new user
        $user = User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Log the user in
        Auth::login($user); 

        return redirect()->intended(route('calendar'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
