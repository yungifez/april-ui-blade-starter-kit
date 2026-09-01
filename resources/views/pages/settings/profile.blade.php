<x-layouts::app :title="__('Profile settings')">
    <section class="w-full">
        @include('partials.settings-heading')
        <x-pages::settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
            <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
                @csrf
                @method('PUT')
                <x-form-field name="name" :label="__('Name')" :value="$user->name" required autofocus autocomplete="name" />
                <div>
                    <x-form-field name="email" :label="__('Email')" :value="$user->email" type="email" required autocomplete="email" />
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <p class="mt-3 text-sm text-muted-foreground">
                            {{ __('Your email address is unverified.') }}
                            <button type="submit" form="resend-verification" class="text-primary underline-offset-4 hover:underline">{{ __('Resend verification email') }}</button>
                        </p>
                    @endif
                </div>
                <div class="flex items-center gap-3">
                    <april:button type="submit" data-test="update-profile-button">{{ __('Save') }}</april:button>
                    @if (session('status') === 'profile-updated')
                        <span class="text-sm text-green-600">{{ __('Saved.') }}</span>
                    @endif
                </div>
            </form>
            <form id="resend-verification" method="POST" action="{{ route('verification.send') }}" class="hidden">@csrf</form>
        </x-pages::settings.layout>

        <div class="mx-auto mt-8 w-full max-w-lg border-t pt-6">
            <h2 class="font-semibold">{{ __('Delete account') }}</h2>
            <p class="mt-1 text-sm text-muted-foreground">{{ __('Delete your account and all of its resources') }}</p>
            <form method="POST" action="{{ route('profile.destroy') }}" class="mt-4 space-y-4">
                @csrf
                @method('DELETE')
                <x-form-field name="password" :label="__('Confirm with your password')" type="password" required autocomplete="current-password" />
                <april:button variant="destructive" type="submit" data-test="delete-user-button">{{ __('Delete account') }}</april:button>
            </form>
        </div>
    </section>
</x-layouts::app>
