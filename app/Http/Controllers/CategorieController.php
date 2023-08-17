<?php

namespace App\Http\Controllers;

use App\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        $categories=categorie::all();
        return view('admin.categories.index')->with('categories',$categories);
    }

    public function addcategorie(Request $request){
        $request->validate([
            'nom'=>'required',
            'description'=>'required',
        ]);
        $categories=new categorie();
        $categories->nom=$request->nom;
        $categories->description=$request->description;
        if($categories->save()){
            return redirect('/admin/categorie')->with('success','categorie ajouter avec success');
        }
    }
  public function delete($id){
    $category=categorie::find($id);
    if ($category->delete()) {
        return redirect('/admin/categorie')->with('error','categorie supprimer avec success');
    }else{
        return "error";
    }
  }
  public function update(Request $request){
    $request->validate([
        'nom'=>'required',
        'description'=>'required',
    ]);
    $id=$request->id_categorie;
    $categories=categorie::find($id);
    $categories->nom=$request->nom;
    $categories->description=$request->description;
    if ($categories->update()) {
        return redirect('/admin/categorie')->with('success','categorie modifier avec success');
    }else{
        return "error";
    }

  }
  public function searchcategorie(Request $request){
    if($request->nom && !$request->description){
    $categories=categorie::where('nom','LIKE','%'.$request->nom.'%')->get();
    }
    if(!$request->nom && $request->description){
        $categories=categorie::where('description','LIKE','%'.$request->description.'%')->get();
    }
    if($request->nom && $request->description){
      $categories=categorie::where('nom','LIKE','%'.$request->nom.'%')->where('description','LIKE','%'.$request->description.'%')->get();
    }
    if(!$request->nom && !$request->description){
            $categories=categorie::all();
    }
return view ('admin.categories.index')->with('categories',$categories);
  }
}
