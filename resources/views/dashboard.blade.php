@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <h5 class="card-category">My</h5>
                            <h2 class="card-title">News</h2>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">  
                    <form action="" method="get">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="{{ __('search') }}" value="">
                        </div>
                    </form>
                    </div>
                </div>

                @foreach ($notices as $notice)
                <div class="card-body">
                    <div class="card-description">
                        <div class="col-md-4">
                          <div class="card card-user">
                              <div class="card-body">
                                  <p class="card-text">
                                        <div class="author">
                                          <div class="block block-one"></div>
                                          <div class="block block-two"></div>
                                          <div class="block block-three"></div>
                                          <div class="block block-four"></div>
                                          <!--<a href="/typography/{{ $notice->id }}">-->
                                            <img class="avatar" src="{{ asset('white') }}/img/{{$notice->image}}" alt="">
                                        </a>
                                        <p class="description">{{ $notice->title }}</p>
                                        </div>
                                        </p>
                                    <div class="card-description">
                                        {{ $notice->text }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                @endforeach
        </div>
    </div>
    @endsection