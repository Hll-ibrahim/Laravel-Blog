<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;
use File;

class PageController extends Controller
{
    public function index() {
        $pages=Page::all();
        return view('back.pages.index',compact('pages'));
    }

    public function orders(Request $request) {
        foreach($request->get('page')as $key => $order){
            Page::where('id',$order)->update(['order'=>$key]);
        }
    }

    public function update($id) {
        $page=Page::findOrFail($id);
        return view('back.pages.update',compact('page'));
    }
    public function updatePost(Request $request,$id) {
        
        $request->validate([
            "title" => "min:3",
            "image" => "image|min:100"
        ]);

        $post = Page::findOrFail($id);
        $post->title = $request->title; 
        $post->content = $request->content;  
        $post->slug = Str::slug($request->title);
        
        if($request->hasFile('image')){
            $imageName= Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $post->image = 'uploads/'.$imageName;
        }
        $post->save();
        toastr()->success('Sayfa başarılı bir şekilde güncellendi!');
        return redirect()->route('admin.page.index');
    }

    public function create() {
        return view('back.pages.create');
    }

    public function post(Request $request) {
        
        $request->validate([
            "title" => "min:3",
            "image" => "required|image|min:100"
        ]);

        $pages=Page::all();
        $newOrder=0;
        foreach($pages as $pagee){
            if($pagee->order>$newOrder){
                $newOrder=$pagee->order;
            }
        }

        $page = new Page;
        $page->title = $request->title; 
        $page->image = $request->image; 
        $page->content = $request->content; 
        $page->order=$newOrder+1;
        $page->slug = Str::slug($request->title);
        
        if($request->hasFile('image')){
            $imageName= Str::slug($request->title).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $page->image = 'uploads/'.$imageName;
        }
        $page->save();
        toastr()->success('Sayfa başarılı bir şekilde oluşturuldu!');
        return redirect()->route('admin.page.index');
    }

    public function switch(Request $request) {
        $page=Page::findOrFail($request->id);
        $page->status=$request->statu=="true" ? 1 : 0;
        $page->save(); 
    }

    public function delete($id) {
        $page=Page::findOrFail($id);
        if(File::exists($page->image)){
            File::delete(public_path($page->image));
        }
        $page->delete();
        toastr()->warning("Sayfa tamamen silindi!", "Başarılı");
        return redirect()->route('admin.page.index');
    }
    
}
