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
              console.log(data);
              var StatusOrder = data['StatusOrder'];
              
              if (StatusOrder == "0") {
                $(".buoc0 h2").css('color', 'red');
                $(".buoc1 h2").css('color', 'black');
                $(".buoc2 h2").css('color', 'black');
                $(".buoc3 h2").css('color', 'black');
              }
              else if (StatusOrder == "1") {
                $(".buoc0 h2").css('color', 'black');
                $(".buoc1 h2").css('color', 'red');
                $(".buoc2 h2").css('color', 'black');
                $(".buoc3 h2").css('color', 'black');
              }
              else if (StatusOrder == "2") {
                $(".buoc0 h2").css('color', 'black');
                $(".buoc1 h2").css('color', 'black');
                $(".buoc2 h2").css('color', 'red');
                $(".buoc3 h2").css('color', 'black');
              }
              else {
                $(".buoc0 h2").css('color', 'black');
                $(".buoc1 h2").css('color', 'black');
                $(".buoc2 h2").css('color', 'black');
                $(".buoc3 h2").css('color', 'red');
              }
            }
        });
  
  $(document).on("click", "#imgBaoGia", function(){
    window.location.href="http://gongshop.xyz/?page_id=1750&madon=" + madon;
    	
  });

  
});