$(document).ready(function () {

    // Preseleccionar valor oculto si ya hay encargado asignado
    $('.opcion-soporte').each(function () {
        if ($(this).data('nombre') === $('#buscarSoporte').val()) {
            $('#selectSoporte').val($(this).data('valor'));
        }
    });

    // Mostrar lista completa al hacer foco
    $('#buscarSoporte').on('focus', function () {
        filtrarOpciones('');
        $('#listaSoporte').show();
    });

    // Filtrar mientras escribe
    $('#buscarSoporte').on('input', function () {
        $('#selectSoporte').val('0');
        filtrarOpciones($(this).val());
        $('#listaSoporte').show();
    });

    // Seleccionar una opción de la lista
    $(document).on('click', '.opcion-soporte', function () {
        $('#selectSoporte').val($(this).data('valor'));
        $('#buscarSoporte').val($(this).data('nombre'));
        $('#listaSoporte').hide();
    });

    // Cerrar lista al hacer click fuera del componente
    $(document).on('click', function (e) {
        if (!$(e.target).closest('#buscarSoporte, #listaSoporte').length) {
            $('#listaSoporte').hide();
        }
    });

    // Hover en las opciones
    $(document).on('mouseenter', '.opcion-soporte', function () {
        $(this).addClass('opcion-soporte-hover');
    }).on('mouseleave', '.opcion-soporte', function () {
        $(this).removeClass('opcion-soporte-hover');
    });

    function filtrarOpciones(texto) {
        var filtro = texto.toLowerCase();
        $('.opcion-soporte').each(function () {
            var nombre = $(this).data('nombre').toLowerCase();
            $(this).toggle(nombre.indexOf(filtro) !== -1);
        });
    }

});