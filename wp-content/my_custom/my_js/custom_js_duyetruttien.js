
jQuery(document).ready(function($){
  $("#text-notify").css("display", "none");
  
  
  		jQuery.ajax({
            url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionGetDonRutTien.php',
            type: 'post',
            success : function(data) {
              console.log(data);
			var STT = 1;
              $.each( data, function( key, value ) {
                 var newrow = "<tr class='tr"+value['STT']+"'>"
                              +	"<td id='STT'>"+STT+"</td>"
                              +	"<td id='ma-khach-hang'>"+value['MaNguoiDung']+"</td>"
                              +	"<td>"+value['SoTienCanRut']+"</td>"
                              +	"<td>"+value['ThongTinTaiKhoan']+"</td>"
                              +	"<td>10.000.000đ</td>"
                              +	"<td><button class='btn-duyet'>Duyệt</button></td>"
                              +	"<td><button class='btn-xoa'>Xóa</button></td>"
                              +"</tr>";

                  $(".table-duyet-yeu-cau-gui-tien").append(newrow);
                  STT++;
              });   
            }
        });
  
  $(document).on("click", ".btn-duyet", function(){
     var classTr = $(this).closest("tr").attr("class");
    var id = classTr.slice(2, classTr.length);

    jQuery.ajax({
            url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionRutTien.php',
            type: 'post',
            data: {
				'STT' : id
            },
            success : function(data) {
              	$("#text-notify p").text("Duyệt rút tiền thành công!");
                $("#text-notify").css("display", "block");
              	$("." + classTr).remove();
            }
        });
    	
  });
  /* End click btn Duyet */
  
   $(document).on("click", ".btn-xoa", function(){
     var classTr = $(this).closest("tr").attr("class");
    var id = classTr.slice(2, classTr.length);
    
    jQuery.ajax({
            url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionXoaDuyetRutTien.php',
            type: 'post',
            data: {
				'STT' : id
            },
            success : function(data) {
              	$("#text-notify p").text("Xóa duyệt rút tiền thành công!");
                $("#text-notify").css("display", "block");
              	$("." + classTr).remove();
            }
        });
    	
  });
  
});