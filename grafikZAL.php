<?php
    
    session_start();
    if(!isset($_SESSION['zalogowany']))
    {
       header('Location: loginbd.php');
        exit();/*przekierowanie wstrzymanie dalszych operacji*/
    }
   

    $connect = mysqli_connect("localhost", "root", "", "fitness"); 
    $connect->query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    $connect->query("SET CHARSET utf8");

    
?>


<!DOCTYPE html>
<html lang="pl-PL">
	<head>
       <meta charset="UTF-8">
		<title>Fitness Factory | Zapraszamy!</title>
          <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/navbar-footer.css" rel="stylesheet">
		<link href="css/logowanie.css" rel="stylesheet">
		<meta name="Description" content="Tu wpisz opis zawartości strony" />
	    <meta name="Keywords" content="Tu wpisz wyrazy kluczowe rozdzielone przecinkami" />
       <link href="https://fonts.googleapis.com/css?family=News+Cycle:400,700" rel="stylesheet">
	
		  <script type="text/javascript" src="main.js"></script>
        
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
      
        <script type="text/javascript" src="main2.js"></script>
		

    
      
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
                    <li class="menu_active" style="margin-right: 20px;"><a href="grafikZAL.php">KALENDARZ ZAJĘĆ</a></li>
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
        

                
        <div style="height: 800px">
            
 


    <div style="justify-content:center;align-items:center; padding-top: 10%;"  class="container">
       <div class="col-md-12">
           <h3 style="color: white; text-align: center; padding-bottom: 10px;">Wybierz dzień zajęć:</h3>
          <form  name="Filter" method="POST">
       
            <input style="display: block;margin: 0 auto;" class="dzienZajec" type="date" name="dateFrom" value="<?php echo date('Y-m-d'); ?>" />
            <br/>
            <input style="display: block;margin: 0 auto; margin-bottom: 25px;" class="button-szukaj" type="submit" name="submit" value="Szukaj"/>
          </form>
        </div>
            <div id="demo">
             
                
                
            <?php  
                if (isset($_POST['dateFrom'])){
                    $new_date = date('Y-m-d', strtotime($_POST['dateFrom']));
                    $data_choose = date('d-m-Y', strtotime($_POST['dateFrom']));
                     $query = "SELECT * FROM zajecia WHERE zajecia_czas = '".$new_date."'"; 
                 
                    
                     $result = mysqli_query($connect, $query); 
                        
                     ?>
               
                <table class="col-md-12" style="margin-top: 15px;">
                  <tr class="col-md-12">
                   
                      <h4 class="naglowek">ZAJĘCIA W DNIU: <?php echo $data_choose ?></h4>
                  </tr>
                  <tr>
                       
                      <th class="col-md-2 tabela_zajecia"><h4 class="naglowek">Zajęcia</h4></th>
                      <th class="col-md-2 tabela_zajecia"><h4 class="naglowek">Godzina</h4></th>
                      <th class="col-md-2 tabela_zajecia"><h4 class="naglowek">Czas trwania</h4></th>
                      <th class="col-md-2 tabela_zajecia"><h4 class="naglowek">Instruktor</h4></th>
                      <th class="col-md-1 tabela_zajecia"><h4 class="naglowek">Nr. sali</h4></th>
                      <th class="col-md-1 tabela_zajecia"><h4 class="naglowek">Ilość wolnych miejsc</h4></th>
                      <th class="col-md-2 tabela_zajecia"><h4 class="naglowek"></h4></th>
                      <th class="col-md-1"><h4 class="naglowek"></h4></th>
                     
                   
                  </tr>
                </table>
                <div id="table_zajecia">
                </div>
                 <div class="zapisy">
                    <?php
                     while($row = mysqli_fetch_array($result))  
                     { 
                        
                         
                        ?>
                
                    <table class="col-md-12 tabelazajecia" > 
                          <tr>
                              
                             <th class="col-md-2 tabela_zajecia_szczegoly tb">
                                 <h4><b><?php echo $row["zajecia_nazwa"]; ?></b></h4> 
                              </th>
                              <th class="col-md-2 tabela_zajecia_szczegoly tb" style="text-align: center;">
                               <h4><?php echo $row["zajecia_godzina"]; ?></h4> 
                              </th>
                              <th class="col-md-2 tabela_zajecia_szczegoly tb" style="text-align: center;">
                               <h4><?php echo $row["czas_trwania"]; ?></h4> 
                              </th>
                              
                               <th class="col-md-2 tabela_zajecia_szczegoly tb" style="text-align: center;">
                               <h4><?php echo $row["trener_nazwa"]; ?></h4> 
                              </th>
                                <th class="col-md-1 tabela_zajecia_szczegoly tb" style="text-align: center;">
                               <h4><?php echo $row["NrSali"]; ?></h4> 
                              </th>
                              <th class="col-md-1 tabela_zajecia_szczegoly tb" style="text-align: center;">
                               <h4><?php echo $row["wolneMiejsca"]; ?></h4> 
                              </th>
                            
                              
                               <input type="hidden" name="zajecia_nazwa" id="zajecia_nazwa<?php echo $row["zajecia_id"]; ?>"/>
                               <input type="hidden" name="zajecia_id" id="<?php echo $row["zajecia_id"]; ?>" value="<?php echo $row["zajecia_id"]; ?>" />
                               <input type="hidden" name="zajecia_czas" id="zajecia_czas<?php echo $row["zajecia_id"]; ?>" value="<?php echo $row["zajecia_czas"]; ?>" />  
                               <input type="hidden" name="trener_nazwa" id="trener_nazwa<?php echo $row["zajecia_id"]; ?>" value="<?php echo $row["zajecia_czas"]; ?>" />
                                <input type="hidden" name="numer_sali" id="numer_sali<?php echo $row["zajecia_id"]; ?>" value="<?php echo $row["nrSali"]; ?>" />
                               <th class="col-md-2 tabela_zajecia_szczegoly tb">
                                <input type="button" name="view" value="ZAPISZ MNIE" id="<?php echo $row["zajecia_id"]; ?>" class="btn btn-info btn-xs view_data button-zapisz-sie" />
                                
                                </th>
                              <th class="col-md-1">
                              </th>
                        </tr>
                       
                </table>
                     
                     <div id="dataModal" class="modal fade">
                 <div class="modal-dialog">
                  <div class="modal-content">
                   <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">REZERWACJA</h4>
                   </div>
                   <div class="modal-body" id="zajecia_szczegoly">
                       
                     
                
                   </div>
                         <form method="post" id="insert_form">
		                              <div class="form-group col-md-6 ml-auto">
                                        <label for="recipient-name" class="col-form-label">Imię *</label>
                                        <input name="imieUczestnik" type="text" class="form-control" id="imieUczestnik" required>
                                      </div>
                                        <div class="form-group col-md-6 ml-auto">
                                        <label for="recipient-name" class="col-form-label">Nazwisko *</label>
                                        <input name="nazwiskoUczestnik" type="text" class="form-control" id="nazwiskoUczestnik" required>
                                      </div>
                                      <div class="form-group col-md-12 ml-auto">
                                        <label for="message-text" class="col-form-label">Telefon *</label>
                                        <input name="telefon" type="number" class="form-control" id="telefon" required>
                                      </div>
                                        <div class="form-group col-md-12 ml-auto">
                                        <label for="message-text" class="col-form-label">Adres e-mail *</label>
                                         <input name="email" type="email" class="form-control" id="email" required>
                                        </div>
                                        <div class="form-group col-md-12 ml-auto">
                                        <label for="message-text" class="col-form-label">Numer karnetu</label>
                                        <input name="karnet" type="number" class="form-control"  id="karnet">
                                      </div>
                                    <div class="form-group col-md-12 ml-auto">
                                        <label for="message-text" class="col-form-label"> * - pola oznaczone gwiazdką są obowiązkowe</label>
                                       
                                      </div>
                                   
                                   
                                    <div class="modal-footer"  style="justify-content:center;align-items:center;">
                                        <div class="col-md-6 ml-auto"> <input type="submit" class="button-zapisz-sie" name="insert" id="insert" value="Zarezerwuj" />&nbsp;</div>
                                        <div class="col-md-6 ml-auto"> 
                                    <button type="button" class="btn button-zapisz-sie" style="display: block;" data-dismiss="modal">Zamknij</button>
                                        </div>
                                   </div>
                        </form>
                   
                  </div>
                 </div>
                </div>
                
                       <?php  
                     } 
                     ?> 

                     
                </div>
                
               
           
                
                
                <?php
                     }
                         ?>
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
        

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
<script>
    $(document).ready(function(){
        
        $('#insert_form').on("submit", function(event){  
          event.preventDefault();  
          if($('#name').val() == "")  
          {  
           alert("Name is required");  
          }  
          

          else  
          {  
           $.ajax({  
            url:"insert.php",  
            method:"POST",  
            data:$('#insert_form').serialize(),  
            beforeSend:function(){  
             $('#insert').val("Rezerwuje");  
            },  
            success:function(data){  
             $('#insert_form')[0].reset();  
             $('#dataModal').modal('hide');  
            $('#table_zajecia').html(data);
            }  
           });  
          }  
         });
        
        
        
 $(document).on('click', '.view_data', function(){
  //$('#dataModal').modal();
  var zajecia_id = $(this).attr("id");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{zajecia_id:zajecia_id},
   success:function(data){
    $('#zajecia_szczegoly').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
        
    });
  
 </script>


        
    </body>
    
    
</html>