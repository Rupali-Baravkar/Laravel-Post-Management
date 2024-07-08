<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<style>
    .login-container {
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .register-form-1 {
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }

    .register-form-1 h3 {
        text-align: center;
        color: #333;
    }

    .btnSubmit {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }

    .register-form-1 .btnSubmit {
        font-weight: 600;
        color: #fff;
        background-color: #0062cc;
    }

    .register-form-1 .ForgetPwd {
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
            <div class="col-md-6 register-form-1">
                <h3>Register</h3>
                <form method="POST" action="{{ route('post-register') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" >
                        @error('name')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Your Email *" value="{{old('email')}}" />
                        @error('email')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                        @error('password')
                        <div class="error text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Register" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>