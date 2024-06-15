<x-guest-layout>
    <div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-purple-400 to-pink-600">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <!-- Form Heading -->
            <div class="text-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900">{{ __('Reset Password') }}</h2>
                <p class="text-gray-700">{{ __('Saisissez votre adresse e-mail et votre nouveau mot de passe pour réinitialiser votre mot de passe.') }}</p>
            </div>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('E-mail') }}</label>
                    <input id="email" class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
                    @error('email')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Mot de passe') }}</label>
                    <input id="password" class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" type="password" name="password" required autocomplete="new-password" />
                    @error('password')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Confirmez le mot de passe') }}</label>
                    <input id="password_confirmation" class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2" type="password" name="password_confirmation" required autocomplete="new-password" />
                    @error('password_confirmation')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-6">
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        {{ __('Réinitialiser le mot de passe') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
