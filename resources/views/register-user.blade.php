@extends('dashboard')

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h4>Register User</h4>

                </div>
                <div class="card-body">
                    <div style="color: green;">{{ session('message') }}</div>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div style="color: red;">{{ $error }}</div>
                        @endforeach
                    @endif

                    <div style="color: green;">{{ session('squadAssigned') }}</div>
                    <form class="row"
                        action={{ Auth::user()->role == 'admin' ? url('/register') : url('/register-child') }}
                        method="POST">
                        @csrf

                        <div class="col-lg-6">
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
                                <input name="middleName" type="text" class="form-control" placeholder="Middlename"
                                    value="{{ old('middleName') }}">
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
                        </div>

                        <div class="col-lg-6">
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
                            @if (Auth::user()->role == 'admin')
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        <option value="swimmer">Swimmer</option>
                                        <option value="parent">Parent</option>
                                        <option value="coach">Coach</option>
                                    </select>
                                </div>
                            @endif


                            <div class="form-group">
                                <label>Email address</label>
                                <input name="email" type="email" class="form-control" placeholder="Email"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Password"
                                    value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input name="password_confirmation" type="password" class="form-control"
                                    placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                            </div>

                            <button type="submit"
                                class="btn btn-primary btn-flat m-b-30 m-t-30 form-control">Register</button>

                        </div>





                        {{-- <div class="social-login-content">
                                <div class="social-button">
                                    <button type="button" class="btn btn-primary bg-facebook btn-flat btn-addon m-b-10"><i class="ti-facebook"></i>Register with facebook</button>
                                    <button type="button" class="btn btn-primary bg-twitter btn-flat btn-addon m-t-10"><i class="ti-twitter"></i>Register with twitter</button>
                                </div>
                            </div> --}}



                        {{-- <div class="col-lg-4">
                        <label>Users</label>
                        @if (count($users))
                            <select name="user" id="" class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{ $user->firstName }}</option>
                                @endforeach
                            </select>
                        @else
                            <br>
                            <span style="color: red;">No Users without squad</span>
                        @endif


                    </div>

                    <div class="col-lg-4">
                        <label>Squads</label>
                        @if (count($squads))
                            <select name="squad" id="" class="form-control">
                                @foreach ($squads as $squad)
                                    <option value="{{$squad->id}}">{{ $squad->name }}</option>
                                @endforeach
                            </select>
                        @else
                            <br>
                            <span style="color: red;">No Squads created</span>
                        @endif

                    </div> --}}


                    </form>




                    {{-- @if (count($squads))
                    @foreach ($squads as $squad)
                        <span style="font-size: 15px; color: black; font-weight: bold;"> {{ $squad->name }} <a
                                href="">Edit</a></span>
                        <hr style="padding: 0px; margin: 0px;">
                        <br>
                    @endforeach
                @else
                    No Squads created
                @endif --}}
                    {{-- <div class="basic-form">
                    <form action="/create-squad" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Squad Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">

                            </textarea>
                            <label>Squad Description</label>
                            <input name="description" type="text" class="form-control" placeholder="Description">
                        </div>

                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div> --}}
                </div>


            </div>
        </div>
    </div>
@endsection
