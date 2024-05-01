
<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ( $vacantes as $vacante )
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class=" space-y-3">
                    <a href="#" class="text-xl font-bold">{{$vacante->titulo}}</a>
                    <p class=" text-sm text-gray-600 font-bold">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500">Último dia: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
                </div>
    
                <div class=" gap-3 flex flex-col md:flex-row items-stretch mt-5 md:mt-0">
                    <a href="#" class=" bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Candidatos</a>

                    <a href="{{route('vacantes.edit',$vacante)}}" class=" bg-blue-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">Editar</a>

                    <button
                    {{-- Depues de la coma mandas una variable hacia el componente MostrarVacante de livewire y le pones el parametro  --}}
                     wire:click="$dispatch('mostrarAlerta', { vacante_id: {{ $vacante->id }} })"
                     class=" bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center "
                     >Eliminar</button>

                </div>
            </div>    
        @empty
    
            <p class=" p-3 text-center text-sm text-gray-600">No hay vacantes</p>
            
        @endforelse
    
    </div>
    
    {{-- Paginacion  --}}
    <div class="flex- justify-center mt-10">
        {{$vacantes->links()}}
    </div>
</div>

{{-- Mandas a llamar los stacks que estan en el app.blade --}}
@push('scripts')
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        Livewire.on('mostrarAlerta', vacante_id => {
            
            Swal.fire({
            title: "¿Estas seguro de eliminar la vacante?",
            text: "Esta acción no se podra revertir",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Eliminar",
            cancelButtonText: "Cancelar"
            }).then((result) => {
            if (result.isConfirmed) {
                
                // Eliminar la vacante -> se le pasa la funcion al componente y se le asigna un nombre
                Livewire.dispatch('eliminarVacante',{id : vacante_id})



                Swal.fire({
                title: "Eliminada",
                text: "La vacante ha sido eliminada",
                icon: "success"
                });
            }
            });
        })

        

    </script>
    
@endpush