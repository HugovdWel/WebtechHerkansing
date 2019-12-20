<?PHP
session_start();
include 'databaseConnection.php';
if(isset($_POST['email'])){
  global $connection;
  $sql = ("SELECT password, username FROM Users WHERE email = (:email)");
  $preparedQuary = $connection->prepare($sql);
  $preparedQuary->execute(array(':email' => $_POST['email']));
  $data = $preparedQuary->fetch();

  $checkpassword = $_POST['password'];
  if(password_verify($checkpassword, $data['password'])){   
    $_SESSION["User"] = $data['username']; 
    echo "gelukt";
    header("Location: ../HTML/Pages/Homepage.php");
  }
  else{
    echo "oeps";
  }
}

