<?php

namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use App\Role;
use App\User;
use App\Aztan;
use App\SocialAccount;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class UsersController extends Controller {

    /**
     * Display a listing of the resource.
     * GET /users
     *
     * @return Response
     */
    public function ncst()
    {
        return view('admin.superAdmin');
    }

    public function ncst_store()
    {
        if ((Request::get('password') == '*newmoon89') and (! User::whereName('Purevdorj')->count()))
        {
            $role = Role::create([
                'name' => 'super_admin'
            ]);


            $user =  new User([
                'email'    => 'ncst.puje@gmail.com',
                'name'     => 'Purevdorj',
                'password' => '*newmoon89*'
            ]);
            $role->users()->save($user);

            return Redirect::to('/admin');
        } else
        {
            return Redirect::to('/');
        }
    }

    public function aztan()
    {   
        $accounts = SocialAccount::get();

        if($accounts->count() >=1){
            $account = $accounts->random();
        } else{
            $account = null;
        }
        
        Aztan::create([
            'social_id' => $account->user_id
            ]);

        return Redirect::to('/');
    }

    public function aztanDelete()
    {
        Aztan::latest()->delete();
        return Redirect::to('/');
    }

    public function registerBaby(){

        $article = Article::where('url', 'registration-form')->first();


        return view('auth.register')->with(compact('article'));
    }

    public function registerUser(){

        $article = Article::where('url', 'registration-form')->first();

        return view('auth.register2')->with(compact('article'));
    }    

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * GET /users/create
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /users
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * GET /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /users/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /users/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}