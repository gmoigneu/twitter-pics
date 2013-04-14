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
               'tweets' => Tweet::orderBy('id', 'desc')->get()
            )
        );
    }

}