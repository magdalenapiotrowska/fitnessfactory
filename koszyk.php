<?php  
 //koszyk.php  
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
          <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/navbar-footer.css" rel="stylesheet">
		<link href="css/logowanie.css" rel="stylesheet">
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
                    <li class="menu_active_hover" style="margin-right: 20px;"><a href="grafik.php">KALENDARZ ZAJĘĆ</a></li>
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
                               <li><a href="koszyk.php">Pokaż koszyk</a></li>
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
          <br>
          <br>
          <br>
          <br>
          
           <div class="container" style="width:800px;">  
                <?php  
                if(isset($_POST["place_order"]))  
                {  
                    $forma=$_POST['forma'];

                    $_SESSION['forma']=$forma;


                    $user_id = $_SESSION["uzytkownik_id"];
                    
                     $insert_order = "  
                     INSERT INTO zamowienia(data_zamowienia, status_zamowienia, uzytkownik_id, platnosc)  
                     VALUES('".date('Y-m-d')."', 'w toku', '$user_id', '$forma')  
                     ";  
                     $order_id = "";  
                     if(mysqli_query($connect, $insert_order))  
                     {  
                          $order_id = mysqli_insert_id($connect);  
                     }  
                     $_SESSION["order_id"] = $order_id; 
                    $_SESSION['total'] =$total;
                     $order_details = "";  
                     foreach($_SESSION["shopping_cart"] as $keys => $values)  
                     {  
                         
                          $order_details .= "  
                          INSERT INTO zamowienia_szczegoly(zamowienie_id, produkt_nazwa, produkt_cena, produkt_ilosc, suma_zamowienia)  
                          VALUES('".$order_id."', '".$values["produkt_nazwa"]."', '".$values["produkt_cena"]."', '".$values["product_quantity"]."','".$total."');  
                          ";  
                     }  
                     if(mysqli_multi_query($connect, $order_details))  
                     {  
                          unset($_SESSION["shopping_cart"]);   
                          echo '<script>window.location.href="koszyk.php"</script>';  
                     }  
                }
               
                if(isset($_SESSION["order_id"]))  
                {  
                     
                     $order_details = '';  
                     $total = 0;  
                     $query = '  
                     SELECT * FROM zamowienia  
                     INNER JOIN zamowienia_szczegoly  
                     ON zamowienia_szczegoly.zamowienie_id = zamowienia.zamowienie_id  
                      
                     WHERE zamowienia.zamowienie_id = "'.$_SESSION["order_id"].'"  
                     ';  
                     $result = mysqli_query($connect, $query);  
                     while($row = mysqli_fetch_array($result))  
                     {  
                          
                          $order_details .= "  
                               <tr>  
                                    <td>".$row["produkt_nazwa"]."</td>  
                                    <td>".$row["produkt_ilosc"]."</td>  
                                    <td>".$row["produkt_cena"]."</td>  
                                    <td>".number_format($row["produkt_ilosc"] * $row["produkt_cena"], 2)."</td>  
                               </tr>  
                          ";  
                          $total = $total + ($row["produkt_ilosc"] * $row["produkt_cena"]);  
                     }  
                     echo '  
                     <h3 align="center">Podsumowanie<br>Numer zamówienia: '.$_SESSION["order_id"].'</h3>  
                     <div class="table-responsive">  
                          <table class="table">  
                               <tr> 
                                    <td style="color: white; text-align:center;"><label>Szczegóły zamówienia</label></td>  
                               </tr>  
                               <tr>  
                                    <td>  
                                         <table class="table table-bordered">  
                                              <tr>  
                                                   <th width="50%">Produkt nazwa</th>  
                                                   <th width="15%">Ilość</th>  
                                                   <th width="15%">Cena</th>  
                                                   <th width="20%">Cena łączna</th>  
                                              </tr>  
                                              '.$order_details.'  
                                              <tr>  
                                                   <td colspan="3" align="right"><label>Cena całkowita:</label></td>  
                                                   <td>'.number_format($total, 2).'</td>  
                                                   
                                              </tr>
                                              <tr>
                                              <td colspan="3" align="right"><label>Płatność:</label></td>  
                                                    
                                                   <td>'.$_SESSION["forma"].'</td>
                                              </tr>
                                             
                                         </table>  
                                         
                                    </td>  
                                
                                              </tr>
                                            
                               </tr>  
                               <tr> 
                                    <td style="color: white; text-align:center;"><label>Prosimy o dokonanie płatności wybranym sposobem w ciągu trzech dni od momentu zakupu. <br>Dane do konta bankowego znajdą Państwo w zakładce Kontakt.</label></td>  
                               </tr>
                          </table>  
                     </div>  
                     ';  
                }  
               
               
                ?>  
              
                                        
                                        

           </div>  
      </body>  
 </html> 
