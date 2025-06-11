<?php
$contactSerializeInfo = file_get_contents("contact_info.txt");
$contactInfo = unserialize($contactSerializeInfo);
$userId = $_GET["id"];

$userData = $contactInfo[$userId];

if (!empty($_POST)) {
    $post = $_POST;
    $name = $post["name"];
    $email = $post["email"];
    $contact = $post["contact"];


    $contactInfo[$userId] = [
        "name" => $name,
        "email" => $email,
        "contact" => $contact,
    ];
    // print "<pre>";
    // print_r($contactInfo);
    // print "</pre>";

    $stringfyData = serialize($contactInfo);
    file_put_contents("contact_info.txt", $stringfyData);
    header("Location: index.php");
};




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Edit</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <p>Edit Contact</p>
    <div class="container">
        <form action="" method="post">
            <label for="name"> Name </label>
            <input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $userData["name"] ?>">
            <label for="name"> Email </label>
            <input type="text" name="email" placeholder="Enter Your Email" value="<?php echo $userData["email"] ?>">>
            <label for="name"> Contact </label>
            <input type="text" name="contact" placeholder="Enter Your Contact" value="<?php echo $userData["contact"] ?>">>
            <input type="submit" value="Update Info" name="submit">
        </form>
    </div>
</body>

</html>