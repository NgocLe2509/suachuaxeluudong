jQuery(document).ready(function($){
  
  	var url = window.location.href;
  var index = url.indexOf("madon");
  var madon = url.slice(index+6, url.length);

  		jQuery.ajax({
            url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionGetThongTinDonDichVu.php',
            type: 'post',
          	data: {
				'STT' : madon
            },
            success : function(data) {
              if(data['StatusOrder'] != "1") {
              	window.location.href="http://gongshop.xyz/?page_id=1750&madon=" + madon;
              }
				$("#dichvusuachua").text(data['OrderService']);
              	$("#phisuachua").text(data['Total']);
            }
        });
  
  $(document).on("click", ".elementor-button", function(){
    var form_data = new FormData();
    
    form_data.append('madon', madon);
    
     if($("#check1").is(':checked')) {
      form_data.append('tenphutung[]', "Xăm xe");
       var SL = $("#SoLuong1").val();
       var gia = parseInt(SL) * 70000;
       form_data.append('soluong[]', SL);
      	form_data.append('gia[]', gia);
    }
    if($("#check2").is(':checked')) {
      form_data.append('tenphutung[]', "Kính xe");
      var SL = $("#SoLuong1").val();
      var gia = parseInt(SL) * 350000;
      form_data.append('soluong[]', SL);
      form_data.append('gia[]', gia);
    }
    if($("#check3").is(':checked')) {
      form_data.append('tenphutung[]', "Xích xe");
      var SL = $("#SoLuong1").val();
      var gia = parseInt(SL) * 37000;
      form_data.append('soluong[]', SL);
      form_data.append('gia[]', gia);
    }
    if($("#check4").is(':checked')) {
      form_data.append('tenphutung[]', "Búp sen thắng sau");
      var SL = $("#SoLuong1").val();
      var gia = parseInt(SL) * 700000;
      form_data.append('soluong[]', SL);
      form_data.append('gia[]', gia);
    }
    if($("#check5").is(':checked')) {
      form_data.append('tenphutung[]', "Lọc nhiên liệu");
      var SL = $("#SoLuong1").val();
      var gia = parseInt(SL) * 170000;
      form_data.append('soluong[]', SL);
      form_data.append('gia[]', gia);
    }
    
    jQuery.ajax({
        url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionAddDonBaoGia.php',
        type: 'post',
        data: form_data,
      	contentType: false,
        processData: false,
        success : function(data) {
          console.log(data);
          window.location.href="http://gongshop.xyz/?page_id=1750&madon=" + madon;

        }
    });
	return false;
    	
  });

  
});