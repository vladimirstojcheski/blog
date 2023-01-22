@extends('layouts/app')
@inject('methods', 'App\Http\Controllers\HomeController')
@section('content')
    <div class="container" style="margin-top: 3rem">
            @foreach($blogs as $blog)
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{asset($blog->img_path)}}" class="img-fluid rounded-start" alt="..." style="height: 200px; width: 400px">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 50px">{{strlen($blog->title) > 29 ? substr($blog->title, 0, 29) . '...' : $blog->title}}</h5>
                                {{--                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>--}}
                                <a href="{{route('blog', $blog->id)}}" class="btn btn-primary justify" style="float: right; margin-top: 50px">Read more</a>
                                <p class="card-text"><small class="text-muted">{{$methods->time_elapsed_string($blog->created_at)}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
