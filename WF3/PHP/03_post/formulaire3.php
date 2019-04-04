<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire 3</title>
</head>
<body>
<!-- realiser un formulaire HTML (pseudo, email) en recuperant les données directement sur la page formulaire4.php -->
<form class="col-md-4 offset-md-4" method="post" action="formulaire4.php">
  <div class="form-group">
    <label for="Pseudo">Pseudo</label>
    <input type="text" class="form-control col-md-12" id="Pseudo" name="pseudo" placeholder="pseudo">
  </div> 
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control col-md-12" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php


?>
    
</body>
</html>