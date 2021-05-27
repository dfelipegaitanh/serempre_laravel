@component('components.mail.template')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => route('home')])
            {{ env('APP_NAME') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © 2021 Felipe Gaitan: <a href="https://github.com/dfelipegaitanh"> https://github.com/dfelipegaitanh</a>
        @endcomponent
    @endslot
@endcomponent
