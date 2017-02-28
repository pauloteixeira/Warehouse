function goTo( url ) {
  document.location.href = url;
}

var mensagemPadrao = 'Não conseguimos realizar está ação, tente novamente ou contate o administrador do sistema.';

function callNotify( message, type, title ) {
    var _types          =   [];
    var _titles         =   [];
    var _showTitle      =   (title != undefined) ? title : "";

    _types['error']     = 'error';
    _types['success']   = 'success';
    _types['alert']     = 'notice';
    _types['info']      = 'info';

    _titles['success']  = 'Very Good!';
    _titles['error']    = 'Ops... Something Wrong!';
    _titles['alert']    = 'Attention!';
    _titles['info']     = 'Attention!';

    if(!title.length)
        _showTitle = _titles[ type ];

    new PNotify({
        title: _showTitle,
        text: message,
        type: _types[ type ]
    });
}

function notifyError( message, title ){
    callNotify( message, 'error', title );
}

function notifySuccess( message, title ){
    callNotify( message, 'success', title );
}

function notifyAlert( message, title ){
    callNotify( message, 'alert', title );
}

function notifyInfo( message, title ){
    callNotify( message, 'info', title );
}

function moneyToNumber( str )
{
        return parseInt( str.replace(/[\D]+/g,'') );
}

function formatarReal( int )
{
        var tmp = int+'';
        tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
        if( tmp.length > 6 )
                tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

        return 'R$ ' + tmp;
}

$('a[name="unit-name"]').on('click', function(e){
    e.preventDefault();
    $('#unit-modal').modal({ backdrop: 'static', keyboard: false })
        .one('click', '#yes', function() {
            setUnitSchool($('#unit-box').val());
        });
});

function setUnitSchool( id ) {
  $.ajax({
        url: '/school/unit/' + id,
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        success: function( data ) {
          var response = $.parseJSON(data);
          if( response ){
            console.log($('#unit-name').html());
            $('#unit-name').html(response.unit_name + response.is_principal );
            $('#unit-box').val(response.id);

            goTo(redirectTo);
          }

        },
        error: function( error ) {
            handlerError( error, mensagemPadrao );
        }
    });
}

function changeAttributes(id)
{
    $('#is_deleted_' + id).html('<i class="btn-danger fa fa-close"></i>');
    $('#remove_btn_' + id).prop('disabled','disabled');
    $('#line_' + id).addClass('removed-line');
}

function scrollToHash( name, callback ) 
{ 
    var getType = {};

    $('#' + name).scrollintoview({
        duration: 1000,
        direction: "vertical",
        complete: function() {
            if( callback && getType.toString.call(callback) === '[object Function]' ){
                callback();
                return;
            }
        }
    });

    // this exists because if the scroll only works if the area to scroll is not visible in the screen
    if( callback && getType.toString.call(callback) === '[object Function]' ){
        callback();
    }
}


/*  ================== eventlisteners for all pages ====================== */
$(document).ready(function(){
    // begin: check box of lists ===========================================
    $('#all_check').click(function (event) {
        if( $(this).is(':checked') ) {
            $('.check').prop('checked', true);
            $('#export_csv').prop('disabled', false);
        }
        else {
            $('.check').prop('checked', false);
            $('#export_csv').prop('disabled', true);
        }
    });

    $('.check').on('click', function (event) {
        if( $(this).is(':checked') == false ) {
            $('#all_check').prop('checked', false);
        }
    });

    $('.check').on('change', function(event) {
        $('#export_csv').prop('disabled', ($(this).is(':checked') == false) ? true : false);
    });
    // end: check box of lists ==============================================
});


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