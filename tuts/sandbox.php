<?php

  //ternary practice
  // $score = 50;

  // $val = $score > 40 ? 'high score' : 'low score';

  // echo $val;

  //super global practice
  // echo $_SERVER['SERVER_NAME'] . '<br />';
  // echo $_SERVER['REQUEST_METHOD'] . '<br />';
  // echo $_SERVER['SCRIPT_FILENAME'] . '<br />';
  // echo $_SERVER['PHP_SELF'] . '<br />';

  //$_SESSION //$_COOKIE
  //sessions store data on the server where a cookie
  //stores data on a users computer

  if(isset($_POST['submit'])) {
    //cookie for gender (last param is expiry date)
    setcookie('gender', $_POST['gender'], time() + 86400);

    session_start();
    //store in session var 'name'
    $_SESSION['name'] = $_POST['name'];

    header('Location: index.php');
  }

  //file practice
  $file = 'quotes.txt';

  if (file_exists($file)) {
    // //read file
    // echo readfile($file) . '<br />';

    // // copy file //php will make this file
    // copy($file, 'quotes.txt');

    // //absolute path
    // echo realpath($file) . '<br />';

    // //file size
    // echo filesize($file) . '<br />';

    // //rename file
    // rename($file, 'test.txt');
  } else {
    echo 'file does not exist' . '<br />';
  }
  //make directory
  // mkdir('quotes');

  //file practice part 2
  //open file for reading - 'r' for reading only (no writing), r+ reads and writes
  //a+ will set the pointer (focus of file) to the end so you can write to the end of file
  $handle = fopen($file, 'a+');

  //read it (opened file, file byte size you want to read)
  // echo fread($handle, filesize($file));
  //read only a portion
  // echo fread($handle, 12);

  //read single line
  // echo fgets($handle);
  //doing it again wil go to next line due to the pointer (like a clicking on the next line)
  // echo fgets($handle);

  //read a single character
  // echo fgetc($handle);

  //writing to file "\n" goes to new line
  // fwrite($handle, "\nEverything popular is doing alright");
  //good practice to close the file
  // fclose($handle);
  // //delete a file
  // unlink($file);

  //objects and classes practice

  //classes

  class User {
    //properties
    private $email;
    private $name;

    //set property values within constructor function
    //which runs automatically when calling the User class
    public function __construct($name, $email) {
      // $this->email = 'mario@ab.com';
      // $this->name = 'mariob';
      $this->email = $email;
      $this->name = $name;
    }

    public function login() {
      echo $this->name . ' logged in bro';
    }
    //GETTER
    public function getName() {
      return $this->name;
    }
    //SETTER
    public function setName($name) {
      //validate it is a string and it is at least 2 chars
      if(is_string($name) && strlen($name) > 1) {
        $this->name = $name;
        return "name has been updated to $name";
      }else{
        return 'not a valid name';
      }
    }

  }

  // $userOne = new User();
  $userTwo = new User('yoshi', 'yoshi@net.net');

  // echo $userTwo->getName();
  echo $userTwo->setName('mario');
  echo $userTwo->getName();
  // echo $userTwo->email;

  // $userTwo->login();

  // $userOne->login();
  // echo $userOne->name;

?>


<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <title>Document</title>
</head>
<body>

<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="POST">
  <input type='text' name="name">
  <select name='gender' id=''>
    <option value='male'>male</option>
    <option value='female'>female</option>
  </select>
  <input type='submit' name="submit" value="submit">
</form>

</body>
</html>