<?php

    session_start();
    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();/*przekierowanie wstrzymanie dalszych operacji*/
    }
$connect = mysqli_connect("localhost", "root", "", "fitness"); 
?>

<!DOCTYPE HTML>
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
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
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
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="grafikZAL.php">KALENDARZ ZAJĘĆ</a></li>
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="sklep.php">SKLEP</a></li>
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="cennik.php">CENNIK</a></li>
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="kontakt.php">KONTAKT</a></li>
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
                   
                    <li style="padding-right: 20px;">
                        <a href="#" id="koszyk_container">
                        <div style="float: left;  padding-right: 10px;">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                        </div>
                        <div style="float: left;">
                            <p style="float: left; padding-right: px;">Koszyk</p><span style="float: left; margin-top: 2px;" class="badge shopping-badge"><?php if(isset($_SESSION["shopping_cart"])) { echo count($_SESSION["shopping_cart"]); } else { echo '0';}?></span>
                        </div>
                        <div style="float: left; padding-left: 10px;" >
                             <span class='caret'></span>    
                        </div>
                        
                        </a>
                          <ul>
                               <li><a href="pokazkoszyk.php">Pokaż koszyk</a></li>
                              <li><a href="zamowienie.php">Zamówienia</a></li>
                          </ul>
                     </li>
                    
                  </ul>
                
                </div><!-- /.navbar-collapse -->
                  
              </div><!-- /.container-fluid -->
            </nav>
            
            <!-- koniec navbar -->
        <div class="container-fluid" style=" padding-top: 15%;">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8" id="koszyk_wiadomosc">
                
                </div>
                <div class="col-md-2"></div>
            </div>
              <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="panel panel-primary">
                            <div class="panel-heading panel-koszyk"><center><h4>TWOJE ZAMÓWIENIA</h4></center></div>
                            
                            <div class="panel-body">
                                <div class="row">
                                    <?php
                                    
                                    $user = $_SESSION['uzytkownik_id'];
                                    
                                     $query = "SELECT * FROM zamowienia INNER JOIN zamowienia_szczegoly WHERE uzytkownik_id = '$user'";  
                                     $result = mysqli_query($connect, $query); 
                                    if (!$result) {
    printf("Error: %s\n", mysqli_error($connect));
    exit();
}
                                     while($row = mysqli_fetch_array($result))  
                                     {  
                                     ?>  
                                    <table class="col-md-12 tabelazajecia" > 
                          <tr>
                              <th class="col-md-2 tabela_zajecia_szczegoly tb">
                                 <h4><b><?php echo $row["zamowienie_id"]; ?></b></h4> 
                              </th>
                             <th class="col-md-2 tabela_zajecia_szczegoly tb">
                                 <h4><b><?php echo $row["data_zamowienia"]; ?></b></h4> 
                              </th>
                              <th class="col-md-2 tabela_zajecia_szczegoly tb" style="text-align: center;">
                               <h4><?php echo $row["status_zamowienia"]; ?></h4> 
                              </th>
                              <th class="col-md-2 tabela_zajecia_szczegoly tb" style="text-align: center;">
                               <h4><?php echo $row["platnosc"]; ?></h4> 
                              </th>
                              
                               <th class="col-md-2 tabela_zajecia_szczegoly tb" style="text-align: center;">
                               <h4><?php echo $row["produkt_nazwa"]; ?></h4> 
                              </th>
                                <th class="col-md-1 tabela_zajecia_szczegoly tb" style="text-align: center;">
                               <h4><?php echo $row["produkt_ilosc"]; ?></h4> 
                              </th>
                              <th class="col-md-1 tabela_zajecia_szczegoly tb" style="text-align: center;">
                               <h4><?php echo $row["produkt_cena"]; ?></h4> 
                              </th>
                            
                              
                                </th>
                              <th class="col-md-1">
                              </th>
                        </tr>
                       
                </table>
                                     <?php  
                                     }  
                                     ?>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-2"></div>
                    
                </div>
                
            
        </div>
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
            <!--- <div class="col-md-4 stopka">
                <h3>Bezpieczne płatności zapewnia</h3>
                <img src="dotpay.png" witdh="100px" height="50px;"/>
            </div> --->
                
            </div>
            <div class="col-md-12 copyright">
                <div class="container">
                    Copyright ©2017 Fitness Factory
                
                </div>
            </div>
        </nav>
</body>

</html>