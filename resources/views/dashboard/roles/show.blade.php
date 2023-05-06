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
                                    <h3 class="lite-text ">Rules</h3>
                                    <span class="lite-text text-gray">Ru;es information</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Rules</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="alert alert-primary" role="alert">
                this page is contain about rules which it control by admins
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
                <h4 class="text-center">Rules</h4>
            </div>

            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">user</th>
                      <th scope="col">role</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($rules as $item)
                      <tr>
                          <th scope="row">{{ $item->id }}</th>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->role_name }}</td>
                      </tr>
                    @empty
                        <tr>
                            <td colspan="3">no found</td>
                        </tr>
                    @endforelse
                  </tbody>
            </table>


            <div class="alert alert-dark text-center">
                <h4 class="text-center">Users no found roles</h4>
            </div>

            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">user</th>
                      <th scope="col">Control</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($users as $item)
                      <tr>
                          <th scope="row">{{ $item->id }}</th>
                          <td>{{ $item->name }}</td>
                          <td>
                              <a href="{{ route('edit_role',$item->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                          </td>
                      </tr>
                    @empty
                        <tr>
                            <td colspan="4">no found</td>
                        </tr>
                    @endforelse
                  </tbody>
            </table>
        </div>
        <div style="margin-bottom: 20px;"></div>
    </main>
@endsection