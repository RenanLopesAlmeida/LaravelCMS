<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'users' => User::paginate(6)
        );

        return view('Admin.users.index', $data);
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'email',
            'password',
            'password_confirmation'
        ]);

        $validator = $this->validator($data);

        if($validator->fails()) {
            return $this->redirectWithErrors($validator, 'users.create');
        }

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect()->route('users.index');
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
        $user = User::find($id);

        if($user) {
            return view('admin.users.edit', [
                'user' => $user
            ]);
        }

        return redirect()->route('users.index');
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
        $user = User::find($id);

        if($user) {
            $data = $request->only([
                'name',
                'email',
                'password',
                'password_confirmation'
            ]);

            $validator = $this->validateNameAndEmail($data);

            $user->name = $data['name'];

            if($user->email != $data['email']) {
                $hasEmail = User::where('email', $data['email'])->get();

                if(count($hasEmail) === 0) {
                    $user->email = $data['email'];
                } else {
                    $validator->errors()->add('email', __('validation.unique', [
                        'attribute' => 'email'
                    ]));
                }
            }

            if(!empty($data['password'])) {
                if(strlen($data['password']) >= 4) {
                    if($data['password'] === $data['password_confirmation']) {
                        $user->password = Hash::make($data['password']);
                    } else {
                        $validator->errors()->add('password', __('validation.confirmed', [
                            'attribute' => 'password',
                            'min' => '4'
                        ]));
                    }
                } else {
                    $validator->errors()->add('password', __('validation.min.string', [
                        'attribute' => 'password',
                        'min' => '4'
                    ]));
                }
            }

            if(count($validator->errors()) >0){
                return redirect()->route('users.edit', ['user' => $id])->withErrors($validator);
            }

            $user->save();
        }

        return redirect()->route('users.index');
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

    private function validator(array $data) {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:4' ,'confirmed']
        ]);
    }

    private function validateNameAndEmail(array $data) {
        return Validator::make([
            'name' => $data['name'],
            'email' => $data['email']
        ], [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email' ,'max:100']
        ]);
    }

    private function redirectWithErrors($validator, $routeName) {
        return redirect()->route($routeName)
        ->withErrors($validator)
        ->withInput();
    }
}
