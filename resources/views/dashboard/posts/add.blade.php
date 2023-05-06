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

            <div class="alert alert-dark text-center">
                <h4 class="text-center">add post</h4>
            </div>

            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>

            <form action="{{ route('save_post') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-row">
                    <div class="col">
                      <input type="text" name="title" class="form-control" placeholder="title of post">
                    </div>
                    <div class="col">
                      <input type="text" name="tags" class="form-control" placeholder="tags of post">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                      <label for="exampleFormControlSelect2">Choose the catogeries of post</label>
                    <select class="form-control" name="cat" id="exampleFormControlSelect2">
                        @foreach ($cat as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="col">

                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">img of post</label>
                    <input name="img" type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>

                <div class="form-group">
                    <label style="color: black;font-size:20px;margin-bottom:10px;">Enter the content :- </label>
                    <input id="x" type="hidden" placeholder="enter content" name="content"><trix-editor input="x"></trix-editor>
                </div>

                <button type="submit" class="btn btn-primary">add</button>
            </form>
        </div>
    </main>    
@endsection

@section('css')
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
@endsection

@section('script')
    <script src="{{ asset('js/trix.js') }}"></script>
@endsection