@extends('layouts/app')
@section('content')
    <div class="container" style="margin-top: 3rem">
            <div class="row g-3">
                @foreach($images as $image)
                <div class="col-sm-4">
                    <div>
                        <div class="card-body gal-div gal-img">
                            <img src="{{asset($image)}}" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

    </div>
@endsection

<style>
    .gal-div {
        width: 400px;
        height: 400px;
    }

    .gal-div > img {
        max-width: 100%;
        max-height: 100%;
        object-fit: scale-down;
    }
</style>
