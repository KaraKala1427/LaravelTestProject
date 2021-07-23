<?php

namespace App\Http\Controllers;

use App\Models\Declaration;
use Illuminate\Http\Request;


class DeclareController extends Controller
{
    public function submit(Request $req) {
        $a = $req->validate([
            'name' => 'required|max:200',
            'description' => 'required|max:1000',
            'price' => 'required',
            'img' => 'required'
        ]);

        if($req->hasFile('img')) {
            $image = $req->file('img')->getClientOriginalName();
            $img_path = "/images/cards/$image";
            $req->file('img')->move(public_path('images/cards'), $image);
        }

        $declaration = new Declaration();
        $declaration->name = $req->input('name');
        $declaration->description = $req->input('description');
        $declaration->price = $req->input('price');
        $declaration->img_path = $img_path;

        $declaration->save();

        return redirect()->route('home')->with('success',"Объявление успешно создано - $declaration->id");
    }

    public function allData(){
        $declaration = Declaration::paginate(10);
        $data = $declaration;
        return view('declarations', compact('data'));
    }


    public function showOneDeclaration($id){
        $declaration = new Declaration();
        return view('one-declaration', ['data' => $declaration->find($id)]);
    }


    public function updateDeclaration($id){
        $declaration = new Declaration();
        return view('update-declaration', ['data' => $declaration->find($id)]);
    }



    public function updateDeclarationSubmit($id, Request $req) {
        $a = $req->validate([
            'name' => 'required|max:200',
            'description' => 'required|max:1000',
            'price' => 'required',
            'img' => 'required'
        ]);

        if($req->hasFile('img')) {
            $image = $req->file('img')->getClientOriginalName();
            $img_path = "/images/cards/$image";
            $req->file('img')->move(public_path('images/cards'), $image);
        }

        $declaration = Declaration::find($id);
        $declaration->name = $req->input('name');
        $declaration->description = $req->input('description');
        $declaration->price = $req->input('price');
        $declaration->img_path = $img_path;

        $declaration->save();

        return redirect()->route('declarationDetail', $id)->with('success','Объявление успешно обновлено');
    }


    public function deleteDeclaration($id){
        Declaration::find($id)->delete();
        return redirect()->route('allDeclaration')->with('success','Объявление было удалено');
    }
}
