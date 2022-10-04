@extends('layouts.app', ['page' => __('addclient'), 'pageSlug' => 'addclient'])

@section('content')
    <div class="row">
        <form class="form" method="post" action="{{route('post.client')}}">
            @csrf
            <div class="card-body">
                <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="tim-icons icon-single-02"></i>
                        </div>
                    </div>
                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                </div>
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">                                    <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                            <input type="number" name="number" class="form-control" placeholder="number">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ _('Add User') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
