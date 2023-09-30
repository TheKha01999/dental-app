<?php

namespace App\Http\Controllers\Client\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class ClientBlogController extends Controller
{
    //Navbar
    public $blogCategories;
    // ////
    public function __construct()
    {
        // $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get();
        $blogCategories = DB::table('blogs')
            ->select(DB::raw('count(blog_categories_id) as totalPost'), 'blog_categories.*')
            ->where('blogs.status', '=', '1')
            ->where('blog_categories.status', '=', '1')
            ->leftJoin('blog_categories', 'blogs.blog_categories_id', '=', 'blog_categories.id')
            ->groupBy('blog_categories.name')
            ->get();

        $this->blogCategories = $blogCategories;
    }
    public function index($id)
    {
        $blogs = DB::table('blogs')
            ->select('blogs.*', 'blog_categories.name as blog_category_name')
            ->where('blogs.status', '=', '1')
            ->where('blogs.blog_categories_id', '=', $id)
            ->leftJoin('blog_categories', 'blogs.blog_categories_id', '=', 'blog_categories.id')
            ->orderBy('created_at', 'desc')
            ->get();
        // dd($blogs);
        return view(
            'client.pages.Blog.blog',
            [
                'blogs' => $blogs,
            ]
        );
    }
    public function detail($id)
    {
        //$id này là id của blogs 
        $blog = DB::table('blogs')
            ->select('blogs.*', 'blog_categories.name as blog_category_name')
            ->where('blogs.id', '=', $id)
            ->leftJoin('blog_categories', 'blogs.blog_categories_id', '=', 'blog_categories.id')
            ->get()
            ->first();
        $recentPosts = DB::table('blogs')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        return view(
            'client.pages.Blog.blogDetail',
            [
                'blogCategories' => $this->blogCategories,
                'blog' => $blog,
                'recentPosts' => $recentPosts,
            ]
        );
    }
}
