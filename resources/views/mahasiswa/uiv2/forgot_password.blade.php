<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('app_name') }} - Mahasiswa Register</title>
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            background-color: #f5f5f5;
        }

        form {
            padding-top: 10px;
            font-size: 14px;
            margin-top: 30px;
        }

        .card-title {
            font-weight: 300;
        }

        .btn {
            font-size: 14px;
            margin-top: 20px;
        }

        .login-form {
            width: 420px;
            margin: 20px;
        }

        .sign-up {
            text-align: center;
            padding: 20px 0 0;
        }

        span {
            font-size: 14px;
        }
    </style>
    @include('layouts.css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" /> --}}
</head>

<body>
    <div class="card login-form">
        <div class="card-body">
            <h3 class="card-title text-center">Reset Password</h3>

            <div class="card-text">
                <form id="form-reset" method="POST" action="{{route('mahasiswa.reset_password')}}">
                    <div class="form-group">
                        @csrf
                        <label for="exampleInputEmail1">Masukkan email untuk me reset password</label>
                        <input type="email" class="form-control form-control-sm mt-2 @if (Session::has('reset_error'))
                            is-invalid
                        @endif" name="email" 
                            placeholder="Masukkan email">
                            @if (Session::has('reset_error'))
                            <div class="invalid-feedback">Pastikan nim anda terdaftar dan menggunakan akun kampus</div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</body>
@include('layouts.script')
<script src="{{ asset('js/scrollreveal.js') }}"></script>
<script>
    (function($) {
        $.fn.inputFilter = function(callback, errMsg) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(
            e) {
                if (callback(this.value)) {
                    // Accepted value
                    if (["keydown", "mousedown", "focusout"].indexOf(e.type) >= 0) {
                        $(this).removeClass("input-error");
                        this.setCustomValidity("");
                    }
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    // Rejected value - restore the previous one
                    $(this).addClass("input-error");
                    // this.setCustomValidity(errMsg);
                    this.reportValidity();
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    // Rejected value - nothing to restore
                    this.value = "";
                }
            });
        };
    }(jQuery));

    $(function() {
        
        $('#form-reset').validate({
            // wrapper: "#form-input",
            rules: {
               
                email: {
                    required: true,
                    email: true,
                },
                
            },
            // hightlight: function(element) {
            //    $(element).addClass('is-invalid')
            // },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('valid');
                $(element.form).find("label[for=" + element.id + "]")
                    .addClass(errorClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('valid');
                $(element.form).find("label[for=" + element.id + "]")
                    .removeClass(errorClass);
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                $(element).addClass('is-invalid')
                error.addClass("invalid-feedback");
                // error.appendTo("#form-input");
                error.insertAfter(element);
                // Add the `help-block` class to the error element

                // if (element.prop("type") === "checkbox") {
                //     error.insertAfter(element.parent("label"));
                // } else {
                //     error.insertAfter(element);
                // }
            },
            success: function(label, element) {
                $(element).removeClass('is-invalid');
            }
        });

    });
  
    const sr = ScrollReveal({
        origin: 'left',
        distance: '30px',
        duration: 2000,
        reset: true
    });

    sr.reveal(`#typography`, {
        interval: 200
    })
    const sr2 = ScrollReveal({
        origin: 'right',
        distance: '30px',
        duration: 2000,
        reset: true
    });

    sr2.reveal(`#form`, {
        interval: 200
    })
</script>

</html>
