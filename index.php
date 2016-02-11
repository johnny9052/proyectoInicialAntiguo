<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">        

        <!-- Additional code -->        
        <script type="text/javascript" src="View/sources/script/jquery/jquery-1.9.1.js"></script>        
        <script type="text/javascript" src="View/sources/script/other/apprise-1.5.full.js"></script>        
        <!-- Global styles -->        
        <link href="View/sources/style/general.css" type="text/css" rel="stylesheet">
        <link href="View/sources/style/apprise.css" type="text/css" rel="stylesheet">      
        <!-- Global scripts -->        
        <script type="text/javascript" src="View/sources/script/ajax/ajax.js"></script>       
        <script type="text/javascript" src="View/sources/script/general/general.js"></script>
        <script type="text/javascript" src="View/sources/script/validate/validate.js"></script>
        <script type="text/javascript" src="View/sources/script/javascript/login.js"></script>
    </head>
    <body>

        <!-- Help!! Show error message -->        
        <label id="log"></label>

        <?php
        session_start();

        if (isset($_SESSION["user"])) {
            include("View/form/masterPage.php");
        } else {
            include("./View/form/login/login.php");
        }
        ?>


    </body>
</html>
