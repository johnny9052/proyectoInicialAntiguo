$(document).ready(function() {
    list();
});

function save() {
    if (validate()) {
        if (!iddata) {
            var send = scanArg('save');
            $.post('Controller/system/managementRol.php', send, action_processResponse);
        } else {
            var send = scanArg('update');
            $.post('Controller/system/managementRol.php', send, action_processResponse);
        }
    }
}

function erase() {
    var send = scanArg('erase');
    $.post('Controller/system/managementRol.php', send, action_processResponse);
}


function list() {
    var send = scanArg('load');
    $.post('Controller/system/managementRol.php', send, list_processResponse);
}
