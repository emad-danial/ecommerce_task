<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Dashboard;
use App\Http\Requests\Admin\CreateAdmin;
use App\Http\Requests\User\UpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Dashboard
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            $users = User::query()->where('type', 'admin');
            return datatables($users)
                ->addColumn('name', function ($user) {
                    return $this->viewContent('span', [
                        'content' => $user->name
                    ]);
                })
                ->addColumn('email', function ($user) {
                    return $this->viewContent('span', [
                        'content' => $user->email
                    ]);
                })
                ->addColumn('phone', function ($user) {
                    return $this->viewContent('span', [
                        'content' => $user->phone
                    ]);
                })
                ->addColumn('is_active', function ($user) {
                    return $this->viewContent('span', [
                        'content'      => $user->is_active ? __('admin.is_active') : __('admin.dis_active'),
                        'class'        => $user->is_active ? 'btn btn-primary activation' : 'btn btn-danger activation',
                        'free_content' => 'data-id="' . $user->id . '"'
                    ]);
                })
                ->addColumn('update', function ($user) {
                    return $this->viewContent('span', [
                        'content'      => __('admin.update') . '<i class="fa fa-user-edit"></i>',
                        'class'        => 'btn btn-primary editUser',
                        'free_content' => 'data-id="' . $user->id . '"'
                    ]);
                })
                ->addColumn('role', function ($user) {
                    return $this->viewContent('span', [
                        'content'      => $user->role->name,
                    ]);
                })
                ->addColumn('created_at', function ($user) {
                    return $this->viewContent('span', [
                        'content' => $user->created_at
                    ]);
                })
                ->make();
        }
        return view('admin.subviews.admins.index');
    }

    public function createAdmin(CreateAdmin $request)
    {
        User::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'phone'    => $request->get('phone'),
            'type'     => 'admin',
            'password' => Hash::make($request->get('password')),
            'role_id'  => $request->get('role_id')
        ]);
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

    public function activationAdmin(Request $request)
    {
        $user            = User::find($request->get('user_id'));
        $user->is_active = !$user->is_active;
        $user->save();
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

    public function getAdminInfo(Request $request)
    {
        $user = User::where('id', $request->get('userId'))->select([
            'name',
            'email',
            'phone',
            'role_id',
        ])->first()->toArray();
        return $this->getJsonSuccessResponse("", $user);
    }

    public function updateAdmin(UpdateUser $request)
    {
        $attrsToUpdate = [
            'name'    => $request->get('name'),
            'email'   => $request->get('email'),
            'phone'   => $request->get('phone'),
            'role_id' => $request->get('role_id')
        ];

        if (!is_null($request->get('password'))) {
            $attrsToUpdate['password'] = Hash::make($request->get('password'));
        }

        User::find($request->get('user_id'))->update($attrsToUpdate);
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }
}
