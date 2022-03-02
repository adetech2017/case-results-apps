<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function changePassword()
    {
        return view('users.password-reset');
    }

    /**
     * Change the current password
     * @param Request $request
     * @return Renderable
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $userPassword = $user->password;

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
        ]);

        if (!Hash::check($request->current_password, $userPassword))
        {
            return back()->withErrors(['current_password' => 'password not match']);
        }

        $user = User::find($user->id);
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('message', 'password successfully updated');
    }


    /**
     * personal log record
     */
    public function single_log_history()
    {
        $user = Auth::user();

        $logs = DB::table('logs')
        ->select(
            'logs.log_date',
            'logs.log_type',
            'logs.data'
        )
        ->where('logs.user_id', '=', $user->id)
        //->join('users', 'logs.user_id', '=', 'users.id')
        ->orderBy('logs.id', 'DESC')
        ->get();

        return view('users.single-log', ["logs"=>$logs]);
    }

}
