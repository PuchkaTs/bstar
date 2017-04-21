<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {   
        $regular = Role::where('name', 'regular')->first();

        if($regular){

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => ($data['password']),
            'birth' => ($data['birth']),
            'phone' => ($data['phone']),

        ]);

        $regular->users()->save($user);

        return $user;

        }else{
            $regular = Role::create([
                'name' => 'regular'
            ]);

            $user = new User([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => ($data['password']),
                'birth' => ($data['birth']),
                'phone' => ($data['phone']),
            ]);

            $regular->users()->save($user);

            return $user;
        }

    }
}
