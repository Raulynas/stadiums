@extends('layouts.layout')
@section('content')


<div class="container" style="padding-top: 30px;">
    <div class="row">
        <div class="col s12 l8 offset-l1 center">
            <span class="indigo-text" style="font-style: italic">{{session("msg")}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l8 offset-l1">

            <table class="highlight centered">
                <thead>
                    <tr>
                        <th>Stadium</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stadiums as $stadium)
                    <tr>
                        <td>{{ $stadium["name"] }}</td>
                        <td>{{ $stadium["city"] }}</td>
                        <td>{{ $stadium["address"] }}</td>
                        <td><a href="{{ route("stadiums.edit", $stadium) }}"><i
                                    class="material-icons teal-text text-lighten-1 ">edit</i></a></td>
                        <td>
                            <form id="destroy-form" action="{{route('stadiums.destroy', $stadium->id)}}" method="post">
                                @method("DELETE")
                                @csrf
                                <button style="background-color: transparent; border: none; cursor: pointer;"
                                    class="tooltipped" data-position="right" data-tooltip="Delete Stadium">
                                    <i class="material-icons red-text">delete</i>
                                </button>
                            </form>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection