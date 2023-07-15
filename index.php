<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Welcome</title>
</head>
<body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $color = $_POST["color"];
    $message = $_POST["message"];

    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $_SESSION["color"] = $color;
    $_SESSION["message"] = $message;

    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

if (isset($_SESSION["name"]) && isset($_SESSION["email"]) && isset($_SESSION["message"])) {
    $name = $_SESSION["name"];
    $email = $_SESSION["email"];
    $color = $_SESSION["color"];
    $message = $_SESSION["message"];

    // Clear session variables
    unset($_SESSION["name"]);
    unset($_SESSION["email"]);
    unset($_SESSION["color"]);
    unset($_SESSION["message"]);

}
?>
<h1>Welcome to my Test Page!</h1>
<p>This is a simple test page to display my contact form that I am including! To resubmit the form, simply refresh the page. I am using the JetBrains PHPStorm IDE and testing out the capabilites it has, so it may be a bit overkill, but its so cool! Happy coding!</p>
<div class="contact-form">
    <?php if (isset($name) && isset($email) && isset($message)) : ?>
        <div class="submission-info">
            <h2>Form Submission</h2>
            <p>Name: <?php echo $name; ?></p>
            <p>Email: <?php echo $email; ?></p>
            <p>Favorite Color (in the list): <?php echo $color; ?></p>
            <p>Message: <?php echo $message; ?></p>

        </div>
    <?php else : ?>
    <?php include 'contact_form.php'; ?>
    <?php endif; ?>
</div>
</div>

</body>
</html>
