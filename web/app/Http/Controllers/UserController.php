<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        return view('home');
    }

    public function getRegister() {
        return view('register');
    }

    public function postRegister(Request $request) {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $name = $request->name;
        $password = bcrypt($request->password);

        $user = new User();
        $user->name = $name;
        $user->password = $password;
        $user->email = $email;
        $user->save();

        // return redirect('login');
        return response()->json([
            'message' => 'Dang ky thanh cong'
        ]);

    }

    public function getLogin() {
        return view('login');
    }

    public function postLogin(Request $request) {
        $email = $request->email;
        $password = $request->password;
        if( Auth::attempt(['email' => $email, 'password' =>$password])) {
			return response()->json([
                'message' => 'Dang nhap thanh cong',
                'status' => 200
            ]);
		} else {
			return response()->json([
                'message' => 'Dang nhap that bai',
                'status' => 201
            ]);
		}
    }
}
