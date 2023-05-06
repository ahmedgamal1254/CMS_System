<!-- Search Widget -->
<div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
        <div class="input-group">
            <form action="{{ route('search') }}" method="get">
                @csrf
                <div class="row justify-content-md-center" style="flex-wrap: nowrap">
                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                    <button class="btn btn-secondary" type="submit">Go!</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <ul class="list-unstyled">
            <div class="row">
                @foreach ($cat as $item)
                    <div class="col-lg-6">
                        <li>
                            <a href="{{ route('search_post',$item->name) }}">{{ $item->name }}</a>
                        </li>
                    </div>
                @endforeach
            </div>
        </ul>
    </div>
</div>

<!-- Side Widget -->
<?php 
    $i=0;
?>
<div class="card my-4">
    <h5 class="card-header">5 latest posts</h5>
    <div class="card-body">
        @forelse ($latest as $item)
            <a href="{{ route('post_single',$item->id) }}">
                <p class="latest">
                    <span class="num_post">{{ ++$i }}</span> 
                    <span class="latest_post">{{ $item->title }}</span>
                </p>
            </a>
        @empty
            <p>no found</p>
        @endforelse
    </div>
</div>