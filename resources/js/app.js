import './bootstrap';

import Dropzone from "dropzone";
Dropzone.autoDiscover = false;

// Configuración de Dropzone para archivos pdf
const dropzonepdf = new Dropzone('#dropzonepdf', {
    dictDefaultMessage: "Sube tu archivo PDF aquí",
    acceptedFiles: ".pdf",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,

    // Trabajando con el archivo en el contenedor dropzone
    init: function () {
        if (document.querySelector('[name="archivopdf"]').value.trim()) {
            const archivoPublicado = {};
            archivoPublicado.size = 20000;
            archivoPublicado.name = document.querySelector('[name="archivopdf"]').value;
            this.options.addedFile.call(this, archivoPublicado);
            this.options.thumbnail.call(
                this,
                archivoPublicado,
                '/uploadspdf/' + archivoPublicado.name
            );

            archivoPublicado.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});


// Configuracion de dropzone para archivos xml
const dropzonexml = new Dropzone('#dropzonexml', {
    dictDefaultMessage: "Sube tu archivo XML aquí",
    acceptedFiles: ".xml",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,

    // Trabajando con el archivo en el contenedor dropzone
    init: function () {
        if (document.querySelector('[name="archivoxml"]').value.trim()) {
            const archivoPublicado = {};
            archivoPublicado.size = 20000;
            archivoPublicado.name = document.querySelector('[name="archivoxml"]').value;
            this.options.addedFile.call(this, archivoPublicado);
            this.options.thumbnail.call(
                this,
                archivoPublicado,
                '/uploadsxml/' + archivoPublicado.name
            );

            archivoPublicado.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});


// Evento de envío correcto del archivo pdf
dropzonepdf.on('success', function (file, response) {
    document.querySelector('[name="archivopdf"]').value = response.archivopdf;
});

// Envío cuando hay un error
dropzonepdf.on('error', function (file, message) {
    console.log(message);
});

// Remover un archivo
dropzonepdf.on('removedfile', function () {
    document.querySelector('[name="archivopdf"]').value = '';
});


// Evento de envio correcto de archivo xml
dropzonexml.on('success', function (file, response) {
    document.querySelector('[name="archivoxml"]').value = response.archivoxml;
});

// Envío cuando hay un error
dropzonexml.on('error', function (file, message) {
    console.log(message);
});

// Remover un archivo
dropzonexml.on('removedfile', function () {
    document.querySelector('[name="archivoxml"]').value = '';
});


