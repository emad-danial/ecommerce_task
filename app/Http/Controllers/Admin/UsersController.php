<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Dashboard;
use App\Http\Requests\User\CreateUser;
use App\Http\Requests\User\UpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Dashboard
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            $users = User::query()->where('type', 'user');
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
                ->addColumn('avatar', function ($user) {
                    return $this->viewContent('img', [
                        'src'    => $user->avatar,
                        'width'  => '50px',
                        'height' => '50px'
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
                ->addColumn('created_at', function ($user) {
                    return $this->viewContent('span', [
                        'content' => $user->created_at
                    ]);
                })
                ->make();
        }
        return view('admin.subviews.users.index');
    }

    public function createUser(CreateUser $request)
    {
        User::create([
            'name'     => $request->get('name'),
            'email'    => $request->get('email'),
            'phone'    => $request->get('phone'),
            'type'     => 'user',
            'password' => Hash::make($request->get('password'))
        ]);
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

    public function activationUser(Request $request)
    {
        $user            = User::find($request->get('user_id'));
        $user->is_active = !$user->is_active;
        $user->save();
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

    public function getUserInfo(Request $request)
    {
        $user = User::where('id', $request->get('userId'))->select([
            'name',
            'email',
            'phone',
        ])->first()->toArray();
        return $this->getJsonSuccessResponse("", $user);
    }

    public function updateUser(UpdateUser $request)
    {
        $attrsToUpdate = [
            'name'  => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ];

        if (!is_null($request->get('password'))) {
            $attrsToUpdate['password'] = Hash::make($request->get('password'));
        }

        User::find($request->get('user_id'))->update($attrsToUpdate);
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

}
