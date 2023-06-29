<?php

namespace App\Http\Controllers;

use App\Models\test;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(){
        $test = test::all();
        return view('welcome',['test' => $test]);
    }
    public function insert(Request $request){
        $test = new test();
        $test = test::create([
            'name' => $request->name,
            'address' => $request->address,
        ]);
        $test->save();
        return redirect()->route('table');
    }
    public function update(Request $request){
        $id = $request->id;
        test::where('id', $id)->update([
            'name' => $request->name,
            'address' => $request->address,
        ]);
        return redirect()->route('table');
    }
    public function delete($id){
        test::where('id', $id)->delete();
        return redirect()->route('table');
    }
}
