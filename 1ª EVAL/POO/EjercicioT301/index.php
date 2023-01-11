<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   include 'ReadingMaterial.php';
   include 'Magazine.php';
   include 'Book.php';
   $publisher1 = new Publisher ("Jorjo", "C/ Flores", "666999888", "www.publisher.com");
   echo "<pre>";
print_r($publisher1);
echo "</pre>";
    $material = new Book ("pppp","kkkk","kkkkk",200,23,$publisher1);
    $carton = new Magazine ("aaa", "kkk","eeee",23, $publisher1);
    echo "<pre>";
print_r($material);
echo "</pre>";

echo "<pre>";
print_r($carton);
echo "</pre>";
   
   
   ?> 
</body>
</html>