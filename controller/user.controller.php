<?php
   // require_once("../Model/Dao/User.dao.php");
    //require_once("../Model/Dto/User.dto.php");
    class UserController{
        public function getVerifyPass($user, $password){
            try{
            $objDtoUser = new User();
            $objDtoUser -> setUser("$user");
            $objDtoUser -> setPassword($password);

      
            $objDaoUser = new UserModel($objDtoUser);

            
            if (gettype($objDaoUser -> getQueryLogin() -> fetch()) == 'boolean'){
            echo "

            <script>
            Swal.fire({
                imageUrl: 'https://dibujoskawaii.net/wp-content/uploads/2018/05/caritas-png-kawaii-1.png',
                imageWidth: 150,
                icon: 'error',
                title: 'Oops...',
                text: 'Usuario y/o contraseña incorrectos :(',
                
              })
            </script>

            ";
            } else{
                $_SESSION['login'] = true;
                header('location:index.php');
            }
             
    

            } catch(Exception $e){
                echo "error al crear el controller"; 
            } 
        }
    }//fin


    //$objcontroller = new UserController();
    //$objcontroller -> getVerifyPass('lol', 'Samuel');
    
?>  