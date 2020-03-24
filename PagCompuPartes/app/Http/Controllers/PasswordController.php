<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use App\\Http\\Controllers\\Has

class PasswordController extends Controller
{  
    public function edit($id)
    {

    }

  
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');
        
        // $email = $request->email;
        // $user = User::findOrFail($email);

        // $user->password = $request->password;
        

        // $user->save();

        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();
    }

   
}
