<?php

    session_start();
    if($_SESSION['uprawnienia'] == 0 )
    {
        header('Location: gra.php');
        exit();/*przekierowanie wstrzymanie dalszych operacji*/
    }
    
?>

<!DOCTYPE HTML>
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
    
<body style="color: white; background-image: none;">
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
                    <li class="button-log2" style="margin-right: 20px;"><a href="gra.php">PRZEJDŹ DO SERWISU JAKO <br>ZALOGOWANY UŻYTKOWNIK<span class="sr-only">(current)</span></a></li>
                     
                    <li style="padding-right: 20px;">
                        
                            <a href="#">
                            <div style="float: left; padding-right: 10px;" >
                                <span class="glyphicon glyphicon-user"></span>
                            </div>
                            <div style="float: left;  margin-top: -10px; color: #78b949;">
                            <?php
                                 echo "<p>Zalogowany:<br>".$_SESSION['user']."</p>";
                            ?>  
                               
                            
                            </div>
                            <div style="float: left; padding-left: 10px;" >
                                 <span class='caret'></span>    
                            </div>
                            </a>
                            <ul>
                                <li><a href="wylogowanie.php">Wyloguj się</a></li>
                       
                            </ul>
                         
                    </li>
                   
                    
                    
                  </ul>
                
                </div><!-- /.navbar-collapse -->
                  
              </div><!-- /.container-fluid -->
            </nav>
            
            <!-- koniec navbar -->
        
            
<!-- Zakładki -->
<ul class="nav nav-pills nav-stacked col-md-2" role="tablist" style="background-color: black; height: 100%;">
  <li class="active2"><a href="#1przyciskpion" role="tab" data-toggle="tab">UŻYTKOWNICY</a></li>
  <li><a href="#2przyciskpion" role="tab" data-toggle="tab">ZAMÓWIENIA</a></li>
  <li><a href="#3przyciskpion" role="tab" data-toggle="tab">REZERWACJA ZAJĘĆ</a></li>
  <li><a href="#4przyciskpion" role="tab" data-toggle="tab">ZAJĘCIA</a></li>
  <li><a href="#4przyciskpion" role="tab" data-toggle="tab">PRODUKTY</a></li>
</ul>

<!-- Zawartość zakładek -->
<div class="tab-content col-md-10">
  <div class="tab-pane active" id="1przyciskpion">Zawartość pierwszego przycisku</div>
  <div class="tab-pane" id="2przyciskpion">Zawartość drugiego przycisku</div>
  <div class="tab-pane" id="3przyciskpion">Zawartość trzeciego przycisku</div>
  <div class="tab-pane" id="4przyciskpion">Zawartość czwartego przycisku</div>
</div>
            
        
            
        
        
        
      
</body>

</html>