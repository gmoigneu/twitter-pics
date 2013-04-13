<?php

class Tweet extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'tweets';

  protected $fillable = array('id_str',
                                                        'posted_on',
                                                        'text',
                                                        'user_id',
                                                        'user_screen_name',
                                                        'user_name',
                                                        'user_profile_image',
                                                        'media_url', 
                                                        'media_url_https', 
                                                        'url', 
                                                        'display_url', 
                                                        'expanded_url', 
                                                        'size_large_w',
                                                        'size_large_h',
                                                        'size_large_resize',
                                                        'size_medium_w',
                                                        'size_medium_h',
                                                        'size_medium_resize',
                                                        'size_small_w',
                                                        'size_small_h',
                                                        'size_small_resize',
                                                        'size_thumb_w',
                                                        'size_thumb_h',
                                                        'size_thumb_resize'
                                            );



}