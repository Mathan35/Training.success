<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="phone_number" value="{{ __('phone_number') }}" />
                <x-jet-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="instagram_url" value="{{ __('Instagram URL') }}" />
                <x-jet-input id="instagram_url" class="block mt-1 w-full" type="text" name="instagram_url" :value="old('instagram_url')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="facebook_url" value="{{ __('Facbook URL') }}" />
                <x-jet-input id="facebook_url" class="block mt-1 w-full" type="text" name="facebook_url" :value="old('facebook_url')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="linkedin_url" value="{{ __('Linked In URL') }}" />
                <x-jet-input id="linkedin_url" class="block mt-1 w-full" type="text" name="linkedin_url" :value="old('linkedin_url')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="recovery_email" value="{{ __('Recovery Email') }}" />
                <x-jet-input id="recovery_email" class="block mt-1 w-full" type="email" name="recovery_email" :value="old('recovery_email')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="personal_skills" value="{{ __('Personal Skills') }}" />
                <x-jet-input id="personal_skills" class="block mt-1 w-full" type="text" name="personal_skills" :value="old('personal_skills')" required />
            </div>
            <div class="mt-4">
                <x-jet-label for="technical_skills" value="{{ __('Technical Skills') }}" />
                <x-jet-input id="technical_skills" class="block mt-1 w-full" type="text" name="technical_skills" :value="old('technical_skills')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card><br>
</x-guest-layout>
