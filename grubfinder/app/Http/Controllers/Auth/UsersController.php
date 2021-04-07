<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('auth.register');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {

//        get the data from request
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);


//      attempt login
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('backend.dashboard');
    }

    public function logout()
    {
        //logout user
        auth()->logout();
        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $userRequest
     * @param User $user
     * @return string
     */
    public function store(UserRequest $userRequest, User $user)
    {
        // grab all popst data after validation
        $data = $userRequest->all();
        // mutate the password to hashed password
        $data['password'] = Hash::make($userRequest->password);
        // create a new user
        $user->create($data);
        // attempt login with post data
        auth()->attempt($userRequest->only('email', 'password'));
        // send the new user to dashboard
        return redirect()->route('backend.dashboard');
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
        //
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
        //
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
}
