<?php
  //isset checks if value was set
  //$_GET is a global php array var that has stored all data sent from
  // a form in a GET request - associates with name attr in html
  // if(isset($_GET['submit'])) {
  //   echo $_GET['email'];
  //   echo $_GET['title'];
  //   echo $_GET['ingredients'];
  // }

  include('config/db_connect.php');


  $errors = array('email'=>'', 'title' =>'', 'ingredients'=>'');

  $email = $title = $ingredients = '';


  if(isset($_POST['submit'])) {
    //htmlspecialchars renders things like < to html entities so people
    //can't inject js code and have it run automatically

    // echo htmlspecialchars($_POST['email']);
    // echo htmlspecialchars($_POST['title']);
    // echo htmlspecialchars($_POST['ingredients']);

    //check if email is empty
    if (empty($_POST['email'])) {
      $errors['email'] = 'An email is required <br />';
    }else {
      $email = $_POST['email'];
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] =  "email not valid";
      }
    }

    //check title
    if (empty($_POST['title'])) {
      $errors['title'] = 'A title is required <br />';
    }else {
      $title = $_POST['title'];

      if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        $errors['title'] = 'Title must be letters and spaces only';
      }

    }

    //check ingredients
    if (empty($_POST['ingredients'])) {
      $errors['ingredients'] = 'At least one ingredient is required <br />';
    }else {
      $ingredients = $_POST['ingredients'];

      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
        $errors['ingredients'] = 'Ingredients are not spaced properly';
      }
    }
    //array_filter cycles through the array and if there are values instead of ''
    //it will return true, else, all values are empty and form is valid
    if (!array_filter($errors)) {
      //protect data going to database (could use protect statements with PDO in future)
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $title = mysqli_real_escape_string($conn, $_POST['title']);
      $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

      //After values have been protected, go ahead and do the steps to update the DB

      //Step 1 - create sql
      $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";

      //Step 2 - save to db and check
      if (mysqli_query($conn, $sql)) {
        //success

        //redirect to home
        header('Location: index.php');
      }else{
        //error
        echo 'query error: ' . mysqli_error($conn);
      }


    }

    //end of input validation
  }


?>

<!DOCTYPE html>
<html lang='en'>


   <?php include('templates/header.php') ?>

   <section class="container grey-text">
    <h4 class='center'>Add a Pizza:</h4>
    <form action='add.php' method='POST' class='white'>
      <label for='email'>Your Email</label>
      <input type='text' name="email" value="<?php echo htmlspecialchars($email)  ?>">
      <div class='red-text'><?php echo $errors['email']; ?></div>

      <label for='title'>Pizza Title:</label>
      <input type='text' name="title" value="<?php echo htmlspecialchars($title) ?>">
      <div class='red-text'><?php echo $errors['title']; ?></div>

      <label for='ingredients'>Ingredients (comma separated):</label>
      <input type='text' name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
      <div class='red-text'><?php echo $errors['ingredients']; ?></div>

      <div class='center'>
        <input type='submit' name="submit" value="submit" class="btn brand z-depth-0">
      </div>
    </form>
   </section>


   <?php include('templates/footer.php') ?>



</html>
