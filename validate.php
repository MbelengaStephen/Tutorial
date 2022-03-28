<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate Form</title>
    <style>
        .error {color: #ff0000;}
    </style>
</head>
<body>
    <?php
        // define variables names and set them to empty
        $nameErr= $emailErr= $genderErr= $websiteErr="";
        $name= $email= $gender= $comment= $website="";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["name"])){
                $name= "";
            }
            else{
                $name = test_input($_POST["name"]);
                if(!preg_match("/[^A-Za-z']*$/", $name)){
                    $nameErr = "only letters and whitespaces allowed.";
                }    
            }
        }
        if (empty($_POST["email"])){
            $email= "";
        }
        else{
            $email = test_input($_POST["email"]);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $emailErr = "invalid email.";
            }
        }

        if(empty($_POST["website"])){
            $website = "";
        }
        else{
            $website = test_input($_POST["website"]);
            if(!preg_match("/\b(?:(https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~|:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)){
                $websiteErr = "Enter a valid website url.";

            }
        }
        if(empty($_POST["comment"])){
            $comment = "";
        }
        else{
            $comment = test_input($_POST["comment"]);
        }
        if(empty($_POST["gender"])){
            $genderErr = "please select gender";
        }
        else{
            $gender = test_input($_POST["gender"]);
        }

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>   
    <h2>Form Validation.</h2>
    <p> <span class="Error"> required field</span> </p>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
        <label for="user">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        <p> <span class="error"> <?php echo $nameErr;?> </span> </p>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email"><br><br>
        <p> <span class="error"> <?php echo $emailErr;?> </span></p><br><br>
        <label for="website">Website:</label><br>
        <input type="text" id="website" name="website"><br><br>
        <p> <span class="error"> <?php echo $websiteErr;?> </span></p>
        <br><br>
        <label for="comment">Comment:</label><br>
        <textarea name="comment" id="" cols="30" rows="10" ></textarea><br><br>
        <label for="gender">Gender:</label>
        <input type="radio" name="gender" id="gender" value="Female">
        <label for="female">Female</label>
        <input type="radio" name="gender" id="gender" value="Male">
        <label for="male">Male</label>
        <p> <span class="error"> <?php echo $genderErr;?> </span> </p>
        <br><br>
        <input type="submit" name="submit" id="submit">
    </form>
    <?php
        echo "<h1>Your Input: </h1>";
        echo $name; 
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;
        echo "<br>";
    ?>       
</body>
</html>
