@extends('layouts/app')
@section('content')
<div class="container" style="margin-top: 3rem">
    <form method="post" class="row g-3" action="{{route('add')}}" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <label for="imgpath" class="form-label">Thumbnail</label>
            <input name="img_path" type="file" class="form-control" id="imgpath" placeholder="1234 Main St">
        </div>
        <div class="col-md-12">
            <label for="title" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="title">
        </div>
        <div class="col-md-12">
            <label for="myeditorinstance" class="form-label">Content</label>
            <textarea name="content" type="text" class="form-control" id="myeditorinstance"></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-outline-info">Submit</button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'powerpaste advcode table lists checklist image',
            toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table | image'
        });
    </script>
@endsection
