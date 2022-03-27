<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<body bgcolor="#F582A7">
<?php
    // define variables and set to empty values
    $fullname= $email= $phone_number= $gender= $comment= $age="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fullname = test_input($_POST["fullname"]);
        $email = test_input($_POST["email"]);
        $phone_number = test_input($_POST["phone_number"]); 
        $gender = test_input($_POST["gender"]);
        $comment = test_input($_POST["comment"]);
        $age = test_input($_POST["age"]);
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>


    <h2>Form Validation.</h2>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="user">Fullname:</label><br>
        <input type="text" id="name" name="fullname" required><br><br>
        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email" required><br><br>
        <label for="user">Phone Number:</label><br>
        <input type="text" name="phone_number" id="phone_number" required><br><br>
        <label for="comment">Comment:</label><br>
        <textarea name="comment" id="" cols="30" rows="10" ></textarea><br><br>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" id="gender" value="Female">
        <label for="female">Female</label>
        <input type="radio" name="gender" id="gender" value="Male">
        <label for="male">Male</label>
        <br><br>
        <label for="age">Age:</label><br>
        <input type="text" name="age" id="age"><br><br>
        <input type="submit" name="submit" id="submit">
    </form>

<?php
    echo "<h1>Your Input: </h1>";
    echo $fullname; 
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $phone_number;
    echo "<br>";
    echo $comment;
    echo "<br>";
    echo $gender;
    echo "<br>";
    echo $age;
?>        

</body>
</html>
