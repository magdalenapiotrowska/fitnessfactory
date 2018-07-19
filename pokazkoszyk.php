<?php   
 session_start();  
 if(!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();/*przekierowanie wstrzymanie dalszych operacji*/
    }
 $connect = mysqli_connect("localhost", "root", "", "fitness");  



 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
          <title>Fitness Factory | Zapraszamy!</title>
          
		  <meta name="Description" content="Tu wpisz opis zawartości strony" />
          <meta name="Keywords" content="Tu wpisz wyrazy kluczowe rozdzielone przecinkami" />
          <link href="https://fonts.googleapis.com/css?family=News+Cycle:400,700" rel="stylesheet">
          <meta charset="utf-8">
           <link href="css/navbar-footer.css" rel="stylesheet">
           <link href="css/logowanie.css" rel="stylesheet">
          <link href="css/bootstrap.min.css" rel="stylesheet">
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
                   
                    <li style="padding-right: 20px;" >
                        <a href="#" id="koszyk_container">
                        <div style="float: left;  padding-right: 10px;">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                        </div>
                        <div style="float: left;" >
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
                    <div id="cart" class="col-md-8">
                        <div class="panel panel-primary" id="order_table">
                            <div class="panel-heading panel-koszyk"><center><h4>KOSZYK</h4></center></div>
                            <div class="panel-body">
                                
                                <div id="koszyk"></div>
                                <?php  
                                    if(empty($_SESSION["shopping_cart"]))  
                                    {  
                                        echo "Koszyk jest pusty";
                                    } else {
                                        
                                ?> 
                                <div class="row">
                                    
                                    <div class="col-md-5 koszykNapisLeft">Produkt nazwa</div>
                                    <div class="koszykNapisyRight" >
                                    <div class="col-md-1"></div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-1"style='text-align: right;'>Ilość</div>
                                    <div class="col-md-1"><center>Cena</center></div>
                                    <div class="col-md-2" style='text-align: right;' >Cena łączna</div>
                                    <div class="col-md-1" style='text-align: center;'></div>
                                    </div>
                                </div>
                                <?php
                                         $total = 0;  
                                         foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                         {                                               
                                    ?>  
                                
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-5 koszykNapisLeft"><?php echo $values["produkt_nazwa"]; ?></div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-1"style='text-align: right;'>
                                            <input type="text" name="quantity[]" id="quantity<?php 
                                             echo $values["produkt_id"]; ?>" value="<?php echo $values["product_quantity"]; ?>" 
                                                   data-produkt_id="<?php 
                                             echo $values["produkt_id"]; ?>" class="form-control quantity" />
                                        </div> 
                                        <div class="col-md-1"><?php echo $values["produkt_cena"]; ?> zł</div>
                                         <div class="col-md-2" style='text-align: right;' ><?php echo number_format($values["product_quantity"] * $values["produkt_cena"], 2); ?> zł</div>
                                         <div class="col-md-1" style='text-align: center;'><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["produkt_id"]; ?>">Usuń</button></div>
                                </div>
                                    <?php  
                                              $total = $total + ($values["product_quantity"] * $values["produkt_cena"]);  
                                         }  
                                    ?>  
                                    
                                    <br><br>
                                   
            
                                    <div class='row'>
                                        <div class='col-md-6'></div>
                                        <div class='col-md-6 podsumowanie'>
                                        <div class='row'>
                                            <div class='col-md-12' style='padding-bottom: 5px;'><b>Podsumowanie zamówienia</b></div>
                                            <div class='col-md-6'>Produkty łącznie:</div>
                                            <div class='col-md-6' style='text-align: right;'><?php echo number_format($total, 2); ?> zł</div>
                                            <div class='col-md-6'>Dostawa </div>
                                            <div class='col-md-6' style='text-align: right;'>0,00 zł - odbiór osobisty</div>

                                            <div class='col-md-6 line'>Razem do zapłaty: </div>
                                            <div class='col-md-6 line' style='text-align: right;'><?php echo number_format($total, 2); ?> zł</div>
                                            
                                        </div>
                                        </div>
                                    </div>
                                        <div class='row'>
                                            <div class='col-md-12'>
                                        <div class='row'>
                                           
                                             <form id="form2" method="post" action="koszyk.php">
                                                 
                                                 
                                                 
                                                 <div class="col-md-12">Proszę wybrać formę płatności:</div>
                                                    <br><br>
                                                   <div class="col-md-6" style="padding-top: 20px;">
                                                       <div class="panel panel-primary">
                                                        <div class="panel-body">

                                                            <div class="row">
                                                                 <div style="display:flex;justify-content:center;align-items:center;">
                                                                     <label class="radio-inline">
                                                                        <input type="radio" id="forma" name="forma" value="Gotówka - płatność przy odbiorze" />
                                                                     </label>
                                                                </div>
                                                                <div style="display:flex;justify-content:center;align-items:center;"><img width="150px" height="150px" src="img/cash.png"><br></div>
                                                                <div style="display:flex;justify-content:center;align-items:center;"><p>Gotówka - płatność przy odbiorze</p></div>

                                                            </div>

                                                        </div>
                                                       </div>
                                                    </div>
                                                 <div class="col-md-6" style="padding-top: 20px;">
                                                        <div class="panel panel-primary" >
                                                        <div class="panel-body">

                                                            <div class="row">
                                                                 <div style="display:flex;justify-content:center;align-items:center;">
                                                                     <label class="radio-inline">
                                                                        <input type="radio" id="forma" name="forma" value="Przelew bankowy" />
                                                                     </label>
                                                                </div>
                                                                <div style="display:flex;justify-content:center;align-items:center;"><img width="150px" height="150px" src="img/przelew.png"><br></div>
                                                                <div style="display:flex;justify-content:center;align-items:center;"><p>Przelew bankowy</p></div>

                                                            </div>
                                                        </div>
                                                       </div>

                                                </div>
                                                         <input  type="submit" name="place_order" class="button-wyslij" value="Wyślij zamówienie" />  
                                                        </form> 
                                        </div>
                                                               
                                    <?php  
                                    }  
                                    ?>
                                            </div>
                                     
                                        </div>
                                   
                                    </div>
                                        
                                        </div>
                                  
                                 </div> 
                  <div class="col-md-2"></div>
                    
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