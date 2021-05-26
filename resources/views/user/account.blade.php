@extends('layouts.layout')
@section('content')
<style>
    header,
    main,
    footer {
        padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {

        header,
        main,
        footer {
            padding-left: 0;
        }
    }
</style>
{{-- <?php dd($stadiums->registrations) ?> --}}
<ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
        <div class="user-view">
            <div class="background">
                <img
                    src="https://www.cricketsoccer.com/wp-content/uploads/2020/12/1c5b1aa3386eeb2c21d633f04e2ddfbe.jpg">
            </div>
            <a href="#name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
            <a href="#email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
        </div>
    </li>
    <li><a href="#!">Current bookings</a></li>
    <li><a href="#!">Booking history</a></li>
</ul>
<a href="#" data-target="slide-out" class="sidenav-trigger hide-on-large-only"><i class="material-icons">menu</i></a>

<div class="section container">
    <div class="row">
        <ul class="collection with-header">
            <li class="collection-header">
                <h4>Your bookings</h4>
            </li>
            @foreach ($user->registrations as $registration)
            <li class="collection-item">{{$registration->registration_date}}, {{$registration->stadium->name}}
            {{-- <form id="destroy-form" action="{{route('/', $stadium->id)}}" method="post">
                                            @method("DELETE")
                                            @csrf
                                            <button style="background-color: transparent; border: none; cursor: pointer;" class="tooltipped"
                                                data-position="right" data-tooltip="Delete Stadium">
                                                <i class="material-icons red-text">delete</i>
                                            </button>
                                        </form> --}}
            </li>

            @endforeach
        </ul>
    </div>
</div>
@endsection