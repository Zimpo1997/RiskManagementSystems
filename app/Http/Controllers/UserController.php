<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDOException;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:users-list|create-users|edit-users|delete-users', ['only' => ['index', 'show']]);
        // $this->middleware('role:create-users', ['only' => ['create', 'store']]);
        // $this->middleware('role:edit-users', ['only' => ['edit', 'update']]);
        // $this->middleware('role:delete-users', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles', 'programs', 'teamrisks')
            ->where('status', 1)
            ->get();
        $users = $users->map(function ($item, $key) {
            $item['created_at_th'] = $this->date_th($item->created_at, 3);
            $item['updated_at_th'] = $this->date_th($item->updated_at, 3);
            return $item;
        });
        return view('Users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $programs = Program::all();
        return view('Users.create', [
            'roles' => $roles,
            'programs' => $programs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required',
            'password' => 'required|min:3',
            'cfmpassword' => 'required|min:3',
            'status' => 'required',
        ]);

        if ($request->cfmpassword != $request->password) {
            return back()
                ->with('error', 'Password และ Confirm Password ไม่ตรงกัน')
                ->withInput();
        }

        DB::beginTransaction();
        try {
            $user = new User();
            $user->fullname = $request->fullname;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->save();
            $user->roles()->attach($request->status);
            $user->programs()->attach($request->userprogram);
            DB::commit();
            return redirect('users')->with('success', 'บันทึกข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            DB::rollBack();
            return back()->with('error', 'ไม่สามารถบันทึกข้อมูลได้');
        }
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
        $roles = Role::all();
        $programs = Program::all();
        $user = User::find($id);
        $myroles = $user->roles()->get();
        $myprograms = $user->programs()->get();
        // return $myrole[0];
        return view('Users.edit', [
            'user' => $user,
            'roles' => $roles,
            'programs' => $programs,
            'myroles' => $myroles,
            'myprograms' => $myprograms,
        ]);
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
        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required',
            'status' => 'required',
        ]);

        if ($request->cfmpassword != $request->password) {
            return back()
                ->with('error', 'Password และ Confirm Password ไม่ตรงกัน')
                ->withInput();
        }

        try {
            $user = User::find($id);
            $user->fullname = $request->fullname;
            $user->username = $request->username;
            if ($request->password != '') {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            $user->roles()->sync($request->status);
            $user->programs()->sync($request->userprogram);

            return redirect('users')->with('success', 'แก้ไขข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            return back()->with('error', 'ไม่สามารถแก้ไขข้อมูลได้');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id)->delete();
            return back()->with('success', 'ลบข้อมูลสำเร็จ');
        } catch (PDOException $ex) {
            return back()->with('error', 'ไม่สามารถลบข้อมูลได้');
        }
    }

    public function changeActive(Request $request)
    {
        try {
            $user = User::find($request->user_id);
            $user->active = $request->status;
            $user->save();
            return response()->json([
                'success' => 'Status change successfully.',
            ]);
        } catch (PDOException $ex) {
            return back()->with('error', 'ไม่สามารถแก้ไขข้อมูลได้');
        }
    }
}
