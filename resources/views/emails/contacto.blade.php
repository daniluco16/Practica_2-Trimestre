@component('mail::message')
# {{ $datos['asunto'] }}
De: {{ $datos['remitente'] }}

@component('mail::panel')
    {{ $datos['mensaje'] }}
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
