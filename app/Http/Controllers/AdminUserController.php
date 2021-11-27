<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
// use Illuminate\Http\Requests\UsersRequest;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\User;
use App\Role;
use App\Photo;
use File;
use Illuminate\Support\Facades\Session;


class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // \FB::log('Ingreso a index');
        $users = User::all();
        // $users1 = dd($users);
        // \FB::log('Ingreso a index y users1 es : '. $users1);
        // \FB::log('Ingreso a index');
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \FB::log('Ingreso a create');

        // Obtengo los roles cargados en la BD (solo el titulo y el ID)
        // $roles = Role::lists('title','id');  // Version anterior laravel
        $roles = Role::pluck('name','id')->all();  // Laravel posterior a 5.3
        \FB::log('Ingreso a create 1');
        // Retorno la vista junto los los roles
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(UsersRequest $request)
    public function store(UsersRequest $request)
    {
        // **** 1. Metodo 1 ******
        // User::created($request->all());

        // return redirect('/admin/users');

        // ****2. Metodo 2 ******
        // Obtengo los datos
        // $name = $request->name;
        // $email = $request->email;
        // $password = $request->password;
        // $role_id = $request->role_id;
        // $is_active = $request->is_active;
 
        // echo "<br> name es <br>  " . $name;

        // DB::insert('insert into users (role_id,is_active,name,email,password) values (?,?,?,?,?)', [$role_id,$is_active,$name, $email,$password]);
        // return redirect('/admin/users');

        // **** 3. Usuario con foto ******
        \FB::log('Ingreso a store');
        if(trim($request->password == '')){
            // Si se envia vacio el pass, lo quito del input
            $input = $request->except('password');
            \FB::log('Ingreso a store 1');
        }else{
            $input = $request->all();
            \FB::log('Ingreso a store 2');
            $input['password'] = bcrypt($request->password);
        }
        \FB::log('Ingreso a store 3');
        if($file = $request->file('photo_id')){
            // return "photo exists";

            // Asigno al nombre como el tiempo + el nombre de la foto (que viene del cliente)
            $name = time() . $file->getClientOriginalName();

            // Muevo la imagen a la carpeta
            $file->move('images', $name);

            // Creo un 'model' : photo
            $photo = Photo::create(['file'=>$name]);

            // Asigo el ID a la foto
            $input['photo_id'] = $photo->id;

            \FB::log('Ingreso a store 4');
        }

        // Encripto la contraseña
        $input['password'] = bcrypt($request->password);
        // \FB::log('Ingreso a store 5, $input es : ' . dd($input) );
        // Creo un usuario
        User::create($input);
        \FB::log('Ingreso a store 6');
        return redirect('/admin/users');

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
        return view('admin.users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Busco el usuario en la BD, dado su ID
        $user = User::findOrFail($id);

        // Obtengo los roles
        $roles = Role::pluck('name','id')->all();

        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersEditRequest $request, $id)
    {
        //
        // return view('admin.users.edit');
        // Busco el usuario con el ID correspondiente
        $user = User::findOrFail($id);

        if(trim($request->password == '')){
            // Si se envia vacio el pass, lo quito del input
            $input = $request->except('password');
        }else{
            $input = $request->all();

            $input['password'] = bcrypt($request->password);
        }

        // Obtengo los datos del request
        $input = $request->all();

        // Pregunto si existe el archivo
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();

            $file->move('images',$name);

            // Creo una foto con el nombre obtenido anteriormente
            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect('/admin/users');
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
        \FB::log('Ingreso a destroy ');
        $user = User::findOrFail($id);

        \FB::log('Ingreso a destroy y user es : ' . $user);
        \FB::log('Ingreso a destroy y user photo es : ' . $user->photo);

        // Elimino la imagen - Metodo 1
        unlink(public_path() . $user->photo->file);

        // Elimino el usuario
        $user->delete();

        // Mensaje de exito
        Session::flash('delete_user','The user has been deleted');

        // Redirecciono a principal
        return redirect('/admin/users');
    }
}
