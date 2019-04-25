<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request){

        $this->validate($request, [
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:8'
        ]);

        $admin_email=$request->admin_email;
        $admin_password=md5($request->admin_password);

        $result=DB::table('admins')
            ->where('admin_email',$admin_email)
            ->where('admin_password',$admin_password)
            ->first();

        if ($result) {
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_id', $result->id);
            return Redirect::to('dashboard/dashboard')->with('message','Bienvenue sur votre espace administration');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/backend')->with('message','Vous vous etez deconnectez');
    }

    public function backend(){
        return view('backend');
    }

    public function dashboard(){
        $this->AdminAuthCheck();
        $locations = DB::table('chantiers')->get();
        $chantiers = DB::table('chantiers')
            ->join('details', 'chantiers.chantier_code', '=', 'details.id_chantier')
            ->join('chiefs', 'chantiers.chantier_chief', '=', 'chiefs.id')
            ->select('chantiers.*','details.etat_general','chiefs.chief_name')
            ->get();
        return view('backend.dash',compact('locations'))->with('chantiers',$chantiers);
    }

    public function AdminAuthCheck(){
        $admin_id=Session::get('admin_id');
        if ($admin_id) {
            return;
        }else {
            return Redirect::to('/backend')->send();
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function gmaps()
    {
        $locations = DB::table('chantiers')->get();
        return view('gmap')->with('locations',$locations);
    }
}
