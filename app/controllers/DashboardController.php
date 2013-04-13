<?php

class DashboardController extends BaseController {

    /**
     * Display a listi of tweets
     *
     * @return Response
     */
    public function index()
    {
        return View::make('dashboard/index', array(
            )
        );
    }

    public function login()
    {
        return View::make('dashboard/login', array(
            )
        );
    }

    public function verify()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(array('email' => $email, 'password' => $password), true))
        {
            return Redirect::route('dashboard');
        } else {
            return Redirect::route('login', array('error'));
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('dashboard');
    }

}