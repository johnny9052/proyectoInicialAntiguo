<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <!--FORM DELETE-->
        <div class="window">
            <div id="divErase" class="window-sub window-sub-erase">
                <form>
                    <table>
                        <tr>
                            <td colspan="2">
                                <label>¿Desea eliminarlo?</label>
                                <br>
                                <br>
                            </td>                            
                        </tr>                        
                        <tr>
                            <td>
                                <input type="button" value="eliminar" onclick="erase()">                                                                
                            </td>

                            <td>
                                <input type="button" value="cancelar" onclick="closeWindow()">                                                                
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
        <!--END FORM DELETE-->

    </body>
</html>
