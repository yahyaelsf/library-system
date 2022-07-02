<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data=Category::all();
      return view('admin.categories.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.categories.create');
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
            'name' => 'required|string|min:3|max:40',
            'description' =>'nullable|string|min:3|max:50',
            'is_visible' =>'in:on|string'
        ]);
        $category = new Category();
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->is_visible = $request->has('is_visible');
        $saved=$category->save();
        if($saved){
            session()->flash('message','category create successfully');
            return redirect()->route('categories.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit' , ['category' => $category]);
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
            'name' => 'required|string|min:3|max:40',
            'description' => 'nullable|string|min:3|max:50',
            'is_visible' => 'in:on|string'
        ]);
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->is_visible = $request->has('is_visible');
        $saved = $category->save();
        if ($saved) {
            session()->flash('message', 'category updated successfully');
            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $is_deleted = $category->delete();
        return response()->json(
            [
                'icon' => $is_deleted ? 'success' : 'danger',
                'title' => $is_deleted ? 'Deleted Successfuly' : 'Deleted Faild',
            ],
            $is_deleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST
        );
    }
}
