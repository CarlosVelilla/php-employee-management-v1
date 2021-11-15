<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Employee</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
  <link rel="icon" href="./favicon.svg">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
  <script type="module" src="../assets/js/index.js" defer></script>
</head>

<?php

  session_start();

  
  require_once("./library/sessionHelper.php");
  
  checkSession(); // We check if the user has active login
  checkSessionExpired(); // We check if the user session is still active
  
  require_once("../assets/html/header.html");

?>

  <div class="d-flex flex-column justify-content-center align-items-center">

  <?php
  
    if(isset($_GET['info']) && $_GET['info'] == "success") {
      echo "
      <div class='align-items-center text-white bg-primary border-0 w-25' id='toast'>
        <div class='d-flex'>
          <div class='toast-body'>
            Hello, world! This is a toast message.
          </div>
          <button type='button' class='btn-close btn-close-white me-2 m-auto' data-bs-dismiss='toast' aria-label='Close'></button>
        </div>
      </div>";
    }

    $jsonData = file_get_contents('../resources/employees.json');
    $usersData = json_decode($jsonData, true);

    $nextId = count($usersData) + 1;

  ?>
  
    <form method="POST" action="./library/employeeController.php" class="employee-form">

      <input type="hidden" name="id" id="id" class="d-none" value=<?=$nextId?>>
      
      <label for="name">Name
        <input type="text" name="name" id="name" required>
      </label>


      <label for="last-name">Last Name
        <input type="text" name="lastName" id="lastName" required>
      </label>

      <label for="email-address">Email address
        <input type="email" name="email" id="email" required>
      </label>

      <label for="gender">Gender
        <select name="gender" id="gender">
          <option>Man</option>
          <option>Woman</option>
          <option>Other</option>
        </select>
      </label>

      <label for="city">City
        <input type="text" name="city" id="city" required>
      </label>

      <label for="street-address">Street Address
        <input type="number" name="streetAddress" id="streetAddress" required>
      </label>

      <label for="state">State
        <input type="text" name="state" id="state" required>
      </label>

      <label for="age">Age
        <input type="number" name="age" id="age" required>
      </label>

      <label for="postal-code">Postal Code
        <input type="number" name="postalCode" id="postalCode" required>
      </label>

      <label for="phone-number">Phone Number
        <input type="number" name="phoneNumber" id="phoneNumber" required>
      </label>
        
      <div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-secondary">Return</button>
      </div>
    </form>
  </div>



<?php

    require_once("../assets/html/footer.html");

?>