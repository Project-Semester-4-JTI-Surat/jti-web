@component('mail::message')
# Password Reset

Halo {{$email}},<br>
Kami telah membuat reset password untuk anda.<br>
Link dibawah ini akan expired dalam satu jam kedepan


@component('mail::button', ['url' => route('save_password',['id'=>$id])])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
<br>
Jika tombol tidak bisa di klik maka copy link dibawah ini ke kolom pencarian browser anda
{{ route('save_password',['id'=>$id]) }}
@endcomponent