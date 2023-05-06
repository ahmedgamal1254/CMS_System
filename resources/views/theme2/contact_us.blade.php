@extends('../theme2/layouts.master')

@section('content')
    @if (session()->has('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>    
    @endif

    <h3 class="contact">Contact us</h3>
    <p class="text-center">برجاء ملء جميع البيانات بالاسفل للرد عليكم</p>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

    <form action="{{ route('send_contact') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Enter your phone">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" placeholder="enter the content" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">send</button>
    </form>
@endsection