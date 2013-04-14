<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>
    @section('title')
    Twitter Pics
    @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/assets/css/frontend.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.animate.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.easing.1.3.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/assets/css/isotope.css" />
    <script type="text/javascript" src="/assets/js/isotope.min.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="/assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="/assets/ico/favicon.png">
  </head>

  <body>


    <div class="container-fluid">



        <div id="grid">
        <?php foreach ($tweets as $tweet): ?>
          
          @if ($tweet->media_url)
          <div class="item case1 img isotope-item">
          @else
          <div class="item case1 text isotope-item">
          @endif
          <a>
              @if ($tweet->media_url)
              <img src="{{ $tweet->media_url }}:thumb" alt="{{ $tweet->text }}">
              @else
              <p>{{ $tweet->text }}</p>
              @endif
          </a>
          </div>
        <?php endforeach; ?>
        </div>






    </div><!--/.fluid-container-->

    
    <script>
    jQuery(document).ready(function($) {
      $('#grid').isotope({
            // options
            itemSelector : '.isotope-item',
            layoutMode : 'fitRows'
          });
    });
    
    
    </script>
  </body>
</html>
