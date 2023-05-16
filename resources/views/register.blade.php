<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ovie Swims register</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        {{-- <div class="login-logo">
                            <a href="index.html"><span>Focus</span></a>
                        </div> --}}
                        <div class="login-form">
                            <h4>Register Account</h4>

                            <div style="color: green;">{{ session('message') }}</div>
                          
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div style="color: red;">{{ $error }}</div>
                                @endforeach
                            @endif
                            <form action="/register" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input name="username" type="text" class="form-control" placeholder="User Name"
                                        value="{{ old('username') }}">
                                </div>
                                <div class="form-group">
                                    <label>Firstname</label>
                                    <input name="firstName" type="text" class="form-control" placeholder="Firstname"
                                        value="{{ old('firstName') }}">
                                </div>
                                <div class="form-group">
                                    <label>Lastname</label>
                                    <input name="lastName" type="text" class="form-control" placeholder="Lastname"
                                        value="{{ old('lastName') }}">
                                </div>
                                <div class="form-group">
                                    <label>Middlename</label>
                                    <input name="middleName" type="text" class="form-control"
                                        placeholder="Middlename" value="{{ old('middleName') }}">
                                </div>
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <input name="dateOfBirth" type="date" class="form-control"
                                        value="{{ old('dateOfBirth') }}">
                                </div>
                                <div class="form-group">
                                    <label>Number</label>
                                    <input name="number" type="text" class="form-control" placeholder="Phone number"
                                        value="{{ old('number') }}">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input name="address" type="text" class="form-control" placeholder="Address"
                                        value="{{ old('address') }}">
                                </div>
                                <div class="form-group">
                                    <label>Postcode</label>
                                    <input name="postCode" type="text" class="form-control" placeholder="Postcode"
                                        value="{{ old('postCode') }}">
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        <option value="swimmer">Swimmer</option>
                                        <option value="parent">Parent</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Email address</label>
                                    <input name="email" type="email" class="form-control" placeholder="Email"
                                        value="{{ old('email') }}">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="password" type="password" class="form-control"
                                        placeholder="Password" value="{{ old('password') }}">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control"
                                        placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                                </div>

                                <button type="submit"
                                    class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                {{-- <div class="social-login-content">
                                    <div class="social-button">
                                        <button type="button" class="btn btn-primary bg-facebook btn-flat btn-addon m-b-10"><i class="ti-facebook"></i>Register with facebook</button>
                                        <button type="button" class="btn btn-primary bg-twitter btn-flat btn-addon m-t-10"><i class="ti-twitter"></i>Register with twitter</button>
                                    </div>
                                </div> --}}
                                <div class="register-link m-t-15 text-center">
                                    <p>Already have account ? <a href="login"> Sign in</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</body>

</html>
