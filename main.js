$(document).ready(function(data){  
      $('.add_to_cart').click(function(){  
          var produkt_image = $(this).attr("src");   
           var produkt_id = $(this).attr("id");  
           var produkt_nazwa = $('#name'+produkt_id).val();  
           var produkt_cena = $('#price'+produkt_id).val();  
           var product_quantity = $('#quantity'+produkt_id).val();  
           var action = "add";  
           if(product_quantity > 0)  
           {  
                $.ajax({  
                     url:"actionshop.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{  
                          produkt_image:produkt_image,
                          produkt_id:produkt_id,   
                          produkt_nazwa:produkt_nazwa,   
                          produkt_cena:produkt_cena,   
                          product_quantity:product_quantity,   
                          action:action  
                     },  
                     success:function(data)  
                     {  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
                          
                     }  
                });  
           }  
           else  
           {  
                alert("Please Enter Number of Quantity")  
           }  
      });  
      $(document).on('click', '.delete', function(){  
           var produkt_id = $(this).attr("id");  
           var action = "remove";  
           if(confirm("Na pewno chcesz usunąc ten produkt?"))  
           {  
                $.ajax({  
                     url:"actionshop.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{produkt_id:produkt_id, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });  
      $(document).on('keyup', '.quantity', function(){  
           var produkt_id = $(this).data("produkt_id");  
           var quantity = $(this).val();  
           var action = "quantity_change";  
           if(quantity != '')  
           {  
                $.ajax({  
                     url :"actionshop.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{produkt_id:produkt_id, quantity:quantity, action:action},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     }  
                });  
           }  
      });
    
    $('.data').click(function(){  
          
                $.ajax({  
                     url:"actionshop.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{  
                        produkt_image:produkt_image,
                          produkt_id:produkt_id,   
                          produkt_nazwa:produkt_nazwa,   
                          produkt_cena:produkt_cena,   
                          product_quantity:product_quantity,   
                          action:action  
                     },  
                     success:function(data)  
                     {  
                          $('#order_table').html(data.order_table);  
                          $('.badge').text(data.cart_item);  
                          
                     }  
                });  
           
      });
    
    
     
        
 });  