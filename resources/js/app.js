import './bootstrap';

// Configuración de Dropzone
import Dropzone from "dropzone";
Dropzone.autoDiscover = false;
const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: "Sube tu archivo aquí",
    acceptedFiles: ".xml,.pdf",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,

    // Trabajando con el archivo en el contenedor dropzone
    init: function () {
        if (document.querySelector('[name="archivo"]').value.trim()) {
            const archivoPublicado = {};
            archivoPublicado.size = 20000;
            archivoPublicado.name = document.querySelector('[name="archivo"]').value;
            this.options.addedFile.call(this, archivoPublicado);
            this.options.thumbnail.call(
                this,
                archivoPublicado,
                '/uploads/' + archivoPublicado.name
            );

            archivoPublicado.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

// Eventos de Dropzone
// dropzone.on('sending', function(file, xhr, formdata){
//     console.log(file);
// });

// Evento de envío correcto del archivo
dropzone.on('success', function (file, response) {
    document.querySelector('[name="archivo"]').value = response.archivo;
});

// Envío cuando hay un error
dropzone.on('error', function (file, message) {
    console.log(message);
});

// Remover un archivo
dropzone.on('removedfile', function () {
    document.querySelector('[name="archivo"]').value = '';
});
