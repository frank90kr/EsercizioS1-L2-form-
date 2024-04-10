<?php 
    echo '<pre>' . print_r($_POST, true) . '</pre>';

    //Controlliamo se il metodo di invio dei dati è POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $name = $_POST['username'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $password = $_POST['password'];

        $errors = [];

        //Validazione dei dati

        if (strlen($name) < 4) {
            $errors['username'] = 'Il nome deve essere di almeno 4 caratteri';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email non valida';
        }

       

        if ($age < 18) {
            $errors['age'] = 'deve essere maggiore di 18';
        }

        if (strlen($password) < 6) {
            $errors['password'] = 'Password troppo corta';
        }

        //indirizziamo l'utente alla pagina success

        if ($errors == []) {
            header('Location: /EsercizioS1-L2(form)/form-success.php');
        }

    }?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center">Form di registrazione</h1>

<div class="d-flex justify-content-center mt-3">
<form action="" method="post" novalidate>
    <div class="mb-3">

    <label for="username" class="form-label">Username</label>
  <input type="text" name="username" class="form-control <?= isset($errors['username']) ? 'is-invalid' : '' ?>" id="username" placeholder="username">
  <div class="error"><?= $errors['username'] ?? '' ?></div>


  <label for="email" class="form-label">Email</label>
  <input type="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" id="email" placeholder="name@example.com">
  <div class="error"><?= $errors['email'] ?? '' ?></div>
</div>

<label for="age" class="form-label">Età</label>
  <input type="number" name="age" class="form-control <?= isset($errors['age']) ? 'is-invalid' : '' ?>" id="age">
  <div class="error"><?= $errors['age'] ?? '' ?></div>

  <label for="password" class="form-label">Password</label>
  <input type="password" name="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" id="password" placeholder="******">
  <div class="error"><?= $errors['password'] ?? '' ?></div>


  <button type="submit" class="btn btn-success mt-4 w-100">Invia</button>

</form>

</div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>