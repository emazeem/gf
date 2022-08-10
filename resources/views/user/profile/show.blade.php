@extends('user.layouts.master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <main id="main" style="margin-top: 70px">
        <div class="cover-photo position-relative" style="background-image: url('https://unsplash.it/1000/1000/?random&pic=1');">
            <!-- Example single danger button -->
            <div class="btn-group position-absolute" style="right: 10px;top: 10px;">
                <button type="button" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-camera"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i class="bi bi-camera"></i> <small>Change Cover Photo</small></a>
                    <a class="dropdown-item" href="#"><i class="bi bi-camera"></i> <small>Change Profile Photo</small></a>
                    <a class="dropdown-item" href="#"><i class="bi bi-trash"></i> <small>Delete Cover Photo</small></a>
                </div>
            </div>
        </div>
        <div class="profile-pic text-center">
            <img class="profile-picture" src="https://unsplash.it/300/300/?random&pic=1(14 kB)" alt="profile-picture">
        </div>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            About Me -
                            <br>
                            Quick Stats - 26, , live in New York, New York, United States.
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-header">
                            <h4>Hobbies</h4>
                        </div>
                        <div class="card-body">
                            <h3>My Hobbies</h3>
                            <h3>Sports</h3>
                            <h3>Fitness/Outdoors</h3>
                            <h3>Entertainment / Going Out</h3>
                            <h3>Movies</h3>
                            <h3>Music</h3>
                        </div>
                    </div>

                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>Availability</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered" style="font-size: 9px">
                                <thead>
                                <tr class="text-center">
                                    <th colspan="8">Availability</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Su</th>
                                    <th>M</th>
                                    <th>T</th>
                                    <th>W</th>
                                    <th>T</th>
                                    <th>F</th>
                                    <th>S</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th>Morn</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>After</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Night</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-2">
                        <div class="card-body">
                            <ul style="list-style-type: none">
                                <li>
                                    <a href=""><i class="bi bi-pencil"></i> Edit my Profile</a>
                                </li>
                                <li>
                                    <a href=""><i class="bi bi-pin-map"></i> Edit Location</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>


    <style>
        .cover-photo{
            height: 300px;
            background-position: center;
            z-index: -100;
            background-size: cover;
        }
        .profile-picture {
            border-radius: 50%;
            height: 150px;
            width: 150px;
            margin-top: -75px;
        }
    </style>
@endsection