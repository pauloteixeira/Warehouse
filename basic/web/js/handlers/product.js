categories_ids = undefined;
$(document).ready(function(){
    $("#categories").select2({
      maximumSelectionLength: 10,
      placeholder: "Select up to ten categories",
      allowClear: true,
    });

    $('#product-price').mask("#,##0.00", {reverse: true});
    if( categories_ids != undefined && categories_ids.length ){
      $('#productcategory-category_id').val(categories_ids);
    }
});

$('#categories').on('change', function(e){
  $('#productcategory-category_id').val($(this).val());
});

function removeView( id ) {
  $.ajax({
        url: '/product/delete-ajax/' + id,
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function( data ) {

          if( data ){
            location.href="/product";
          }

        },
        error: function( error ) {
            notifyError( error.responseJSON.message, '' );
        }
    });
}

function remove( id ) {
  $.ajax({
        url: '/product/delete/' + id,
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function( data ) {

        	if( data ){
            var target = $('tr[data-key=16]');
        		target.hide('slow', function()
              { 
                target.remove();
            });

        		notifySuccess('The Product was deleted successful!', '');
        	}

        },
        error: function( error ) {
            notifyError( error.responseJSON.message, '' );
        }
    });
}


function validateForm()
{
  var msg   = "";
  var $name = $('#product-name').val();
  var $description = $('#product-description').val();
  var $price = $('#product-price').val();
  var $quantity = $('#product-quantity').val();
  var $file = $('#uploadmodel-file').val();
  var $categories = $('#productcategory-category_id').val();
  
  if( alert_is_opened )
  {
    cleanAlert();
  }

  if( $name.length == 0 )
  {
    msg += '<li>The product name field is required!</li>';
  }

  if( $description.length == 0 )
  {
    msg += '<li>The product description field is required!</li>';
  }

  if( $price.length == 0 )
  {
    msg += '<li>The product price field is required!</li>';
  }

  if( $quantity.length == 0 )
  {
    msg += '<li>The product quantity field is required!</li>';
  }

  if( $file.length == 0 )
  {
    msg += '<li>The product image field is required!</li>';
  }

  if( $categories.length == 0 )
  {
    msg += '<li>The product categories field is required!</li>';
  }

  
  // RETURN VALIDATE MESSAGE IF EXIST ONE
  if( msg.length )
  {
    scrollToHash( 'top', function(){
      $('#error_msg').html( msg );
      $('#alert').show('slow');
    } );

    alert_is_opened = true;

    return false;
  }

  return true;
}



function submitForm() {

  if( !validateForm() )
  {
    return;
  }

  //var form  = $('#productForm');
  var route = '/product/save/';
  var id = $('#product-id').val();
  var formData = new FormData($('form')[0]);

  $.ajax({
        url: route + id,
        type: 'POST',
        dataType: 'json',
        data: formData ,
        contentType: false,
        processData: false,
        success: function( data ) {
            if(data) {
              notifySuccess( 'Product was saved successful!', '' );

              if(!id){
                $('form')[0].reset();
                $('#categories').val(null).trigger("change");
              }
            }
        },
        error: function( error ) {
          notifyError( error.responseJSON.message, '' );
        }
    });
}

