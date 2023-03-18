<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>


        <div>
            <x-input-label for="whats_app_number" :value="__('Whats App Number')" />
            <x-text-input id="whats_app_number" name="whats_app_number" type="text" class="mt-1 block w-full" :value="old('whats_app_number', $user->whats_app_number)" required />
            <x-input-error class="mt-2" :messages="$errors->get('whats_app_number')" />
        </div>


        <div>
            <x-input-label for="whats_app_message" :value="__('Whats App Message')" />
            <x-text-input id="whats_app_message" name="whats_app_message" type="text" class="mt-1 block w-full" :value="old('whats_app_message', $user->whats_app_message)" required />
            <x-input-error class="mt-2" :messages="$errors->get('whats_app_message')" />
        </div>

        <div>
            <x-input-label for="header_footer_qut" :value="__('Header Footer Quotation')" />
            <x-text-input id="header_footer_qut" name="header_footer_qut" type="text" class="mt-1 block w-full" :value="old('header_footer_qut', $user->header_footer_qut)" required />
            <x-input-error class="mt-2" :messages="$errors->get('header_footer_qut')" />
        </div>


        <div>
            <x-input-label for="tiktok_url" :value="__('Tiktok Url')" />
            <x-text-input id="tiktok_url" name="tiktok_url" type="text" class="mt-1 block w-full" :value="old('tiktok_url', $user->tiktok_url)" required />
            <x-input-error class="mt-2" :messages="$errors->get('tiktok_url')" />
        </div>

        <div>
            <x-input-label for="insta_url" :value="__('Insta Url')" />
            <x-text-input id="insta_url" name="insta_url" type="text" class="mt-1 block w-full" :value="old('insta_url', $user->insta_url)" required />
            <x-input-error class="mt-2" :messages="$errors->get('insta_url')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
