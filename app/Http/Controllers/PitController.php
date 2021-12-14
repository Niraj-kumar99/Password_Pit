<?php

namespace App\Http\Controllers;

use App\Models\Pit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use phpDocumentor\Reflection\Types\True_;
use Validator;

class PitController extends Controller
{
    public function index()
    {
        return view('dashboard')->with('pit_arr',Pit::where('user_id',Auth::user()->id)->get());
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'site' => 'required|string|between:5,2000',
            'url' => 'required|string|between:5,300',
            'password' => 'required|string|min:5',
        ]);

        $validator->validated();
        $pit = new Pit();
        $pit->name = $request->input('name');
        $pit->site = $request->input('site');
        $pit->url = $request->input('url');
        $pit->password = Crypt::encryptString($request->password);
        //Crypt::encryptString('password');
        //$pit->password= bcrypt($request->password);
        $pit->user_id = Auth::user()->id;
        $pit->save();


        return redirect('/dashboard');
    }

    public function edit($id)
    {
        $get_row = Pit::find($id);
        return view('editList')->with('pit_arr', $get_row);
    }

    public function update(Request $request, Pit $pit, $id)
    {
        $get_row = Pit::find($id);
        $get_row->name = $request->input('name');
        $get_row->site = $request->input('site');
        $get_row->url = $request->input('url');
        //$get_row->password = $request->input('password');
        $get_row->save();

        return redirect('/dashboard');
    }

    public function destroy(Pit $pit, $id)
    {
        $get_row = Pit::destroy($id);
        return redirect('/dashboard');
    }

    public function showPassword( $id)
    {
        $get_password = Pit::/*select('pits.password')->*/where('id','=', $id)->first()->password;
        //dd($get_password);
        return Crypt::decryptString($get_password);
        //$get_password = Pit::find($password)->where

    }

    public function editPassword($id)
    {
        $get_row = Pit::find($id);
        return view('matchPassword')->with('pit_arr', $get_row);
    }
    public function matchPassword(Request $request , $id , Pit $pit_password)
    {
        $get_password = Pit::where('id','=',$id)->first()->password;
        $decrypt_password = Crypt::decryptString($get_password);
        $old_password = $request->old_password;

        //dd($request->all());
        if ($decrypt_password == $old_password) {
            //echo "Match found";
            $get_row = Pit::find($id);
            return view('changePassword')->with('pit_arr', $get_row);
        }
        else
        {
            echo "Wrong password entered !!!";
        }

    }

    public function update_Password(Request $request , Pit $pit ,$id)
    {
        $get_row = Pit::find($id);
        $get_row->password = $request->input('password');
        //dd($request->all());
        $get_row->password = Crypt::encryptString($request->input('new_password'));
        //  $get_row->password = $request->input('new_password');
        $get_row->save();

        return redirect('/dashboard');
    }
}
