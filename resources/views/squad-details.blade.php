@extends('dashboard')

@section('main-content')
<div class="row">
    <div class="page-header">
        <div class="page-title">
            <h1>{{$squad->name}}</h1>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                        <table id="trainingResults100m" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Middlename</th>
                                    <th>Role</th>
                                    {{-- <th>Update</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($squad->users))
                                    @foreach ($squad->users as $user)
                                        <tr>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->firstName}}</td>
                                            <td>{{$user->lastName}}</td>
                                            <td>{{$user->middleName}}</td>
                                            <td>{{$user->role}}</td>
                                            {{-- <td><input type="submit" value="UPDATE"  class="form-control bg-info" style="width: 100%;"></td> --}}
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
@endsection
