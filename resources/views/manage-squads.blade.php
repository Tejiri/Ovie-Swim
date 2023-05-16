@extends('dashboard')

@section('main-content')
    <div class="row">
        <div class="page-header">
            <div class="page-title">
                <h1>Squad Management</h1>
            </div>
        </div>
    </div>

    <div class="row">
        @if (Auth::user()->role == 'admin')
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-title">

                        <h4>Squad Form</h4>
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div style="color: red;">{{ $error }}</div>
                            @endforeach
                        @endif

                    </div>
                    <div class="card-body" style="height: 230px;">
                        <div class="basic-form">
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
                        </div>
                    </div>
                </div>
            </div>
        @else
        @endif

        <div class="col-lg-6">
            <div class="card">
                <div class="card-title">

                    <h4>Created Squads</h4>


                </div>
                <div class="card-body" style="height: 230px; overflow-y: scroll;">

                    @if (Auth::user()->role == 'admin')
                        @if (count($squads))
                            @foreach ($squads as $squad)
                                <span style="font-size: 15px; color: black; font-weight: bold;"> {{ $squad->name }} <a
                                        href="{{ url('/edit-squad/' . $squad->id) }}">Edit</a> <a
                                        href={{ url('/squad-details/' . $squad->id) }}>View</a></span>
                                <hr style="padding: 0px; margin: 0px;">
                                <br>
                            @endforeach
                        @else
                            No Squads created
                        @endif
                    @elseif (Auth::user()->role == 'coach')
                        <span style="font-size: 15px; color: black; font-weight: bold;"> {{ $squad->name }} <a
                                href="{{ url('/edit-squad/' . $squad->id) }}">Edit</a> <a
                                href={{ url('/squad-details/' . $squad->id) }}>View</a></span>
                        <hr style="padding: 0px; margin: 0px;">
                        <br>

                    @endif


                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->role == 'admin')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-title">
                        <h4>Assign User to squad</h4>

                    </div>
                    <div class="card-body">

                        <div style="color: green;">{{ session('squadAssigned') }}</div>
                        <form class="row" action="{{ url('/assign-squad') }}" method="POST">
                            @csrf

                            <div class="col-lg-4">
                                <label>Users</label>
                                @if (count($users))
                                    <select name="user" id="" class="form-control">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->firstName . ' ' . $user->lastName . ' (' . $user->username . ' - ' . $user->role . ')' }}
                                            </option>
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
                                            <option value="{{ $squad->id }}">{{ $squad->name }}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <br>
                                    <span style="color: red;">No Squads created</span>
                                @endif

                            </div>

                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-dark btn-flat m-b-30 m-t-30">Assign Squad</button>
                            </div>
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
    @else
    @endif



    {{-- <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Salary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td>$320,800</td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$170,750</td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td>$86,000</td>
                                </tr>
                                <tr>
                                    <td>Cedric Kelly</td>
                                    <td>Senior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>$433,060</td>
                                </tr>
                                <tr>
                                    <td>Airi Satou</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td>$162,700</td>
                                </tr>
                                <tr>
                                    <td>Brielle Williamson</td>
                                    <td>Integration Specialist</td>
                                    <td>New York</td>
                                    <td>$372,000</td>
                                </tr>
                                <tr>
                                    <td>Herrod Chandler</td>
                                    <td>Sales Assistant</td>
                                    <td>San Francisco</td>
                                    <td>$137,500</td>
                                </tr>
                                <tr>
                                    <td>Rhona Davidson</td>
                                    <td>Integration Specialist</td>
                                    <td>Tokyo</td>
                                    <td>$327,900</td>
                                </tr>
                                <tr>
                                    <td>Colleen Hurst</td>
                                    <td>Javascript Developer</td>
                                    <td>San Francisco</td>
                                    <td>$205,500</td>
                                </tr>
                                <tr>
                                    <td>Sonya Frost</td>
                                    <td>Software Engineer</td>
                                    <td>Edinburgh</td>
                                    <td>$103,600</td>
                                </tr>
                                <tr>
                                    <td>Jena Gaines</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>$90,560</td>
                                </tr>
                                <tr>
                                    <td>Quinn Flynn</td>
                                    <td>Support Lead</td>
                                    <td>Edinburgh</td>
                                    <td>$342,000</td>
                                </tr>
                                <tr>
                                    <td>Charde Marshall</td>
                                    <td>Regional Director</td>
                                    <td>San Francisco</td>
                                    <td>$470,600</td>
                                </tr>
                                <tr>
                                    <td>Haley Kennedy</td>
                                    <td>Senior Marketing Designer</td>
                                    <td>London</td>
                                    <td>$313,500</td>
                                </tr>
                                <tr>
                                    <td>Tatyana Fitzpatrick</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>$385,750</td>
                                </tr>
                                <tr>
                                    <td>John Silva</td>
                                    <td>Marketing Designer</td>
                                    <td>London</td>
                                    <td>$198,500</td>
                                </tr>
                                <tr>
                                    <td>Paul Byrd</td>
                                    <td>Chief Financial Officer (CFO)</td>
                                    <td>New York</td>
                                    <td>$725,000</td>
                                </tr>
                                <tr>
                                    <td>Gloria Little</td>
                                    <td>Systems Administrator</td>
                                    <td>New York</td>
                                    <td>$237,500</td>
                                </tr>
                                <tr>
                                    <td>Bradley Greer</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>$132,000</td>
                                </tr>
                                <tr>
                                    <td>Dai Rios</td>
                                    <td>Personnel Lead</td>
                                    <td>Edinburgh</td>
                                    <td>$217,500</td>
                                </tr>
                                <tr>
                                    <td>Jenette Caldwell</td>
                                    <td>Development Lead</td>
                                    <td>New York</td>
                                    <td>$345,000</td>
                                </tr>
                                <tr>
                                    <td>Yuri Berry</td>
                                    <td>Chief Marketing Officer (CMO)</td>
                                    <td>New York</td>
                                    <td>$675,000</td>
                                </tr>
                                <tr>
                                    <td>Caesar Vance</td>
                                    <td>Pre-Sales Support</td>
                                    <td>New York</td>
                                    <td>$106,450</td>
                                </tr>
                                <tr>
                                    <td>Doris Wilder</td>
                                    <td>Sales Assistant</td>
                                    <td>Sidney</td>
                                    <td>$85,600</td>
                                </tr>
                                <tr>
                                    <td>Angelica Ramos</td>
                                    <td>Chief Executive Officer (CEO)</td>
                                    <td>London</td>
                                    <td>$1,200,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin Joyce</td>
                                    <td>Developer</td>
                                    <td>Edinburgh</td>
                                    <td>$92,575</td>
                                </tr>
                                <tr>
                                    <td>Jennifer Chang</td>
                                    <td>Regional Director</td>
                                    <td>Singapore</td>
                                    <td>$357,650</td>
                                </tr>
                                <tr>
                                    <td>Brenden Wagner</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>$206,850</td>
                                </tr>
                                <tr>
                                    <td>Fiona Green</td>
                                    <td>Chief Operating Officer (COO)</td>
                                    <td>San Francisco</td>
                                    <td>$850,000</td>
                                </tr>
                                <tr>
                                    <td>Shou Itou</td>
                                    <td>Regional Marketing</td>
                                    <td>Tokyo</td>
                                    <td>$163,000</td>
                                </tr>
                                <tr>
                                    <td>Michelle House</td>
                                    <td>Integration Specialist</td>
                                    <td>Sidney</td>
                                    <td>$95,400</td>
                                </tr>
                                <tr>
                                    <td>Suki Burks</td>
                                    <td>Developer</td>
                                    <td>London</td>
                                    <td>$114,500</td>
                                </tr>
                                <tr>
                                    <td>Prescott Bartlett</td>
                                    <td>Technical Author</td>
                                    <td>London</td>
                                    <td>$145,000</td>
                                </tr>
                                <tr>
                                    <td>Gavin Cortez</td>
                                    <td>Team Leader</td>
                                    <td>San Francisco</td>
                                    <td>$235,500</td>
                                </tr>
                                <tr>
                                    <td>Martena Mccray</td>
                                    <td>Post-Sales support</td>
                                    <td>Edinburgh</td>
                                    <td>$324,050</td>
                                </tr>
                                <tr>
                                    <td>Unity Butler</td>
                                    <td>Marketing Designer</td>
                                    <td>San Francisco</td>
                                    <td>$85,675</td>
                                </tr>
                                <tr>
                                    <td>Howard Hatfield</td>
                                    <td>Office Manager</td>
                                    <td>San Francisco</td>
                                    <td>$164,500</td>
                                </tr>
                                <tr>
                                    <td>Hope Fuentes</td>
                                    <td>Secretary</td>
                                    <td>San Francisco</td>
                                    <td>$109,850</td>
                                </tr>
                                <tr>
                                    <td>Vivian Harrell</td>
                                    <td>Financial Controller</td>
                                    <td>San Francisco</td>
                                    <td>$452,500</td>
                                </tr>
                                <tr>
                                    <td>Timothy Mooney</td>
                                    <td>Office Manager</td>
                                    <td>London</td>
                                    <td>$136,200</td>
                                </tr>
                                <tr>
                                    <td>Jackson Bradshaw</td>
                                    <td>Director</td>
                                    <td>New York</td>
                                    <td>$645,750</td>
                                </tr>
                                <tr>
                                    <td>Olivia Liang</td>
                                    <td>Support Engineer</td>
                                    <td>Singapore</td>
                                    <td>$234,500</td>
                                </tr>
                                <tr>
                                    <td>Bruno Nash</td>
                                    <td>Software Engineer</td>
                                    <td>London</td>
                                    <td>$163,500</td>
                                </tr>
                                <tr>
                                    <td>Sakura Yamamoto</td>
                                    <td>Support Engineer</td>
                                    <td>Tokyo</td>
                                    <td>$139,575</td>
                                </tr>
                                <tr>
                                    <td>Thor Walton</td>
                                    <td>Developer</td>
                                    <td>New York</td>
                                    <td>$98,540</td>
                                </tr>
                                <tr>
                                    <td>Finn Camacho</td>
                                    <td>Support Engineer</td>
                                    <td>San Francisco</td>
                                    <td>$87,500</td>
                                </tr>
                                <tr>
                                    <td>Serge Baldwin</td>
                                    <td>Data Coordinator</td>
                                    <td>Singapore</td>
                                    <td>$138,575</td>
                                </tr>
                                <tr>
                                    <td>Zenaida Frank</td>
                                    <td>Software Engineer</td>
                                    <td>New York</td>
                                    <td>$125,250</td>
                                </tr>
                                <tr>
                                    <td>Zorita Serrano</td>
                                    <td>Software Engineer</td>
                                    <td>San Francisco</td>
                                    <td>$115,000</td>
                                </tr>
                                <tr>
                                    <td>Jennifer Acosta</td>
                                    <td>Junior Javascript Developer</td>
                                    <td>Edinburgh</td>
                                    <td>$75,650</td>
                                </tr>
                                <tr>
                                    <td>Cara Stevens</td>
                                    <td>Sales Assistant</td>
                                    <td>New York</td>
                                    <td>$145,600</td>
                                </tr>
                                <tr>
                                    <td>Hermione Butler</td>
                                    <td>Regional Director</td>
                                    <td>London</td>
                                    <td>$356,250</td>
                                </tr>
                                <tr>
                                    <td>Lael Greer</td>
                                    <td>Systems Administrator</td>
                                    <td>London</td>
                                    <td>$103,500</td>
                                </tr>
                                <tr>
                                    <td>Jonas Alexander</td>
                                    <td>Developer</td>
                                    <td>San Francisco</td>
                                    <td>$86,500</td>
                                </tr>
                                <tr>
                                    <td>Shad Decker</td>
                                    <td>Regional Director</td>
                                    <td>Edinburgh</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>John Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>$112,000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div> --}}
@endsection
