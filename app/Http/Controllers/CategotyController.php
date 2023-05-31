<?php

namespace App\Http\Controllers;

use App\Http\Requests\categoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategotyController extends Controller
{
    public function index(){
        $cats = Category::paginate(15);
        return \view('backend.category.index',\compact('cats'));
    }

    public function create(){
        return \view('backend.category.create');
    }

    public function store(categoryRequest $request){
        
        $img = $request->photo;
        $newImg = \time().$img->getClientOriginalName();
        $img->move('images/category', $newImg);

        if(!$request->has('status')){
            $status = 0;
        }else{
            $status = 1;
        }
        $course = Category::create([
            'name'=> $request->name,
            'slug'=> $request->slug,
            'description'=> $request->description,
            'photo'=> $newImg ,
            'status'=> $status 
        ]);

        return redirect()->route('admin.category')->with(['success' => 'تم ألاضافة بنجاح']);

    }

    public function edit($id){
        $cat= Category::find($id);
        return \view('backend.category.edit',\compact('cat'));
    }


    public function update(categoryRequest $request , $id){
        $cat= Category::find($id);

        if($request->has('photo')){
            $oldImg = $cat->photo;
            $oldImg= Str::after($oldImg, 'category/');
            Storage::disk('category')->delete($oldImg);
            $img = $request->photo;
            $newImg = \time().$img->getClientOriginalName();
            $img->move('images/category', $newImg);

            Category::where('id', $id)
                    ->update([
                        'photo' => $newImg,
                    ]);
        }
        if(!$request->has('status')){
            $status = 0;
        }else{
            $status = 1;
        }
        $course = Category::where('id',$id)->update([
            'name'=> $request->name,
            'slug'=> $request->slug,
            'description'=> $request->description,
            'status'=> $status 
        ]);

        return redirect()->route('admin.category')->with(['success' => 'تم التحديث بنجاح']);
    }

    public function delete($id){

        $cat = Category::find($id)->delete();
        return redirect()->route('admin.category')->with(['success' => 'تم الحذف بنجاح']);

    }
}
