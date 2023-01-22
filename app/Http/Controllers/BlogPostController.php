<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPosts;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function createBlogPost(BlogPostRequest $request) {
        $data = $request->all();
        $imageName = time().'.'.$request->img_path->extension();
        $request->img_path->move(public_path('images'), $imageName);
//        dd($imageName);
//        dd($data);
        $data['img_path'] = "images/" .$imageName;
        $post = BlogPosts::create($data);
        if ($post) {
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function showForm() {
        return view('blog/addBlog');
    }
}
