<html>
<head>
    <title>Explore Admin Panel</title>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="styles/style.css">

</head>
<body>

<?php
$submitErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Variables used later to check with database
    $name = ""; $pass = "";

    // This if else statement is used to check whether the name or password where empty.
    // if not, they are trimmed and checked for special chars, and then saved in the variables.
    if (!empty($_POST["nameInput"]) && !empty($_POST["passInput"]))
    {
        // name is not empty
        $name = checkInput($_POST["nameInput"]);
        $pass = checkInput($_POST["passInput"]);
        //$submitErr = $name . ", " . $pass;
    } else {
        // If one of the fields are empty, this error message is shown
        $submitErr = "Name or Password cannot be empty";
    }

    // If the name and pass are not empty, we will call the database to check whether it is correct info.
    if (!empty($name) && !empty($pass))
    {
        // no empty fields
        $pass = mysqli_real_escape_string($connect, $pass); // To prevent sql injection
        $name = mysqli_real_escape_string($connect, $name); // To prevent sql injection

        $sql = "SELECT * FROM admin WHERE userName='$name' LIMIT 1";
        $query = mysqli_query($connect, $sql);
        $rows = mysqli_num_rows($query);
        if ($rows == 1)
        {
            // password correct
            $rowArr = mysqli_fetch_array($query);
            $dbPass = $rowArr['password'];
            //session_start();
            //$_SESSION['password'] = $dbPass;

            if ($pass == $dbPass)
            {
                $submitErr = "Login Successful " . $name . ", " . $pass;
            } else {
                $submitErr = "Username or Password incorrect";
            }

            //$submitErr = "Login Successful " . $name . ", " . $pass . ", " . $dbPass;
            //header("Location: index.php?page=admin"); // redirect to the admin panel, if this where a seperate login page
        }
        else {
            // password INcorrect
            $submitErr = "Username or Password incorrect";
        }
    }
}

function checkInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<form method="post" action="?page=admin">
    <table id="adminLoginTable">
        <tr>
            <th class="adminLoginTH">Enter Login details</th>
        </tr>
        <tr>
            <td class="adminLoginTD"><input class="inputField" id="nameInput" type="text" name="nameInput" placeholder="Admin name"></td>
        </tr>
        <tr>
            <td class="adminLoginTD"><input class="inputField" id="passInput" type="password" name="passInput" placeholder="Password"></td>
        </tr>
        <tr>
            <td class="adminLoginTD"><input type="submit" class="loginBtn" name="loginBtn" value="Login"></td>
        </tr>
        <tr>
            <td class="adminLoginTD"><h3 class="error"><?php echo $submitErr ?></h3></td>
        </tr>
    </table>
</form>

</body>
</html>