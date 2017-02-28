$(document).ready(function(){
  if( $('#user-password') != undefined )
  {
      $('#user-password').val('');
  }
});

function removeView( id ) {
  $.ajax({
        url: '/user/delete-ajax/' + id,
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function( data ) {

          if( data ){
            location.href="/user";
          }

        },
        error: function( error ) {
            notifyError( error.responseJSON.message, '' );
        }
    });
}

function remove( id ) {
  $.ajax({
        url: '/user/delete/' + id,
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function( data ) {

        	if( data ){
            var target = $('tr[data-key=16]');
        		target.hide('slow', function()
              { 
                target.remove();
            });

        		notifySuccess('The User was deleted successful!', '');
        	}

        },
        error: function( error ) {
            notifyError( error.responseJSON.message, '' );
        }
    });
}


function validateForm()
{
  var msg       = "";
  var $name     = $('#user-name').val();
  var $email    = $('#user-email').val();
  var $username = $('#user-username').val();
  var $password = $('#user-password').val();
  
  if( alert_is_opened )
  {
    cleanAlert();
  }

  if( $name.length == 0 )
  {
    msg += '<li>The name field is required!</li>';
  }

  if( $email.length == 0 )
  {
    msg += '<li>The email field is required!</li>';
  }

  if( $username.length == 0 )
  {
    msg += '<li>The username field is required!</li>';
  }

  if( $password.length < 8 )
  {
    msg += '<li>The password field is required and have to be 8 or more characters!</li>';
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

  var form  = $('#userForm');
  var route = '/user/save/';
  var id = $('#user-id').val();

  $.ajax({
        url: route + id,
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        dataType: 'json',
        data: form.serialize() ,
        success: function( data ) {
            if(data) {
              notifySuccess( 'User was saved successful!', '' );

              if(!id){
                $("#userForm")[0].reset();
              }
            }
        },
        error: function( error ) {
          notifyError( error.responseJSON.message, '' );
        }
    });
}

