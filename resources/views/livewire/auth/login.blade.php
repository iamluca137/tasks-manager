<section class="bg-gray-50 min-h-screen flex items-center justify-center">
    <!-- login container -->
    <div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-5xl p-5 items-center">
        <!-- form -->
        <div class="md:w-1/2 px-8 md:px-16">
            <h2 class="font-bold text-2xl text-teal-700">Login</h2>
            <p class="text-xs mt-4 text-teal-700">If you are already a member, easily log in</p>

            <form class="flex flex-col gap-4" wire:submit="submit">
                <input
                    class="p-2 mt-8 rounded-lg border w-full block @error('email') bg-red-50 border-red-500 text-red-900 placeholder-red-700 text-sm focus:ring-red-500 focus:border-red-500 @enderror"
                    type="text" wire:model="email" placeholder="Email" autocomplete="off">
                @error('email')
                    <span class="font-medium text-sm text-red-500">{{ $message }}</span>
                @enderror
                @if (session()->has('error'))
                    <span class="font-medium text-sm text-red-500">{{ session('error') }}</span>
                @endif
                <input
                    class="p-2 rounded-lg border w-full block @error('password') bg-red-50 border-red-500 text-red-900 placeholder-red-700 text-sm focus:ring-red-500 focus:border-red-500 @enderror"
                    type="password" wire:model="password" placeholder="Password" autocomplete="off">
                @error('password')
                    <span class="font-medium text-sm text-red-500">{{ $message }}</span>
                @enderror
                <button class="bg-teal-700 rounded-lg text-white py-2 hover:scale-105 duration-300">Login</button>
            </form>

            <div class="mt-6 grid grid-cols-3 items-center text-gray-400">
                <hr class="border-gray-400">
                <p class="text-center text-sm">OR</p>
                <hr class="border-gray-400">
            </div>

            <button
                class="bg-white border py-2 w-full rounded-lg mt-5 flex justify-center items-center text-sm hover:scale-105 duration-300 text-teal-700">
                <svg class="mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="25px">
                    <path fill="#FFC107"
                        d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z" />
                    <path fill="#FF3D00"
                        d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z" />
                    <path fill="#4CAF50"
                        d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z" />
                    <path fill="#1976D2"
                        d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z" />
                </svg>
                Login with Google
            </button>

            <div class="mt-5 text-xs border-b border-teal-700 py-4 text-teal-700">
                <a href="#">Forgot your password?</a>
            </div>

            <div class="mt-3 text-xs flex justify-between items-center text-teal-700">
                <p>Don't have an account?</p>
                <a href={{ route('register') }} wire:navigate
                    class="py-2 px-5 bg-white border rounded-lg hover:scale-110 duration-300">Register</a>
            </div>
        </div>

        <!-- image -->
        <div class="md:block hidden w-1/2">
            <img class="rounded-2xl" src="https://i.pinimg.com/736x/97/31/d6/9731d665dda0712d4281fd0deaecdf83.jpg">
        </div>
    </div>
</section>
