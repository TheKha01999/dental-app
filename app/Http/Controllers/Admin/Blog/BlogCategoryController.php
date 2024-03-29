<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\StoreBlogCategoryRequest;
use App\Http\Requests\Admin\Blog\UpdateBlogCategoryRequest;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogCategoryController extends Controller
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
            $filter[] = ['name', 'like', '%' . $keyword . '%'];
        }
        if ($status !== '') {
            $filter[] = ['status', $status];
        }

        $blogCategories = DB::table('blog_categories')
            ->where($filter)
            ->orderBy('created_at', $sort)
            ->paginate($itemPerPage);

        $blogCategories->appends(['sortBy' => $request->sortBy, 'status' => $request->status, 'keyword' => $request->keyword]);
        if ($request->page > $blogCategories->lastPage()) abort(404);

        return view(
            'admin.pages.blog_categories.list',
            [
                'blogCategories' => $blogCategories,
                'sortBy' => $sortBy,
                'keyword' => $keyword,
                'stt' => $stt,
                'status' => $status
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.blog_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogCategoryRequest $request)
    {
        $check = DB::table('blog_categories')->insert([
            "name" => $request->name,
            'status' => $request->status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $message = $check ? 'Created successfully !' : 'Created failed !';
        return redirect()->route('admin.blog_categories.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blogCategories = BlogCategory::findOrFail($id);
        // $blogCategories = DB::table('blog_categories')->find($id);
        return view('admin.pages.blog_categories.detail', ['blogCategories' => $blogCategories]);
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
    public function update(UpdateBlogCategoryRequest $request, string $id)
    {
        $check = DB::table('blog_categories')->where('id', '=', $id)->update([
            'name' => $request->name,
            'status' => $request->status,
            'updated_at' => Carbon::now(), //lưu ý chỗ này nên lúc nào cũng successfully
        ]);

        $message = $check  ? 'Updated successfully' : 'Updated failed';
        return redirect()->route('admin.blog_categories.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogCategory = BlogCategory::find((int)$id);
        $blogCategory->status = 0;
        $blogCategory->save();

        $blogCategory->delete();

        return redirect()->route('admin.blog_categories.index')->with('message', 'Deleted successfully');
    }
    public function restore(string $id)
    {
        $blogCategory = BlogCategory::withTrashed()->find($id);
        $blogCategory->status = 1;
        $blogCategory->save();
        $blogCategory->restore();

        return redirect()->route('admin.blog_categories.index')->with('message', 'Restore successfully');
    }
}
