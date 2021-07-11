<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    
    public function index() {
        
        $posts = Post::latest()->paginate();
        
        return view('admin.posts.index', compact('posts'));
    }
    
    public function create() {
        return view('admin.posts.create');
    }
    
    public function store(StoreUpdatePost $request) {
        
        $data = $request->all();
        
        if($request->image->isValid()) {
            
            $nameFile = Str::of($request->title)->slug('-') . '.' . $request->image->getClientOriginalExtension();
            $data['image'] = $request->image->storeAs('posts', $nameFile);
            
        }
        
        $post = Post::create($data);
        
        return redirect()->route('posts.index')->with('message', 'Post criado com sucesso!');;
    }
    
    public function show($id) {
        
        //$post = Post::where('id', $id)->first();
        
        if(!$post = Post::find($id)) 
        return redirect()->route('posts.index');
        
        
        return view('admin.posts.show', compact('post'));
    }
    
    public function destroy($id) {
        
        if(!$post = Post::find($id)) 
        return redirect()->route('posts.index');
        
        if(Storage::exists($post->image)) {
            Storage::delete($post->image);
        } 
        
        
        $post->delete();
        
        return redirect()->route('posts.index')->with('message', 'Post deletado com sucesso');
    }
    
    public function edit($id) {
        
        //$post = Post::where('id', $id)->first();
        
        if(!$post = Post::find($id)) 
        return redirect()->route('posts.index');
        
        
        return view('admin.posts.edit', compact('post'));
    }
    
    public function update(StoreUpdatePost $request, $id) {
        if(!$post = Post::find($id)) 
        return redirect()->route('posts.index');
        
        $data = $request->all();
        
        if($request->image && $request->image->isValid()) {
            
            if(Storage::exists($post->image)) 
            Storage::delete($post->image);
            
            $nameFile = Str::of($request->title)->slug('-') . '.' . $request->image->getClientOriginalExtension();
            $data['image'] = $request->image->storeAs('posts', $nameFile);
            
        }
        
        $post->update($data);
        
        return redirect()->route('posts.index')->with('message', 'Post atualizado com sucesso!');
    }
    
    public function search(Request $request) {
        
        $filters = $request->search;
        
        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
        ->orWhere('content', 'LIKE', "%{$request->search}%")
        ->paginate(1);
        
        return view('admin.posts.index', compact('posts', 'filters'));
    }
    
}
