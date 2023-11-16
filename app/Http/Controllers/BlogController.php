<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Blogxtag;
use App\Models\Tag;

class BlogController extends Controller
{
    public function index(){
        $etiquetas = Tag::all();
        return view('blog', compact('etiquetas'));
    }

    public function userIndex(){
        $etiquetas = Tag::all();
        return view('user.blog', compact('etiquetas'));
    }

    public function mostrarEtiquetas(Request $request){
        $etiquetas = Tag::all();
        return json_encode($etiquetas);
    }

    public function mostrarBlogs(Request $request){
        $blogs = Blog::all();
        return json_encode($blogs);
    }

    public function mostrarBlogsEtiqueta(Request $request){
        $blogs = Blogxtag::select('blogs.id', 'blogs.nombre', 'blogs.contenido', 'blogs.imagen', 'blogs.alt', 'blogs.estado')
        ->join('blogs','blog_xtag.blog_id','=','blogs.id')
        ->where('blog_xtag.tag_id', $request->id)
        ->get();
        return json_encode($blogs);
    }

    public function obtenerEtiquetas(Request $request){
        $etiquetas = Blogxtag::select('tags.nombre','tags.id')
            ->join('tags','tags.id','=','blog_xtag.tag_id')
            ->where('blog_xtag.blog_id', $request->id)
            ->get();
        
            return $etiquetas;
    }

    public function show($articulo){
        return view('blog.show', compact('articulo'));
    }

    public function admin_index(){
        $blogs = Blog::all();
        return view('admin.blog.mostrar',compact('blogs'));
    }

    public function admin_create(){
        return view('admin.blog.crear');
    }

    public function admin_edit(){
        return view('admin.blog.modificar');
    }

    public function admin_delete(){
        return view();
    }
}
