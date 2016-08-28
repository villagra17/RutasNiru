<?php  
    require_once  'C:\wamp\www\Proyecto\ModeladoDeDatos\loginServices.php';
    $loginservices=new loginServices();
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>unknown 0.1</title>

    <!-- Bootstrap Core CSS -->
    <link href="componentes/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- MetisMenu CSS -->
    <link href="componentes/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="componentes/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="componentes/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php  
         if($_POST){
           $username=$_POST['username'];
           $password=$_POST['password'];
           if(''!= $username and ''!=$password){
              $result=$loginservices->validarUsuario($username,$password);
              $valid_user=0;
              if(!empty($result['validateuser']['username'])){
                  $valid_user=1;
                  header ("Location:Vista/Home.php");
              }
           }
         } 
       ?> 

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Bienvenido</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" name="login" id="login" action="index.php" method="post">
                            <fieldset>
                                <?php if(isset($valid_user) and 0==$valid_user){?>
                                    <div class="alert alert-danger">
                                     Usuario Invalido !
                                    </div>
                                <?php } ?>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" >
                                  </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" >
                                </div>
                                                                                        
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
       
    <!-- jQuery -->
    <script src="componentes/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="componentes/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="componentes/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="componentes/dist/js/sb-admin-2.js"></script>

</body>

</html>
