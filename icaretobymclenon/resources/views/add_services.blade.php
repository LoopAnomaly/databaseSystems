<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Protest+Strike&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    
    <body style="background-color: darkkhaki;">
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: beige;">
            <div class="container-fluid">
                <a class="navbar-brand roboto-bold" href="{{ route('Welcome') }}">Database CO.</a>                
            </div>
        </nav>
        <div class="col-6 offset-3">
            <form class="form" action="{{ route('CustRegister') }}" method="post" accept-charset="UTF-8">
                
                {{ csrf_field() }}
                
                @if(Session::has('success'))
                    <h1 class='roboto-bold mb-5' style="color: white;">You have successfully registered an account with us</h1>
                @elseif(Session::has('failure'))
                    <h1 class='roboto-bold mb-5' style="color: white;">An account with the email already exists, please log in</h1>
                @endif
                
                
                <h1 class="login-title">Registration</h1>
                
                 <div class="form-group mt-3">
                <input type="text" class="form-control" name="first_name" placeholder="First Name" required />
                 </div>
                
                <div class="form-group mt-3">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required />
                </div>
                
                <div class="form-group mt-3">
                <input type="text" class="form-control" name="address" placeholder="Address" required />
                </div>
                
                <div class="form-group mt-3">
                <input type="text" class="form-control" name="email" placeholder="Email Address" required />
                </div>
                
                <div class="form-group mt-3">
                <input type="text" class="form-control" name="phone_no" placeholder="Phone Number" required />
                </div>
                
                <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required />
                </div>
                
                <input type="submit" name="submit" value="Register" class="btn btn-primary mt-3 mb-5">
            </form>
        </div>
        
        <p class="btn btn-success col-2 offset-5"><a href="{{ route('Welcome') }}" style="color: white; text-decoration: none;">Click to Login</a></p>
    </body>
</html>
