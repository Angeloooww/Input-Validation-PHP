<?php
$nameMsg = $emailMsg = $ageMsg = "";
$username = $email = $age = "";
$hasError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = clean_text($_POST['username']);
    $email = clean_text($_POST['email']);
    $age = clean_text($_POST['age']);

    if (empty($username)) {
        $nameMsg = "*Please enter a valid name.<br>";
        $hasError = true;
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailMsg = "*Please enter a valid email.<br>";
        $hasError = true;
    }

    if (empty($age) || !filter_var($age, FILTER_VALIDATE_INT) || $age < 18) {
        $ageMsg = "*Please enter a valid age (must be 18 or older).<br>";
        $hasError = true;
    }

    if (!$hasError) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['age'] = $age;
        header("Location: display.php");
        exit;
    }
}

function clean_text($text) {
    return htmlspecialchars(trim($text));
}
?>

<style>
  .form-container {
    max-width: 400px;
    margin: 30px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    font-family: Arial, sans-serif;
  }

  .form-container h2 {
    text-align: center;
    color: #2c3e50;
  }

  input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px solid #bbb;
    border-radius: 4px;
  }

  input[type="submit"] {
    background-color: #007BFF;
    color: white;
    padding: 10px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: #0056b3;
  }

  span {
    font-size: 0.9em;
    display: block;
    margin-bottom: 10px;
  }
</style>

<div class="form-container">
  <h2>Enter your details</h2>

  <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
    Name: <input type="text" name="username" value="<?= $username ?>"><br>
    <span style="color: darkred;"><?= $nameMsg ?></span>

    Email: <input type="text" name="email" value="<?= $email ?>"><br>
    <span style="color: darkred;"><?= $emailMsg ?></span>

    Age: <input type="text" name="age" value="<?= $age ?>"><br>
    <span style="color: darkred;"><?= $ageMsg ?></span>

    <br><input type="submit" value="Submit">
  </form>
</div>
