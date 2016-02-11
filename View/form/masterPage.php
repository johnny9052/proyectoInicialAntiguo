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
        <link href="View/sources/style/masterPage.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="View/sources/script/other/menu_jquery.js"></script>        
        <link href="View/sources/style/menu_jquery.css" type="text/css" rel="stylesheet">     

        <!--PLUGIN STYLE-EVENTS FANCYBOX -->
        <script type="text/javascript" src="View/sources/fancy/jquery.fancybox.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="View/sources/fancy/jquery.fancybox.css?v=2.1.5" media="screen" />
        <script type="text/javascript" src="View/sources/fancy/jquery.mousewheel-3.0.6.pack.js"></script>

    </head>
    <body onload="<?php
    if (!isset($_SESSION["user"])) {
        header('Index.php');
    }
    ?>">

        <table border="0" class="masterPage">
            <tr>
                <td class="banner" colspan="2">
                    BANNER
                </td>
            </tr>

            <tr>                
                <td class="info" colspan="2">
                    <table>
                        <tr>
                            <td class="infoUbicacion">
                                Ubicacion
                            </td>
                            <td class="infoUsuario">
                                <label>Usuario: </label><?php echo $_SESSION["username"] ?><label id="txtUserSystem"></label>
                                <input type="button" value="desconectar" onclick="logout();">
                            </td>
                        </tr>
                    </table>

                </td>

            </tr>

            <tr>
                <td class="menu">
                    <div id='cssmenu'>
                        <ul>
                            <li class='has-sub'><a href='index.html'><span>Sistema</span></a>
                                <ul>
                                    <li class='last'><a href='index.php?page=rol&type=system'><span>Roles</span></a>                                        
                                    </li>
                                    <li class='last'><a href='index.php?page=user&type=system'><span>Usuarios</span></a>                                        
                                    </li>
                                    <li class='last'><a href='index.php?page=account&type=system'><span>Mi cuenta</span></a>                                        
                                    </li>
                                </ul>
                            </li>
                            <li class='has-sub'><a href='#'><span>Products</span></a>
                                <ul>
                                    <li class='has-sub'><a href='#'><span>Product 1</span></a>
                                        <ul>
                                            <li><a href='#'><span>Sub Item</span></a></li>
                                            <li class='last'><a href='#'><span>Sub Item</span></a></li>
                                        </ul>
                                    </li>
                                    <li class='has-sub'><a href='#'><span>Product 2</span></a>
                                        <ul>
                                            <li><a href='#'><span>Sub Item</span></a></li>
                                            <li class='last'><a href='#'><span>Sub Item</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href='#'><span>About</span></a></li>
                            <li class='last'><a href='#'><span>Contact</span></a></li>
                        </ul>
                    </div>

                </td>

                <td class="contenido">
                    <?php
                    if (isset($_GET['page'])) {
                        include("View/form/" . $_GET['type'] . "/" . $_GET['page'] . ".php");
                    }
                    ?>
                </td>
            </tr>

            <tr>
                <td class="footer" colspan="2">
                    FOOTER
                </td>
            </tr>
        </table>                    
    </body>
</html>
