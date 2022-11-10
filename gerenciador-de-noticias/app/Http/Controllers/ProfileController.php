<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    public function edited($id){
        
        $user = User::findOrFail($id);

        return view('profile.edit', ['user' => $user]);

    }


    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        //return back()->withStatus(__('Usuário atualizado com sucesso!'));
        return redirect('/user')->with('msg', 'Usuário atualizado com sucesso!');
    }

    public function up(Request $request)
    {

        $data = $request->all();

        User::findOrFail($request->id)->update($data);

        return redirect('/user')->with('msg', 'Usuário atualizado com sucesso!');
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function destroy($id){
        User::findOrFail($id)->delete();
        return redirect('/index')->with('msg', 'Usuário excluído com sucesso!');
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('profile.show', ['user' => $user]);
    }

    public function index(){
        $search = request('search');

        if($search){
            $users = User::where([
                ['name', 'like', '%'.$search.'%']
            ])->paginate(3);
           
        }else {
            $users = auth()->user();
        }

        return view('users.index', ['users' => $users, 'search' => $search]);
    }


    


}
