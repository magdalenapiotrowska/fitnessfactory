<?php

    session_start();
    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: opisyzajecNIE.php');
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
                    <li><a href="index.php">STRONA GŁÓWNA <span class="sr-only">(current)</span></a></li>
                    <li><a href="grafik.php">KALENDARZ ZAJĘĆ</a></li>
                    <li><a href="sklep.php">SKLEP</a></li>
                    <li><a href="cennik.html">CENNIK</a></li>
                    <li><a href="kontakt.html">KONTAKT</a></li>
                    <li class="zalogowany">
                        <div>
                            <div class="span">
                                <span class="glyphicon glyphicon-user"></span>
                            </div>
                            <div class="user">
                            <?php
                                 echo "<p>Zalogowany:<br>".$_SESSION['user']."</p>";
                            ?>  
                            </div>
                        </div>  
                    </li>
                    <li class="wylogowanie">
                        <div>
                            <a href="wylogowanie.php">Wyloguj się</a>
                        </div>
                    </li>
                    <li class="koszyk dropdown">
                        <a href="#" id="koszyk_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Koszyk<span class="badge">0</span>
                        <span class="caret"></span></a>
                         <ul class="dropdown-menu" style="width:10px;" role="menu" >
                            <a href="koszyk.php">Pokaz koszyk</a>
                        </ul>
                    </li>
                    
                  </ul>
                
                </div><!-- /.navbar-collapse -->
                  
              </div><!-- /.container-fluid -->
            </nav>
            
            <!-- koniec navbar -->
        <div class="container" style="margin-top:150px;">

            <div class="row">
                <h2>1.Zdrowy Kregosłup</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eget mi pulvinar augue viverra finibus ac et enim. Suspendisse dictum ante id dui sodales rutrum. Donec posuere ante id feugiat ornare. Nunc feugiat dictum arcu aliquet semper. Vestibulum a lorem pretium urna bibendum bibendum scelerisque quis velit. Suspendisse dui metus, faucibus ut velit sed, consequat laoreet enim. Ut elit sem, mattis ut iaculis ultricies, sagittis hendrerit elit. Suspendisse sed cursus diam, sit amet volutpat est. Proin dapibus ac neque vel malesuada. Curabitur quis erat ipsum. Suspendisse potenti. Fusce in metus et purus finibus sollicitudin vel eget arcu.</p>
                <h2>2.Zdrowy Kregosłup</h2>

            </div>
                
            
        </div>


      
    <!-- /.container -->
        
    
        <nav class="navbar fixed-bottom navbar-light footer">
            <div class="container">
                
            <div class="col-md-4 stopka2">
                    <h4><a href="index.php">Strona główna</a></h4>
                    <h4><a href="grafik.html">Kalendarz zajęć</a></h4>
                    <h4><a href="cennik.html">Cennik</a></h4>
            </div>
            <div class="col-md-4 stopka2">
                <h4><a href="index.php">Dostęp do płatności</a></h4>
                <h4><a href="index.php">Regulamin</a></h4>
                <h4><a href="index.php">Polityka prywatności</a></h4>
                <h4><a href="index.php">Kontakt</a></h4>
            </div>
            <div class="col-md-4 stopka">
                <h3>Bezpieczne płatności zapewnia</h3>
                <img src="dotpay.png" witdh="100px" height="50px;"/>
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