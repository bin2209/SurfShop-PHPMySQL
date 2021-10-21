
$(document).ready(function(){
  // SelectCategory
  $(".type").hide();
  $("#Type").hide();

  
  $("#Category").on ('change',function(){ 
    var Category = $('#Category :selected').val();
    $("#Type").show();
    $("#Type").val("").change();
    if (Category==''){
     $("#Type").hide();
   }

   stringtype = "type"+Category;
   if (Category==''){
    $(".type").hide();
  }else{
   $(".type").hide();
   $("."+stringtype).show();
 }
 console.log(Category);

 $("#Type").on ('change',function(){ 
  var Type = $('#Type :selected').val();
  console.log(Type);
});    

});    
});