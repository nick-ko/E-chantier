<?php

namespace App\Http\Controllers;

use App\Chief;
use App\Mail\ChiefMail;
use App\Notifications\ChiefAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ChiefController extends Controller
{
    public function index(){
        return view('login');
    }
    public function add(){
        $this->AdminAuthCheck();
        return view('backend.addchief');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(Request $request){

        $this->validate($request, [
            'chief_email' => 'required|email',
            'chief_name' => 'required'
        ]);

        $chief_name = $request['chief_name'];
        $chief_email = $request['chief_email'];


        $chief=new Chief();
        $chief->chief_name=$chief_name;
        $chief->chief_email=$chief_email;

        $image = $request->file('chief_image');

        if ($image)
        {
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $chief_name . '.' . $ext;
            $upload_path = 'images/profile/';
            $chief_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $chief->chief_image=$chief_image;
                $mailable=new ChiefMail($request['chief_name']);
                Mail::to($request['chief_email'])->send($mailable);
                $chief->save();
            }
        }
        return redirect()->route('all.chief')->with(['message' => 'Chef chantier ajouté avec succes']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request){

        $this->validate($request, [
            'chief_email' => 'required|email',
            'chief_password' => 'required'
        ]);

        $chief_email=$request->chief_email;
        $chief_password=$request->chief_password;

        $result=DB::table('chiefs')
            ->where('chief_email',$chief_email)
            ->where('chief_password',$chief_password)
            ->first();

        if ($result) {
            Session::put('chief_name', $result->chief_name);
            Session::put('chief_id', $result->id);
            Session::put('chief_image', $result->chief_image);
            return Redirect::to('/home')->with('message','Bienvenue sur votre dashboard');
        }
    }

    public function home(){
        $this->ChiefAuthCheck();
        $chantiers=DB::table('chantiers')
            ->where('chantier_chief',session('chief_id'))
            ->get();
        return view('dashboard.home')->with('chantiers',$chantiers);
    }

    public function list(){
        $this->AdminAuthCheck();
        $chiefs=Chief::all();
        return view('backend.listchief')->with('chiefs',$chiefs);
    }

    public function delete($id){
        $this->AdminAuthCheck();
        DB::table('chiefs')
            ->where('id',$id)
            ->delete();
        return redirect()->route('all.chief')->with(['message' => 'Chef Chantier supprimé avec succes']);
    }

    public function detail($code){
        $this->ChiefAuthCheck();
        $chantier=DB::table('chantiers')
            ->where('chantier_code',$code)
            ->first();

        $detail=DB::table('details')
            ->where('id_chantier',$code)
            ->first();

        return view('dashboard.detailchantier')->with('chantier',$chantier)
            ->with('detail',$detail);
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('/')->with('message','Vous vous etez deconnectez');
    }

    public function profile(){
        $this->ChiefAuthCheck();
        $chief=DB::table('chiefs')
            ->where('id',session('chief_id'))
            ->first();
        return view('dashboard.chiefprofil')->with('chief',$chief);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $this->validate($request, [
            'chief_email' => 'required|email',
            'chief_name' => 'required',
            'chief_password' => 'required'
        ]);

        $data=array();
        $data['chief_name'] = $request['chief_name'];
        $data['chief_email'] = $request['chief_email'];


        $image = $request->file('chief_image');

        if ($image) {
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $data['chief_name'] . '.' . $ext;
            $upload_path = 'images/profile/';
            $chief_image = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['chief_password']=$chief_image;
                $data['chief_password'] = $request['chief_password'];
                DB::table('chiefs')
                    ->where('id', session('chief_id'))
                    ->update($data);

                return view('dashboard.chiefprofil')->with(['message' => 'Informations modifier avec succes']);
            }
        }
    }
    public function AdminAuthCheck(){
        $admin_id=Session::get('admin_id');
        if ($admin_id) {
            return;
        }else {
            return Redirect::to('/backend')->send();
        }
    }

    public function ChiefAuthCheck(){
        $chief_id=Session::get('chief_id');
        if ($chief_id) {
            return;
        }else {
            return Redirect::to('/')->send();
        }
    }

}
