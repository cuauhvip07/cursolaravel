import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone('#dropzone',{
    dictDefaultMessage: 'Sube aqui tu imagen',
    acceptedFiles: ".png,.jgp,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar Archivo',
    maxFiles: 1,
    uploadMultiple: false,

    // Muestre la imagen si no passa la validacion
    // Se ejecuta cuando dropzone es inicializado
    init: function(){
        if(document.querySelector('[name="imagen"]').value.trim()){
            const imagenPublicada = {}
            // Valor obligatorio (Tamaño de la imagen ) no obligatorio
            imagenPublicada.size = 123
            imagenPublicada.name = document.querySelector('[name="imagen"]').value

            // Codigo de dropzone para que salga de nuevo la imagen
            this.options.addedfile.call(this,imagenPublicada)
            this.options.thumbnail.call(this,imagenPublicada,`/uploads/${imagenPublicada.name}`)

            imagenPublicada.previewElement.classList.add('dz-success','dz-complete')
        }
    }
})


dropzone.on('success',function(file,response){
    // response.imagen es el valor de la imagen
    // Tambien viene del ImageController
    document.querySelector('[name="imagen"]').value = response.imagen
})

// En caso de que borre una imagen, el value se resetee
dropzone.on('removedfile',function(){
    document.querySelector('[name="imagen"]').value =''
})