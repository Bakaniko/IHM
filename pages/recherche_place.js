$(document).ready(function(){
 $('.action').change(function(){
  if($(this).val() != '')
  {
   var action = $(this).attr("id");
   var query = $(this).val();
   var result = '';
   if(action == "categorie")
   {
    result = 'handicap';
   }
   else if (action == "handicap")
   {
    result = 'ranger';
   }
   else
   {
    result = 'numero';
   }
   $.ajax({
    url:"selection_place.php",
    method:"POST",
    data:{action:action, query:query},
    success:function(data){
     $('#'+result).html(data);
    }
   })
  }
 });
});