<?php

namespace App\Http\Controllers;

use App\Models\Stadium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class StadiumController extends Controller
{

    public function welcome()
    {
        $stadiums = DB::table("stadiums")->get()->unique("city");

        return view('/welcome', ['stadiums' => $stadiums]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stadiums = Stadium::orderBy("name")->get();
        return view('stadiums/show', ['stadiums' => $stadiums], ["city" => "All"]);
    }

    public function show($city)
    {
        $stadiums = DB::table("stadiums")->get();

        if (Stadium::where('city', "=", $city)->exists()) {
        } else $city = "All";


        return view('stadiums.show', ['stadiums' => $stadiums], ["city" => $city]);
    }





    public function viewAll()
    {
        $stadiums = Stadium::orderBy("name")->get();
        return view('stadiums/viewAll', ['stadiums' => $stadiums]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stadiums.create');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', "min:4", 'max:60'],
                'address' => ['required', 'string', "min:4", 'max:60'],
                'city' => ['required', 'string', "min:4", 'max:30'],
            ]


        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $stadium = new Stadium();
        $stadium->name = ucfirst(strtolower($request->name));
        $stadium->address = ucfirst(strtolower($request->address));
        $stadium->city = ucfirst(strtolower($request->city));
        $stadium->save();
        return redirect()->route('stadiums.viewAll')->with("msg", "stadium: \"$stadium->name\" was created successfully");
    }

    public function edit(Stadium $stadium)
    {
        return view("stadiums/edit", ["stadium" => $stadium]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stadium  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stadium $stadium)
    {
        $stadium->name = ucfirst(strtolower($request->name));
        $stadium->address = ucfirst(strtolower($request->address));
        $stadium->city = ucfirst(strtolower($request->city));
        $stadium->save();

        return redirect()->route('stadiums.viewAll')->with("msg", "stadium: \"$stadium->name\" was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */


    public function destroy($id)
    {
        $stadium = Stadium::findOrFail($id);
        $stadium->delete();
        return redirect()->route('stadiums.viewAll')->with("msg", "stadium: \"$stadium->name\" was removed successfully");
    }
}
