@php
    
    $classes = "underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
@endphp


{{-- $attributes es variable que existe en laravel y trae lo que pusimos en el inicio del componente, en esta caso el href  se compila de manera implicita --}}
{{-- merge une todos los atributos que le pasen --}}
{{-- Como se necesita el class para el diseño, entonces en el array se le pone y se la manda a llamar la variable que tenemos definida arriba  --}}
<a {{ $attributes->merge(['class' => $classes])}}>
   {{$slot}}
</a>