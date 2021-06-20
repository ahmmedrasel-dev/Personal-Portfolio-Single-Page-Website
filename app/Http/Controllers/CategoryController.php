<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.category.index',[
            'categories' => Category::orderBy('id', 'desc')->get(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);

        // Resource Controler Data Insert
        Category::create($request->all());

        //  ** Eloquent ORM Data Insert **

        // $category = new Category();
        // $category->category_name = $request->category;
        // $category->category_slug = $request->slug;
        // $category->save();

        $notification = array(
            'message' => 'Category Add Successfully.',
            'alert-type' => 'success'
        );

        // Toastr Alert
        return back()->with($notification);

        //  SweetAlert2
        // return back()->with('success', 'Created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.category.category-trash');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required',
        ]);

        // ** Resourece Controler Update Querry.
        $category->update($request->all());

        // ** Dispay Toastr Notification Message.
        $notification = array(
            'message' => 'Category Updated Successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $project = Project::where('category_id', $category->id)->count();
        if($project > 0){
            Project::where('category_id', $category->id)->update([
                'category_id' => 1,
            ]);
            $category->delete();
        }
        $notification = array(
            'message' => 'Category Move To Trash Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    public function trashList(){
        return view('backend.category.category-trash', [
            'category' => Category::onlyTrashed()->get()
        ]);
    }

    // Permanent Delete Category Form Trash List
    public function permanentDelete($id){
        Category::onlyTrashed()->findOrFail($id)->forceDelete();
        $notification = array(
            'message' => 'Category Delete Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    // Restore Category From Trash List.
    public function restore($id){
        Category::onlyTrashed()->findOrFail($id)->restore();
        $notification = array(
            'message' => 'Category Restore Successfully.',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

}
