<?php 
  require_once 'C:\xampp\htdocs\Proyecto\Rutas\AccesoADatos\mysqlclass.php';

class loginServices{
    
    private function query($query){
        $resultQuery='';
        $mysql=new mysql();
        $resultQuery=$mysql->query($query);
        return $resultQuery;
    }
    
    public function validarUsuario($usuario,$password){
        $data='';
        $resultQuery='';
        $username='';
        $typeuser='';
        try{
            
            $query="select username,typeuser FROM  user  WHERE username = '$usuario' AND password ='$password'";
            $resultQuery=$this->query($query);
            while ($result = mysql_fetch_row($resultQuery)){
             $username=$result[0];
             $typeuser=$result[1];
            }
            
        }catch(Exception $e){
           $data['error']='Error validando usuario'; 
        }

        $users=array('username'=>$username,'typeuser'=>$typeuser);
        
        $data['error']='';
        $data['validateuser']=$users;
        
        return $data;
    }
}









?>
