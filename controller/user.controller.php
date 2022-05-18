<?php
   // require_once "../model/dao/user.dao.php";
    // require_once "../model/dto/user.dto.php";

    class UserController{

        public function getVerifyPass($user,$pass){

            try{

                $objDtoUser = New User();
                $objDtoUser -> setUser($user);
                $objDtoUser -> setPassword($pass);

                $objDaoUser = new UserModel($objDtoUser);

                if (gettype($objDaoUser -> getQueryLogin() -> fetch()) == "boolean"){
                    
                    print "
                    <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                      })
                    </script>";
                }else{
                    $_SESSION["login"] = true;
                    header("location: index.php");
                }
            }catch(exception $e){

                print "There was a mistake on the creation of the controller";
        }
    }
        public function setInsertUser($name,$lastName,$user,$pass){
            try {
                $objDtoUser = new User();
                $objDtoUser -> setName($name);
                $objDtoUser -> setLastname($lastName);
                $objDtoUser -> setUser($user);
                $objDtoUser -> setPassword($pass);  

                $objDaoUser = new UserModel($objDtoUser);
                if($objDaoUser -> mldInsertUser()){
                    ;
                }

            } catch (Exception $e) {
                print "error en el controlador de insercion".$e ->getMessage();
            }
            

        }//fin controlador insercion

        public function getSearchAllUser(){
            $respon = false;
            try {
                $objDtoUser = new User();
                $objDaoUser = new UserModel($objDtoUser);
                $respon = $objDaoUser -> mldSearchAllUser() -> fetchAll();
            } catch (Exception $e) {
                print "there was a mistake on the creation of the display controller ". $e -> getMessage();
            }
            return $respon;
        }//FIN DE MOSTRAR TODOS

        public function setUpdateUser($code, $name, $lastName, $user, $pass){
            try {
                $objDtoUser = new User();
                $objDtoUser -> setCode($code);
                $objDtoUser -> setName($name);
                $objDtoUser -> setLastname($lastName);
                $objDtoUser -> setUser($user);
                $objDtoUser -> setPassword($pass);  
                $objDaoUser = new UserModel($objDtoUser);
                if($objDaoUser -> mldUpdateUsuario()){
                    echo "<script>
                    Swal.fire(
                        'Actualizado!',
                        'El registro ha sido actualizado',
                        'success'
                    )
                    </script>";
                }
            } catch (Exception $e) {
                print "error al modificar".$e ->getMessage();
            }
        }

        
    }

    


?>