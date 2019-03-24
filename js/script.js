
$('document').ready(function()
{ 
/* validation */
$("#login-form").validate({
rules:
{
password: {
required: true,
}
},
messages:
{
password:{
required: "please enter your password"
},
user_email: "please enter your email address",
},
submitHandler: submitForm
});  
/* validation */

/* login submit */
function submitForm()
{		
var data = $("#login-form").serialize();

$.ajax({
type : 'POST',
url  : 'login_process.php',
data : data,
beforeSend: function()
{	
$("#error").fadeOut();
$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
},
success :  function(response)
{						
        if(response=="ok"){
                $("#btn-login").html('<img src="../img/btn-ajax-loader.gif" /> &nbsp; Signing In ...');
                setTimeout(' window.location.href = "../homepage.php"; ',1000);
        }
        else{
            $("#error").fadeIn(1000, function(){
                $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
            });
        }
}
});
return false;
}
/* login submit */
});

//Saving image validation
$('document').ready(function()
{
    //add-note-homepage-form
    /*validation*/
    $('add-note-homepage-form').validate({
        rules_homepage:
            {
                 text_homepage:{
                     required: true,
                 },
                 user_name_homepage:{
                     required: true
                 }
            },
        submitHandler: loadImages_homepage
    });
    
    function loadImages_homepage() {
        var data = $("#add-note-homepage-form").serialize();

        $.ajax({
            type:'POST',
            url : 'validate_image_loading.php',
            data:data,
            beforeSend: function () {
                $("#homepage_error").fadeOut();
                $("#insert").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Отправляем ...');
            },
            success: function (response) {
                if(response=="ok"){
                    $("#insert").html('<img src="../img/btn-ajax-loader.gif" /> &nbsp; Отправляем ещё ...');
                    //setTimeout(' window.location.href = "../homepage.php"; ',1000);
                    //clear all text or fields
                }
                else {
                    $("homepage_error").fadeIn(1000,function () {
                        $("homepage_error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
                        $("#insert").html('<input class="btn btn-primary btn-lg btn-block" type="submit" name="insert" id="insert" value="Продолжить"/>');
                    });
                }
            }
        });
        return false;
    }

});

//CHECKING filetype extension
$(document).ready(function(){
    $('#insert').click(function(){
        var image_name = $('#image').val();
        if(image_name == '')
        {
            alert("Please Select Image");
            return false;
        }
        else
        {
            var extension = $('#image').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                alert('Invalid Image File');
                $('#image').val('');
                return false;
            }
        }
    });
});

//script for table
$(document).ready( function () {
    $('#table_id').DataTable();
} );