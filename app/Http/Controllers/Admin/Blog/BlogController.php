<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\StoreBlogRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //SEARCH
        $keyword = $request->keyword;
        $sortBy = $request->sortBy ?? '';
        $sort = $sortBy  === 'oldest' ? 'asc' : 'desc';
        $status = $request->status ?? '';
        // Index
        $itemPerPage = config('my-config.item-per-pages');
        $page = $request->page ?? 1;
        $stt = ($page *  $itemPerPage) - ($itemPerPage - 1);

        $filter = [];
        if (!empty($keyword)) {
            $filter[] = ['blogs.author', 'like', '%' . $keyword . '%'];
        }
        if ($status !== '') {
            $filter[] = ['blogs.status', $status];
        }

        //Query Builder
        $blogs = DB::table('blogs')
            ->select('blogs.*', 'blog_categories.name as blog_category_name')
            ->where($filter)
            // ->orwhere('blogs.author', 'like', '%' . $keyword . '%')
            ->leftJoin('blog_categories', 'blogs.blog_categories_id', '=', 'blog_categories.id')
            ->orderBy('created_at', $sort)
            ->paginate($itemPerPage);

        return view(
            'admin.pages.blogs.list',
            [
                'blogs' => $blogs,
                'sortBy' => $sortBy,
                'keyword' => $keyword,
                'stt' => $stt,
                'status' => $status,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogCategories = DB::table('blog_categories')->where('status', '=', '1')->get();
        return view('admin.pages.blogs.create', ['blogCategories' => $blogCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {

        if ($request->hasFile('author_image')) {
            $fileOrginialName = $request->file('author_image')->getClientOriginalName();
            $fileAuthorName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileAuthorName .= '_' . time() . '.' . $request->file('author_image')->getClientOriginalExtension();
            $request->file('author_image')->move(public_path('images'),  $fileAuthorName);
        }
        if ($request->hasFile('blog_image')) {
            $fileOrginialName = $request->file('blog_image')->getClientOriginalName();
            $fileBlogName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileBlogName .= '_' . time() . '.' . $request->file('blog_image')->getClientOriginalExtension();
            $request->file('blog_image')->move(public_path('images'),  $fileBlogName);
        }

        $check = DB::table('blogs')->insert([
            "author" => $request->author,
            "author_image" => $fileAuthorName ?? null,
            "title" => $request->title,
            "blog_image" => $fileBlogName ?? null,
            "slug" => $request->slug,
            "content" => $request->content,
            "short_description" => $request->short_description,
            "author_description" => $request->author_description,
            "status" => $request->status,
            "blog_categories_id" => $request->blog_categories_id,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Created successfully' : 'Created failed';

        //session flash
        return redirect()->route('admin.blogs.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = DB::table('blogs')->find($id);
        $blogCategories = DB::table('blog_categories')->where('status', '=', 1)->get();
        // dd($productCategories);
        return view('admin.pages.blogs.detail', ['blog' => $blog, 'blogCategories' => $blogCategories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, string $id)
    {
        //Destroy image of dont use again old image in source file
        $blog = DB::table('blogs')->find($id);
        $oldBlogImage = $blog->blog_image;
        $oldAuthorImage = $blog->author_image;

        if ($request->hasFile('author_image')) {
            $fileOrginialName = $request->file('author_image')->getClientOriginalName();
            $fileAuthorName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileAuthorName .= '_' . time() . '.' . $request->file('author_image')->getClientOriginalExtension();
            $request->file('author_image')->move(public_path('images'),  $fileAuthorName);

            if (!is_null($oldAuthorImage) && file_exists('images/' . $oldAuthorImage)) {
                unlink('images/' . $oldAuthorImage);
            }
        }
        if ($request->hasFile('blog_image')) {
            $fileOrginialName = $request->file('blog_image')->getClientOriginalName();
            $fileBlogName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileBlogName .= '_' . time() . '.' . $request->file('blog_image')->getClientOriginalExtension();
            $request->file('blog_image')->move(public_path('images'),  $fileBlogName);

            if (!is_null($oldBlogImage) && file_exists('images/' . $oldBlogImage)) {
                unlink('images/' . $oldBlogImage);
            }
        }


        $check = DB::table('blogs')->where('id', '=', $id)->update([
            "author" => $request->author,
            "author_image" => $fileAuthorName ?? $oldAuthorImage,
            "title" => $request->title,
            "blog_image" => $fileBlogName ?? $oldBlogImage,
            "slug" => $request->slug,
            "content" => $request->content,
            "short_description" => $request->short_description,
            "author_description" => $request->author_description,
            "status" => $request->status,
            "blog_categories_id" => $request->blog_categories_id,
            "updated_at" => Carbon::now()
        ]);

        $message = $check ? 'Updated successfully' : 'Updated failed';
        //session flash
        return redirect()->route('admin.blogs.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find((int)$id);
        $blog->status = 0;
        $blog->save();

        $blog->delete();

        //session flash
        return redirect()->route('admin.blogs.index')->with('message', 'Deleted successfully');
    }

    public function createSlug(Request $request)
    {
        return response()->json(['slug' => str::slug($request->title, '-')]);
    }
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $fileOrginialName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_' . time() . '.' . $request->file('upload')->getClientOriginalExtension();
            $request->file('upload')->move(public_path('images'),  $fileName);

            $url = asset('images/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
    public function restore(string $id)
    {
        $blog = Blog::withTrashed()->find($id);
        $blog->status = 1;
        $blog->save();
        $blog->restore();

        return redirect()->route('admin.blogs.index')->with('message', 'Restore successfully');
    }
}
