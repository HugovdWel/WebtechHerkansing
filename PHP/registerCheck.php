<?php
    include 'databaseConnection.php';
    global $connection;

    if(isset($_POST["user-R"], $_POST["email-R"], $_POST["password-R"], $_POST["repeat-R"])){
        if($_POST["password-R"] == $_POST["repeat-R"]){

            $sql = ("SELECT email FROM Users WHERE email = (:email)");
            $preparedQuerry = $connection->prepare($sql);
            $preparedQuerry->bindParam(':email', $_POST["email-R"], PDO::PARAM_STR);
            $preparedQuerry->execute();
            $data = $preparedQuerry->fetch();
            
            $sql2 = ("SELECT username FROM Users WHERE username = (:username)");
            $preparedQuerry2 = $connection->prepare($sql2);
            $preparedQuerry2->bindParam(':username', $_POST["username-R"], PDO::PARAM_STR);
            $preparedQuerry2->execute();
            $data2 = $preparedQuerry2->fetch();

            if(($data == null) && ($data2 == null)){
                try{
                    $passwordHash = password_hash($_POST["password-R"], PASSWORD_DEFAULT);
                    $sql3 = ("INSERT INTO Users (username, [password], email) VALUES (:username, :password, :email)");
                    $preparedQuerry3 = $connection->prepare($sql3);
                    $preparedQuerry3->bindParam(':username', $_POST["user-R"], PDO::PARAM_STR);
                    $preparedQuerry3->bindParam(':password', $passwordHash, PDO::PARAM_STR);
                    $preparedQuerry3->bindParam(':email', $_POST["email-R"], PDO::PARAM_STR);
                    $preparedQuerry3->execute();
                }
                catch(PDOException $Exception){
                    $message = "Er is iets misgegaan in de database, probeer het later opnieuw";
                }catch(Exception $e){
                    $message = "Er is iets misgegaan, probeer het later opnieuw";
                }
                header("Location: ../HTML/Pages/login.php");
            }
        }
    }
    else{
        header("Location: ../HTML/Pages/register.php");
    }
    echo '<meta http-equiv="refresh" content="0;URL=../HTML/Pages/HomePage.php" />';
?>