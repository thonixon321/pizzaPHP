<?php

include('config/db_connect.php');

//3 steps to getting data from db

// Step 1 - write query for all pizzas
//this is getting certain columns from our pizzas table -
//compared to  getting all (*)
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

// Step 2 - make query & get result
$result = mysqli_query($conn, $sql);


// Step 3 - fetch the resulting rows as an array - formats result
//$result is where we fetch the rows from, and MYSQLI_ASSOC
//is where we make them into an associative array e.g. ['id' => 1, 'title' => 'mario']
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free result from memory - not hanging on to it anymore
//(Good Practice)
mysqli_free_result($result);

//close connection
mysqli_close($conn);




?>

<!DOCTYPE html>
<html lang='en'>


   <?php include('templates/header.php') ?>

   <h4 class='center grey-text'>Pizzas!</h4>

   <div class='container'>
    <div class='row'>

      <?php foreach($pizzas as $pizza): ?>

        <div class='col s6 md3'>
          <div class='card z-depth-0'>
            <img src='img/pizza.svg' class='pizza' alt=''>
            <div class='card-content center'>
              <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
              <ul>
                <?php foreach (explode(',', $pizza['ingredients']) as $ingredient ) { ?>
                  <li><?php echo htmlspecialchars($ingredient); ?></li>
                <?php } ?>
              </ul>

            </div>
            <div class='card-action right-align'>
              <a href='details.php?id=<?php echo $pizza['id'] ?>' class='brand-text'>more info</a>
            </div>
          </div>
        </div>

      <?php endforeach; ?>

      <?php if (count($pizzas) > 2) : ?>
        <p>More than 2 pizzas</p>
      <?php else : ?>
        <p>2 or less pizzas</p>
      <?php endif; ?>
    </div>
   </div>


   <?php include('templates/footer.php') ?>



</html>

