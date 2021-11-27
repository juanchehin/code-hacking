<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Photo;
use App\Post;
use App\Comment;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::pluck('id','title','body','created_at')->all();  // Laravel posterior a 5.3
        // \FB::log('posts es : ', $posts);
        $posts = Post::all();

        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // Obtengo las categorias para que el usuario seleccione alguna
        // $categories = Category::lists('name','id')->all();
        $categories = Category::pluck('name','id')->all();  // Laravel posterior a 5.3

        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        // Obtengo los datos del request
        \FB::log('Ingreso a store 1');
        $input = $request->all();
        // Obtengo los datos del usuario que inicio sesion
        $user = Auth::user();
        \FB::log('Ingreso a store 2');

        if($file = $request->file('photo_id')){
            \FB::log('Ingreso a file');
            $name = time() . $file->getClientOriginalName();
            \FB::log('Name es : ', $name);
            $file->move('images',$name);
            // \FB::log('Name es : ', $name);
            $photo = Photo::create(['file'=>$name]);
            \FB::log('photo es : ', $photo);
            $input['photo_id'] = $photo->id;
            \FB::log('input es : ', $input);
        }
        \FB::log('Ingreso a store 3');
        $user->posts()->create($input);
        \FB::log('Ingreso a store 4');
        return redirect('/admin/posts');
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
        //
        $post = Post::findOrFail($id);

        // Cargo todas las categorias para mostrar en el seleccionable del formulario
        // $categories = Category::lists('name','id')->all();
        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.edit', compact('post','categories'));
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
        //
        $input = $request->all();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();

            $file->move('images',$name);

            $photo = Photo::create(['file'=>$name]);

            $input['photo_id'] = $photo->id;
        }

        Auth::user()->posts()->where($id)->first()->update($input);

        return redirect('/admnin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);

        unlink(public_path() . $post->photo->file);

        $post->delete();

        return redirect('/admin/posts');
    }

    // Para acceder a un post dado su ID
    // public function post($id){
    //     \FB::log('Entro en post');
    //     $post1 = Post::first();

    //     // \FB::log('Entro en post 3 ', $post);

    //     if($post1 == null){
    //         // \FB::log('Entro en post if');
    //         $post = array();
    //         return view('post',compact('post'));
    //     }

    //     $post = Post::findOrFail($id);
    //     // \FB::log('Entro en post 2 ' . $post);
    //     // return view('post',compact('post'));

    //     // $post = Post::findBySlugOrFail($slug);

    //     $comments = $post->comments();
    //     // dd($comments);


    //     return view('post', compact('post','comments'));
        
    // }
    // Metodo modificado por mi, distinto que el del curso
    public function post($slug){

        // \FB::log('POsts entro slug ' . $slug );
        // $comments = Comment::findOrFail($slug);
        
        $post = Post::findOrFail($slug);

        // \FB::log('POsts entro comments ' . $comments );
        // \FB::log('POsts entro post ' . $post->id );

        // $comments = $comments->where('post_id',$post->id)->get();
        $comments = $post->comments()->whereIsActive(1)->get();
        // dd($comments);
        // \FB::log('Comments es : ' . $comments );

        return view('post', compact('post','comments'));


    }
}