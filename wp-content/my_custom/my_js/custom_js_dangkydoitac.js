
jQuery(document).ready(function($){
  
  $(document).on("click", "#btn-dang-ky-doi-tac", function(){
    var name = $("#form-field-name").val();
    var diachi = $("#form-field-email").val();
    
    var loaidv = "";
    if($("#form-field-message-0").is(':checked')) {
      loaidv += $("#form-field-message-0").val();
    }
    
    if($("#form-field-message-1").is(':checked')) {
      if(loaidv == "") {
        loaidv += $("#form-field-message-1").val();
      }
      else {
        loaidv += " / " + $("#form-field-message-1").val();
      }
    }
    
    var ghichuthem = $("#form-field-").val();
    
    jQuery.ajax({
      url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionAddDuyetDoiTac.php',
      type: 'post',
      data: {
        'tenkhachhang' : name,
        'thongtindangky' : diachi,
        'loaidichvu' : loaidv,
        'ghichuthem' : ghichuthem
      },
      success : function(data) {
        $(".space-hide").css("display", "block");
      }
    });
    
    return false;
    	
  });
  
   $(document).on("click", "#text-hide", function(){
     $(".space-hide").css("display", "none");
   });
});