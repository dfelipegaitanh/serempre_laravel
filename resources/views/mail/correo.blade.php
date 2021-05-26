@component('components.mail.mensaje')

@if (! empty($greeting))
# {{ $greeting }}
@endif

@foreach ($introLines as $line)
{{ $line }}
@endforeach

@component('mail::button', ['url' => $actionUrl])
{{ $actionText }}
@endcomponent

Muchas Gracias,<br>

<a href="{{ route('home') }}">Inicio</a>
@endcomponent
