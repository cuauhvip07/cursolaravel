<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Validation\ValidatesRequests;

class PostController extends Controller
{    
  // Proteger la ruta si no esta autenticado
  public function __construct()
  {
      // Esta protegido excepto los metodos que pongas
      $this->middleware('auth')->except(['show','index']);
  }

  // Importar el modelo User
  // $user tiene la informacion de la bd con los datos
  public function index(User $user)
  {
    // busqueda del WHERE en la bd
    // user_id compara con $user->id  y get te trae la informacion 
    // $post = Post::where('user_id',$user->id)->get();
    // latest() nos da las publicaciones mas resientes
    // Paginacion -> Para que se vea bien la paginacion debes de ponerle estilos en el tailwind
    $posts = Post::where('user_id',$user->id)->latest()->paginate(10);

    // Otra manera para buscar los post pero NO puedes usar paginate

    
    // dd($user->username);
    return view('dashboard',[
      'user'=>$user,
      'posts'=>$posts // Se mandan los post a la vista
    ]);
  }

  public function create()
  {
    return view('posts.create');
  }

  // Siempre el store tendra el request ya que lo almacena en la bd
  use ValidatesRequests;  
  public function store(Request $request)
  {
    $this->validate($request,[
      'titulo'=>'required|max:255',
      'descripcion'=>'required',
      'imagen'=>'required'
    ]);

    // Otra forma mas para el llenado de informacion
    // user() viene cuando tu validaz de la sesion
    // posts es la funcion creada en el modelo user
    $request->user()->posts()->create([
      'titulo' => $request->titulo,
      'descripcion' => $request->descripcion,
      'imagen'=>$request->imagen,
      'user_id'=>auth()->user()->id
    ]);

    // Otra manera de crear Rrgistros
    // Post::create([
    //   'titulo' => $request->titulo,
    //   'descripcion' => $request->descripcion,
    //   'imagen'=>$request->imagen,
    //   'user_id'=>auth()->user()->id
    // ]);

    // Otra forma de crear Registros
    // $post = new Post;
    // $post->titulo =  $request->titulo;
    // $post->descripcion = $request->descripcion;
    // $post->imagen = $request->imagen;
    // $post->user_id = auth()->user()->id;
    // $post->save();
    

    return redirect()->route('posts.index',auth()->user());

  }

  public function show(User $user,Post $post)
  {
    return view('posts.show',[
      'post'=>$post,
      'user'=>$user
    ]);
  }

  // Eliminar una publicacion
  public function destroy(Post $post)
  {
    // delete es el metodo que estas usando en el PostPolicy
    Gate::allows('delete',$post);
    $post->delete();

    // Eliminar la imagen 
    $imagen_path = public_path('uploads/'. $post->imagen);

    if(File::exists($imagen_path)){
      unlink($imagen_path);
    }

    return redirect()->route('posts.index',auth()->user());
  }
}
