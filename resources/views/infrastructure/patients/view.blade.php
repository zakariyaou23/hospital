@extends('layouts.infrastructure')
@section('page')
    Patient Info
@endsection
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-7 col-6">
                <h4 class="page-title">Patient Info</h4>
            </div>

            <div class="col-sm-5 col-6 text-right m-b-30">
                <a href="{{ route('infrastructure.patient.edit',['patient' => $patient->id]) }}" class="btn btn-primary btn-rounded"><i class="fa fa-pencil"></i> Edit</a>
            </div>
        </div>
        <div class="card-box profile-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img class="avatar" src="/apps/assets/img/user.jpg" onerror="this.src='/apps/assets/img/user.jpg'; this.onerror=null" alt=""></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0">{{ $user->first_name }} {{ $user->last_name }}</h3>
                                        <div class="staff-id">Patient ID : {{ $patient->id }}</div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="#">{{ $user->telephone }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#">{{ $user->email }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Birthday:</span>
                                            <span class="text">{{ $user->date_of_birth }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">{{ $user->address }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Gender:</span>
                                            <span class="text">{{ $user->gender }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-tabs">
            <ul class="nav nav-tabs nav-tabs-bottom">
                <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Transfers</a></li>
                <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Diagnosis</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane show active" id="about-cont">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box">
                                <h3 class="card-title">More Informations</h3>
                                <div class="experience-box">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Bloodgroup:</span>
                                            <span class="text"><a href="#">{{ $patient->blood_group }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Allergies:</span>
                                            <span class="text"><a href="#">{{ $patient->allergies }}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Tension:</span>
                                            <span class="text">{{ $patient->tension }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Height:</span>
                                            <span class="text">{{ $patient->height  }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Weight:</span>
                                            <span class="text">{{ $patient->weight }}</span>
                                        </li>
                                        <li>
                                            <span class="title">Previous note:</span>
                                            <span class="text">{{ $patient->previous_note }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="bottom-tab2">
                    Tab content 2
                </div>
                <div class="tab-pane" id="bottom-tab3">
                    Tab content 3
                </div>
            </div>
        </div>
    </div>
@endsection
