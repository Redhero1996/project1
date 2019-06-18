<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $with = ['role'];
        $dataSelect = [
            'id',
            'name',
            'role_id',
        ];
        $users = $this->user->getData($with, [], $dataSelect);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.users.create')->withRoles($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->except(['password_confirmation']);
        $data['password'] = bcrypt($request->password);
        $data['avatar'] = $this->user->handleUploadImage(true, $request->file('avatar'));
        $user = $this->user->create($data);

        Session::flash('success', __('translate.user_store'));

        return redirect()->route('users.show', $user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show')->withUser($user);
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
        $user = $this->user->findById($id);

        return view('admin.users.edit', compact('roles', 'user'));
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
        $user_id = $this->user->findById($id);
        $data = $request->all();
        if (isset($data['change_password']) && $data['change_password'] == 'on') {
            $data['password'] = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $data['password'] = bcrypt($request->password);
        }
        $data['avatar'] = $this->user->handleUploadImage(false, $request->file('avatar'), $user_id);

        unset($data['change_password'], $data['password_confirmation']);

        $this->user->update($id, $data);

        Session::flash('success', __('translate.succ_acount'));

        return redirect()->route('users.show', $user_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->topics()->detach();
        $user->delete();
        Session::flash('success', __('translate.user_deleted'));

        return redirect()->route('users.index');
    }
}
