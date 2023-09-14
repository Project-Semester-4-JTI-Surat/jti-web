@component('mail::message')
# Surat Ditolak

Halo {{$email}},<br>
Surat Anda ditolak dengan alasan berikut : <br>
<p style="font-weight: bold">{{ $alasan_penolakan }}</p>


{{ config('app.name') }}
@endcomponent