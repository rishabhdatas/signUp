$(function() {
    $("#fname_error_message").hide();
    $("#lname_error_message").hide();
    $("#email_error_message").hide();
    $("#password_error_message").hide();

    var error_fname = false;
    var error_lname = false;
    var error_email = false;
    var error_password = false;

    $("#form_fname").focusout(function(){
      check_fname();
    });
    $("#form_lname").focusout(function() {
      check_lname();
    });
    $("#form_email").focusout(function() {
      check_email();
    });
    $("#form_password").focusout(function() {
      check_password();
    });

    function check_fname() {
          var pattern = /^[a-zA-Z]*$/;
          var fname = $("#form_fname").val();
          if (pattern.test(fname) && fname !== '') {
             $("#fname_error_message").hide();
             $("#form_fname").css("border-bottom","2px solid #34F458");
          } else {
             $("#fname_error_message").html("Should contain only Characters");
             $("#fname_error_message").show();
             $("#form_fname").css("border-bottom","2px solid #F90A0A");
             error_fname = true;
          }
       }

       function check_lname() {
          var pattern = /^[a-zA-Z]*$/;
          var lname = $("#form_lname").val();
          if (pattern.test(lname) && lname !== '') {
             $("#lname_error_message").hide();
             $("#form_lname").css("border-bottom","2px solid #34F458");
          } else {
             $("#lname_error_message").html("Should contain only Characters");
             $("#lname_error_message").show();
             $("#form_lname").css("border-bottom","2px solid #F90A0A");
             error_lname = true;
          }
       }

       function check_email() {
          var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
          var email = $("#form_email").val();
          if (pattern.test(email) && email !== '') {
             $("#email_error_message").hide();
             $("#form_email").css("border-bottom","2px solid #34F458");
          } else {
             $("#email_error_message").html("Invalid Email");
             $("#email_error_message").show();
             $("#form_email").css("border-bottom","2px solid #F90A0A");
             error_email = true;
          }
       }

       function check_password() {
          var password_length = $("#form_password").val().length;
          if (password_length < 8) {
             $("#password_error_message").html("Atleast 8 Characters");
             $("#password_error_message").show();
             $("#form_password").css("border-bottom","2px solid #F90A0A");
             error_password = true;
          } 
          
          else {
             $("#password_error_message").hide();
             $("#form_password").css("border-bottom","2px solid #34F458");
          }
       }



       $("#registration_form").submit(function() {

        error_fname = false;
        error_lname = false;
        error_email = false;
        error_password = false;

        check_fname();
        check_lname();
        check_email();
        check_password();

        if(error_fname === false && error_lname === false && error_email === false && error_password === false){
          //alert("Registration Successfull");
          return true;
        }else{
          alert("Please Fill the form Correctly");
             return false; 
        }

       });


  });