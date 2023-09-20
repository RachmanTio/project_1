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

    // public function forgetpassword(Request $request)
    // {
    //     try {
    //         $user = User::where('email', $request->email)->get();
    //         if(count($user) > 0){
    //             $token = Str::random(40);
    //             $domain = URL::to('/');
    //             $url = $domain.'/reset-password?token='.$token;

    //             $data['url'] = $url;
    //             $data['email'] = $request->email;
    //             $data['title'] = "Password Reset";
    //             $data['body'] = "Plase click on below link to reset your password.";

    //             Mail::send('forgetPasswordMail',['data'=>$data],function($massage) use ($data){
    //                 $massage->to($data['email'])->subject($data['title']);
    //             });

    //             $datetime = Carbon::now()->format('Y-m-d H:i:s');
    //             PasswordReset::UpdateOrCreate(
    //                 ['email' => $request->email],
    //                 [
    //                     'email' => $request->email,
    //                     'token' => $token,
    //                     'created_at' => $datetime
    //                 ]
    //             );

    //             return response()->json(['success'=>true,'msg'=>'Plese check your mail reset password.']);
    //         }
    //         else{
    //             return response()->json(['success'=>false,'msg'=>'User not found']);
    //         }

    //     }catch (Expectation $e){
    //         return response()->json(['success'=>false,'msg'=>$e->getMessage()]);
    //     }
    // }

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
    
    // public function addgambar(Request $request)
    // {      
    //     $user = auth()->user()->id;
    //     return $this->sendResponse($users, 'Succes');
    //     // dd($user); 
    //     $request->validate([
    //         'gambar' => 'required',
    //         'gambar.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
            
    //     ]);
    //     if ($request->hasfile('gambar')) {            
    //         $gambar = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('gambar')->getClientOriginalName());
    //         $request->file('gambar')->move(public_path('gambar'), $gambar);
    //         Uploads::where('id', $user)->update([                        
    //             'username' => $request->username,
    //             'email' => $request->email,
    //             'jeniskelamin' => $request->jeniskelamin,
    //             'gambar' => $gambar,
    //             'alamat' => $request->alamat,
    //             'tanggallahir' => $request->tanggallahir,
    //         ]);
    //         //  Uploads::create(
    //         //         [                        
    //         //             'gambar' =>$gambar
    //         //         ]
    //         //     );
    //         return $this->sendResponse($users, 'Succes');
    //     }else{
    //         return $this->sendResponse($users, 'gagal');
    //     }
    // }
     public function user_profile(Request $request)
    {      
        $user = auth()->user()->id;
        // return $this->sendResponse('tes', 'Succes');
        // dd($user); 
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
                'gambar' => $gambar,
                'alamat' => $request->alamat,
                'tanggallahir' => $request->tanggallahir,
            ]);
            //  Uploads::create(
            //         [                        
            //             'gambar' =>$gambar
            //         ]
            //     );
            return $this->sendResponse('tes', 'Succes');
        }else{
            return $this->sendResponse('tes', 'gagal');
        }
    }



}
