

jQuery(document).ready(function($){
  $("#text-notify").css("display", "none");
  
  
  		jQuery.ajax({
            url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionGetDuyetDoiTac.php',
            type: 'post',
            success : function(data) {
			var STT = 1;
              $.each( data, function( key, value ) {
                 var newrow = "<tr class='tr"+value['STT']+"'>"
                              +	"<td id='STT'>"+STT+"</td>"
                              +	"<td id='ten-khach-hang'>"+value['TenKhachHang']+"</td>"
                              +	"<td id='thong-tin-dang-ky'>"+value['ThongTinDangKy']+"</td>"
                              +	"<td id='loai-dich-vu'>"+value['LoaiDichVu']+"</td>"
                              +	"<td id='ghi-chu-them'>"+value['GhiChuThem']+"</td>"
                              +	"<td><button class='btn-duyet'>Duyệt</button></td>"
                              +	"<td><button class='btn-xoa'>Xóa</button></td>"
                              +"</tr>";

                  $(".table-duyet-doi-tac").append(newrow);
                  STT++;
              });   
            }
        });
  
  $(document).on("click", ".btn-duyet", function(){
     var classTr = $(this).closest("tr").attr("class");
    var id = classTr.slice(2, classTr.length);
    var tenkhachhang = $("."+classTr+" #ten-khach-hang").text();
    
    jQuery.ajax({
            url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionDuyetDoiTac.php',
            type: 'post',
            data: {
				'STT' : id
            },
            success : function(data) {
              	$("#text-notify p").text("Duyệt đối tác " + tenkhachhang + " thành công!");
                $("#text-notify").css("display", "block");
              	$("." + classTr).remove();
            }
        });
    	
  });
  /* End click btn Duyet */
  
   $(document).on("click", ".btn-xoa", function(){
     var classTr = $(this).closest("tr").attr("class");
    var id = classTr.slice(2, classTr.length);
    var tenkhachhang = $("."+classTr+" #ten-khach-hang").text();
    
    jQuery.ajax({
            url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionXoaDuyetDoiTac.php',
            type: 'post',
            data: {
				'STT' : id
            },
            success : function(data) {
              	$("#text-notify p").text("Xóa duyệt đối tác " + tenkhachhang + " thành công!");
                $("#text-notify").css("display", "block");
              	$("." + classTr).remove();
            }
        });
    	
  });
  
});