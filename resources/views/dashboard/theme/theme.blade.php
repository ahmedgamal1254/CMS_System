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
                                    <h3 class="lite-text ">Themes</h3>
                                    <span class="lite-text text-gray">Themes information</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">Themes</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="alert alert-primary" role="alert">
                this page is contain about themes which it add by admins
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
                <h4 class="text-center">Themes</h4>
            </div>

            <div class="row">
                @forelse ($themes as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card" style="width: 100%;">
                            <img src="{{ asset('img/'.$item->img) }}" class="card-img-top" style="height:300px;" alt="...">
                            <div class="card-body">
                              <div class="row">
                                @if ($item->active == 0)
                                    <a href="{{ route('active_themes',$item->id) }}" class="btn btn-primary">active</a>
                                @endif
                                <a href="{{ route('theme',$item->id) }}" style="margin-left:10px;" class="btn btn-success"><i class="fa fa-eye"></i></a>
                              </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="aler alert-danger">no found data</div>
                @endforelse
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="new-theme">
                        <span>add new theme </span>
                        <div class="icon">
                            <i class="fa fa-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-bottom: 100px;"></div>
    </main>
@endsection