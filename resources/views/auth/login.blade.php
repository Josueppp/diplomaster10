<x-guest-layout>
    <div class="max-w-md mx-auto mt-12 p-8 bg-white rounded-xl shadow-lg border border-blue-900">
        <h2 class="text-2xl font-bold text-blue-900 text-center mb-6">Iniciar Sesión</h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo Electrónico')" class="text-blue-900 font-semibold" />
                <x-text-input id="email" class="block mt-1 w-full border-blue-500 focus:ring-blue-700 focus:border-blue-700" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Contraseña')" class="text-blue-900 font-semibold" />
                <x-text-input id="password" class="block mt-1 w-full border-blue-500 focus:ring-blue-700 focus:border-blue-700" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-800 shadow-sm focus:ring-blue-700" name="remember">
                <label for="remember_me" class="ms-2 text-sm text-gray-700">
                    {{ __('Recordarme') }}
                </label>
            </div>

            <!-- Buttons -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-700 hover:underline" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-primary-button class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded">
                    {{ __('Iniciar Sesión') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
