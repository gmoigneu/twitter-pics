@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
Dashboard :: @parent
@stop

@section('content')
<div class="page-header">
<h1>Dashboard</h1>
    <p>Please login to your dashboard.</p>
</div>
<div class="row-fluid">

<div class="span12">
<div class="" id="loginModal">
  <div class="modal-body">
    <div class="well">
          <form class="form-horizontal" action='/dashboard/verify' method="POST">
            <fieldset>
              <div id="legend">
                <legend class="">Login</legend>
              </div>    
              <div class="control-group">
                <!-- Username -->
                @if (Input::get('error'))
                <div class="alert alert-error">
                  {{ Input::get('error') }}
                </div>
                @endif
                <label class="control-label"  for="email">Email</label>
                <div class="controls">
                  <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <!-- Password-->
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                  <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                </div>
              </div>
              <div class="control-group">
                <!-- Button -->
                <div class="controls">
                  <button class="btn btn-success">Login</button>
                </div>
              </div>
            </fieldset>
          </form>                
  </div>
</div>
</div>


</div><!--/row-->

@stop
