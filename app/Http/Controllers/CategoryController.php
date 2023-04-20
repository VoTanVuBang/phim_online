<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:Create|Edit|Delete',['only'=>['index','show']]);
        $this->middleware('permission:Create',['only'=>['create','store']]);
        $this->middleware('permission:Edit',['only'=>['edit','update']]);
        $this->middleware('permission:Delete',['only'=>['destroy']]);
    }
    public function index()
    {
        $list = Category::orderBy('position','ASC')->get();
        return view('admincp.category.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
      
        return view('admincp.category.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // $data = $request->all();
        $data= $request->validate(
            [
            'title' => 'required|unique:categories|max:255',
            'slug' => 'unique:categories|max:255',
            'description' => 'required|max:255',
            'status'=>'required',
            ],
            [
                'title.unique' => 'Tên danh mục đã tồn tại, vui lòng điền tên khác',
                'slug.unique' => 'Slug danh mục đã tồn tại, vui lòng điền slug khác',
                'title.required' => 'Vui lòng điền tên danh mục',
                'description.required' => 'Vui lòng điền mô tả danh mục',
            ]
        );
        $category = new Category();
        $category->title = $data['title'];
        $category->description =$data['description'] ;
        $category->status =$data['status'] ;
        $category->slug =$data['slug'] ;
        $category->save();
        toastr()->success('Thành công','Thêm danh mục phim.');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $list = Category::orderBy('position','ASC')->get();
        return view('admincp.category.form',compact('list','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        $category->title = $data['title'];
        $category->description =$data['description'] ;
        $category->slug =$data['slug'] ;
        $category->status =$data['status'] ;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        toastr()->warning('Thành công','Xóa danh mục phim.');
        return redirect()->back();
    }

    public function resorting_category(Request $request){
        $data = $request->all();
        foreach($data['array_id'] as $key => $value){
            $category = Category::find($value);
            $category->position = $key;
            $category->save();
        }
    }
}