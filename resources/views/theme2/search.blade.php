@extends('../theme2/layouts.master')

@section('content')
    <div class="alert alert-primary text-center" style="margin-top: 30px;">Search by {{ $_GET['search'] }}</div>
    <div class="row">
        @forelse ($posts as $item)
            <div class="col-lg-6 text-center">
                <div class="col-md-12 col-sm-4">
                    <a href="{{ route('post_single',$item->id) }}">
                        <img src="{{ asset('storage/'.$item->img) }}" class="img-thumbnail Responsive image" alt="">
                        <h3 style="font-size: 16px">{{ $item->title }}</h3>
                        <span class="hidden-xs">
                            {{ Date('Y',strtotime($item->created_at)) }}-{{ Date('M',strtotime($item->created_at)) }}-{{ Date('d',strtotime($item->created_at)) }}
                            {{ Date('h',strtotime($item->created_at)) }}-{{ Date('i',strtotime($item->created_at)) }}-{{ Date('a',strtotime($item->created_at)) }}
                        </span>
                    </a>
                </div>
            </div>
        @empty
        <h3 class='text-center'>no posts</h3>
        @endforelse
    </div>
    <div class="row justify-content-md-center">
        {{ $posts->links() }}
    </div>
@endsection