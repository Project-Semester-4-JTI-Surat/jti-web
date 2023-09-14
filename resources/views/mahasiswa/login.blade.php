<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth/mahasiswa_login.css') }}" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/logo.svg') }}" />
    <title>{{ env('APP_NAME') }} - Mahasiswa Login</title>
</head>

<body>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <header>Login</header>
            </div>
            <form action="{{ route('mahasiswa.login_process') }}" method="POST" id="formAuthentication">
                {{ csrf_field() }}
                <div class="input-field">
                    <span>NIM</span>
                    <input type="text" class="input @error('nim') error @enderror" placeholder="E412xxxxx"
                        name="nim" value="{{ old('nim') }}" id="nim" required>
                    @error('nim')
                        <label id="error-field" class="text-error" style="">{{ $message }}</label>
                    @enderror
                </div>
                <div class="input-field">
                    <span>Password</span>
                    <input type="password" value="{{ old('password') }}" class="input  @error('password') error @enderror" placeholder="max 8"
                        name="password" id="password" required>
                    <i class="uil uil-eye-slash" aria-hidden="true" id="eye" onclick="toggle()"></i>
                    
                    @error('password')
                        <span id="password-error" class="text-error" style="">{{ $message }}</span>
                    @enderror
                </div>

                <div class="right">
                    <label><a href="#"> Lupa password?</a></label>
                </div>
                <div class="input-field">
                    <button type="submit" class="submit">Login</button>
                </div>

                <div class="bottom">
                    <!-- <div class="left">
                    <input type="checkbox" id="check">
                    <label for="check"> Remember Me</label>
                </div>  -->
                    <div class="left">
                        <p>Belum punya akun?<a href="{{ route('mahasiswa.register') }}"> Register</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('vendor/libs/jquery/validate/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/mahasiswa.js') }}"></script>
    <script src="{{ asset('vendor/libs/jquery/validate/additional-methods.js') }}"></script>
    <script src="{{ asset('vendor/libs/jquery/validate/localization/messages_id.js') }}"></script>
    <script>
        $(function() {
            setTimeout(function(){
                $('#nim').removeClass("error");
                $('#password').removeClass("error");
                $('#error-field').remove();
            },1500);
            $.validator.addMethod("nimCheck", function(value, element) {
                return (new RegExp(/^E\d{8}$/).test(value))
            }, "Nim tidak valid, (JTI menggunakan prefix 'E' diawal nim)");
            $('#formAuthentication').validate({
                // wrapper: "#form-input",
                rules: {
                    password: {
                        required: true,
                        minlength: 8,
                    },
                    nim: {
                        required: true,
                        maxlength: 9,
                        nimCheck: true,
                    }
                },
                errorElement: "span",
                errorClass: "text-error",
                errorPlacement: function(error, element) {

                    $('#formAuthentication').addClass("was-validated")
                    // error.insertAfter("#form-input");
                    // Add the `help-block` class to the error element
                    if (!$(element)) {
                        error.removeClass("error")
                        error.addClass("text-error");
                        error.appendTo("#form-input");
                        if ($(element).next("span")[0]) {
                            // error.addClass("help-block");
                            error.insertAfter("#eye")
                            // error.addClass("invalid-feedback");
                        }
                    }


                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $('#formAuthentication').removeClass("was-validated").addClass(" needs-validation")
                    $(element).addClass("error").removeClass("success");
                },
                unhighlight: function(element, errorClass, validClass) {
                    // $('#formAuthentication').removeClass("was-validated")

                    $('#formAuthentication').addClass("was-validated").removeClass(" needs-validation")
                    $(element).addClass("success").removeClass("error");
                }
            })
        })

        function toggle() {
            var type = $('#password').attr("type");
            var eye = $('#eye');
            // now test it's value
            if (type === 'password') {
                eye.removeClass('uil-eye-slash')
                eye.addClass('uil-eye')
                $('#password').attr("type", "text");
            } else {
                eye.addClass('uil-eye-slash')
                eye.removeClass('uil-eye')
                $('#password').attr("type", "password");
            }

        }
    </script>
</body>

</html>
