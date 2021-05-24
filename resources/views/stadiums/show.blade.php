@extends('layouts.layout')
@section('content')


<div class="container row">

    <div class="col s12">
        <div class="card grey lighten-2 z-depth-1">
            <div class=" card-content">
                <form class="city-filter" method="GET">
                    @csrf
                    <div class=" input-field">
                        <select>
                            <option value="" selected disabled>Showing {{$city}} stadiums</option>
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
                <span class="stadium-select card-title indigo-text" stadium-id="{{$stadium->id}}">{{$stadium->name}}</span>
                @endforeach
            </div>
        </div>

        <div class="date-line hidden" stadium-id="">
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
                                    date-id=" {{ date( "Y-m-d", strtotime( "$startDate + $i day") ) }} ">
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
                <div class="card-content big-card">
                    @for ($i = 0; $i < 12; $i++) <ul>
                        <li class="time-line row card-title center">
                            <div class="time col l2 hide-on-med-and-down">
                                <p class="display-date"></p>
                            </div>
                            <div class="time col s4 l3">
                                <span><b>{{ date( "H:i", strtotime( "$startTime + $i hour") ) }}</b></span> </div>
                            <div class="time col l1 hide-on-med-and-down">
                                <span><b>---</b></span>
                            </div>
                            <div class="time col s4 l3">
                                <span><b>{{ date( "H:i", strtotime( "$startTime+ ". $i + 1 . " hour") ) }}</b></span>
                            </div>
                            <div class="time col s4 l3">
                                <p class="booking" data-city="{{$city}}" data-stadium="" data-date=""
                                    data-time="{{ date( "H:i", strtotime( "$startTime + $i hour") ) }}">Select</p>
                                <a class="display-summary hide-on-small-and-down"
                                    style=" height: 16px; font-size: 12px; font-weight: bold"></a>
                            </div>
                        </li>
                        </ul>

                        @endfor

                </div>

                <div class="card-action right-align">
                    <form id="regForm" method="POST" }}>
                        @csrf
                        <input type="hidden" id="regId" name="regId" value="">
                        <input type="hidden" id="stadiumId" name="stadiumId" value="">
                        <a class="btn regBtn disabled" type="submit"><i class="material-icons right">send</i>Confirm
                            selection</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection