<!-- esto sera un probleema -->
<!--notas del profe
un privilegio
-->

<?php
            ///Controllers///
require_once 'Controller/user.controller.php';
require_once 'Controller/Template.controller.php';
                ///Model///
require_once 'Model/dao/user.dao.php';
require_once 'Model/dto/user.dto.php';
            //////conexion/////
require_once 'Model/conexion.php';


       //////// Arranque /////////
$objArranque = new Template();
$objArranque -> getIntro();

?>