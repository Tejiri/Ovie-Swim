@extends('dashboard')

@section('main-content')
    <div class="row">
        <div class="page-header">
            <div class="page-title">

                <h1>View Training Results</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-title">

                    <h4>Select Squad</h4>


                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ url('/view-results') }}" method="POST">
                            @csrf
                            @if (count($squads))
                                <div class="form-group">
                                    <label>Select Squad</label>
                                    <select name="squadId" class="form-control">
                                        @foreach ($squads as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                            @endif

                            <button type="submit" class="btn btn-default form-control">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if ($squad == null)
        {{-- ddddd --}}
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title" style="padding: 20px 0px;">{{$squad->name}} Training Results</h4>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#100m"
                                    role="tab"><span class="hidden-sm-up"><i class="ti-timer"></i></span> <span
                                        class="hidden-xs-down">100m</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#200m" role="tab"><span
                                        class="hidden-sm-up"><i class="ti-timer"></i></span> <span
                                        class="hidden-xs-down">200m</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#400m" role="tab"><span
                                        class="hidden-sm-up"><i class="ti-timer"></i></span> <span
                                        class="hidden-xs-down">400m</span></a> </li>

                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#800m" role="tab"><span
                                        class="hidden-sm-up"><i class="ti-timer"></i></span> <span
                                        class="hidden-xs-down">800m</span></a> </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="100m" role="tabpanel">
                                <div class="bootstrap-data-table-panel" style="padding: 40px;">

                                    {{-- {{ $trainingResults100m }} --}}
                                    <div class="table-responsive">
                                        <table id="trainingResults100m" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Training Date</th>
                                                    <th>Distance</th>
                                                    <th>Stroke Type</th>
                                                    <th>Time Spent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($trainingResults100m != null && count($trainingResults100m))
                                                    @foreach ($trainingResults100m as $result)
                                                        @if ($result->user->squadId == $squad->id)
                                                            <tr>
                                                                <td>{{ $result->user->firstName }}</td>
                                                                <td>{{ $result->user->lastName }}</td>
                                                                <td>{{ $result->trainingDate }}</td>
                                                                <td>{{ $result->distance }}</td>
                                                                <td>{{ $result->strokeType }}</td>
                                                                <td>{{ gmdate('H:i:s', $result->timeInSeconds) }}</td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="200m" role="tabpanel">
                                <div class="bootstrap-data-table-panel" style="padding: 40px;">

                                    {{-- {{ $trainingResults100m }} --}}
                                    <div class="table-responsive">
                                        <table id="trainingResults200m" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Training Date</th>
                                                    <th>Distance</th>
                                                    <th>Stroke Type</th>
                                                    <th>Time Spent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($trainingResults200m != null && count($trainingResults200m))
                                                    @foreach ($trainingResults200m as $result)
                                                        @if ($result->user->squadId == $squad->id)
                                                            <tr>
                                                                <td>{{ $result->user->firstName }}</td>
                                                                <td>{{ $result->user->lastName }}</td>
                                                                <td>{{ $result->trainingDate }}</td>
                                                                <td>{{ $result->distance }}</td>
                                                                <td>{{ $result->strokeType }}</td>
                                                                <td>{{ gmdate('H:i:s', $result->timeInSeconds) }}</td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="400m" role="tabpanel">
                                <div class="bootstrap-data-table-panel" style="padding: 40px;">

                                    {{-- {{ $trainingResults100m }} --}}
                                    <div class="table-responsive">
                                        <table id="trainingResults400m" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Training Date</th>
                                                    <th>Distance</th>
                                                    <th>Stroke Type</th>
                                                    <th>Time Spent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($trainingResults400m != null && count($trainingResults100m))
                                                    @foreach ($trainingResults400m as $result)
                                                        @if ($result->user->squadId == $squad->id)
                                                            <tr>
                                                                <td>{{ $result->user->firstName }}</td>
                                                                <td>{{ $result->user->lastName }}</td>
                                                                <td>{{ $result->trainingDate }}</td>
                                                                <td>{{ $result->distance }}</td>
                                                                <td>{{ $result->strokeType }}</td>
                                                                <td>{{ gmdate('H:i:s', $result->timeInSeconds) }}</td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="800m" role="tabpanel">
                                <div class="bootstrap-data-table-panel" style="padding: 40px;">

                                    {{-- {{ $trainingResults100m }} --}}
                                    <div class="table-responsive">
                                        <table id="trainingResults800m" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Training Date</th>
                                                    <th>Distance</th>
                                                    <th>Stroke Type</th>
                                                    <th>Time Spent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($trainingResults800m != null && count($trainingResults100m))
                                                    @foreach ($trainingResults800m as $result)
                                                        @if ($result->user->squadId == $squad->id)
                                                            <tr>
                                                                <td>{{ $result->user->firstName }}</td>
                                                                <td>{{ $result->user->lastName }}</td>
                                                                <td>{{ $result->trainingDate }}</td>
                                                                <td>{{ $result->distance }}</td>
                                                                <td>{{ $result->strokeType }}</td>
                                                                <td>{{ gmdate('H:i:s', $result->timeInSeconds) }}</td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    @endif


@endsection
