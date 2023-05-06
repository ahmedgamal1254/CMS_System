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

            <div class="alert alert-primary">
                edit Rules
            </div>

            <form action="{{ route('save_role') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-group">
                    <label for="inputState">State</label>
                    <select id="inputState" name="role" class="form-control">
                      <option selected>Choose...</option>
                      @foreach ($roles as $item)
                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="row">
                    <button type="submit" style="margin-left: 25px;" class="btn btn-primary">save</button>
                    <a href="{{ route('show_role') }}" style="margin-left: 25px;" class="btn btn-primary">back</a>
                </div>
            </form>
        </div>
        <div style="margin-bottom: 20px;"></div>
    </main>
@endsection