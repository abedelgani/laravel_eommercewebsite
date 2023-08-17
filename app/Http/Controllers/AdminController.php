<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\commande;
use App\Contact;
use App\review;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function profile(){
        return view('admin.profile');
    }
    //updateprofile admin
    public function updateprofile(Request $request){
        Auth::user()->name=$request->name;
        Auth::user()->email=$request->email;
        if ($request->password) {
            Auth::user()->password=Hash::make($request->password);
        }
        Auth::user()->update();
        return redirect('/admin/profile')->with('success','changement fait avec success');
    }
//clients
    public function clients(){
        $clients=User::where('role','user')->get();
        return view('admin.clients.index')->with('clients',$clients);
    }
//bloquer user
    public function bloquerUser($iduser){
        $client=User::find($iduser);
        $client->is_active=false;
        $client->update();
        return redirect('/admin/client')->with('success','client bloquer');
    }
    //activer user
    public function activeruser($iduser){
        $client=User::find($iduser);
        $client->is_active=true;
        $client->update();
        return redirect('/admin/client')->with('success','client activer avec success');
    }
    //return liste commandes
    public function commandes(){
        $commande=commande::all();
        return view('admin.commandes.index')->with('commande',$commande);
    }
    //search client
    public function searchclient(Request $request){
        $clients=User::where('name','LIKE','%'.$request->name.'%')->where('role','user')->get();
        return view('admin.clients.index')->with('clients',$clients);
    }
    public function index(){
        $contacts=contact::all();
        return view('admin.contact.index')->with('contacts',$contacts);
    }
    public function users(){
        $users=User::all();
        $reviews=review::all();
        return view('admin.dashboard')->with('users',$users)->with('reviews',$reviews);
    }
}
