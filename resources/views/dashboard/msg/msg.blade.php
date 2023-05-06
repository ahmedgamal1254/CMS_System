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

            <div class="card text-center">
                <div class="card-header">
                  {{ $contact->username }}
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $contact->email }}</h5>
                  <h5 class="card-title">{{ $contact->phone }}</h5>
                  <p class="card-text">{{ $contact->content }}</p>
                  <a href="{{ route('show_contact_us') }}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-footer text-muted">
                  {{ $contact->created_at }}
                </div>
            </div>
        </div>
    </main>    
@endsection