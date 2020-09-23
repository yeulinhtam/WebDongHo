 
 $(document).ready(function(){
   $("li").click(function(){
     $(this).find("ul").collapse('toggle');
     $(this).find("span").toggleClass("fa-arrow-left fa-arrow-down");
     });
 });

  $(document).ready(function(){
  $("#searchInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
