@extends('layouts/app')
@inject('methods', 'App\Http\Controllers\HomeController')
@section('content')
    <div class="container" style="margin-top: 3rem">
        <h2 style="font-size: 100px; text-align: center">{{$blog->title}}</h2>
        <img src="{{asset($blog->img_path)}}" class="card-img-top" alt="..." style="height: 20rem; width: 20rem; margin-left: auto; margin-right: auto">
        <div class="card mb-3" style="margin-top: 3rem">
            <div class="card-body">
                <p class="card-text">{!! $blog->content !!}</p>
                <p class="card-text"><small class="text-muted">{{$methods->time_elapsed_string($blog->created_at)}}</small></p>
            </div>
        </div>
    </div>
@endsection
