

jQuery(document).ready(function($){  
  jQuery.ajax({
    url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionGetNhanDon.php',
    type: 'post',
    success : function(data) {
      $.each( data, function( key, value ) {
        var newrow = "<tr class='tr"+value['STT']+"'>"
        +	"<td id='ten-khach-hang'>"+value['Firstname'] + " " + value['Lastname'] +"</td>"
        +	"<td id='dia-chi'>"+value['Address']+"</td>"
        +	"<td id='so-dien-thoai'>"+value['Phone']+"</td>"
        +	"<td id='tinh-hinh-hu-hong'>"+value['OrderService']+"</td>"
        +	"<td id='ghi-chu'>"+value['Note']+"</td>"
        +	"<td><button class='btn-nhan'>Nhận Đơn</button></td>"
        +"</tr>";

        $(".table-nhan-don").append(newrow);
      });   
    }
  });
  
  $(document).on("click", ".btn-nhan", function(){
     var classTr = $(this).closest("tr").attr("class");
    var id = classTr.slice(2, classTr.length);
    var displayName = custom_js_nhandon.current_user.data['ID'];
    
    jQuery.ajax({
            url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionNhanDon.php',
            type: 'post',
            data: {
				'STT' : id,
              	'current_user' : displayName 
            },
            success : function(data) {
              	window.location.href="http://gongshop.xyz/?page_id=1786&madon=" + id;
            }
        });
    	
  });

});