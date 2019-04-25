<?php

namespace App\Http\Controllers;


use App\chantier;
use App\Chief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ChantierController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(){
        $this->AdminAuthCheck();
        $chiefs=chief::all();
        return view('backend.addchantier')->with('chiefs',$chiefs);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function save(Request $request){

        $this->validate($request, [
            'chantier_code' => 'required',
            'chantier_name' => 'required',
            'chantier_ville' => 'required',
            'chantier_time' => 'required',
            'chantier_alt' => 'required',
            'chantier_long' => 'required',
            'chantier_chief' => 'required',
            'chantier_debut' => 'required',
            'chantier_budget' => 'required'
        ]);

        $chantier_code = $request['chantier_code'];
        $chantier_name = $request['chantier_name'];
        $chantier_ville = $request['chantier_ville'];
        $chantier_time = $request['chantier_time'];
        $chantier_alt = $request['chantier_alt'];
        $chantier_long = $request['chantier_long'];
        $chantier_chief = $request['chantier_chief'];
        $chantier_debut = $request['chantier_debut'];
        $chantier_budget = $request['chantier_budget'];

        $chantier = new Chantier();
        $chantier->chantier_name=$chantier_name;
        $chantier->chantier_code=$chantier_code;
        $chantier->chantier_ville=$chantier_ville;
        $chantier->chantier_time=$chantier_time;
        $chantier->chantier_alt=$chantier_alt;
        $chantier->chantier_long=$chantier_long;
        $chantier->chantier_chief=$chantier_chief;
        $chantier->chantier_debut=$chantier_debut;
        $chantier->chantier_budget=$chantier_budget;

        $image = $request->file('chantier_image');
        $plan = $request->file('chantier_plan');

        if ($image && $plan)
        {
            $ext = strtolower($image->getClientOriginalExtension());
            $ext2 = strtolower($plan->getClientOriginalExtension());
            $image_full_name = $chantier_code . '.' . $ext;
            $plan_full_name = $chantier_code . '_plan.' . $ext2;
            $upload_path = 'images/';
            $chantier_image = $upload_path . $image_full_name;
            $chantier_plan = $upload_path . $plan_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $success = $plan->move($upload_path, $plan_full_name);
            if ($success) {
                $chantier->chantier_image=$chantier_image;
                $chantier->chantier_plan=$chantier_plan;
                $chantier->save();

                $data = array();
                $data['id_chantier'] = $chantier_code;
                $result=DB::table('details')
                    ->insert($data);
                return redirect()->route('all.chantier')->with(['message' => 'Nouveau chantier ajouté avec succes']);
            }
        }
        $chantier->chantier_image="";
        $chantier->chantier_plan="";
        $chantier->save();
        return redirect()->route('all.chantier')->with(['message' => 'Nouveau chantier ajouté avec succes mais sans image']);
    }
    public function list(){
        $this->AdminAuthCheck();
        $chantiers=DB::table('chantiers')
        ->join('chiefs','chantiers.chantier_chief','=','chiefs.id')
        ->get();
        return view('backend.listchantier')->with('chantiers',$chantiers);
    }

    public function view($id){
        $this->AdminAuthCheck();
        $chantier=DB::table('chantiers')
            ->join('chiefs','chantiers.chantier_chief','=','chiefs.id')
            ->where('chantier_code',$id)
            ->first();

        $detail=DB::table('details')
            ->where('id_chantier',$id)
            ->first();

        return view('backend.viewchantier')->with('chantier',$chantier)
            ->with('detail',$detail);
    }
    public function delete($id){
        $this->AdminAuthCheck();
        DB::table('chantiers')
            ->where('id',$id)
            ->delete();
        DB::table('details')
            ->where('id',$id)
            ->delete();
        return redirect()->route('all.chantier')->with(['message' => ' Chantier supprimé avec succes']);
    }

    public function etat($id){
        $this->ChiefAuthCheck();
        $chantier=DB::table('chantiers')
            ->where('chantier_code',$id)
            ->first();

        $detail=DB::table('details')
            ->where('id_chantier',$id)
            ->first();
       return view('dashboard.etatchantier')->with('chantier',$chantier)->with('detail',$detail);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request){
        $this->validate($request, [
            'etat_fondation' => 'required',
            'etat_soubassement' => 'required',
            'etat_elevation_mur' => 'required',
            'etat_charpente' => 'required',
            'etat_couverture' => 'required'
        ]);

        $data=array();
        $data['etat_fondation'] = $request['etat_fondation'];
        $data['etat_soubassement'] = $request['etat_soubassement'];
        $data['etat_elevation_mur'] = $request['etat_elevation_mur'];
        $data['etat_charpente'] = $request['etat_charpente'];
        $data['etat_couverture'] = $request['etat_couverture'];
        $data['etat_general']=($request['etat_couverture']+$request['etat_charpente']+$request['etat_elevation_mur']+$request['etat_soubassement']+$request['etat_fondation'])/5;
        $chantier_code=$request['chantier_code'];

        DB::table('details')
            ->where('id_chantier',$chantier_code)
            ->update($data);
        return Redirect::to('/etat-chantier/'.$chantier_code)->with(['message' => 'Etat du Chantier mis a jour avec succes']);
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
