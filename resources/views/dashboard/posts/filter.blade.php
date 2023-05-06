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
                                    <h3 class="lite-text ">Posts</h3>
                                    <span class="lite-text text-gray">Posts information</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Posts</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="alert alert-primary" role="alert">
                this page is contain about posts which it add by admins
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>    
            @endif

            <div class="alert alert-dark text-center">
                <h4 class="text-center">Posts by :- {{ $_GET['start_date'] }} and {{ $_GET['end_date'] }}</h4>
            </div>

            <table class="table table-striped table-dark">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">name</th>
                    <th scope="col">description</th>
                    <th scope="col">Control</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($post as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
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
                  @empty
                      <tr>
                          <td colspan="4">no found</td>
                      </tr>
                  @endforelse
                </tbody>
            </table>

            <div class="row justify-content-md-center"">
                {{ $post->links() }}
            </div>
        </div>
    </main>    
@endsection