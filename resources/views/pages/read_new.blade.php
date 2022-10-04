@extends('layouts.app', ['page' => __('read_new'), 'pageSlug' => 'read_new'])

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header mb-5">
          <h3 class="card-title"> {{ $notice->title}} </h3>
        </div>
        <div class="card-body">
          <div class="typography-line">
            <h4>{{ $notice->text }} </h4>
            <br><br><br>
            <span>
              <picture>
                <img src="{{ asset('white') }}/img/{{$notice->image}}">
              </picture>
            </span> 
          </div>
        </div>
      </div> 
    </div>
  </div>

    <div class="card-footer">
      <a href="/newedit/{{$notice->id}}"> <button type="button" class="btn btn-fill btn-primary">{{ _('Edit New') }}</button> </a> 
    </div>


  <form method="post" action="{{route('new.delete', ['id' => $notice->id])}}" autocomplete="off">
    @csrf
    @method('delete')
    <div class="card-footer">
    <button type="submit" class="btn btn-fill btn-primary">{{ _('Delete New') }}</button>
    </div>
</form>
@endsection
