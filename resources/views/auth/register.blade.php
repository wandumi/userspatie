<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        {{-- <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('form.Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('form.Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('form.Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('form.Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('form.Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('form.Register') }}
                </x-button>
            </div>
        </form> --}}

        <div class="m-5">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                    <div class="w-full mb-4">
                    <input type="text" 
                    class="rounded-sm px-4 py-2 outline-none focus:outline-none border-gray-400 bg-gray-100 border-2 border-solid w-full text-sm"
                    placeholder="Enter Username"
                    name="name">
                </div>
                <div class="w-full mb-4">
                    <input type="text" 
                    class="rounded-sm px-4 py-2 outline-none focus:outline-none border-gray-400 bg-gray-100 border-2 border-solid w-full text-sm"
                    placeholder="Enter Email"
                    name="email">
                </div>
                <div class="w-full mb-4">
                    <input type="password" 
                    class="rounded-sm px-4 py-2 outline-none focus:outline-none border-gray-400 bg-gray-100 border-2 border-solid w-full text-sm"
                    placeholder="Enter Password">
                </div>
                <div class="w-full mb-4">
                    <input type="password" 
                    class="rounded-sm px-4 py-2 outline-none focus:outline-none border-gray-400 bg-gray-100 border-2 border-solid w-full text-sm"
                    placeholder="Password"
                    name="password">
                </div>
                <div class="w-full mb-4">
                    <input type="password" 
                    class="rounded-sm px-4 py-2 outline-none focus:outline-none border-gray-400 bg-gray-100 border-2 border-solid w-full text-sm"
                    placeholder="Confirm Password"
                    name="password_confirmation">
                </div>
    
                <div class="w-full mb-6">
                    <button type="submit" 
                    class="rounded-sm px-4 py-2 text-sm bg-green-500 font-bold outline-none focus:outline-none hover:bg-opacity w-full text-white disabled:opacity-25">
                    {{ __('form.Register') }}
                </button>
                </div>
    
                <div class="bg-gray-400 h-px w-full mb-6"></div>
    
                <div class="text-center text-sm">
                    <a class="text-blue-600 hover:underline" href="{{ route('login') }}">Sign in for an account</a>
                </div>
            </form>

        </div>
    
            
        
    </x-auth-card>
</x-guest-layout>
