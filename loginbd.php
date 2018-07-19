<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: gra.php');
		exit();
	}

?>

<!DOCTYPE html>
<html lang="pl">
	<head>
		<title>Fitness Factory | Zapraszamy!</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/navbar-footer.css" rel="stylesheet">
		<link href="css/logowanie.css" rel="stylesheet">
		<meta name="Description" content="Tu wpisz opis zawartości strony" />
	    <meta name="Keywords" content="Tu wpisz wyrazy kluczowe rozdzielone przecinkami" />
       <link href="https://fonts.googleapis.com/css?family=News+Cycle:400,700" rel="stylesheet">
	
		<meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="scroll.js"></script>
        
       
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
                    <li class="menu_active" style="margin-right: 20px;"><a href="index.php">O FIRMIE <span class="sr-only">(current)</span></a></li>
                       <li class="menu_active_hover" style="margin-right: 20px;"><a href="oferta.php">OFERTA</a></li>
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="grafikZAL.php">KALENDARZ ZAJĘĆ</a></li>
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="sklep.php">SKLEP</a></li>
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="cennik.php">CENNIK</a></li>
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="kontakt.php">KONTAKT</a></li>
                     <li class="button-log"><a href="login.php">ZALOGUJ SIĘ</a></li>
                    <li class="button-log"><a href="rejestracja.php">ZAREJESTRUJ SIĘ</a></li>
                    
                    
                  </ul>
                
                </div><!-- /.navbar-collapse -->
                  
              </div><!-- /.container-fluid -->
            </nav>
            
            <!-- koniec navbar -->
            
            <div class="log-container">
                
                <form action="logowanie.php" method="post" class="logowanie_ramka">
                    <div class="col-md-12 pudelkoLog">
                    <h3>Aby uzyskać dostęp do tej strony ZALOGUJ SIĘ</h3>
                    Login:
                    <input class="login" name="login" type="text"/>
                    <br/><br/>
                    Hasło:
                    <input class="login" name="haslo" type="password"/>
                    <br/><br/>
                    <a href="rejestracja.php">Nie masz konta? Zarejestruj się!</a>
                    <input class="button-log2" type="submit" value="ZALOGUJ SIĘ"/>
                    </div>
                    <?php
                    if(isset($_SESSION['blad'])) 
                    {
                        echo $_SESSION['blad'];
                        unset($_SESSION['blad']);
                    }
                    ?>
                </form>
                    
            </div>
        
      
        
        
		
        
    </body>
    
    
</html>