@extends('dashboard')

@section('main-content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-title">
                    <h4>Upload Training Result</h4>

                </div>
                <div class="card-body">
                    <div style="color: green;">{{ session('message') }}</div>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div style="color: red;">{{ $error }}</div>
                        @endforeach
                    @endif

                    <div style="color: green;">{{ session('squadAssigned') }}</div>
                    <form class="row" action="{{ url('/upload-result') }}" method="POST">
                        @csrf
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Training Date</label>
                                <input name="trainingDate" type="date" class="form-control" placeholder="User Name"
                                    value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <label>Distance</label>
                                <select name="distance" id="" class="form-control">
                                    <option value="100m">100m</option>
                                    <option value="200m">200m</option>
                                    <option value="400m">400m</option>
                                    <option value="800m">800m</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Stroke Type</label>
                                <select name="strokeType" id="" class="form-control">
                                    <option value="Backstroke">BackStroke</option>
                                    <option value="Breaststroke">Breaststroke</option>
                                    <option value="Butterfly">Butterfly</option>
                                    <option value="Freestyle">Freestyle</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label>Minutes</label>
                                    <select name="minutes" id="" class="form-control">
                                        @foreach ($time as $item)
                                            <option value="{{$item}}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Seconds</label>
                                    <select name="seconds" id="" class="form-control">
                                        @foreach ($time as $item)
                                            <option value="{{$item}}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                            </div>
                          

                            @if (count($users))
                                <div class="form-group">
                                    <label>Swimmer</label>
                                    <select name="userId" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->firstName . ' ' . $user->lastName . ' (' . $user->username . ' - ' . $user->role . ')' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                            @endif



                            <button type="submit"
                                class="btn btn-primary btn-flat m-b-30 m-t-30 form-control">Upload</button>

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
