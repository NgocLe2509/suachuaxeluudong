
jQuery(document).ready(function($){
  
  $(document).on("click", ".elementor-button", function(){
    var name = $("#form-field-name").val();
    var sdt = $("#form-field-").val();
    var money = $("#form-field-email").val();
    var stk = $("#form-field-message").val();
    var curent_user = custom_js_donruttien.current_user.data['ID'];
    
    jQuery.ajax({
      url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionAddDonRutTien.php',
      type: 'post',
      data: {
        'curent_user' : curent_user,
        'name' : name,
        'sdt' : sdt,
        'money' : money,
        'stk' : stk
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