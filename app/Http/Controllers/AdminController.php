<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Show a list of all users
     * from the database
     */
    public function allUsers()
    {
        $roles = Role::get();

        $users = User::whereRoleIs($roles->pluck('name')->toArray())->get();

        return view('users.list-users', ["user" => $users]);
    }

    /**
     * Create new user in the database
     *
     */
    public function newUser()
    {
        $role = Role::where('name', '!=', 'superadministrator')->get();

        return view('users.new', ["role" => $role]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeUser(Request $request)
    {

        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->firstName . ' ' . $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            //'role_id' => $request->role_id,
        ]);
        $user->attachRole($request->role_id);

        event(new Registered($user));

        return back()->with('message', 'User created successfully!.');
    }

    /**
     * Edit single officer record in database
     *
     */
    public function edit($id)
    {

        $role = Role::where('name', '!=', 'superadministrator')->get();
        return view('users.edit', ["role" => $role])
            ->with('user', User::where('id', $id)->first());
    }

    /**
     * Update single officer record in database
     *
     */
    public function update(Request $request, $id)
    {

        if ($request->get('password')) {
            $request->validate([
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|string|email',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::where('id', $id)->update([
                'name' => $request->firstName . ' ' . $request->lastName,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if ($user) {
                DB::update('update role_user set role_id = ? where user_id = ?', [$request->role_id, $request->id]);
            }

            return redirect('admin/show-all-users')->with('message', 'User record has been updated successfully!');
        } else {
            $request->validate([
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|string|email',
            ]);

            $user = User::where('id', $id)->update([
                'name' => $request->firstName . ' ' . $request->lastName,
                'email' => $request->get('email'),
            ]);
            if ($user) {
                DB::update('update role_user set role_id = ? where user_id = ?', [$request->role_id, $request->id]);
            }

            return redirect('admin/show-all-users')->with('message', 'User record has been updated successfully!');
        }
    }

    public function showUser($id)
    {
        $user = User::select('users.*', 'roles.display_name')
        ->where('users.id', $id)
            ->leftJoin('roles', 'roles.id', '=', 'users.role_id')
            ->get();



        $role = Role::all();
        // return view('admin.edit')
        //     ->with('user', User::where('id', $id)->first());
        return view('admin.view', ["user" => $user, "role" => $role]);
    }

    /**
     * Delete single user record in database
     *
     */
    public function delete($id)
    {
        $user = User::where('id', $id);

        $user->delete();

        return redirect('/admin/all-users')->with('message', 'User record has been deleted successfully!');
    }

    /**
     * show all log history
     */
    public function log_history()
    {
        $logs = DB::table('logs')
        ->select(
            'users.name',
            'logs.log_date',
            'logs.log_type',
            'logs.data'
        )
        ->join('users', 'logs.user_id', '=', 'users.id')
        ->orderBy('logs.id', 'DESC')
        ->get();

        return view('back-end.history', ["logs"=>$logs]);
    }

    /**
     * show all mail delivery status
     */
    public function mail_delivery()
    {
        $check = DB::table('mail_logs')
        ->select(
            'test_results.id',
            'test_results.patient_name',
            'mail_logs.email',
            'mail_logs.delivery_status',
            'mail_logs.created_at'
        )
        ->join('test_results', 'mail_logs.patient_id', '=', 'test_results.id')
        ->orderBy('mail_logs.id', 'DESC')
        ->get();

        return view('back-end.mail-logs', ["check"=>$check]);
    }

    /**
     * display all mail logs
     */
    public function all_mail_logs()
    {
        $date = Carbon::now()->subDays(7);

        $logs = DB::table('email_log')
        ->select(DB::raw('*'))
        ->where('created_at', '>=', $date)
        ->orderByDesc('id')
        ->get();

        return view('back-end.all-mail-logs', ["logs"=>$logs]);
    }
}
