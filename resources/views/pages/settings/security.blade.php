<x-layouts::app :title="__('Security settings')">
    <section class="w-full">
        @include('partials.settings-heading')
        <x-pages::settings.layout :heading="__('Security')" :subheading="__('Update your password and keep your account secure')">
            <form method="POST" action="{{ route('security.password.update') }}" class="space-y-5">
                @csrf
                @method('PUT')
                <x-form-field name="current_password" :label="__('Current password')" type="password" required autocomplete="current-password" />
                <x-form-field name="password" :label="__('New password')" type="password" required autocomplete="new-password" />
                <x-form-field name="password_confirmation" :label="__('Confirm new password')" type="password" required autocomplete="new-password" />
                <div class="flex items-center gap-3">
                    <april:button type="submit">{{ __('Update password') }}</april:button>
                    @if (session('status') === 'password-updated')
                        <span class="text-sm text-green-600">{{ __('Saved.') }}</span>
                    @endif
                </div>
            </form>
        </x-pages::settings.layout>
    </section>
</x-layouts::app>
