<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class TwitterScan extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'twitter:scan';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Calls twitter API to get matching tweets.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$h = Config::get('app.hashtag');
		$this->info('Scanning Twitter for hastag #' . $h);

		// Register with Twitter
		Codebird::setConsumerKey(Config::get('app.consumer_key'), Config::get('app.consumer_secret'));
		$cb = Codebird::getInstance();
		$cb->setToken(Config::get('app.token'), Config::get('app.token_secret'));

		
		$params = array(
			'q' =>'%23'.$h,
			'result_type' => 'recent',
			'count' => 100,
			'include_entities' => true
		);

		// Get max id_str to refine query
		$lastTweet = Tweet::orderBy('id_str', 'desc')->first();
		if($lastTweet) {
			$params['since_id'] = ($lastTweet->id_str)+1;
		}
		
		// Launch query
		$data = (array) $cb->search_tweets($params);

		// Loop over statuses
		foreach($data['statuses'] as $status) {

			$tweet = new Tweet();

			$tweet->id_str = $status->id_str;
			$tweet->text = $status->text;

			
			$created_at = new DateTime($status->created_at." UTC");
			// Should be dynamic
			$created_at->setTimezone(new DateTimeZone('Europe/Paris'));
			$tweet->posted_on = date_format($created_at, 'Y-m-d H:i:s'); 

                        $tweet->user_id = $status->user->id_str;
                        $tweet->user_screen_name = $status->user->screen_name;
                        $tweet->user_name = $status->user->name;
                        $tweet->user_profile_image = $status->user->profile_image_url;
                        if(property_exists($status->entities, 'media')) {
                        	foreach ($status->entities->media as $media) {
                        		if($media->type == 'photo') {
                        			$tweet->media_url = $media->media_url;
                        			$tweet->media_url_https = $media->media_url_https;
                        			$tweet->url = $media->url;
                        			$tweet->display_url = $media->display_url;
                        			$tweet->expanded_url = $media->expanded_url;
                        			$tweet->size_large_w = $media->sizes->large->w;
                        			$tweet->size_large_h = $media->sizes->large->h;
                        			$tweet->size_large_resize = $media->sizes->large->resize;
                        			$tweet->size_medium_w = $media->sizes->large->w;
                        			$tweet->size_medium_h = $media->sizes->large->h;
                        			$tweet->size_medium_resize = $media->sizes->large->resize;
                        			$tweet->size_small_w = $media->sizes->large->w;
                        			$tweet->size_small_h = $media->sizes->large->h;
                        			$tweet->size_small_resize = $media->sizes->large->resize;
                        			$tweet->size_thumb_w = $media->sizes->large->w;
                        			$tweet->size_thumb_h = $media->sizes->large->h;
                        			$tweet->size_thumb_resize = $media->sizes->large->resize;
                        			break;
                        		}
                        	}
                        }
			$tweet->save();
		}

	}
	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
		);
	}

}