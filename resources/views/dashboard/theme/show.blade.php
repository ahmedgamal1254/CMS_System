@extends('../dashboard/layouts.master')

@section('content')
    <main class="bmd-layout-content">
        <div class="container">
            <div class="card mb-3">
                    <img src="{{ asset('img/'.$themes->img) }}" class="card-img-top" style="height: 450px;" >
                <div class="card-body">
                    <h5 class="card-title">{{ $themes->name }}</h5>
                    <p class="card-text">{{ $themes->description }}</p>
                    <p class="card-text">create by {{ $themes->username }}</p>
                    
                    <div class="row">
                        @if ($themes->active == 0)
                            <a href="{{ route('active_themes',$themes->id) }}" class="btn btn-primary">active</a>
                        @endif
                        <a href="{{ route('show_themes') }}" style="margin-left:10px;" class="btn btn-primary">back</a>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-bottom: 100px;"></div>
    </main>
@endsection