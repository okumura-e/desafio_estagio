<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{('Users List') }}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('white') }}/css/nucleo-icons.css" rel="stylesheet" />
        <!-- CSS -->
        <link href="{{ asset('white') }}/css/white-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="{{ asset('white') }}/css/theme.css" rel="stylesheet" />

    </head>
<body class="white-content clickup-chrome-ext_installed">
    <div class="wrapper">
                    <div class="sidebar">
                        <div class="sidebar-wrapper">
                            <div class="logo">
                                <a href="#" class="simple-text logo-mini">{{ _('A I') }}</a>
                                <a href="#" class="simple-text logo-normal">{{ _('Dashboard') }}</a>
                            </div>
                            <ul class="nav">
                                <li>
                                    <a href="{{ route('home') }}">
                                        <i class="tim-icons icon-chart-pie-36"></i>
                                        <p>{{ _('NEWS') }}</p>
                                    </a>
                                </li>
                                <li >
                                    <a href="{{ route('add.new') }}">
                                        <i class="tim-icons icon-atom"></i>
                                        <p>{{ _('ADD NEWS') }}</p>
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                                        <i class="fab fa-laravel" ></i>
                                        <span class="nav-link-text" >{{ __('MANAGEMENT') }}</span>
                                        <b class="caret mt-1"></b>
                                    </a>
                    
                                    <div class="collapse show" id="laravel-examples">
                                        <ul class="nav pl-4">
                                            <li >
                                                <a href="{{ route('profile.edit')  }}">
                                                    <i class="tim-icons icon-single-02"></i>
                                                    <p>{{ _('My Profile') }}</p>
                                                </a>
                                            </li>
                                            <li class="active" >
                                                <a href="{{ route('user.management')  }}">
                                                    <i class="tim-icons icon-bullet-list-67"></i>
                                                    <p>{{ _('Users Management') }}</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li >
                                </li>
                            </ul>
                        </div>
                    </div>
                    
            <div class="main-panel">
                <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
                    <div class="container-fluid">
                        <div class="navbar-wrapper">
                            <div class="navbar-toggle d-inline">
                                <button type="button" class="navbar-toggler">
                                    <span class="navbar-toggler-bar bar1"></span>
                                    <span class="navbar-toggler-bar bar2"></span>
                                    <span class="navbar-toggler-bar bar3"></span>
                                </button>
                            </div>
                            <a class="navbar-brand" href="#">{{ $page ?? __('Dashboard') }}</a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                            <span class="navbar-toggler-bar navbar-kebab"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav ml-auto">
                                <li class="dropdown nav-item">
                                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                        <div class="photo">
                                            <img src="{{ asset('white') }}/img/anime3.png" alt="{{ __('Profile Photo') }}">
                                        </div>
                                        <b class="caret d-none d-lg-block d-xl-block"></b>
                                        <p class="d-lg-none">{{ __('Log out') }}</p>
                                    </a>
                                    <ul class="dropdown-menu dropdown-navbar">
                                        <li class="nav-link">
                                            <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{ __('Profile') }}</a>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li class="nav-link">
                                            <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="separator d-lg-none"></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="{{ __('SEARCH') }}">
                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('Close') }}">
                                    <i class="tim-icons icon-simple-remove"></i>
                              </button>
                            </div>
                        </div>
                    </div>
                </div>





<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Users</h4>
                        </div>
                        
                        <div class="col-4 text-right">
                            <a href="{{route ('add.client')}}" class="btn btn-sm btn-primary">Add user</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">

                        <div class="card">
                            <div class="card-header">  
                            <form action="" method="get">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="{{ __('Search User ') }}" value="">
                                </div>
                            </form>
                            </div>
                        </div>
                        
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr><th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact</th>
                                <th scope="col"></th>
                            </tr></thead>
                        
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->number}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                   
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="/client/{{$user->id}}">View</a>
                                                
                                                <form method="post" action="{{route('delete.client', ['id' => $user->id])}}" autocomplete="off">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="dropdown-item">Delete</button>
                                                </form>
                                                
                                                    <a class="dropdown-item" href="/editclient/{{$user->id}}">Edit</a>
                                                </div>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="..."></nav>
                </div>
            </div>
        </div>
    </div>
</div>

                
                
                


                
                
                
                
                
                
                
                
                
                
                
               
            </div>
        </div>
    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
            @csrf

    <script src="{{ asset('white') }}/js/core/jquery.min.js"></script>
    <script src="{{ asset('white') }}/js/core/popper.min.js"></script>
    <script src="{{ asset('white') }}/js/core/bootstrap.min.js"></script>
    <script src="{{ asset('white') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <!-- Place this tag in your head or just before your close body tag. -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
    <!-- Chart JS -->
    {{-- <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script> --}}
    <!--  Notifications Plugin    -->
    <script src="{{ asset('white') }}/js/plugins/bootstrap-notify.js"></script>

    <script src="{{ asset('white') }}/js/white-dashboard.js?v=1.0.0"></script>
    <script src="{{ asset('white') }}/js/theme.js"></script>

@stack('js')

    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');
                $navbar = $('.navbar');
                $main_panel = $('.main-panel');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');
                sidebar_mini_active = true;
                white_color = false;

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                $('.fixed-plugin a').click(function(event) {
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                    } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .background-color span').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data', new_color);
                    }

                    if ($main_panel.length != 0) {
                        $main_panel.attr('data', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data', new_color);
                    }
                });

                $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
                    var $btn = $(this);

                    if (sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        sidebar_mini_active = false;
                        whiteDashboard.showSidebarMessage('Sidebar mini deactivated...');
                    } else {
                        $('body').addClass('sidebar-mini');
                        sidebar_mini_active = true;
                        whiteDashboard.showSidebarMessage('Sidebar mini activated...');
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);
                });

                $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
                        var $btn = $(this);

                        if (white_color == true) {
                            $('body').addClass('change-background');
                            setTimeout(function() {
                                $('body').removeClass('change-background');
                                $('body').removeClass('white-content');
                            }, 900);
                            white_color = false;
                        } else {
                            $('body').addClass('change-background');
                            setTimeout(function() {
                                $('body').removeClass('change-background');
                                $('body').addClass('white-content');
                            }, 900);

                            white_color = true;
                        }
                });

                $('.light-badge').click(function() {
                    $('body').addClass('white-content');
                });

                $('.dark-badge').click(function() {
                    $('body').removeClass('white-content');
                });
            });
        });
    </script>
    @stack('js')
</body>
</html>
