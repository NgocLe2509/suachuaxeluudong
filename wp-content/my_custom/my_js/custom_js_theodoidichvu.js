

jQuery(document).ready(function($){
  
  
  		jQuery.ajax({
            url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionGetThongTinDichVuAdmin.php',
            type: 'post',
            success : function(data) {
              console.log(data);
			var STT = 1;
              $.each( data, function( key, value ) {
                var tinhtrang = value['StatusOrder'];
                
               if(tinhtrang == "0") {
               		tinhtrang = "Đơn hàng chưa được nhận";
               }
                else if(tinhtrang == "1") {
               	tinhtrang = "Đơn hàng đã được nhận";
               }
                else if(tinhtrang == "2") {
               tinhtrang = "Đã báo giá";
               }
                else {
                tinhtrang = "Đã thanh toán";
                }
                
                 var newrow = "<tr>"
                              +	"<td id='STT'>"+STT+"</td>"
                              +	"<td id='ten-khach-hang'>"+value['STT']+"</td>"
                              +	"<td id='thong-tin-dang-ky'>"+value['OrderService']+"</td>"
                              +	"<td id='loai-dich-vu'>1</td>"
                              +	"<td id='ghi-chu-them'>"+tinhtrang+"</td>"
                              +	"<td>"+value['Total']+"</td>"
                              +"</tr>";

                  $(".table-duyet-yeu-cau-gui-tien").append(newrow);
                  STT++;
              });   
            }
        });

});