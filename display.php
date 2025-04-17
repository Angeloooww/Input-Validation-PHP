<?php
session_start();
if (!isset($_SESSION['username'], $_SESSION['email'], $_SESSION['age'])) {
    header("Location: index.php");
    exit;
}
?>

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f4f8;
    padding: 30px;
    color: #333;
  }

  h2 {
    text-align: center;
    color: #2c3e50;
  }

  .student-details {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
  }

  .student-details p {
    margin: 10px 0;
    font-size: 16px;
  }

  .student-details strong {
    color: #007BFF;
  }
</style>


<h2>Student Details:</h2>
<div class="student-details">
  <p><strong>Name:</strong> <?= htmlspecialchars($_SESSION['username']) ?></p>
  <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email']) ?></p>
  <p><strong>Age:</strong> <?= htmlspecialchars($_SESSION['age']) ?></p>
</div>

<h4 style="text-align: center; margin-top: 20px;">
  <a href="index.php">Back to Form</a>
</h4>