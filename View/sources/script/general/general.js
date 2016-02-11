/*****************GENERAL FUNCTIONS****************************/

var listdata = new Array();
var iddata;
var loading = '<div><img src="View/sources/style/image/loader.gif"><br><label>Cargando..</label></div>';

/**
 * Muestra un mensaje en una ventana emergente
 * @param {String} message Mensaje a mostrar
 * @returns {void}
 * @author Johnny Alexander Salazar
 * @version 0.1
 */
function showMessage(message) {
    apprise(message, {
        'animate': true
    });

    setTimeout(function() {
        $('.appriseOverlay').remove();
        $('.appriseOuter').remove()
    }, 1250);
}

/**
 * Limpia los input tipo text, password, label de error, textarea de un formulario, si no recibe
 * un parametro tomara el id como "fMain"
 * @param {String} form id del formulario
 * @returns {void}
 * @author Johnny Alexander Salazar
 * @version 0.1
 */
function clean(form) {

    form = defualtForm(form);

    var campos = '#' + form + ' :input:text,\n\
                  #' + form + ' :input:password, \n\
                  #' + form + ' textarea';

    $(document).ready(function() {
        $(campos).each(function() {
            var elemento = this;
            if (elemento.value) {
                document.getElementById(elemento.id).value = "";
            }
        });
    });

    cleanLabelError(form);
}


/**
 * Limpia label de error de un formulario, si no recibe
 * un parametro tomara el id como "fMain"
 * @param {String} form id del formulario
 * @returns {void}
 * @author Johnny Alexander Salazar
 * @version 0.1
 */
function cleanLabelError(form) {

    form = defualtForm(form);

    $("#" + form).find('.msgError').each(function() {
        var elemento = this;
        document.getElementById(elemento.id).innerHTML = "";
    });
}

/**
 * Determina si debe o no colocar el form generico, si no recibe
 * un parametro tomara el id como "fMain"
 * @param {String} form id del formulario
 * @returns {String} id del form generico si no recibe parametro
 * @author Johnny Alexander Salazar
 * @version 0.1
 */
function defualtForm(form) {
    if (!form) {
        form = "fMain";
    }
    return form;
}


/**
 * Abre un fancybox que se indique
 * @param {String} idDiv id del div que se quiere mostrar
 * @returns {void}
 * @author Johnny Alexander Salazar
 * @version 0.1
 */
function showWindow(idDiv) {

    if (!idDiv) {
        idDiv = "divWindow";
    }

    $.fancybox({
        href: '#' + idDiv,
        afterClose: function() {
            clean(idDiv);
        }
    });
}


function showEraseWindow(idDiv) {

    if (listdata.length > 0) {
        if (!idDiv) {
            idDiv = "divErase";
        }

        var listtemp = listdata.slice();
        iddata = listtemp.shift();

        $.fancybox({
            href: '#' + idDiv

        });
    } else {
        showMessage(messageSelected);
    }
}

/**
 * Cierra el fancybox que se encuentre activo 
 * @returns {void}
 * @author Johnny Alexander Salazar
 * @version 0.1
 */
function closeWindow() {
    $.fancybox.close(true);
}



function selRadio(val, id) {
    if (!id) {
        id = "radio";
    }
    $("#" + id + val).prop("checked", true);
}

function cleanData() {
    $("input[name='gradio']").prop("checked", false);
    listdata = "";
    iddata = "";
}


function fixList(list) {
    return list.replace(/%/g, "\"");
}

function updateData(vec) {
    listdata = vec;
}


function loadData(form) {

    if (listdata.length > 0) {
        var listtemp = listdata.slice();
        form = defualtForm(form);
        iddata = listtemp.shift();
        var campos = '#' + form + ' :input:text,\n\
                  #' + form + ' :input:password, \n\
                  #' + form + ' textarea';

        $(document).ready(function() {
            $(campos).each(function() {
                var elemento = this;
                elemento.value = listtemp.shift();
            });

        });

        showWindow();
    } else {
        showMessage(messageSelected);
    }
}