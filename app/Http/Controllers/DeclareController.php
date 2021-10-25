<?php

namespace App\Http\Controllers;

use App\Exceptions\DeclarationNotFoundException;
use App\Models\Declaration;
use App\Services\DeclarationService;
use Illuminate\Http\Request;


class DeclareController extends Controller
{
    private $service;

    public function __construct(DeclarationService $service)
    {
        $this->service = $service;
    }
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
        try {
            $data = $this->service->search($id);
        }
        catch (DeclarationNotFoundException $exception){
            report($exception);
            $message = $exception->getMessage();
            return view('errors.404',compact('message'));
        }
        return view('one-declaration', ['data' => $data]);
    }


    public function updateDeclaration($id){
        $data = Declaration::find($id);
        return view('update-declaration', ['data' => $data]);
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

    public function search(Request $request){
        $search = $request->search;
        $data = Declaration::where('name','LIKE',"%{$search}%")->paginate(10);
        return view('declarations', compact('data'));
    }
}
