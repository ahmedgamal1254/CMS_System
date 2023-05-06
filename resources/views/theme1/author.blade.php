@extends('../theme1/layouts.master')

@section('content')
    <div class="alert alert-primary text-center" style="margin-top: 20px;">
        Posts by {{ $name }}
    </div>
    <div class="row">
        @forelse ($post as $item)
            <div class="col-lg-4">
                <a href="{{ route('post_single',$item->id) }}">
                    <img src="{{ asset('storage/'.$item->img) }}" 
                    class="img-thumbnail Responsive image" alt="">
                </a>
            </div>
            <div class="col-lg-8 flex_post">
                <a href="{{ route('post_single',$item->id) }}">
                    <h3>{{ $item->title }}</h3>
                    <p>
                        {{ substr($item->content,0,100) }}
                    </p>
                    <span>
                        {{ Date('Y',strtotime($item->created_at)) }}-{{ Date('M',strtotime($item->created_at)) }}-{{ Date('d',strtotime($item->created_at)) }}
                        {{ Date('h',strtotime($item->created_at)) }}-{{ Date('i',strtotime($item->created_at)) }}-{{ Date('a',strtotime($item->created_at)) }}
                    </span>
                </a>
            </div>
        @empty
            <h3 class='text-center'>no posts</h3>
        @endforelse
    </div>
    <div class="row justify-content-md-center">
        {{ $post->links() }}
    </div>
@endsection