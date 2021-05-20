@extends('layouts.layout')
@section('content')

<div class="section container">
    <div class="row">
        <div class="col s12 l5 offset-l3">
            <form method="post" action="">
                @csrf
                <div class="input-field">
                    <input type="text" name="name" id="name" value="{{$stadium->name}}" required>
                    <label for="name">Stadium name</label>
                </div>
                <div class="input-field">
                    <input type="text" name="city" id="city" value="{{$stadium->city}}" required>
                    <label for="city">City</label>
                </div>
                <div class="input-field">
                    <input type="text" name="address" id="address" value="{{$stadium->address}}" required>
                    <label for="address">Address</label>
                </div>
                <div class="input-field center">
                    <input class="btn" type="submit" value="Update">
                </div>

            </form>
        </div>


    </div>
</div>
@endsection