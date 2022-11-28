@component('mail::message')

#   Novi oglasi

  

Izašli su novi oglasi za kategoriju '{{ ucfirst($naziv) }}' koju ste označili.

Možete ih pogledati klikom na link ispod!

   

@component('mail::button', ['url' => $url])

Pogledajte nove oglase

@endcomponent

   

Srdačan pozdrav,<br>
{{ config('app.name') }}

@endcomponent