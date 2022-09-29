@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])

@section('content')

<form class="form" method="post" action="{{ route('register') }}">
  @csrf

  <div class="col-md-7 mr-auto">
    <div class="card card-register card-white">
        <div class="card-header">
            <img class="card-img" src="{{ asset('white') }}/img/card-primary.png" alt="Card image">
            <h4 class="card-title">{{ _('Add News') }}</h4>
        </div>
  
        <div class="card-body">
      <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <div class="input-group-prepend"></div>

          <div class="input-group">
            <div class="input-group-prepend"></div>
            <input type="file" name="image" class="form-control" value="" required>
        </div>
    
          <input type="text" name="title" class="form-control" placeholder="{{ _('Title') }}" value="" required>
          @include('alerts.feedback', ['field' => 'name'])
      </div>

      <div class="input-group">
          <div class="input-group-prepend"></div>
          <input type="textarea" name="text" class="form-control" placeholder="{{ _('Text') }}" value="" required>
          @include('alerts.feedback', ['field' => 'email'])
      </div>
  </div>
  <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-round btn-lg">{{ _('ADD') }}</button>
  </div>
</form>
@endsection