<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ingreso al sistema</title>        
        <link href="View/sources/style/loguin.css" type="text/css" rel="stylesheet">
    </head>
    <body>

        <form id="fMain">
            <table class="loguin">
                <tr>
                    <td>
                        <label for="txtUser">Usuario</label>
                    </td>
                    <td>
                        <input type="text" id="txtUser" name="user" required="required" data="Usuario">
                    </td>                        
                </tr>

                <tr>
                    <td>
                        <label for="txtPassword">Contrase&ncaron;a</label>                        
                    </td>
                    <td>
                        <input type="password" id="txtPassword" name="password" required="required" data="Contrase&ncaron;a">
                    </td>                     
                </tr>

                <tr>
                    <td>

                    </td>
                    <td>
                        <input type="button" value="Ingresar" id="btnLoguin" onclick="login()">                       
                    </td>                
                </tr>

                <tr>
                    <td colspan="2" class="imgLoading">

                    </td>
                </tr>

                <tr>                
                    <td colspan="3">
                        <label class="msgError" id="msg"></label>
                    </td>                
                </tr>
            </table> 
        </form>
    </form>

</html>
