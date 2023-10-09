<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\URL;
use App\Http\Controllers\API\Carbon;
use session;
use App\Models\password_resets;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Mockery\Expectation;

class RegisterController extends BaseController
{
    public function register(Request $request)

    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'jeniskelamin' => 'required',

        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['email'] = ($input['email']);
        $input['username'] = ($input['username']);
        $input['jeniskelamin'] = ($input['jeniskelamin']);

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
        
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->firstOrFail();
        $user->password = Hash::make($request->password);
        $user->save();
        return $this->sendResponse($user, 'User login successfully.');
    }

     public function user_profile(Request $request)
    {      
        $user = auth()->user()->id;
        $request->validate([
            'gambar' => 'required',
            'gambar.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
            
        ]);
        if ($request->hasfile('gambar')) {            
            $gambar = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('gambar')->getClientOriginalName());
            $request->file('gambar')->move(public_path('gambar'), $gambar);
            User::where('id', $user)->update([                        
                'username' => $request->username,
                'email' => $request->email,
                'jeniskelamin' => $request->jeniskelamin,
                'gambar' =>  $gambar,
                'alamat' => $request->alamat,
                'tanggallahir' => $request->tanggallahir,
            ]);
            
            return $this->sendResponse('tes', 'Succes');
        }else{
            return $this->sendResponse('tes', 'gagal');
        }
    }



}
