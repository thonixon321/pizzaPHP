<?php

  $name = "yoshi";

  // multi-dimensional arrays
  $blogs = [
    ['title' => 'mario party',
     'author' => 'mario',
     'content' => 'lorem',
     'likes' => 30
    ],
    ['title' => 'game cheats',
     'author' => 'toad',
     'content' => 'lorem',
     'likes' => 40
    ],
    ['title' => 'hidden chests',
     'author' => 'link',
     'content' => 'lorem',
     'likes' => 50
    ]
  ];

  //push something onto an array
  $blogs[] = ['title' => 'fun times',
              'author' => 'link',
              'content' => 'lorem',
              'likes' => 60
             ];

  //pop last element
  $popped = array_pop($blogs);

  //show the array on screen
  // print_r($blogs[0]['title']);
  // print_r($popped);

  $ninjas = ['shaun', 'ryu', 'yoshi'];

  $products = [
    ["pizza" => "pineapple and olive",
     "cost" => "15.00"
    ],
    ["pizza" => "pepperoni",
     "cost" => 12.50
    ],
    ["pizza" => "cheese",
     "cost" => 10.00
    ],
  ];
  //for loop practice
  // for ($i = 0; $i < count($ninjas); $i++) {
  //   echo $ninjas[$i] . '<br />';
  // }
  // //for each practice
  // foreach($ninjas as $ninja){
  //   echo $ninja . '<br />';
  // }

  // foreach($blogs as $blog) {
  //   echo $blog['title'] . '-'. $blog['author'];
  //   echo '<br />';
  // }

  // $i = 0;
  //while loop practice
  // while($i < count($blogs)) {
  //   echo $blogs[$i]['title'];
  //   echo '<br />';
  //   $i++;
  // }

  $price = 20;
  //conditional practice
  // if ($price < 30) {
  //   echo 'the condition is met';
  // }elseif($price < 20) {
  //   echo '2nd condition met';
  // }else{
  //   echo 'condition not met';
  // }

  //break/continue practice
  // foreach($blogs as $blog) {
  //   //break gets out of the loop completely
  //   if ($blog['author'] === 'link') {
  //     break;
  //   }
  //   //continue goes to next index in loop without running the next echo
  //   if ($blog['author'] === 'mario') {
  //     continue;
  //   }

  //   echo $blog['author'];
  // }

  //function practice
  //setting a default arg with 'shaun'
  // function sayHello($name = 'shaun') {
  //   echo "good morning $name";
  // }
  // sayHello();

  // function formatProduct($product) {
  //   return "{$product['pizza']} costs \${$product['cost']} to buy <br />";
  // }
  // foreach ($products as $product) {
  //   echo formatProduct($product);
  // }

  //global vs local var practice
  // $name = 'mario';
  //& will allow access to the global $name and update it
  // function sayBye(&$name) {
  //   $name = 'wario';
  //   echo "bye $name";
  // }

  // sayBye($name);
  // echo $name;

  // include('ninjas.php'); //if error carries on with code
  // require('ninjas.php'); //if error does not carry on\





?>