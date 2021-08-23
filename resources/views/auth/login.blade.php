<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        {{-- <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('form.Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('form.Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('form.Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('form.Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('form.Log in') }}
                </x-button>
            </div>
        </form> --}}

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="w-full mb-4">
                <input type="text" 
                class="rounded-sm px-4 py-2 outline-none focus:outline-none border-gray-400 bg-gray-100 border-2 border-solid w-full text-sm"
                placeholder="Enter Email"
                name="email">
            </div>
            <div class="w-full mb-4">
                <input type="password" 
                class="rounded-sm px-4 py-2 outline-none focus:outline-none border-gray-400 bg-gray-100 border-2 border-solid w-full text-sm"
                placeholder="Enter Password"
                name="password">
            </div>

            <div class="w-full mb-6">
                <button type="submit" 
                class="rounded-sm px-4 py-2 text-sm bg-green-500 font-bold outline-none focus:outline-none hover:bg-opacity w-full text-white disabled:opacity-25">
                {{ __('form.Log in') }}</button>
            </div>

            <div class="bg-gray-400 h-px w-full mb-6"></div>

            <div class="text-center text-sm">
                <a class="text-blue-600 hover:underline" href="{{ route('register') }}">{{ __('form.Sign up for an account') }}</a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
