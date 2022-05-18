<?php
        //require_once "../model/Conexion.php";
        //require_once "../Dto/User.dto.php";
    class UserModel{

        private $code;
        private $user;
        private $password;
        private $name;
        private $lastName;

        public function __construct($objDtoUser)
        {  
         $this-> code =    $objDtoUser-> getCode();
         $this-> user =    $objDtoUser-> getUser();
         $this-> password= $objDtoUser-> getPassword();
         $this-> name=     $objDtoUser-> getName();
         $this-> lastName= $objDtoUser-> getLastName();
        }

        public function getQueryLogin()
        {
            $sql = "SELECT * FROM USER WHERE USER = ? AND PASSWORD = ?";

            try {
                $objCon = new Conexion();

                $stmt = $objCon -> getConnect() -> prepare($sql);
                $stmt -> bindParam(1, $this->user, PDO::PARAM_STR);
                $stmt -> bindParam(2, $this->password, PDO::PARAM_STR);
                $stmt -> execute();
                $result = $stmt;


            } catch (exception $e) {
                echo "error al consultar usarios".$e -> getMessage();
            }
            return $result;
        }

    }
   

?>
