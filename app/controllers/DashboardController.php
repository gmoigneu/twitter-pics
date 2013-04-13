<?php

class DashboardController extends BaseController {

    /**
     * Display a list of tweets
     *
     * @return Response
     */
    public function index()
    {
        return View::make('dashboard/index', array(
                'tweets' => Tweet::orderBy('id', 'desc')->paginate(9)
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
            return Redirect::route('login', array('error' => 'Sorry, bad credentials'));
        }
    }

    public function moderate($id)
    {
        $tweet = Tweet::find($id);
        $tweet->enabled = 0;
        $tweet->save();
        return Redirect::route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('dashboard');
    }

}