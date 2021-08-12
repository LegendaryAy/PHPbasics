<?php
$firstName = $lastName = $email = $password = $address = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
#Declaring require constant
define('REQUIRE_ERROR', 'This field is Required');
$errors = [];

//Variables for form input
$firstName = data_check('firstName'); 
$lastName = data_check('lastName');
$email = data_check('email');
$password = data_check('password');
$address = data_check('address');

if (!$firstName) {
    $errors['firstName'] = REQUIRE_ERROR;
}
if (!$lastName) {
    $errors['lastName'] = REQUIRE_ERROR;
}
if (!$email) {
    $errors['email'] = REQUIRE_ERROR;
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors['email'] = "This field must be valid email address";
}
if (!$password) {
    $errors['password'] = REQUIRE_ERROR;
}
if (!$address) {
    $errors['address'] = REQUIRE_ERROR;
}

var_dump($firstName, $lastName, $email, $password, $address);
}
function data_check($input)
{
    $_POST[$input] ??= '';
    $data = htmlspecialchars(stripslashes($_POST[$input]));
    return $data;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Form Validation</title>
</head>

<body>
    <div class="container">
        <form action="" method="POST" novalidate>
            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control <?php echo isset($errors['firstName']) ? 'is-invalid' : ''?>" name="firstName" placeholder="First Name" value="<?php echo $firstName ?>">
                    <div class="invalid-feedback"> <?php echo $errors['firstName'] ?? '' ?> </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control <?php echo isset($errors['lastName']) ? 'is-invalid' : ''?>" name="lastName" placeholder="Last Name" value="<?php echo $lastName ?>">
                    <div class="invalid-feedback"> <?php echo $errors['lastName'] ?? '' ?> </div>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''?>" name="email" placeholder="Email" value="<?php echo $email ?>">
                    <div class="invalid-feedback"> <?php echo $errors['email'] ?? '' ?> </div>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''?>" name="password" placeholder="Password" value="<?php echo $password ?>">
                    <div class="invalid-feedback"> <?php echo $errors['password'] ?? '' ?> </div>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control  <?php echo isset($errors['address']) ? 'is-invalid' : ''?>" name="address" placeholder="1234 Main St" value="<?php echo $address ?>">
                <div class="invalid-feedback"> <?php echo $errors['address'] ?? '' ?> </div>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>

    </div>

</body>

</html>