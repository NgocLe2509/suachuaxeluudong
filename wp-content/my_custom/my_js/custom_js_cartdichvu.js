jQuery(document).ready(function($){
   $(document).on("click", ".checkout-button", function(){
      var product = $('.product-name a').text();
      if(product.indexOf("[DV]") != -1) {
        var rowCount = $('table.cart tr').length;
        if(rowCount > 3) {
          alert("Không thể đặt dịch vụ với các sản phẩm/dịch vụ khác cùng lúc, bạn vui lòng thử lại!");
          return false;
        }
        else if($(".qty").val() > 1) {
          alert("Chỉ được đặt số lượng 1 trên dịch vụ!");
          return false;
        }
      }
   });
	

});