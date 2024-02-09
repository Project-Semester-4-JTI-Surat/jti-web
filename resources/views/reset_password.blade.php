@component('mail::message')
# Password Reset

Halo {{$email}},<br>
Kami telah membuat reset password untuk anda.<br>
Link dibawah ini akan expired dalam satu jam kedepan
Password default anda adalah jtipolije harap mengganti password setelah proses reset


@component('mail::button', ['url' => route('mahasiswa.show_reset_password',$id)])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
<br>
Jika tombol tidak bisa di klik maka copy link dibawah ini ke kolom pencarian browser anda
{{ route('mahasiswa.show_reset_password',$id) }}
@endcomponent