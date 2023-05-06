@extends('../theme1/layouts.master')

@section('content')
    <div class="alert alert-primary text-center" style="margin-top: 30px;">{{ $page_single->title }}</div>
    {!! $page_single->content !!}
@endsection