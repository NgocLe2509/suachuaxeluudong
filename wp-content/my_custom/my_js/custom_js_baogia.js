jQuery(document).ready(function($){

  	var url = window.location.href;
  var index = url.indexOf("madon");
  var madon = url.slice(index+6, url.length);
  var tongtien = 0;
  var tienXuConLai = 0;
  
  jQuery.ajax({
     url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionGetThongTinDonDichVu.php',
      type: 'post',
      data: {
        'STT' : madon
      },
      success : function(data) {
        console.log(data);
        if(data['StatusOrder'] == "3") {
          $(".elementor-button").css("display", "none");
        }

      }
    });

  		jQuery.ajax({
            url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionGetBaoGia.php',
            type: 'post',
          	data: {
				'STT' : madon
            },
            success : function(data) {
              console.log(data);
              
				$("#dichvu").text(data.thongtin['OrderService']);
              
              var phisuachua = data.thongtin['Total'];
              	$("#phisuachua").text(phisuachua);
              
              var phisuachua = phisuachua.slice(1, phisuachua.length);
              phisuachua = phisuachua.replace('.','');
              phisuachua = parseInt(phisuachua);
              tongtien += phisuachua;

               $.each( data.phutung, function( key, value ) {
                 var gia = value['Gia'];
                 tongtien += parseInt(gia);
                 	var giaParse = "";
                 var index = 0;
                 for(var i= gia.length -1; i>=0; i--) {
                   giaParse += gia[i];
                   index++;
                   if(index % 3 == 0 && i != 0) {
                     index = 0;
                     giaParse += ".";
                   }
                 }
                 
                 var giaParse1 = "";
                 for(var i= giaParse.length -1; i>=0; i--) {
                   giaParse1 += giaParse[i];
                 }
                 giaParse1 += "đ";
                 
                   var newrow = "<tr>"
                                +	"<td>"+value['TenPhuTung']+"</td>"
                                +	"<td>"+giaParse1+"</td>"
                                +	"<td>Số lượng: "+value['SoLuong']+"</td>"
                                +"</tr>";

                    $("#table-phu-tung").append(newrow);
                });
              
               var index = 0;
              var tongtienParse = "";
              tongtien = tongtien.toString();
              
                 for(var i= tongtien.length -1; i>=0; i--) {
                   tongtienParse += tongtien[i];
                   index++;
                   if(index % 3 == 0 && i != 0) {
                     index = 0;
                     tongtienParse += ".";
                   }
                 }
                 
                 var tongtienParse1 = "";
                 for(var i= tongtienParse.length -1; i>=0; i--) {
                   tongtienParse1 += tongtienParse[i];
                 }
                 tongtienParse1 += "đ";
              $("#tongtien").text(tongtienParse1);
              
              jQuery.ajax({
                  url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionUpdateThongTinDonHang.php',
                  type: 'post',
                  data: {
                      "sotientong" : tongtienParse1,
                      "madon" : madon
                  },
                  success : function(data) {
                    console.log(data);

                  }
              });
              
            }
        });
  
  $(document).on("click", ".elementor-button", function(){
	var user = custom_js_baogia.current_user.data['ID'];

    jQuery.ajax({
        url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionGetXu.php',
        type: 'post',
        data: {
        	"userid" : user,
        },

        success : function(data) {
          console.log(data);
          var soXu = parseInt(data['SoXu']);
          
          if (soXu > tongtien) {
            tienXuConLai = soXu - tongtien;
            jQuery.ajax({
                url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionThanhToan.php',
                type: 'post',
                data: {
                    "userid" : user,
                    "gia" : tongtien,
                    "madon" : madon,
                    "tienxu" : tienXuConLai
                },

                success : function(data) {
                  console.log(data);
					alert("Thanh toán thành công! ");

                }
            });
          }
          else {
            alert("Số xu trong ví bạn không đủ để thanh toán, vui lòng nạp thêm!");
            window.location.href="http://gongshop.xyz/?page_id=1641&madon=" + madon;
          }

        }
    });
	return false;
    	
  });
  
  $(document).on("click", "#btn-trove", function(){
  	window.location.href="http://gongshop.xyz/?page_id=1641&madon=" + madon;
  })
  

  
});