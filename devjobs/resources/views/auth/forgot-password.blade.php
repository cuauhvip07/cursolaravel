<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-between mt-4 my-5">

            <x-link
             {{-- href lo manda hacia el componte para que sea dinamico, se envian los atributos --}}
             :href="route('register')" 
            >
                Crear Cuenta
            </x-link>
 
             <x-link
                 :href="route('login')"
             >
                 Iniciar Sesión
             </x-link>
 
        </div>


        <x-primary-button class="w-full justify-center">
            {{ __('Email Password Reset Link') }}
        </x-primary-button>
    </form>
</x-guest-layout>
