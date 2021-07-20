<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\RoleRepository;

class UserController extends Controller
{
    function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.all', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $rolesHTMLValues = $this->roleRepo->getRolesForHTMLSelect();

        return view('users.edit', [
            'user' => $user,
            'permissions' => $user->getPermissionsLabels(),
            'roles' => $rolesHTMLValues,
            'userRole' => $user->getRoleName()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
