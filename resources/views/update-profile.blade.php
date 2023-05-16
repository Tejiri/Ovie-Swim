@extends('dashboard')

@section('main-content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-title">
                    <h4>Update Profile</h4>

                </div>
                <div class="card-body">
                    <div style="color: green;">{{ session('message') }}</div>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div style="color: red;">{{ $error }}</div>
                        @endforeach
                    @endif

                   
                    <form class="row" action="{{ url('/update-profile') }}" method="POST">
                        @csrf
                        <div class="col-lg-12">
                            @csrf
                            <div class="form-group">
                                <label>User Name</label>
                                <input name="username" type="text" class="form-control" placeholder="User Name"
                                    value="{{ $user->username }}">
                            </div>
                            <div class="form-group">
                                <label>Firstname</label>
                                <input name="firstName" type="text" class="form-control" placeholder="Firstname"
                                    value="{{ $user->firstName }}">
                            </div>
                            <div class="form-group">
                                <label>Lastname</label>
                                <input name="lastName" type="text" class="form-control" placeholder="Lastname"
                                    value="{{ $user->lastName }}">
                            </div>
                            <div class="form-group">
                                <label>Middlename</label>
                                <input name="middleName" type="text" class="form-control" placeholder="Middlename"
                                    value="{{ $user->middleName }}">
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input name="dateOfBirth" type="date" class="form-control"
                                    value="{{ $user->dateOfBirth }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Number</label>
                                <input name="number" type="text" class="form-control" placeholder="Phone number"
                                    value="{{ $user->number }}">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" type="text" class="form-control" placeholder="Address"
                                    value="{{ $user->address }}">
                            </div>
                            <div class="form-group">
                                <label>Postcode</label>
                                <input name="postCode" type="text" class="form-control" placeholder="Postcode"
                                    value="{{ $user->postCode }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <input name="gender" type="text" class="form-control" placeholder="Gender"
                                    value="{{ $user->gender }}" readonly>


                            </div>


                            <div class="form-group">
                                <label>Email address</label>
                                <input name="email" type="email" class="form-control" placeholder="Email"
                                    value="{{ $user->email }}" readonly>
                            </div>
                            {{-- <div class="form-group">
                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Password"
                                    value="{{ old('password') }}">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input name="password_confirmation" type="password" class="form-control"
                                    placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                            </div> --}}
                            <button type="submit"
                                class="btn btn-primary btn-flat m-b-30 m-t-30 form-control">Update Profile</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
