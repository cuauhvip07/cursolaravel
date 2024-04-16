<!-- En el componente de Blade listar-post.blade.php -->
<div>
    {{-- {{dd($user->posts)}} posts es la relacion que hay en usuario --}}
    {{-- count() nos dice si existe al menos un valor --}}
    @if ($posts->count())  {{-- if($user->posts->count()) --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
{{-- Se le debe de agregar $post que viene del arreglo para que se pase al router --}}
                    <a href="{{ route('posts.show',['post'=>$post,'user'=>$post->user]) }}">
                        <img src="{{asset('uploads') . "/" . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                    </a>
                </div>    
            @endforeach
        </div>

        <div class="my-10">
            <!-- Paginacion-->
            {{$posts->links()}}
        </div>
    @else
        <p class=" text-gray-600 uppercase text-sm text-center font-bold">No hay Posts</p>
    @endif
</div>
