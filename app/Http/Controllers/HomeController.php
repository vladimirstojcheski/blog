<?php

namespace App\Http\Controllers;

use App\Models\BlogPosts;
use DateTime;

class HomeController extends Controller
{
    public function showBlogs() {
        $blogPosts = BlogPosts::get()->sortByDesc('created_at')->take(3);
        return view('blog/showBlog')->with('blogs', $blogPosts);
    }

    public function singleBlog($id) {
        $blog = BlogPosts::find($id);
        return view('blog/singleBlog')->with('blog', $blog);
    }

    public function all() {
        $blogPosts = BlogPosts::get()->sortByDesc('created_at');
        return view('blog/showBlog')->with('blogs', $blogPosts);
    }

    public function gallery() {
        $blogPosts = BlogPosts::get()->sortByDesc('created_at');
        $images = [];
        foreach ($blogPosts as $blog) {
            array_push($images, $blog->img_path);
        }
        return view('blog/gallery')->with('images', $images);
    }

    public function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }
}
