<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Input;
 
class MainController extends Controller
   {
      //
      function index(){
         return view('login');
      }

      function checklogin(Request $request){
         $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|alphaNum|min:3'
         ]);

         $user_data=array(
            'email' => $request->get('login-email'),
            'password' => $request->get('login-password')
         );

         if(Auth::attempt($user_data)){
            return redirect('main/successlogin');
         }else{
            return back()->with('error', 'Wrong Login Details');
         }

      }

      function successlogin(){
         return view('halamanUtama');
      }

      function logout(){
         Auth::logout();
         return redirect('main');
      }
   }