/*****************PARAMETERS SEND INFO AJAX****************************/


/**
 * Prepara un dato para ser añadido al array de datos que seran enviados por 
 * ajax
 * @param {String} key Nombre del dato
 * @param {String} value Valor del dato
 * @returns {String} el dato codificado
 * @author Johnny Alexander Salazar
 * @version 0.2
 */
function newArg(key, value) {
    return key + "=" + encodeURIComponent(value);
}


/**
 * Scanea un formulario, detecta los input tipo text y password, y añade
 * sus valores a un array para ser enviados por post. Adicionalmente añade por 
 * defecto el valor type mandado por parametro y un id que es el elemento global
 * que se encuentre seleccionado
 * @param {String} type : Valor por defecto que se almacenara en el array
 * @param {String} form : Id del formulario donde se encuentran los inputs
 * @returns {Array} Array con los datos del form concatenados por la letra &
 * @author Johnny Alexander Salazar
 * @version 0.2
 */
function scanArg(type, form) {

    showLoading(type);

    var arrayParameters = new Array();

    form = defualtForm(form);

    arrayParameters.push(newArg("type", type));
    arrayParameters.push(newArg("id", iddata));

    var campos = '#' + form + ' :input:text,\n\
                  #' + form + ' :input:password, \n\
                  #' + form + ' textarea';

    $(document).ready(function() {
        $(campos).each(function() {
            var elemento = this;
            arrayParameters.push(newArg(elemento.name, elemento.value));
        });

    });
    return arrayParameters.join('&');
}


/**
 * Recibe la respuesta de ajax cuando guarda, elimina o modifica, indicando que 
 * la operacion fue exitosa o no, listando la informacion y cerrando el fancy
 * @param {String} res : Respuesta por ajax
 * @returns void 
 * @author Johnny Alexander Salazar
 * @version 0.1
 */
function action_processResponse(res) {
    document.getElementById("log").innerHTML = res;
    var info = eval("(" + res + ")");
    closeLoading();
    if (info[0].res == 1) {
        cleanData();
        closeWindow();
        list();
        showMessage(info[0].msj);
    } else {
        if (info[0].res == 0) {
            showMessage(info[0].msj);
        } else {
            document.getElementById("msg").innerHTML = info[0].msg;
        }
    }
}

/**
 * Recibe la respuesta de ajax cuando se quiere listar, muesta la respuesta
 * en el elemento listInfo
 * @param {String} res : Respuesta por ajax
 * @returns void 
 * @author Johnny Alexander Salazar
 * @version 0.1
 */
function list_processResponse(res) {
    //document.getElementById("log").innerHTML = res;  
    //alert(res);
    var info = eval("(" + res + ")");
    document.getElementById("listInfo").innerHTML = fixList(info[0].res);
}


/**
 * Recibe la respuesta de ajax cuando es login o logout
 * @param {String} res : Respuesta por ajax
 * @returns void 
 * @author Johnny Alexander Salazar
 * @version 0.1
 */
function session_processResponse(res) {
    //document.getElementById("log").innerHTML = res;
    var info = eval("(" + res + ")");
    closeLoading();
    if (info[0].response != 0) {
        location.href = ('index.php');
    }
    else {
        clean();
        document.getElementById("msg").innerHTML = info[0].msg;
    }
}


function showLoading(type) {
    try {
        if (type == "load") {
            $("#listInfo").html(loading);
        } else {
            $(".imgLoading").html(loading);
        }
    } catch (e) {
    }
}

function closeLoading(type) {
    try {
        if (type == "load") {
            $("#listInfo").html("");
        } else {
            $(".imgLoading").html("");
        }
    } catch (e) {
    }
}