<?php
   session_start();
    if(!isset($_SESSION['zalogowany']))
    {
       header('Location: loginbd.php');
        exit();/*przekierowanie wstrzymanie dalszych operacji*/
    }
   

    $connect = mysqli_connect("localhost", "root", "", "fitness"); 
    $id = $_GET['id'];
 
    
    
    $members = $connect->query("SELECT * FROM zajecia WHERE zajecia_id='$id'");
    $mem = mysqli_fetch_assoc($members);


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Using Bootstrap modal</title>
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
		
    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="dodaj_zapis" class="modal-fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                     <input type="hidden" name="zajecia_id" id="<?php echo $mem["zajecia_id"]; ?>" value="<?php echo $mem["zajecia_id"]; ?>" />
                    <h5 class="modal-title" id="exampleModalLabel">Zajęcia: <?php echo $mem["zajecia_nazwa"]; ?></h5>
                    <h5 class="modal-title" id="exampleModalLabel">Data: <?php echo $mem["zajecia_czas"]; ?></h5>
                    <h5 class="modal-title" id="exampleModalLabel">Godzina: <?php echo $mem["zajecia_godzina"]; ?></h5>
                    <h5 class="modal-title" id="exampleModalLabel">Czas trwania: <?php echo $mem["czas_trwania"]; ?></h5>
                    <h5 class="modal-title" id="exampleModalLabel">Trener: <?php echo $mem["trener_nazwa"]; ?></h5>
                </div>
            
            

	<div  class="modal-body">
        <form method="post" id="insert_form">
		                              <div class="form-group col-md-6 ml-auto">
                                        <label for="recipient-name" class="col-form-label">Imię *</label>
                                        <input name="imieUczestnik" type="text" class="form-control" id="imie-uczestnik" required>
                                      </div>
                                        <div class="form-group col-md-6 ml-auto">
                                        <label for="recipient-name" class="col-form-label">Nazwisko *</label>
                                        <input name="nazwiskoUczestnik" type="text" class="form-control" id="nazwisko-uczestnik" required>
                                      </div>
                                      <div class="form-group col-md-12 ml-auto">
                                        <label for="message-text" class="col-form-label">Telefon *</label>
                                        <input name="telefon" type="number" class="form-control" id="telefon-uczestnik" required>
                                      </div>
                                        <div class="form-group col-md-12 ml-auto">
                                        <label for="message-text" class="col-form-label">Adres e-mail *</label>
                                         <input name="email" type="email" class="form-control" id="email-uczestnik" required>
                                        </div>
                                        <div class="form-group col-md-12 ml-auto">
                                        <label for="message-text" class="col-form-label">Numer karnetu</label>
                                        <input name="karnet" type="number" class="form-control"  id="karnet-uczestnik">
                                      </div>
                                    * - pola oznaczone gwiazdką są obowiązkowe
                                        <input type="submit" class="button-wyslij" name="insert" id="insert" value="Zarezerwuj" />&nbsp;
        </form>
    </div>
		<div class="modal-footer" style="display:flex;justify-content:center;align-items:center;">
		     
		     <button type="button" class="button-wyslij" data-dismiss="modal">Zamknij</button>
		</div>
    
                
    </div>
        </div>
    
    </div>
    <script>
        $(document).ready(function() {
            $('#insert_form').on('submit', function(event) {
                event.preventDefault();
                if($('#name').val() == "")
                    {
                        alert ("name is required");
                    }
                else {
                    $.ajax ({
                        url: "insert.php",
                        method: "POST",
                        data: $('#insert_form').serialize(),
                        success: function(data)
                        {
                            $('#insert_form')[0].reset();
                            $('#dodaj_zapis').modal('hide');
                        }
                    })
                }
            });
            
            
        });
    
    
    </script>
	
</body>
</html>