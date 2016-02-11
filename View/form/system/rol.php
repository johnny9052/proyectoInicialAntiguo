<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gestion roles</title>        
        <!--SCRIPTS FORM-->
        <script type="text/javascript" src="View/sources/script/javascript/rol.js"></script>                
    </head>
    <body>

        <!--PRINCIPAL VIEW-->
        <fieldset>
            <legend><label>Roles del sistema</label></legend>
            <form>

                <div id="divButtons"> 
                    <input type="button" value="Agregar" onclick="showWindow();
                            cleanData()"> 
                    <input type="button" value="modificar" onclick="loadData();">
                    <input type="button" value="eliminar" onclick="showEraseWindow();">
                </div>                                
                <div id="listInfo" class="listInfo">                    
                    
                </div>

            </form>
        </fieldset>
        <!--END PRINCIPAL VIEW-->

        <!--ERROR MESSAGE-->
        <label class="msgError" id="msg"></label>
        <!--END ERROR MESSAGE-->

        <!--PRINCIPAL MANAGEMENT VIEW-->
        <div class="window">
            <div id="divWindow" class="window-sub">
                <form id="fMain">
                    <table>
                        <tr>
                            <td>
                                <label for="txtName">Nombre rol:</label>
                            </td>
                            <td>
                                <input type="text" id="txtName" name="name" required="required" data="Nombre">
                                <label id="msg_name" class="msgError"></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="txtDescription">Descripcion</label>
                            </td>
                            <td>
                                <textarea id="txtDescription" name="description"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="listButtons">
                                <input type="button" value="guardar" onclick="save()">                                                                
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" class="imgLoading">

                            </td>
                        </tr>

                    </table>
                </form>
            </div>
        </div>
        <!--END PRINCIPAL MANAGEMENT VIEW-->

        <!--CALL COMMONS-->
        <?php
        include("View/form/common/eraseWindow.php");
        ?>
    </body>
</html>
