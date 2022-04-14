<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
    <base href="{{ asset('') }}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="source/assets/css/register.css">
</head>
<body>

<div>
    <article class="card-body mx-auto" style="max-width: 400px;">
        <h4 class="card-title mt-3 text-center">Create Account</h4>
        <div class="text-red error-form form-group"></div>
        <div class="form-group">
            <div class="input-group input-group-name">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="name" class="form-control" placeholder="Full name" type="text">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group input-group-email">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="email" class="form-control" placeholder="Email address" type="email">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group input-group-password">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" name="password" placeholder="Create password" type="password">
            </div>
        </div>

        <div class="form-group">
            <div class="input-group input-group-repassword">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input class="form-control" name="repassword" placeholder="Repeat password" type="password">
            </div>
        </div>

        <div class="form-group">
            <button type="button" data-url="{{ route('register') }}" class="btn btn-primary btn-block btn-register"> Create Account  </button>
        </div>
        <p class="text-center">Have an account? <a href="{{ route('login') }}">Log In</a> </p>
    </article>
</div>

</body>
<script>
    $(document).ready(function() {
        $('.btn-register').click(function() {
            var url = $(this).attr('data-url');
            var email = $('input[name="email"]').val();
            var name = $('input[name="name"]').val();
            var password = $('input[name="password"]').val();
            var repassword = $('input[name="repassword"]').val();
            if(email == '' || name == '' || password == '' || repassword == '') {
                $('.error-form').text('Nhap chua du thong tin');
                $('.error-form').addClass('error');
            } else if(password != repassword) {
                $('.error-form').text('Nhap lai password khong dung');
                $('.error-form').addClass('error');
            } else {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    type: "POST",
                    url: url,
                    data: {
                        email: email,
                        name: name,
                        password: password
                    },
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        window.location.href =  `<?php echo URL::to('login') ?>`;
                    }
                })
            }

        });
    })
</script>
</html>
