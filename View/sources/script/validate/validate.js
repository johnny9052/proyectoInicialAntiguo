/******************INPUTS VALIDATIONS*****************************************/

var messageMissed = "este campo es obligatorio";//mensaje de obligatorio
var messageSelected = "por favor seleccione un registro";
var statusValidate;//estado de la validacion


/**
 * Valida todos los inputs required de un formulario (si recibe el parametro
 * tomara el id, si no evaluara el form "fMain"), para determinar si son 
 * validos o no, para determinar el retorno verifica si tiene un patron 
 * especificado, si lo tiene muestra el mensaje para el patron, si no es que 
 * solo mostrara un valor de que ingrese el valor
 * @param {String} form id del formulario
 * @returns {boolean} true si es correctamente validado, false si tiene errores
 * en la validacion
 * @author Johnny Alexander Salazar
 * @version 0.2
 */
function validate(form) {

    statusValidate = true;

    form = defualtForm(form);

    $(document).ready(function() {
        $("#" + form).find(':input').each(function() {
            var elemento = this;
            if (!elemento.validity.valid) { //es valido?
                if ($('#' + elemento.id).attr('dataPattern')) { //tiene un patron?
                    document.getElementById("msg_" + elemento.name).innerHTML = $('#' + elemento.id).attr('dataPattern');
                } else { //entonces solo es que no lo llenaron
                    document.getElementById("msg_" + elemento.name).innerHTML = messageMissed;
                }
                statusValidate = false;//como se encontro uno malo entonces false
            }

        });
    });
    return statusValidate;
}


/**
 * Valida todos los inputs required de un formulario (si recibe el parametro
 * tomara el id, si no evaluara el form "fMain"), para determinar si son 
 * validos o no, si no son validos muestra un mensaje emergente con los campos
 * que se solicita que sean llenados
 * @param {String} form id del formulario
 * @returns {boolean} true si es correctamente validado, false si tiene errores
 * en la validacion
 * @author Johnny Alexander Salazar
 * @version 0.2
 */
function validateApprise(form) {

    statusValidate = true;
    var messageApprise = "";

    form = defualtForm(form);

    $(document).ready(function() {
        $("#" + form).find(':input').each(function() {
            var elemento = this;
            if (!elemento.validity.valid) { //es valido?
                //añade el nombre del label que su input esta malo
                messageApprise += $('#' + elemento.id).attr('data') + ",";
                statusValidate = false;
            }
        });
    });

    if (String(messageApprise) !== String("")) {//se encontraron inputs malos?
        //muestre el mensaje eliminando su ultimo caracter el cual es una ","
        showMessage("Por favor verifique: " + messageApprise.substring(0, messageApprise.length - 1));
    }

    cleanLabelError(form);//borramos el texto de error existente
    return statusValidate;
}



