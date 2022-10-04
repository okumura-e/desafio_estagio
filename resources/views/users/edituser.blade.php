@extends('layouts.app', ['page' => __('edituser'), 'pageSlug' => 'edituser'])

@section('content')
    <div class="row">
        <form class="form" method="POST" action="{{ route('update.user', ['id' => $user->id]) }}" enctype="multipart/form-data">
            @csrf
            {{ csrf_field() }}
            @method('PUT')
            <div class="card-body">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="tim-icons icon-single-02"></i>
                        </div>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="{{ _('Name') }}" value="{{$user->name}}">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="tim-icons icon-email-85"></i>
                        </div>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="{{ _('Email') }}" value="{{$user->email}}">
                </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">                                    <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="number" name="number" class="form-control" placeholder="number" value="{{$user->number}}">
                    </div>
                </div>
                <div class="card-footer">
                </div>
                <button type="submit" class="btn btn-primary btn-round btn-lg">{{ _('Edit User') }}</button>
        </form>
    </div>
</div>
</div>
@endsection
