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
                                    <h3 class="lite-text ">Comments</h3>
                                    <span class="lite-text text-gray">Comments information</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Comments</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="alert alert-primary" role="alert">
                this page is contain about comments which it add by users
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-dark text-center">
                <h4 class="text-center">comments</h4>
            </div>

            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">post</th>
                      <th scope="col">content</th>
                      <th scope="col">user</th>
                      <th scope="col">Control</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $item)
                        <tr>
                            <th scope="col">{{ $item->id }}</th>
                            <th scope="col">{{ $item->title }}</th>
                            <th scope="col">{{ $item->content }}</th>
                            <th scope="col">{{ $item->name_user }}</th>
                            <th scope="col">
                                <div class="row">
                                    <!-- Button trigger modal -->
                                    <div>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ $item->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color: black;" id="exampleModalLabel">{{ $item->id }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: black;">
                                                        delete msg {{ $item->id }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a href="{{ route('delete_comment',$item->id) }}" class="btn btn-danger">ok</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('block_comment',$item->id) }}" class="btn btn-primary">block</a>
                                </div>
                            </th>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">no found message</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="row justify-content-md-center"">
                {{ $comments->links() }}
            </div>
        </div>
    </main>    
@endsection