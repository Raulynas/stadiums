@extends('layouts.layout')
@section('content')

<div class="section container">
    <div class="row">
        <div class="col s12 l5 offset-l3">
            <form method="post" action="">
                @csrf
                <div class="input-field">
                    <input type="text" name="name" id="name" maxlength="60" minlength="4" required>
                    <label for="name">Stadium name</label>
                </div>
                <div class="input-field">
                    <input type="text" name="city" id="city" maxlength="30" minlength="4" required>
                    <label for="city">City</label>
                </div>
                <div class="input-field">
                    <input type="text" name="address" id="address" maxlength="60" minlength="4" required>
                    <label for="address">Address</label>
                </div>
                <div class="input-field center">
                    <input class="btn" type="submit" value="Create Stadium">
                </div>

            </form>
        </div>


    </div>
</div>
@endsection