<x-layouts::app :title="__('Appearance settings')">
    <section class="w-full">
        @include('partials.settings-heading')
        <x-pages::settings.layout :heading="__('Appearance')" :subheading="__('Choose the theme used by this application')">
            <div x-data="{
                theme: localStorage.getItem('theme') || 'system',
                setTheme(value) {
                    this.theme = value
                    localStorage.setItem('theme', value)
                    const dark = value === 'dark' || (value === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches)
                    document.documentElement.classList.toggle('dark', dark)
                }
            }" class="grid gap-3 sm:grid-cols-3">
                @foreach (['light', 'dark', 'system'] as $value)
                    <april:button type="button" variant="outline" class="justify-start gap-2" x-bind:class="theme === '{{ $value }}' ? 'border-primary ring-2 ring-ring' : ''" x-on:click="setTheme('{{ $value }}')">
                        {{ __(ucfirst($value)) }}
                    </april:button>
                @endforeach
            </div>
        </x-pages::settings.layout>
    </section>
</x-layouts::app>
