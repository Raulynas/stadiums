@extends('layouts.layout')
@section('content')


<div class="container">


    <div class="row">
        <div class="col s12">
            <div class="card grey lighten-2 z-depth-1">
                <div class="card-content">
                        <span class="card-title indigo-text">Showing {{$city}} stadiums</span>
                    <div class="input-field">
                        <select>
                            <option value="" disabled selected>Choose other city</option>
                            @foreach ($stadiums as $stadium)
                            <option value="{{$stadium->city}}">{{$stadium->city}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col s12">
            <div class="card grey lighten-2 z-depth-1">
                <div class="card-content">
                        <span class="card-title indigo-text">Showing {{$city}} stadiums</span>
                </div>
            </div>

        </div>
    </div>
    @endsection