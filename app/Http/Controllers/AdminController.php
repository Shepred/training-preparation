<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mentor;
use App\Status;
use Auth;
use DB;
use VatsimSSO;
use Session;
use Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', '=', Session::get('user')->id)->first();

        return view('admin.index')->with(compact('user'));
    }

    public function users()
    {

        $userList = User::all();
        $statusList = Status::orderBy('id')->get();
        $mentorList = User::where('mentor', '=', 1)->get();
        
        return view('admin.users')->with(compact('userList','statusList','mentorList'));
    }

    public function updateUsers(Request $request)
    {
        //Validate inputs
        $this->validate($request, [
            'id'            => 'required',
            'status'        => 'required',
            'mentor'        => 'required',
            'assignedmentor' => 'nullable',
        ]);

        //Save updated user information to the database.

        $user = User::findOrFail($request['id']);
        $user->mentor  = $request['mentor'];
        $user->save();

        //Double check the status input with the status table.
        $status = Status::findOrFail($request['status']);
        $assignedmentor = $request['assignedmentor'];

        //Check if record for this user already exists in the status_user (pivt table).
        $statusEntry = DB::table('status_user')->where('user_id', $user->id)->first();
        $mentorEntry = DB::table('mentor_user')->where('user_id', $user->id)->first();

        //If record exists, delete it (due to foreign key constraint).
        if ($statusEntry) {
            DB::table('status_user')->where('user_id', $user->id)->delete();
        }
        if ($mentorEntry) {
            DB::table('mentor_user')->where('user_id', $user->id)->delete();
        }

        //Insert the updated status for the user into the pivot table (status_user, mentor_user).
        $statusInsert = DB::table('status_user')->insert([
            'user_id'   => $user->id,
            'status_id' => $status->id,
        ]);
        //If assignedmentor is not 0, update mentor_user with the new information.
        if (!$assignedmentor == 0) {
            $mentorInsert = DB::table('mentor_user')->insert([
                'user_id'   => $user->id,
                'mentor_id' => $assignedmentor,
            ]);
        }
        //Check if we removed the current selected user from their mentor status, and if we did, remove any students they had assigned to prevent errors.
        if ($user->mentor == 0) {
            DB::table('mentor_user')->where('mentor_id', $user->id)->delete();
        }
        //If insert was successful, reroute admin/users.
        if ($statusInsert) {
            return redirect('/admin/users');
        }
        //If unsuccessful, throw 404.
        return \App::abort(404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
