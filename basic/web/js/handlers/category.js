var alert_is_opened = false;

$('#delete-link').click(function(e){
  deleteFromView($(this).attr('name'));
});

$('#btn-save').click(function(e){
  submitForm();
});

function cleanAlert()
{
  if( alert_is_opened ){
    $('#error_msg').html( '' );
    $('#alert').hide('slow');
    alert_is_opened = false;  
  }
}

function deleteFromView( id )
{
  $('#modal-confirm').modal({ backdrop: 'static', keyboard: false })
    .one('click', '#yes', function() {
      $('#modal-confirm').modal('hide');
      removeView(id);
    });
    return false;
}

function deleteItem( id ) {
  $('#modal-confirm').modal({ backdrop: 'static', keyboard: false })
    .one('click', '#yes', function() {
      $('#modal-confirm').modal('hide');
      remove(id);
    });
    return false;
}

function removeView( id ) {
  $.ajax({
        url: '/category/delete-ajax/' + id,
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function( data ) {

          if( data ){
            location.href="/category";
          }

        },
        error: function( error ) {
            notifyError( error.responseJSON.message, '' );
        }
    });
}

function remove( id ) {
  $.ajax({
        url: '/category/delete/' + id,
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function( data ) {

        	if( data ){
            var target = $('tr[data-key=16]');
        		target.hide('slow', function()
              { 
                target.remove();
            });

        		notifySuccess('The Categoria was deleted successful!', '');
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
  var $name = $('#category-name').val();
  
  if( alert_is_opened )
  {
    cleanAlert();
  }

  if( $name.length == 0 )
  {
    msg += '<li>The category name field is required!</li>';
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

  var form  = $('#categoryForm');
  var route = '/category/save/';
  var id = $('#category-id').val();

  $.ajax({
        url: route + id,
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        dataType: 'json',
        data: form.serialize() ,
        success: function( data ) {
            if(data) {
              notifySuccess( 'Category was saved successful!', '' );

              if(!id){
                $("#categoryForm")[0].reset();
              }
            }
        },
        error: function( error ) {
          notifyError( error.responseJSON.message, '' );
        }
    });
}

