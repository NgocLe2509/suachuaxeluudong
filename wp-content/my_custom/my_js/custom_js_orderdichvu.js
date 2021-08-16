jQuery(document).ready(function($){
  
  $(document).on("click", "#place_order", function(){
    
      	var firstname = $('#billing_first_name').val();
        var lastname = $('#billing_last_name').val();
        var city = $('#select2-billing_country-container option:selected').text();
        var address = $('#billing_address_1').val();
        var phone = $('#billing_phone').val();
        var email = $('#billing_email').val();
    	var product = $('.cart_item .product-name').text();
        if(product.indexOf("[DV]") > 0) {
          var note = $('input[type = text] #order_comments').val();
          var product_name = product.slice(12, product.length - 22);
          var total = $(".order-total bdi").text();

          jQuery.ajax({
              url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionOrderDichVu.php',
              type: 'post',
              data: {
                "firstname" : firstname,
                "lastname" : lastname,
                "city" : city,
                "address" : address,
                "phone" : phone,
                "email" : email,
                "note" : note,
                "product_name" : product_name,
                "total" : total
              },
              success : function(data) {
				window.location.href="http://gongshop.xyz/?page_id=1641&madon=" + data['STT'];
              }
          });

          return false;
        }

  });
});