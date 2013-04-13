@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Dashboard :: @parent
@stop

@section('content')
<div class="page-header">
<h1>Dashboard</h1>
    <p>Manage displayed tweets.</p>
</div>
<div class="row-fluid">

<div class="span12">
<div class="container">
    
        
   <table class="table table-striped">
      <tr>
        <th>#</th>
        <th>Thumbnail</th>
        <th>Id</th>
        <th>Author</th>
        <th>Text</th>
        <th></th>
      </tr>
      <?php foreach ($tweets as $tweet): ?>
        @if ($tweet->enabled == 0)
              <tr class="error">
        @else
              <tr>
        @endif
          <td>
            {{ $tweet->id }}
          </td>
          <td>
          @if ($tweet->media_url)
          <img src="{{ $tweet->media_url }}:thumb" alt="ALT NAME">
          @endif
          </td>
          <td>
            <a href="http://twitter.com/{{ $tweet->user_screen_name }}/status/{{ $tweet->id_str }}" target="blank">{{ $tweet->id_str }}</a>
          </td>
          <td>
            <a href="http://twitter.com/{{ $tweet->user_screen_name }}" target="blank">@{{ $tweet->user_screen_name }}</a>
          </td>
          <td>
            {{ $tweet->text }}
          </td>
          <td>
            <a class="btn btn-small btn-danger" href="/dashboard/moderate/{{ $tweet->id }}" type="button">Moderate</a>
          </tf>
        </tr>
        <?php endforeach; ?>
   </table>


    <ul class="thumbnails">
   
    </ul>

</div>

<?php echo $tweets->links(); ?>
</div>


</div><!--/row-->

@stop
