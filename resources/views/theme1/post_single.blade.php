@extends('../theme1/layouts.master')

@section('content')
    <!-- Post Content Column -->
    <!-- Title -->
    <h3 class="mt-4">{{ $post->title }}</h3>
    <!-- Author -->
    <p class="lead">
    by <a href="{{ route('author', $post->name) }}">{{ $post->name }}</a>
    </p>
    <hr>
    <!-- Date/Time -->
    <p>Posted on 
        {{ Date('Y',strtotime($post->created_at)) }}-{{ Date('M',strtotime($post->created_at)) }}-{{ Date('d',strtotime($post->created_at)) }}
        {{ Date('h',strtotime($post->created_at)) }}-{{ Date('i',strtotime($post->created_at)) }}-{{ Date('a',strtotime($post->created_at)) }}
    </p>
    <hr>
    <!-- Preview Image -->
    <img class="img-fluid rounded" src="{{ asset('storage/'.$post->img) }}" alt="">
    <hr>
    {!! $post->content !!}

    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">
            <form action="{{ route('add_comment') }}" method="POST">
                @csrf
                @if (request()->session()->has('admin'))
                    <input type="hidden" name="user" value="{{ $post->user }}">
                @else
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Enter name">
                    </div>    
                @endif
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="form-group">
                    <textarea class="form-control" name="content" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <div class="data text-center">
         {{ $count_comments }} <i class="fa fa-comments"></i> comments
    </div>

    <!-- Single Comment -->
    @foreach ($comments as $item)
        <div class="media mb-4">
            <img class="d-flex mr-3 img-thumbnail Responsive image rounded-circle" style="width: 100px;height:100px;" src="{{ asset('img/th.jpg') }}" alt="">
            <div class="media-body">
                @if ($item->email)
                    <h5 class="mt-0">{{ $item->name }}</h5>
                @else
                    <h5>{{ $item->username }}</h5>       
                @endif
                {{ $item->content }}
                <span class="time">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
            </div>
        </div>
    @endforeach

    @foreach ($comments2 as $item)
        <div class="media mb-4">
            <img class="d-flex mr-3 img-thumbnail Responsive image rounded-circle" style="width: 100px;height:100px;" src="{{ asset('img/th.jpg') }}" alt="">
            <div class="media-body">
                @if ($item->email)
                    <h5 class="mt-0">{{ $item->name }}</h5>
                @endif
                {{ $item->content }}
                <span class="time">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
            </div>
        </div>
    @endforeach
@endsection