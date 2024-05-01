<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postularme a esta Vacante</h3>

    <form action="w-96 mt-5">
        <div class="mb-4">
            <x-input-label 
            for="cv" 
            :value="__('Curriculum (PDF)')" />

            <x-text-input 
            id="cv" 
            class="block mt-1 w-full" 
            type="file" 
            accept=".pdf"/>
        </div>

        <x-primary-button class="my-5">
            Postularme
        </x-primary-button>
    </form>
</div>