<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
              <form>
                 <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" placeholder="Email">
                 </div>
                 <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                 </div>
                 <button type="submit" class="btn btn-black">Login</button>
                 <a type="button" href="/index" class="btn btn-black btn-register">Register</a>
              </form>
           </div>
        </div>
    </div>
</body>
</html>
