@extends('layouts.app', ['page' => __('Icons'), 'pageSlug' => 'icons'])

@section('content')

<form class="form" method="put" action="{{ route('new.update', ['id' => $notice->id]) }}" enctype="multipart/form-data">
  @csrf
  {{ csrf_field() }}
  @method('PUT')
  <div class="col-md-7 mr-auto">
    <div class="card card-register card-white">
        <div class="card-header">
            <img class="card-img" src="{{ asset('white') }}/img/card-primary.png" alt="Card image">
            <h4 class="card-title">{{ _('Edit News') }}</h4>
        </div>
  
        <div class="card-body">
      <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
          <div class="input-group-prepend"></div>

          <div class="input-group">
            <div class="input-group-prepend"></div>
            <input type="file" name="image" class="form-control" value="{{ $notice->image}}" required>
        </div>
    
          <input type="text" name="title" class="form-control" placeholder="{{ _('Title') }}" value="{{ $notice->title}}" required>
      </div>

      <div class="input-group">
          <div class="input-group-prepend"></div>
          <input type="textarea" name="text" class="form-control" placeholder="{{ _('Text') }}" value="{{ $notice->text}}" required>
      </div>
  </div>
  <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-round btn-lg">{{ _('CONFIRM') }}</button>
  </div>
</form>
@endsection