<?php
  session_start();
  //override session var
  // $_SESSION['name'] = 'yoshi';

  //QUERY_STRING is the '?' in url
  if ($_SERVER['QUERY_STRING'] == 'noname') {
    //delete session var
    unset($_SESSION['name']);
    //clear all vars
    session_unset();
  }
  //set to one of two values based on which one exists (null coalescing)
  $name = $_SESSION['name'] ?? 'Guest';

  //get cookie
  $gender = $_COOKIE['gender'] ?? 'Unknown';
?>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <meta http-equiv='X-UA-Compatible' content='ie=edge'>
  <title>Ninja Pizza</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style type="text/css">
    .brand {
      background: #cbb09c !important;
    }
    .brand-text {
      color: #cbb09c !important;
    }
    form {
      max-width: 460px;
      margin: 20px auto;
      padding: 20px;
    }
    .pizza {
      width: 100px;
      margin: 40px auto -30px;
      display: block;
      position: relative;
      top: -30px;
    }
  </style>
</head>
<body class="grey lighten-4">

  <nav class="white z-depth-0">
    <div class='container'>
      <a href="index.php" class="brand-logo brand-text"> Ninja Pizza </a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <li class='grey-text'>Hello <?php echo htmlspecialchars($name); ?></li>
        <li class='grey-text'>(<?php echo htmlspecialchars($gender); ?>)</li>
        <li><a href="add.php" class="btn brand z-depth-0"> Add a Pizza </a></li>

      </ul>
    </div>
  </nav>