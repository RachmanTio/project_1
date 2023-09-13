<?php

namespace App\Http\Controllers\API;

use session;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class RegisterController extends BaseController
{
    public function register(Request $request)

    {

        $validator = Validator::make($request->all(), [

            'username' => 'required',

            'email' => 'required|email',

            'password' => 'required',

            'tanggallahir' => 'required',

            'jeniskelamin' => 'required',

            'alamat' => 'required',


        ]);

   

        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());       

        }

   

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        $input['email'] = ($input['email']);

        $input['username'] = ($input['username']);

        $input['tanggallahir'] = ($input['tanggallahir']);

        $input['jeniskelamin'] = ($input['jeniskelamin']);

        $input['alamat'] = ($input['alamat']);

        $user = User::create($input);

        $success['token'] =  $user->createToken('MyApp')->accessToken;

        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User register successfully.');

    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 

            $user = Auth::user(); 

            $success['token'] =  $user->createToken('MyApp')-> accessToken; 

            $success['name'] =  $user->name;

   

            return $this->sendResponse($success, 'User login successfully.');

        } 

        else{ 

            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);

        } 
    }

    public function password_action(Request $request)
    {
        // return $this->sendResponse($request->all(), 'User login successfully.');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // $user = User::find(Auth::id());
        $user = User::where('email', $request->email)->firstOrFail();
        
        // return $this->sendResponse($user, 'User login successfully.');
        $user->password = Hash::make($request->password);
        $user->save();
        // $request->session()->regenerate();
        // return back()->with('success', 'Password changed!');
        return $this->sendResponse($user, 'User login successfully.');
    }
    
    public function addgambar(Request $request)
    {      
        $user = auth()->user()->id;
        return $this->sendResponse($users, 'Succes');
        // dd($user); 
        $request->validate([
            'gambar' => 'required',
            'gambar.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
            
        ]);
        if ($request->hasfile('gambar')) {            
            $gambar = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('gambar')->getClientOriginalName());
            $request->file('gambar')->move(public_path('gambar'), $gambar);
            Uploads::where('id', $user)->update([                        
                'gambar' =>$gambar
            ]);
            //  Uploads::create(
            //         [                        
            //             'gambar' =>$gambar
            //         ]
            //     );
            return $this->sendResponse($users, 'Succes');
        }else{
            return $this->sendResponse($users, 'gagal');
        }
    }

}
