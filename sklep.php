<?php   
 session_start();  
 if(!isset($_SESSION['zalogowany']))
    {
        header('Location: loginbd.php');
        exit();/*przekierowanie wstrzymanie dalszych operacji*/
    }
 $connect = mysqli_connect("localhost", "root", "", "fitness");  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
            <title>Fitness Factory | Zapraszamy!</title>
            <meta name="Description" content="Tu wpisz opis zawartości strony" />
            <meta charset="utf-8">
            <meta name="Keywords" content="Tu wpisz wyrazy kluczowe rozdzielone przecinkami" />
            <script type="text/javascript" src="main.js"></script>
           <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
       
      
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
            <script type="text/javascript" src="main.js"></script>
            <link href="css/bootstrap.min.css" rel="stylesheet">
		      <link href="css/navbar-footer.css" rel="stylesheet">
		
       <link href="https://fonts.googleapis.com/css?family=News+Cycle:400,700" rel="stylesheet">
	
          
      </head>  
      <body>  
           <br />  
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
                    <li class="menu_active" style="margin-right: 20px;"><a href="sklep.php">SKLEP</a></li>
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
          <br>
          <br>
          <br>
          <br>
          
           <div class="container" style="width:1100px;">  
                <h3 align="center">SKLEP</h3><br />  
                
               
                     <div id="products" class="tab-pane fade in active">  
                     <?php  
                     $query = "SELECT * FROM produkty";  
                     $result = mysqli_query($connect, $query);  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                     <div class="col-md-3" style="margin-top:12px;">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:470px;" align="center">  
                               <img src="img/<?php echo $row["produkt_image"]; ?>" class="img-responsive" /><br />  
                               <h4 class="tekst_nazwa_sklep"><?php echo $row["produkt_nazwa"]; ?></h4>  
                               <h4 class="cena"><?php echo $row["produkt_cena"]; ?> zł</h4>  
                               <input type="text" name="quantity" id="quantity<?php echo $row["produkt_id"]; ?>" class="form-control" value="1" /> 
                              
                               <input type="hidden" name="hidden_name" id="name<?php echo $row["produkt_id"]; ?>" value="<?php echo $row["produkt_nazwa"]; ?>" />  
                               <input type="hidden" name="hidden_price" id="price<?php echo $row["produkt_id"]; ?>" value="<?php echo $row["produkt_cena"]; ?>" /> 
                              
                               <input type="button" name="add_to_cart" id="<?php echo $row["produkt_id"]; ?>" style="margin-top:5px;" class="button-log form-control add_to_cart" value="Dodaj do koszyka" />
                               
                          </div>  
                     </div>  
                     <?php  
                     }  
                     ?>  
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
 