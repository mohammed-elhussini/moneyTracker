<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$userCats = User::findOrFail(Auth::id())->categories;

        $user_catsCount = User::findOrFail(Auth::id())
                            ->categories()
                            ->count();

        $userCats = Category::with('child')
                    ->where('user_id', Auth::id())
                    ->where('parent_id', '0')
                    ->get();

        return view('site.category.index', compact('userCats', 'user_catsCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::with('child')->
                        where('user_id', Auth::id())->
                        where('parent_id', '0')->
                        get();
        return view('site.category.create', compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request, Category $category)
    {
        $user = auth()->user();
        if ($request->icon_remove == '1') {
            $category->icon = '';
        }

        if ($request->hasFile('icon')) {
            $category->icon = $this->uploadImage('icon', 'uploads/user-' . $user->id . '/categories');
        }

        $category->create([
            'user_id' => $user->id,
            'name' => $request->input('name'),
            'icon' => $category->icon,
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id'),
        ]);

        return to_route('category.index')->with('message', 'تم إضافة القسم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$category->load('transactions.payment');
        $category = Category::withTrashed()->findOrFail($id);
        return view('site.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $allCategories = Category::with('child')->
                         whereNotIn('id', $category->child->pluck('id')->toArray())->
                         where('parent_id', '0')->
                         where('user_id', Auth::id())->
                         where('id', '!=', $category->id)->
                         get();

        return view('site.category.edit', compact('category', 'allCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //dd($request);

        $user = auth()->user();
        if ($request->icon_remove == '1') {
            $category->icon = 'null';
        }

        if ($request->hasFile('icon')) {
            $category->update(['icon' => $this->uploadImage('icon', 'uploads/user-' . $user->id . '/categories')]);
        }

        $category->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'parent_id' => $request->input('parent_id'),
        ]);

        return redirect()->back()->with('message', 'تم تحديث بيانات القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->parent_id == 0) {
            $category->child()->update(['parent_id' => 0]);
        }
        $category->delete();
        return to_route('category.index')->with('message','تم حذف القسم');
    }

    /**
     * Display a Trash listing of the resource.
     */
    public function trash()
    {
        $userCatsTrash = Category::where('user_id', Auth::id())->
                        onlyTrashed()->
                        get();
        return view('site.category.trashed', compact('userCatsTrash'));
    }

    /**
     * Restore Item.
     */
    public function restore($id)
    {
        $category = Category::withTrashed()->where('id',$id);
        $category->restore();
        return to_route('category.index')->with('message', 'تم استعاده القسم من سله المهملات');
    }

    public function forceDelete($id){
        $category = Category::withTrashed()->findOrFail($id);
// Delete associated image
        if (is_file($category->icon)) {
            unlink($category->icon);
        }
        // Delete associated image
//        if ($category->icon) {
//            Storage::delete($category->icon);
//        }

        $category->forceDelete();
        return to_route('category.index')->with('message', 'تم حذف القسم بنجاح');
    }
}
