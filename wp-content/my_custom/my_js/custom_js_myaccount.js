
jQuery(document).ready(function($){
  
  var user = custom_js_myaccount.current_user.data['ID'];
  console.log(user);
  if(user==="undefined"){
 	var x = document.getElementById("my-xu");
 	x.style.display="none";
 	var xu = document.getElementById("so-xu");
 	xu.style.display="none";
  	var ad = document.getElementById("admin");
 	ad.style.display="none";
  }
  
  jQuery.ajax({
        url: 'http://gongshop.xyz/wp-content/my_custom/my_php/actionGetXu.php',
        type: 'post',
        data: {
        	"userid" : user,
        },

        success : function(data) {
          console.log(data);
          var soxu = data['SoXu'];
          
          	var giaParse = "";
                 var index = 0;
                 for(var i= soxu.length -1; i>=0; i--) {
                   giaParse += soxu[i];
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
          $("#id-xu").text(giaParse1);

        }
    });
});