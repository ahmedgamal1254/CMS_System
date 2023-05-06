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
                                    <h3 class="lite-text ">Contact_us</h3>
                                    <span class="lite-text text-gray">Contact_us information</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Contact_us</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="alert alert-primary" role="alert">
                this page is contain about msg which it send by users
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="alert alert-dark text-center">
                <h4 class="text-center">contact us</h4>
            </div>

            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">username</th>
                      <th scope="col">email</th>
                      <th scope="col">Control</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contact as $item)
                        <tr>
                            <th scope="col">{{ $item->id }}</th>
                            <th scope="col">{{ $item->username }}</th>
                            <th scope="col">{{ $item->email }}</th>
                            <th scope="col">
                                <div class="row">
                                    <!-- Button trigger modal -->
                                    <div>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#{{ $item->email }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="{{ $item->email }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color: black;" id="exampleModalLabel">{{ $item->username }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color: black;">
                                                        delete msg {{ $item->email }}
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
                {{ $contact->links() }}
            </div>
        </div>
    </main>    
@endsection