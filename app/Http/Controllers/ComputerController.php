<?php

namespace App\Http\Controllers;

use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    /*private static function getData(){
        return[
            ['id'=>1,'name'=>'HP','origin'=>'koria'],
            ['id'=>2,'name'=>'Appel','origin'=>'USA'],
            ['id'=>3,'name'=>'DEEL','origin'=>'USA'],
            ['id'=>4,'name'=>'Lenovo','origin'=>'France'],

        ];
    }
    */

    public function index()
    {
        return view('computers.index',[
            'computers'=> Computer::all()
        ]);
    }


    public function create()
    {

        return view('computers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'computer-name'=>'required',
            'computer-origin'=>'required',
            'computer-price'=>['required','integer']
        ]);
        $computer =new Computer();
        $computer->name = strip_tags( $request->input('computer-name'));
        $computer->origin = strip_tags($request->input('computer-origin'));
        $computer->price = strip_tags($request->input('computer-price'));

        $computer->save();
        return redirect()->route('computers.index');

    }


    public function show($computer)
    {
        return view('computers.show',[
            'computer'=>Computer::findorFail($computer)
        ]);
    }
    public function edit($computer)
    {
        return view('computers.edit',[
            'computer'=>Computer::findOrFail($computer)
        ]);
    }

    public function update(Request $request,$computer )
    {
        $request->validate([
            'computer-name'=>'required',
            'computer-origin'=>'required',
            'computer-price'=>['required','integer']
        ]);
        $computer_edit =Computer::findOrFail($computer);
        $computer_edit->name = strip_tags( $request->input('computer-name'));
        $computer_edit->origin = strip_tags($request->input('computer-origin'));
        $computer_edit->price = strip_tags($request->input('computer-price'));

        $computer_edit->save();
        return redirect()->route('computers.show',$computer );
    }
    public function destroy($computer )
    {
        $computer_delete =Computer::findOrFail($computer);
        $computer_delete->delete();
        return redirect()->route('computers.index');
    }
}
