<?php

class DashboardController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |   Route::get('/', 'HomeController@showWelcome');
    |
    */

    /**
     * Display a listing of statistics
     *
     * @return Response
     */
    public function index()
    {
        return View::make('dashboard/index', array(
            )
        );
    }

}