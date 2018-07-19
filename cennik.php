<?php
    
    session_start();
    if(isset($_SESSION['zalogowany']))
    {
        header('Location: cennikZAL.php');
        exit();/*przekierowanie wstrzymanie dalszych operacji*/
    }

?>


<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Fitness Factory | Zapraszamy!</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/navbar-footer.css" rel="stylesheet">
		<meta name="Description" content="Tu wpisz opis zawartości strony" />
	    <meta name="Keywords" content="Tu wpisz wyrazy kluczowe rozdzielone przecinkami" />
       <link href="https://fonts.googleapis.com/css?family=News+Cycle:400,700" rel="stylesheet">
	
		<meta charset="utf-8">
       
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="main.js"></script>
    
      
	</head>
	<body>
            
        <nav class="navbar navbar-default navbar-fixed-top navbarsklep">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="logo" href="#"><img src="img/logo.png" style="height: 70px;"></a>
                </div>

            
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="index.php">O FIRMIE <span class="sr-only">(current)</span></a></li>
                       <li class="menu_active_hover" style="margin-right: 20px;"><a href="oferta.php">OFERTA</a></li>
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="grafikZAL.php">KALENDARZ ZAJĘĆ</a></li>
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="sklep.php">SKLEP</a></li>
                    <li class="menu_active" style="margin-right: 20px;"><a href="cennik.php">CENNIK</a></li>
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="kontakt.php">KONTAKT</a></li>
                     <li class="button-log"><a href="login.php">ZALOGUJ SIĘ</a></li>
                    <li class="button-log"><a href="rejestracja.php">ZAREJESTRUJ SIĘ</a></li>
                    
                    
                  </ul>
                
                </div><!-- /.navbar-collapse -->
                  
              </div><!-- /.container-fluid -->
            </nav>
            
            <!-- koniec navbar -->
        
            
                
        
            
           <div style="height: 400px">
        
        
        </div>
        
        
        <nav class="navbar fixed-bottom navbar-light footer">
            <div class="container">
                
            <div class="col-md-4 stopka2">
                    <h4><a href="index.php">O Firmie</a></h4>
                    <h4><a href="oferta.php">Oferta</a></h4>
                    <h4><a href="grafikZAL.php">Kalendarz zajęć</a></h4>
                    <h4><a href="sklep.php">Sklep</a></h4>
                    <h4><a href="cennik.php">Cennik</a></h4>
                    <h4><a href="kontakt.php">Kontakt</a></h4>
            </div>
            <div class="col-md-4 stopka2">
                <h4><a href="index.php">Dostawa i płatności</a></h4>
                <h4><a href="regulamin.html">Regulamin</a></h4>
                <h4><a href="politykapryw.html">Polityka prywatności</a></h4>
                <h4><a href="kontakt.php">Kontakt</a></h4>
            </div>
            <div class="col-md-4 stopka">
                
            </div>
                
            </div>
            <div class="col-md-12 copyright">
                <div class="container">
                    Copyright ©2017 Fitness Factory
                
                </div>
            </div>
        </nav>
        
		
        
    </body>
    
    
</html>