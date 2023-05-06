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
                                    <h3 class="lite-text ">Recycle Bin</h3>
                                    <span class="lite-text text-gray">Recycle information</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Recycle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="alert alert-warning text-center" role="alert" style="margin-bottom: 40px">
                all comments and posts in this page is soft delete and maybe restore it!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    
            <div class="row m-1 mb-2">
                <div class="col-xl-6 col-md-6 col-sm-6 p-2">
                    <div class="box-card mini animate__animated animate__flipInY   "><i
                            class="fab far fa-newspaper b-first" aria-hidden="true"></i>
                        <span class="c-first">articles</span>
                        <span>
                            {{ $count_posts }}
                        </span>
                        <p class="mt-3 mb-1 text-center"><i class="far fas fa-newspaper mr-1 c-first"></i>all article </p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6 p-2">
                    <div class="box-card mini animate__animated animate__flipInY    "><i
                            class="fas fa-comments b-second" aria-hidden="true"></i>
                        <span class="c-second">Comments</span>
                        <span>{{ $count_comments }}</span>
                        <p class="mt-3 mb-1 text-center"><i class="fas fa-comments mr-1 c-second"></i>all themes</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('search_delete') }}" method="get">
                <div class="row">
                    <div class="form-group flex-form-search-post col-lg-8">
                        <input type="text" name="search" placeholder="search for posts delete" class="form-control" id="">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div style="margin-top: 40px"></div>

            <div id="posts_restore" class="posts">
                <h3 class="text-center">Posts Restore</h3>
                <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">title</th>
                        <th scope="col">content</th>
                        <th scope="col">Control</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>
                                    <div class="row">
                                        <!-- Button trigger modal -->
                                        <div>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ $post->title }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="{{ $post->title }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color: black;" id="exampleModalLabel">{{ $post->title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="color: black;">
                                                            delete post {{ $post->title }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="{{ route('delete_post',$post->id) }}" class="btn btn-danger">ok</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('restore_post',$post->id) }}" class="btn btn-primary" style="margin-left: 15px;"><i class="fa fa-restore"></i> Restore</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">no data to restore</td>
                            </tr>
                        @endforelse
                    </tbody>
                  </table>

                <div class="row justify-content-md-center"">
                    {{ $posts->links() }}
                </div>
            </div>

            <div style="margin-top: 40px"></div>

            <div id="comments_restore" class="comments">
                <h3 class="text-center">Comments Restore</h3>
                <table class="table table-striped table-dark">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">title</th>
                        <th scope="col">content</th>
                        <th scope="col">Control</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($comments as $comment)
                            <tr>
                                <th scope="row">{{ $comment->id }}</th>
                                <td>{{ $comment->title }}</td>
                                <td>{{ $comment->content }}</td>
                                <td>
                                    <div class="row">
                                        <!-- Button trigger modal -->
                                        <div>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ $comment->content }}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="{{ $comment->content }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" style="color: black;" id="exampleModalLabel">{{ $comment->title }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="color: black;">
                                                            delete post {{ $comment->content }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="{{ route('delete_comment',$comment->id) }}" class="btn btn-danger">ok</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('restore_comment',$comment->id) }}" class="btn btn-primary" style="margin-left: 15px;"><i class="fa fa-restore"></i> Restore</a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">no data to restore</td>
                            </tr>
                        @endforelse
                    </tbody>
                  </table>

                <div class="row justify-content-md-center"">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </main>    
@endsection