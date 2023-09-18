<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientBlogController extends Controller
{
    public $blogCategories;

    public function __construct()
    {
        $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get();
        $this->blogCategories = $blogCategories;
    }
    public function index()
    {
        return view('client.pages.Blog.blog', ['blogCategories' => $this->blogCategories]);
    }
    public function detail($id)
    {
        $blogs = DB::table('blogs')
            ->select('blogs.*', 'blog_categories.name as blog_category_name')
            ->where('blogs.status', '=', '1')
            ->where('blogs.blog_categories_id', '=', $id)
            ->leftJoin('blog_categories', 'blogs.id', '=', 'blog_categories.id')
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($blogs);
        return view(
            'client.pages.Blog.blog',
            [
                'blogCategories' => $this->blogCategories,
                'blogs' => $blogs
            ]
        );
    }
}
