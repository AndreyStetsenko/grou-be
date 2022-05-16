<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Вывод списка пользователей
     */
    public function listUser(Request $request) {
        // $tasks = Tasks::find($id);
        // $users = $tasks->users;

        $users = User::orderBy('created_at', 'asc')->get();

        return view('profile.user-list', [
            'users' => $users
        ]);
    }

    /**
     * Просмотр профиля пользователя
     */
    public function viewUser(Request $request, $id){
        $users = User::findOrFail($id);

        return view('profile.user-view')->with('users', $users);
    }

    /**
     * Страница редактирования пользователя
     */
    public function editUser(Request $request, $id){
        $users = User::findOrFail($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $users->roles->pluck('name','name')->all();

        return view('profile.user-edit', compact('roles', 'userRole'))->with('users', $users);
    }

    /**
     * Обновление данных пользователя
     */
    public function update(Request $request, $id)
    {
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $users = User::find($id);
        $users->name = $request->name;
        $users->login = $request->login;
        $users->email = $request->email;
        $users->assignRole($request->role);
        $users->update();

        return response()->json(['code'=>200, 'message'=>'Данные успешно обновлены'], 200);

    }

    public function updateUserAvatar(Request $request, $id)
    {
        $users = User::find($id);

        if ($request->avatar) {
            $avatar = $request->avatar;
            // $ava = file($avatar);
            $filename = time();
            Image::make($avatar)->resize(300, 300)->save( public_path('/images/profile/user-uploads/' . $filename) );

            $avaMessage = 'Изображение профиля обновлено';
            $avaSuccess = 'success';

            $users->avatar = $filename;
            $users->update();
        } else {
            $filename = '';
            $avaMessage = 'Изображение профиля пустое';
            $avaSuccess = 'error';
        }

        return redirect()->route('edit-profile')->with($avaSuccess, $avaMessage);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);

        return view('admin.users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Отобразить страницу создания пользователя
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $roles = Role::pluck('name','name')->all();

        return view('profile.user-create', compact('roles'));
    }

    /**
     * Функция создания пользователя
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'login' => $request->input('login'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'avatar' => '',
        ]);

        $user->assignRole($request->input('roles'));

        return response()->redirectToRoute('user-list')->with('success','Пользователь @' . $request->input('login') . ' создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user-list')->with('success','User deleted successfully');
    }
}