

{{-- Se le debe de añadir el wire:submit.prevent='crearVacante' --}}

<form action="" class=" md:w-1/2 space-y-5" wire:submit.prevent='editarVacante'>
   
    <div>
        <x-input-label 
        for="titulo" 
        :value="__('Titulo Vacante')" />

        <x-text-input 
        id="titulo" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="titulo" 
        :value="old('titulo')" 
        placeholder="Titulo de la vacante"/>

        <x-input-error 
        :messages="$errors->get('titulo')" 
        class="mt-2" />

    </div>

    <div>
        <x-input-label 
        for="salario" 
        :value="__('Salario Mensual')" />

        <select 
        wire:model="salario" 
        id="salario" 
        class="block text-sm text-gray-500 font-bold uppercase mb-2 w-full">
                <option value=""  selected> -- Seleccione --</option>
            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
            @endforeach
        </select>

        <x-input-error 
        :messages="$errors->get('salario')" 
        class="mt-2" />

    </div>


    <div>
        <x-input-label 
        for="categoria" 
        :value="__('Categoria')" />

        <select 
        wire:model="categoria" 
        id="categoria" 
        class="block text-sm text-gray-500 font-bold uppercase mb-2 w-full">
                <option value=""  selected> -- Seleccione --</option>
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
            @endforeach
        </select>

        <x-input-error 
        :messages="$errors->get('categoria')" 
        class="mt-2" />

    </div>

    <div>
        <x-input-label 
        for="empresa" 
        :value="__('Empresa')" />

        <x-text-input 
        id="empresa" 
        class="block mt-1 w-full" 
        type="text" 
        wire:model="empresa" 
        :value="old('empresa')" 
        placeholder="Empresa: Ej. Netfllix, Uber"/>

        <x-input-error 
        :messages="$errors->get('empresa')" 
        class="mt-2" />

    </div>

    <div>
        <x-input-label 
        for="ultimo_dia" 
        :value="__('Ultimo dia para postularse')" />

        <x-text-input 
        id="ultimo_dia" 
        class="block mt-1 w-full" 
        type="date" 
        wire:model="ultimo_dia" />

        <x-input-error 
        :messages="$errors->get('ultimo_dia')" 
        class="mt-2" />

    </div>

    <div>
        <x-input-label 
        for="descripcion" 
        :value="__('Descripción Puesto')" />

        <textarea 
        wire:model="descripcion" 
        id="descripcion" 
        cols="30" 
        placeholder="Descripción general del puesto, experiencia" 
        class="block text-sm text-gray-500 mb-2 w-full h-72">{{old('descripcion')}}</textarea>

        <x-input-error 
        :messages="$errors->get('descripcion')" 
        class="mt-2" />

    </div>


    <div>
        <x-input-label 
        for="imagen" 
        :value="__('Imagen')" />

        <x-text-input 
        id="imagen" 
        class="block mt-1 w-full" 
        type="file" 
        wire:model="imagen_nueva" 
        accept="image/*" /> 

        <x-input-error 
        :messages="$errors->get('imagen_nueva')" 
        class="mt-2" />

    </div>

    <div class="my-5 w-96">
        <x-input-label 
        :value="__('Imagen Actual')" />

        {{-- Como se esta guardando en el storage, se debe de dar aacceso unicamente a esa carpeta --}}
        {{-- Despues se debe hacer un link simbolico, en la terminal poniendo sail artisan storage:link --}}
        <img src="{{asset('storage/vacantes/'.$imagen)}}" alt="{{'Imagen vacante '.$titulo}}">
    </div>


    {{-- Codigo para el preview de una imagen  --}}
    <div class="my-5 w-96">
        @if ($imagen_nueva)
            Imagen Nueva:
            <img src="{{ $imagen_nueva->temporaryUrl()}}" alt="">
        @endif
    </div>

    <x-primary-button>
        Guardar Cambios
    </x-primary-button>



</form>