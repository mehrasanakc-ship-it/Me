<html>
<head>
    <title>Registration Form</title>
</head>
<body>

<h2>Registration Form</h2>

<form method="POST" action="">
    Name:
    <input type="text" name="name"><br><br>

    Email:
    <input type="text" name="email"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    Phone:
    <input type="text" name="phone"><br><br>

    Gender:
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female<br><br>

    <input type="submit" name="submit" value="Register">
</form>

<?php
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'] ?? "";

    if(empty($name) || empty($email) || empty($password) ||
       empty($phone) || empty($gender))
    {
        echo "All fields are required";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "Invalid Email";
    }
    elseif(strlen($password) < 6)
    {
        echo "Password must contain at least 6 characters";
    }
    elseif(!preg_match("/^[0-9]{10}$/", $phone))
    {
        echo "Phone number must contain 10 digits";
    }
    else
    {
        echo "<h3>Registration Successful!</h3>";
        echo "Name: " . htmlspecialchars($name) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Gender: " . htmlspecialchars($gender);
    }
}
?>

</body>
</html>
