@extends('layouts.layout')
@section('content')


<div class="container">


    <div class="row">
        <div class="col s12">
            <div class="card grey lighten-2 z-depth-1">
                <div class=" card-content">
                    {{-- <span class="card-title indigo-text">Showing {{$city}} stadiums</span> --}}
                    <form class="city-filter" method="GET">
                        <div class=" input-field">
                            <select>
                                <option value="All">Showing {{$city}} stadiums</option>
                                @foreach ($uniqueCites as $uniqueCity)
                                <option value="{{$uniqueCity->city}}">{{$uniqueCity->city}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card grey lighten-2 z-depth-1">
                <div class="stadium card-content">
                    @foreach ($stadiums as $stadium)
                    <span class="stadium-select card-title indigo-text">{{$stadium->name}}</span>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="date-line col s12 hidden" stadium-id="">
            <div class="card grey lighten-2 z-depth-1">
                <div class="card-content">
                    <div class="outer-div ">
                        <div class="inner-div">
                            <ul class="dates ">
                                <?php
                                $startDate = date("Y-m-d");
                                $startTime = "08:00";
                                ?>
                                @for ($i = 0; $i < 30; $i++) <li class="date-picker card z-depth-1"
                                    date-id=" {{ date( "d/M/Y", strtotime( "$startDate + $i day") ) }} ">
                                    <span>{{ date( "d", strtotime( "$startDate + $i day") ) }}</span>
                                    <br>
                                    <span>{{ date( "D", strtotime( "$startDate + $i day") ) }}</span> </li>
                                    @endfor
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="day-times card grey lighten-2 z-depth-1">

                <div class="card-content">
                    @for ($i = 0; $i < 12; $i++) <ul>
                        <li class="time-line row card-title center">
                            <div class="time col s2 hide-on-med-and-down">
                                <p class="display-date"></p>
                            </div>
                            <div class="time col s3">
                                <span><b>{{ date( "H:i", strtotime( "$startTime + $i hour") ) }}</b></span> </div>
                            <div class="time col s1 hide-on-med-and-down">
                                <span><b>---</b></span>
                            </div>
                            <div class="time col s3">
                                <span><b>{{ date( "H:i", strtotime( "$startTime+ ". $i + 1 . " hour") ) }}</b></span>
                            </div>
                            <div class="time col s3">
                                <p class="booking" data-city="{{$city}}" data-stadium="" data-date=""
                                    data-time="{{ date( "H:i", strtotime( "$startTime + $i hour") ) }}">Select</p>
                                <a class="display-summary"
                                    style=" height: 16px; font-size: 12px; font-weight: bold">{{$city}}</a>
                            </div>
                        </li>
                        </ul>


                        @endfor
                        <div class="total-bookings"></div>
                        <div class="card-action">
                            <form id="reg-form" action="#">
                                @csrf
                                <input type="hidden" id="reg-id" name="reg-id" value="">
                                <a class="btn btn-reg right" type="submit"><i
                                        class="material-icons right">send</i>Confirm selection</a>
                            </form>
                            <div class="test">sdfsdf

                            </div>
                        </div>
                </div>
            </div>

        </div>
    </div>

    @endsection