
$('document').ready(function()
{ 
/* validation */
$("#login-form").validate({
rules:
{
password: {
required: true,
},
user_email: {
required: true,
email: true
},
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