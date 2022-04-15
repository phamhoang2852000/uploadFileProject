<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <base href="{{ asset('') }}">
    <link rel="stylesheet" href="source/assets/css/login.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="sidenav">
        <div class="login-main-text">
           <h2>Application<br> Login Page</h2>
           <p>Login or register from here to access.</p>
        </div>
     </div>
     <div class="main">
        <div class="col-md-6 col-sm-12">
           <div class="login-form">
           <div class="text-red error-form form-group"></div>
              <form>
                 <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                 </div>
                 <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                 </div>
                 <button type="button" data-url="{{ route('login') }}" class="btn btn-black btn-login">Login</button>
                 <a type="button" href="/register" class="btn btn-black btn-register">Register</a>
              </form>
           </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('.btn-login').click(function() {
            var url = $(this).attr('data-url');
            var email = $('input[name="email"]').val();
            var password = $('input[name="password"]').val();
            if(email == '' || password == '') {
                $('.error-form').text('Nhap chua du thong tin');
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
                        password: password
                    },
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 200) {
                           window.location.href =  `<?php echo URL::to('home') ?>`;
                        } else {
                           $('.error-form').text(response.message);
                           $('.error-form').addClass('error');
                        }
                    }
                })
            }

        });
    })
</script>
</html>
