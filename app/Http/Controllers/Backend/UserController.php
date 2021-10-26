<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User as UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        // $this->middleware('authorized.user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);

        return view('users.index', compact('users'))
            ->with([
                'page' => 'Usuarios'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')
            ->with([
                'page' => 'Usuarios'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user =  new User();

        $user->name  = $request->input('name');
        $user->email = $request->input('email');

        $user->password = bcrypt($request->input('password'));

        if($request->hasFile('avatar')){
            $path = Storage::disk('public')->put('avatars', $request->file('avatar'));

            $user->avatar = asset($path);
        }

        $user->save();

        return redirect()->route('users.index')
            ->with([
                'alert' => 'success',
                'message' => 'Usuario registrado',
                'page' => 'Usuarios'
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'))
            ->with([
                'page' => 'Usuarios'
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'))
            ->with([
                'page' => 'Usuarios'
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if($request->input('password')){
            $user->password = bcrypt($request->input('password'));
        }

        if($request->hasFile('avatar')){
            $path = Storage::disk('public')->put('avatars', $request->file('avatar'));

            $user->avatar = asset($path);
        }

        $user->update();

        if(Auth::user()->role == 'admin'){
            return redirect()->route('users.index')
                ->with([
                    'alert' => 'success',
                    'message' => 'Usuario modificado exitosamente',
                    'page' => 'Usuarios'
                ]);
        }else{
            return redirect()->route('users.show', compact('user'))
                ->with([
                    'alert' => 'success',
                    'message' => 'Usuario modificado exitosamente',
                    'page' => 'Usuarios'
                ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with([
                'alert' => 'warning',
                'message' => 'El usuario '. $user->name .' fue eliminado',
                'page' => 'Usuarios'
            ]);
    }

    public function search(Request $request){
        $search = $request->input('search');

        $users = User::where('name', 'LIKE', '%'.$search.'%')
                    ->orWhere('email', 'LIKE', '%'.$search.'%')
                    ->orderBy('id', 'desc')
                    ->paginate(5);

        return view('users.search', compact('users'))
            ->with([
                'page' => 'Usuarios'
                ]);
    }
}
