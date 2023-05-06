@extends('../dashboard/layouts.master')

@section('content')
    <main class="bmd-layout-content">
        <div class="row  m-1 pb-4 mb-3 ">
            <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                <div class="page-header breadcrumb-header ">
                    <div class="row align-items-end ">
                        <div class="col-lg-8">
                            <div class="page-header-title text-left-rtl">
                                <div class="d-inline">
                                    <h3 class="lite-text ">Profile</h3>
                                    <span class="lite-text text-gray">Profile information</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Profile</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <th scope="row">id</th>
                            <td>{{ $item->id }}</td>
                        </tr>

                        <tr>
                            <th scope="row">email</th>
                            <td>{{ $item->email }}</td>
                        </tr>

                        <tr>
                            <th scope="row">name</th>
                            <td>{{ $item->name }}</td>
                        </tr>

                        <tr>
                            <th scope="row">active</th>
                            <td>{{ $item->active = 1?'true':'false' }}</td>
                        </tr>

                        <tr>
                            <th scope="row">admin</th>
                            <td>{{ $item->admin = 1?'true':'false' }}</td>
                        </tr>

                        <tr>
                            <th scope="row">role</th>
                            <td>{{ $item->role_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 50px;"></div>
        <div class="row m-1 mb-2">
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY   "><i
                        class="fab far fa-newspaper b-first" aria-hidden="true"></i>
                    <span class="c-first">articles</span>
                    <span>
                        {{ $data_articles }}
                    </span>
                    <p class="mt-3 mb-1 text-center"><i class="far fas fa-newspaper mr-1 c-first"></i>all article </p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY    "><i
                        class="far fas fa-palette b-second" aria-hidden="true"></i>
                    <span class="c-second">Themes</span>
                    <span>{{ $data_theme }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="far fas fa-palette mr-1 c-second"></i>all themes</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY"><i
                        class="fas fa-tags b-third" aria-hidden="true"></i>
                    <span class="c-third">Catogeries</span>
                    <span>{{ $data_cat }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="fas fa-tags mr-1 c-third"></i>all catogeries</p>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 col-sm-6 p-2">
                <div class="box-card mini animate__animated animate__flipInY   "><i
                        class="fas fa-comments b-forth" aria-hidden="true"></i>
                    <span class="c-forth">Comments</span>
                    <span>{{ $data_comments }}</span>
                    <p class="mt-3 mb-1 text-center"><i class="fas fa-comments mr-1 c-forth"></i>all comments 
                    </p>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 60px"></div>

        <div class="row m-1 mb-2">
            <div class="col-xl-6 col-md-6 col-sm-6 p-2">
                <h3 class="text-center profile_table">latest 5 Posts</h3>
                <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Post</th>
                        <th scope="col">Control</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_post as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <div class="row">
                                        <!-- Button trigger modal -->
                                        <div>
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

            <div class="col-xl-6 col-md-6 col-sm-6 p-2">
                <h3 class="text-center profile_table">latest 5 comments</h3>
                <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">post</th>
                        <th scope="col">Content</th>
                        <th scope="col">Control</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data_comment as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ substr($item->content,0,60) }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="...">
                                    <a href="#" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </main>
@endsection