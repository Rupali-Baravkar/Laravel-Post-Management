<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>
    .login-container {
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .login-form-1 {
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }

    .login-form-1 h3 {
        text-align: center;
        color: #333;
    }

    /* .login-container form {
        padding: 10%;
    } */

    .btnSubmit {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }

    .login-form-1 .btnSubmit {
        font-weight: 600;
        color: #fff;
        background-color: #0062cc;
    }

    .login-form-1 .ForgetPwd {
        color: #0062cc;
        font-weight: 600;
        text-decoration: none;
    }
</style>

<body>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                @if($errors->has('role'))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->get('role') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <h3>Login</h3>
                <form action="{{route('login-post')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Your Email *" value="{{old('email')}}" />
                        @error('email')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                        @error('password')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                    <!-- <div class="form-group">
                        <a href="#" class="ForgetPwd">Forget Password?</a>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</body>

</html>