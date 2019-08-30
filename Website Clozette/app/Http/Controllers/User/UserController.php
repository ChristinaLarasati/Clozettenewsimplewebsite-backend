<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function profile(Request $request) {        
        $user = JWTAuth::toUser($request->token);
        $response = array(
            'status' => 'error',
            'response_code' => 201,
            'message' => 'Not a valid user'
        );
        if ($user) {
            $response = array(
                'status' => 'success',
                'response_code' => 200,
                'message' => 'Get user profile',
                'data' => array(
                    'name' => $user->name,
                    'email' => $user->email,
                    'photo' => $user->photo,
                )
            );
        }
        return response()->json($response);
    }
    public function updateProfile(Request $request){
        $user = auth('api')->user();
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users,email,'.$user->id,
            'password' => 'sometimes|required|min:6'
        ]);

        $currentPhoto = $user->photo;
        
        if($request->photo != $currentPhoto){
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('img/profile/').$name);
            
            $request->merge(['photo' => $name]);
            $userPhoto = public_path('img/profile/').$currentPhoto;
            if(file_exists($userPhoto)){
                @unlink($userPhoto);
            }
        }
        if(!empty($request->password)){
            $request->merge(['password' => Hash::make($request['password'])]);
        }
        $user->update($request->all());
        return['message' => "Success"];
    }
    public function PrfileXe(){
        return auth('api')->user();
    }

}
