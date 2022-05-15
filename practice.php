<?php

// Dynamic Message alert function
function messageAlert($message, $alertType="warning"){
  return "<div class=\"alert alert-{$alertType} alert-dismissible fade show\" role=\"alert\">
  {$message}
<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
</div>";
}

// Email validation check
function emailValidation($mail){
  if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
    return true;
  }else{
    return false;
  }
}

function eduMailValidation($mail){
  $eduMails = ['du.edu.bd', 'nu.edu.bd', 'diu.edu.bd', 'nsu.edu.bd'];
  $mailExploded = explode('@', $mail, 2);

  if(in_array($mailExploded[1], $eduMails)){
    return true;
  }else{
    return false;
  }

}




// Match Password function
function matchPassword($pass, $conPass){
if($pass === $conPass){
  return true;
}else{
  return false;
}

}











if(isset($_POST['submitButton'])){
  $fname        = $_POST['firstname'];
  $lname        = $_POST['lastname'];
  $email        = $_POST['email'];
  $phone        = $_POST['phone'];
  $password     = $_POST['password'];
  $conpassword  = $_POST['conPassword'];
  // $termsConds   = $_POST['formAgreement'];
 
  $termsConds;

  if(empty($fname) || $lname == "" || empty($email) || empty($phone) || empty($password) || empty($conpassword) ){
    $alertMsg = messageAlert("All fields are required !", "danger");
  }elseif(emailValidation($email) == false){
    $alertMsg = messageAlert("Email is invalid");
   }elseif(eduMailValidation($email) == false){
    $alertMsg = messageAlert("Please enter educational mail");
   }
   elseif(matchPassword($password, $conpassword) == false){
    $alertMsg = messageAlert("Password doesn't match");
   }elseif(empty($_POST['formAgreement'])){
    $alertMsg = messageAlert("Please tick the checkbox");
   }
  else{
    $alertMsg = messageAlert("Form submission successfull !", "success");
  }



}













?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    
    <div class="registration-form-area my-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
          <div class="form-inner">
            <form class="row" method="POST" action="">
              <div class="col-12 form-title text-center mb-4">
                <h2>Register</h2>
                <p>Create your account</p>

                <?php if(isset($alertMsg)){ 
                 echo $alertMsg;
                
                }
                ?>
                 
              </div>
              <div class="col-6 mb-3">
                <label for="fname" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="fname" name="firstname" placeholder="Enter your first name">
            </div>
            <div class="col-6 mb-3">
              <label for="lname" class="form-label">Last Name:</label>
              <input type="text" class="form-control" id="lname" name="lastname" placeholder="Enter your last name">
            </div>

            <div class="col-12 mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>

            <div class="col-12 mb-3">
              <label for="phone" class="form-label">Phone:</label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone">
            </div>

            <div class="col-12 mb-3">
              <label for="password" class="form-label">Password:</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>

            <div class="col-12 mb-3">
              <label for="confirmpassword" class="form-label">Confirm Password:</label>
              <input type="password" class="form-control" id="confirmpassword" name="conPassword" placeholder="Confirm Password">
            </div>

            <div class="col-12">
              <!-- <div class="form-check"> -->
                <input class="form-check-input" type="checkbox" name="formAgreement[]" id="formAgree">
                <label class="form-check-label" for="formAgree">
                  I accept the terms and conditions!
                </label>
              <!-- </div> -->
            </div>
            
            <div class="col-12 mt-5 mb-3">
              <!-- <button type="submit" class="btn btn-primary w-100" name="regisBtn">Register Now</button> -->
              <input class="btn btn-success w-100" type="submit" name="submitButton" value="Register Now">
            </div>

            
          </form>

          </div>

        </div>
        </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
