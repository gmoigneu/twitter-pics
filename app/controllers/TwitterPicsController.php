<?php

class TwitterPicsController extends BaseController {

    /**
     * Display a listi of tweets
     *
     * @return Response
     */
    public function index()
    {
        return View::make('twitterpics/index', array(
               'tweets' => Tweet::where('enabled', '=', 1)->orderBy('id', 'desc')->get()
            )
        );
    }

}