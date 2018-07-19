<?php  
 //actionshop.php  
 session_start();  
 $connect = mysqli_connect("localhost", "root", "", "fitness");  



 if(isset($_POST["produkt_id"]))  
 {  
      $order_table = '';  
      $message = '';  
      if($_POST["action"] == "add")  
      {  
           if(isset($_SESSION["shopping_cart"]))  
           {  
                $is_available = 0;  
                foreach($_SESSION["shopping_cart"] as $keys => $values)  
                {  
                     if($_SESSION["shopping_cart"][$keys]['produkt_id'] == $_POST["produkt_id"])  
                     {  
                          $is_available++;  
                          $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["product_quantity"];  
                     }  
                }  
                if($is_available < 1)  
                {  
                     $item_array = array(  
                          'produkt_id'               =>     $_POST["produkt_id"],  
                          'produkt_nazwa'               =>     $_POST["produkt_nazwa"],  
                          'produkt_cena'               =>     $_POST["produkt_cena"],  
                          'product_quantity'          =>     $_POST["product_quantity"]  
                     );  
                     $_SESSION["shopping_cart"][] = $item_array;  
                }  
           }  
           else  
           {  
                $item_array = array(  
                     'produkt_id'               =>     $_POST["produkt_id"],  
                     'produkt_nazwa'               =>     $_POST["produkt_nazwa"],  
                     'produkt_cena'               =>     $_POST["produkt_cena"],  
                     'product_quantity'          =>     $_POST["product_quantity"]  
                );  
                $_SESSION["shopping_cart"][] = $item_array;  
           }  
      }  
      if($_POST["action"] == "remove")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["produkt_id"] == $_POST["produkt_id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     $message = '<label class="text-success">Produkt został usunięty</label>';  
                }  
           }  
      }  
      if($_POST["action"] == "quantity_change")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($_SESSION["shopping_cart"][$keys]['produkt_id'] == $_POST["produkt_id"])  
                {  
                     $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_POST["quantity"];  
                }  
           }  
      }  
      $order_table .= '  
           '.$message.'
           
           <div class="panel-heading panel-koszyk"><center><h4>KOSZYK</h4></center></div>
          <div class="panel-body">
                              
                               
           ';  
      if(!empty($_SESSION["shopping_cart"]))  
      {  
           $total = 0;  
          $order_table .= '  <div class="row">
                                    
                                    <div class="col-md-5 koszykNapisLeft">Produkt nazwa</div>
                                    <div class="koszykNapisyRight" >
                                    <div class="col-md-1"></div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-1" style="text-align: right;">Ilość</div>
                                    <div class="col-md-1"><center>Cena</center></div>
                                    <div class="col-md-2" style="text-align: right;" >Cena łączna</div>
                                    <div class="col-md-1" style="text-align: center;">Usuń</div>
                                </div>
                                ';
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                $order_table .= '  
                     <div id="koszyk"></div>
                     <br>
                     <div class="row">
                                        <div class="col-md-5 koszykNapisLeft">'.$values["produkt_nazwa"].'</div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-1"style="text-align: right;">
                                            <input type="text" name="quantity[]" id="quantity'.$values["produkt_id"].'" value="'.$values["product_quantity"].'" class="form-control quantity" data-produkt_id="'.$values["produkt_id"].'" />
                                        </div> 
                                        <div class="col-md-1">'.$values["produkt_cena"].' zł</div>
                                         <div class="col-md-2" style="text-align: right;" >'.number_format($values["product_quantity"] * $values["produkt_cena"], 2).' zł</div>
                                         <div class="col-md-1" style="text-align: center;"><button name="delete" class="btn btn-danger btn-xs delete" id="'.$values["produkt_id"].'">Usuń</button></div>
                                </div>
                ';  
                $total = $total + ($values["product_quantity"] * $values["produkt_cena"]);  
               $_SESSION['total'] =$total;
           }  
           $order_table .= '  
                
                <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6 podsumowanie">
                                        <div class="row">
                                            <div class="col-md-12" style="padding-bottom: 5px;"><b>Podsumowanie zamówienia</b></div>
                                            <div class="col-md-6">Produkty łącznie:</div>
                                            <div class="col-md-6" style="text-align: right;">'.number_format($total, 2).'zł</div>
                                            <div class="col-md-6">Dostawa </div>
                                            <div class="col-md-6" style="text-align: right;">0,00 zł - odbiór osobisty</div>

                                            <div class="col-md-6 line">Razem do zapłaty: </div>
                                            <div class="col-md-6 line" style="text-align: right;">'.number_format($total, 2).'zł</div>
                                            

                                        </div>
                                        </div>
                </div>
                <div class="row">
                                            <div class="col-md-12">
                                        <div class="row">
                                           
                                             <form id="form2" method="post" action="koszyk.php">
                                                 
                                                 
                                                 
                                                 <div class="col-md-12">Proszę wybrać formę płatności:</div>
                                                    <br><br>
                                                   <div class="col-md-6" style="padding-top: 20px;">
                                                       <div class="panel panel-primary">
                                                        <div class="panel-body">

                                                            <div class="row">
                                                                 <div style="display:flex;justify-content:center;align-items:center;">
                                                                     <label class="radio-inline">
                                                                        <input type="radio" id="age" name="age" value="Gotówka - płatność przy odbiorze" />
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
                                                                        <input type="radio" id="age" name="age" value="Przelew bankowy" />
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
                                                </div>
                                            </div>
                
                
                
           ';  
      }  
      $order_table .= '</div>';  
      $output = array(  
           'order_table'     =>     $order_table,  
           'cart_item'          =>     count($_SESSION["shopping_cart"])  
      );  
      echo json_encode($output);  
 }  



 ?>