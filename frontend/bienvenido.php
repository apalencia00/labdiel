
<?php 

error_reporting(E_ALL);

require_once '../backend/Model/Modulo.php';


if(!isset($_SESSION)) 
{ 
  session_start(); 
}

if( $_SESSION['admon_mod'] != 0 || $_SESSION['admon_mod'] != "" || $_SESSION['admon_mod'] != null  )  {


  $usuario = $_SESSION['admon_mod'];
  
  $us = $usuario[0]['nusuario'];
  

  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>:: Laboratorio Dielectrico</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-notifications.css">
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="bootstrap/css/docs.js" ></script>

    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>

    <style type="text/css">
      
      .full {
    width: 100%;  
}
.gap {
  height: 30px;
  width: 100%;
  clear: both;
  display: block;
}
.footer {
  background: #EDEFF1;
  height: auto;
  padding-bottom: 30px;
  position: relative;
  width: 100%;
  border-bottom: 1px solid #CCCCCC;
  border-top: 1px solid #DDDDDD;
}
.footer p {
  margin: 0;
}
.footer img {
  max-width: 100%;
}
.footer h3 {
  border-bottom: 1px solid #BAC1C8;
  color: #54697E;
  font-size: 18px;
  font-weight: 600;
  line-height: 27px;
  padding: 40px 0 10px;
  text-transform: uppercase;
}
.footer ul {
  font-size: 13px;
  list-style-type: none;
  margin-left: 0;
  padding-left: 0;
  margin-top: 15px;
  color: #7F8C8D;
}
.footer ul li a {
  padding: 0 0 5px 0;
  display: block;
}
.footer a {
  color: #78828D
}
.supportLi h4 {
  font-size: 20px;
  font-weight: lighter;
  line-height: normal;
  margin-bottom: 0 !important;
  padding-bottom: 0;
}
.newsletter-box input#appendedInputButton {
  background: #FFFFFF;
  display: inline-block;
  float: left;
  height: 30px;
  clear: both;
  width: 100%;
}
.newsletter-box .btn {
  border: medium none;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -o-border-radius: 3px;
  -ms-border-radius: 3px;
  border-radius: 3px;
  display: inline-block;
  height: 40px;
  padding: 0;
  width: 100%;
  color: #fff;
}
.newsletter-box {
  overflow: hidden;
}
.bg-gray {
  background-image: -moz-linear-gradient(center bottom, #BBBBBB 0%, #F0F0F0 100%);
  box-shadow: 0 1px 0 #B4B3B3;
}
.social li {
  background: none repeat scroll 0 0 #B5B5B5;
  border: 2px solid #B5B5B5;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -o-border-radius: 50%;
  -ms-border-radius: 50%;
  border-radius: 50%;
  float: left;
  height: 36px;
  line-height: 36px;
  margin: 0 8px 0 0;
  padding: 0;
  text-align: center;
  width: 36px;
  transition: all 0.5s ease 0s;
  -moz-transition: all 0.5s ease 0s;
  -webkit-transition: all 0.5s ease 0s;
  -ms-transition: all 0.5s ease 0s;
  -o-transition: all 0.5s ease 0s;
}
.social li:hover {
  transform: scale(1.15) rotate(360deg);
  -webkit-transform: scale(1.1) rotate(360deg);
  -moz-transform: scale(1.1) rotate(360deg);
  -ms-transform: scale(1.1) rotate(360deg);
  -o-transform: scale(1.1) rotate(360deg);
}
.social li a {
  color: #EDEFF1;
}
.social li:hover {
  border: 2px solid #2c3e50;
  background: #2c3e50;
}
.social li a i {
  font-size: 16px;
  margin: 0 0 0 5px;
  color: #EDEFF1 !important;
}
.footer-bottom {
  background: #E3E3E3;
  border-top: 1px solid #DDDDDD;
  padding-top: 10px;
  padding-bottom: 10px;
}
.footer-bottom p.pull-left {
  padding-top: 6px;
}
.payments {
  font-size: 1.5em; 
}


    </style>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

       <script type="text/javascript">

      function callPaget(page){

        if(page != ""){

          window.frames[0].location.href = page;
        }
      }

      function CerrarSesion(){

        var r = confirm("¿Desea cerrar sesión?");
        if (r == true) {

         $.ajax({ url: "../back-end/Source/CerrarSession.php", 
           type: "GET",
           contentType: "application/json",
           dataType: 'json',
           data: {}, 

           success: function(json){

             var res = json.success;                     
             
             if(res){
              window.location = '../index.php';
            }else{
              alert(json.root[0].mensaje);
            }

          }

        });

       } else {
        alert("Error al intentar cerrar sesión");
      }

      

    }

  </script>

</head>
<body onload="javascript:callPaget('<?php echo "Estadistico.php?" ?>')" >

 <div class="container">

  <!-- Static navbar -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Labs.| Dielectrico</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
         <li><a href="#" onClick="callPaget('Estadistico.php')">Estadistico</a></li>

         <?php            

         $mod = new Modulo();

         foreach ($mod->getModule() as $v) {  ?>
         <li class="dropdown">
           <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $v['ID_MODULE'] ?>"> <?php echo $v['MODULOS'] ?> <span class="caret"></span></a>
           <ul class="dropdown-menu">

            <?php

            foreach ($mod->getSubMenu($us,$v['ID_MODULE']) as $s) {  ?>
            <li><a href="#" onclick="callPaget('<?php echo $s['mod'] ?>')" ><?php echo $s['MODULO']  ?></a></li> 

            <?php } ?>


          </ul>
          </li>
          <?php }  ?>
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="./" onclick="CerrarSesion();" >Salir <span class="sr-only">(current)</span></a></li>
            
          </ul>
        </div><!--/.nav-collapse -->
      </div><!--/.container-fluid -->
    </nav>

    <!-- Main component for a primary marketing message or call to action -->
    <div class="container">

      <iframe  frameborder="0" scrolling="no" height="1000px" width="100%"  name="servicio" id="servicio" allowfullscreen ></iframe>   

    </div>

  </div> <!-- /container -->
 <div class="footer-bottom">
        <div class="container">
            <div class="pull-left"> Developed © Andres Palencia Florez.</div>
            <div class="pull-right">
                <ul>

                 <ul class="social">
                        <li> <a href="#"> <i class=" fa fa-facebook">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-twitter">   </i> </a> </li>
                        <li> <a href="#"> <i class="fa fa-google-plus">   </i> </a> </li>
                       
                        <li> <a href="#"> <i class="fa fa-youtube">   </i> </a> </li>
                    </ul>
                   
                </ul> 
            </div>
        </div>
    </div> <!--/.footer-bottom--> 


</body>


</html>

<?php }
else{

  header("Location: 500.php");

  unset($_SESSION['admon_mod']);
  
        // DESTROY COOKIE
  if (isset($_COOKIE['key'])) {
    unset($_COOKIE['key']);
    setcookie('key', '', time() - 3600, '/');

  }


} ?>