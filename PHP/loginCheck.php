<?PHP
session_start();
include 'databaseConnection.php';
if(isset($_POST['email'])){
  global $connection;
  $sql = ("SELECT password, username, [user_id] FROM Users WHERE email = (:email)");
  $preparedQuary = $connection->prepare($sql);
  $preparedQuary->execute(array(':email' => $_POST['email']));
  $data = $preparedQuary->fetch();

  $checkpassword = $_POST['password'];
  if(password_verify($checkpassword, $data['password'])){   
    $_SESSION["User"] = $data['username'];
    $_SESSION["User_id"] = $data['user_id'];
    header("Location: ../HTML/Pages/Homepage.php");
  }
  else{
    header("Location: ../HTML/Pages/Login.php");
  }
}

