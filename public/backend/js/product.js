$(document).ready(function() {            
  var imagesPreview = function(input, placeToInsertImagePreview) {
      if (input.files) {
        var filesAmount = input.files.length;
        $( ".previewImage" ).remove();  
        for (i = 0; i < filesAmount; i++) {
          var reader = new FileReader();
          reader.onload = function(event) {                  
            $($.parseHTML('<img class = "previewImage">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
          }
          reader.readAsDataURL(input.files[i]);
        }
      }
    };
    $('#gallery-photo-add').on('change', function() {
      imagesPreview(this, 'div.gallery');
    });
});
