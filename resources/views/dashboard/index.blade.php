@extends('../dashboard/layouts.master')

@section('content')
<main class="bmd-layout-content">
    <div class="container-fluid ">
        <!-- content -->
        <!-- breadcrumb -->
        <div class="row  m-1 pb-4 mb-3 ">
            <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                <div class="page-header breadcrumb-header ">
                    <div class="row align-items-end ">
                        <div class="col-lg-8">
                            <div class="page-header-title text-left-rtl">
                                <div class="d-inline">
                                    <h3 class="lite-text ">Dashboard</h3>
                                    <span class="lite-text text-gray">Report and analytics</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-1 mb-2">
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY   "><i
                        class="fab far fa-newspaper b-first" aria-hidden="true"></i>
                    <span class="c-first">articles</span>
                    <span>{{ $count_post }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="far fas fa-newspaper mr-1 c-first"></i>all article </p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY    "><i
                        class="far fas fa-palette b-second" aria-hidden="true"></i>
                    <span class="c-second">Themes</span>
                    <span>{{ $count_theme }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="far fas fa-palette mr-1 c-second"></i>all themes</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY"><i
                        class="fas fa-tags b-third" aria-hidden="true"></i>
                    <span class="c-third">Catogeries</span>
                    <span>{{ $count_cat }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="fas fa-tags mr-1 c-third"></i>all catogeries</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY   "><i
                        class="fas fa-users b-forth" aria-hidden="true"></i>
                    <span class="c-forth">Users</span>
                    <span>{{ $count_users }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="fas fa-users mr-1 c-forth"></i>all users</p>
                </div>
            </div>
        </div>

        <div class="row m-1 mb-2">
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY   "><i
                        class="fas fa-images b-first" aria-hidden="true"></i>
                    <span class="c-first">media</span>
                    <span>40</span>
                    <p class="mt-3 mb-1 text-center"><i class="far fas fa-newspaper mr-1 c-first"></i>all media </p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY    "><i
                        class="fas fa-file b-second" aria-hidden="true"></i>
                    <span class="c-second">Pages</span>
                    <span>{{ $count_pages }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="fas fa-file mr-1 c-second"></i>all pages</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY   "><i
                        class="fas fa-address-card b-third" aria-hidden="true"></i>
                    <span class="c-third">Messages</span>
                    <span>{{ $count_contact }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="fas fa-address-card mr-1 c-third"></i>all messages</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY   "><i
                        class="fas fa-comments b-forth" aria-hidden="true"></i>
                    <span class="c-forth">Comments</span>
                    <span>{{ $count_comment }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="fas fa-comments mr-1 c-forth"></i>all comments 
                    </p>
                </div>
            </div>
        </div>
        <div class="row m-1">
            <div class="col-xs-1 col-sm-1 col-md-8 col-lg-8 p-2">
                <div class="card shade h-100">
                    <div class="card-body">
                        <h5 class="card-title">احصائيات المقالات </h5>
                        <hr>
                        {!! $chartjs->render() !!}
                    </div>
                </div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-4 col-lg-4 p-2">
                <div class="card flat f-first h-100">
                    <div class="card-body">
                        <h5 class="card-title">Weather Widget</h5>

                        <hr>
                        <a class="weatherwidget-io" href="https://forecast7.com/en/37d5545d08/urmia/"
                            data-label_1="URMIA" data-label_2="WEATHER" data-icons="Climacons Animated"
                            data-days="5" data-textcolor="#fafafaad"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2 m-2">
            <div class="col-xl-8 col-md-6 col-sm-6 p-2">
                <div class="box-dash h-100 pastel animate__animated animate__flipInY b-second   "><i
                        class="fab far fa-clock" aria-hidden="true"></i>
                    <span>27</span>
                    <hr class="m-0 ">
                    <span>Week Visitors</span>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-xl-4 col-md-6 col-sm-6 p-2">
                <div class="box-card h-100 flat f-main animate__animated animate__flipInY   ">

                    <iframe
                        src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=en&size=medium&timezone=Asia%2FTehran"
                        width="100%" height="115" frameborder="0" seamless></iframe>
                </div>
            </div>
        </div>
        <div class="row m-1">
            <div class="col-xs-1 col-sm-1 col-md-4 col-lg-4 p-2">
                <div class="card shade h-100">
                    <div class="card-body">
                        <h5 class="card-title">نسبة المقالات </h5>
                        <hr>
                        {{ $chartjs2->render() }}
                    </div>
                </div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-8 col-lg-8 p-2">
                <div class="card shade h-100">
                    <div class="card-body">
                        <h5 class="card-title">Table Posts</h5>
                        <hr>
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">title</th>
                                    <th scope="col">content</th>
                                    <th scope="col">control</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($posts as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ substr($item->content,0,60) }}</td>
                                        <td>
                                            <div class="row">
                                                <!-- Button trigger modal -->
                                                <div >
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ $item->title }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="{{ $item->title }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" style="color: black;" id="exampleModalLabel">{{ $item->title }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="color: black;">
                                                                    delete post {{ $item->title }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <a href="{{ route('del_post',$item->id) }}" class="btn btn-danger">ok</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('edit_post',$item->id) }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>


        <div class="row m-1">
            <div class="col-xs-1 col-sm-1 col-md-12 col-lg-12 p-2">
                <div class="card shade h-100">
                    <div class="card-body">
                        <h5 class="card-title">Table Contact_Us</h5>
                        <hr>
                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">title</th>
                                    <th scope="col">content</th>
                                    <th scope="col">control</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($msg as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <div class="row">
                                                <!-- Button trigger modal -->
                                                <div >
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ $item->username }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="{{ $item->username }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" style="color: black;" id="exampleModalLabel">{{ $item->username }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="color: black;">
                                                                    delete post {{ $item->username }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <a href="{{ route('del_msg',$item->id) }}" class="btn btn-danger">ok</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{ route('show_msg',$item->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection