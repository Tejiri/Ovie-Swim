@extends('dashboard')

@section('main-content')
<div class="row">
    <div class="page-header">
        <div class="page-title">

            <h1>Update Squad details</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-title">

                {{-- <h4>Up Form</h4> --}}
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div style="color: red;">{{ $error }}</div>
                    @endforeach
                @endif

                <div style="color: green;">{{ session('message') }}</div>

            </div>
            <div class="card-body" style="height: 230px;">
                <div class="basic-form">
                    <form action="{{url("/update-squad-details/" . $squad->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Squad Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Name" value="{{$squad->name}}">
                        </div>
                        <div class="form-group">

                            </textarea>
                            <label>Squad Description</label>
                            <input name="description" type="text" class="form-control" placeholder="Description" value="{{$squad->description}}">
                        </div>

                        <button type="submit" class="btn btn-default form-control">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
