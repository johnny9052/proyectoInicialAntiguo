/*****************LOGIN FUNCTIONS*****************************************/
function login() {
    if (validateApprise()) {
        var send = scanArg('login');
        $.post('Controller/Login/managementLogin.php', send, session_processResponse);
    }
}

function logout() {
    var send = scanArg('logout');
    $.post('Controller/Login/managementLogin.php', send, session_processResponse);
}


