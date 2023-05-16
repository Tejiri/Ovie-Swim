@extends('dashboard')

@section('main-content')
    <div class="row">
        <div class="page-header">
            <div class="page-title">

                <h1>Manage Childrens Account</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-title">

                    <h4>Select Child to update details</h4>


                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ url('/manage-kids') }}" method="POST">
                            @csrf
                            @if (count($children))
                                <div class="form-group">
                                    <label>Select Child</label>
                                    <select name="childId" class="form-control">
                                        @foreach ($children as $child)
                                            <option value="{{ $child->id }}">
                                                {{ $child->firstName . ' ' . $child->lastName . " ( ". $child->username." ) "  }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                No children currently registered
                            @endif

                            <button type="submit" class="btn btn-default form-control">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($selectedChild == null)
        {{-- ddddd --}}
    @else
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-title">
                    <h4>Update Child Account</h4>

                </div>
                <div class="card-body">
                    <div style="color: green;">{{ session('message') }}</div>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div style="color: red;">{{ $error }}</div>
                        @endforeach
                    @endif

                   
                    <form class="row" action="{{ url('/update-profile/'. $selectedChild->id) }}" method="POST">
                        @csrf
                        <div class="col-lg-12">
                            @csrf
                            <div class="form-group">
                                <label>User Name</label>
                                <input name="username" type="text" class="form-control" placeholder="User Name"
                                    value="{{ $selectedChild->username }}">
                            </div>
                            <div class="form-group">
                                <label>Firstname</label>
                                <input name="firstName" type="text" class="form-control" placeholder="Firstname"
                                    value="{{ $selectedChild->firstName }}">
                            </div>
                            <div class="form-group">
                                <label>Lastname</label>
                                <input name="lastName" type="text" class="form-control" placeholder="Lastname"
                                    value="{{ $selectedChild->lastName }}">
                            </div>
                            <div class="form-group">
                                <label>Middlename</label>
                                <input name="middleName" type="text" class="form-control" placeholder="Middlename"
                                    value="{{ $selectedChild->middleName }}">
                            </div>
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input name="dateOfBirth" type="date" class="form-control"
                                    value="{{ $selectedChild->dateOfBirth }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Number</label>
                                <input name="number" type="text" class="form-control" placeholder="Phone number"
                                    value="{{ $selectedChild->number }}">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input name="address" type="text" class="form-control" placeholder="Address"
                                    value="{{ $selectedChild->address }}">
                            </div>
                            <div class="form-group">
                                <label>Postcode</label>
                                <input name="postCode" type="text" class="form-control" placeholder="Postcode"
                                    value="{{ $selectedChild->postCode }}" readonly>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <input name="gender" type="text" class="form-control" placeholder="Gender"
                                    value="{{ $selectedChild->gender }}" readonly>


                            </div>


                            <div class="form-group">
                                <label>Email address</label>
                                <input name="email" type="email" class="form-control" placeholder="Email"
                                    value="{{ $selectedChild->email }}" readonly>
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
                                class="btn btn-primary btn-flat m-b-30 m-t-30 form-control">Update Account</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif


@endsection
