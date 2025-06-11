<?php
$contactSerializeInfo = file_get_contents("contact_info.txt");
$contactInfo = unserialize($contactSerializeInfo);
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    unset($contactInfo[$id]);
    $stringfyData = serialize($contactInfo);
    file_put_contents("contact_info.txt", $stringfyData);
}

// print "<pre>";
// var_dump($contactInfo);
// print "</pre>";



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="contactAdd">
            <a href="contact_add.php">Add Contact</a>
        </div>
        <?php if (empty($contactInfo)) {
        ?>
            <div class="noData">
                <p>No Contact Found!</p>
            </div>
        <?php
        } else {
        ?>
            <div class="Contact Information">
                <table>
                    <thead>
                        <tr>
                            <th>
                                SL
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Contact
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sl = 1;
                        foreach ($contactInfo as $index => $contact) {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $sl++ ?>
                                </td>
                                <td>
                                    <?php echo $contact["name"] ?>

                                </td>
                                <td>
                                    <?php echo $contact["email"] ?>

                                </td>
                                <td>
                                    <?php echo $contact["contact"] ?>

                                </td>
                                <td>
                                    <a href="contact_edit.php?id=<?php echo $index ?>"> Edit </a>
                                    |
                                    <a href="index.php?id=<?php echo $index ?>" onclick="return confirm('Are you sure?;')"> Delete </a>

                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>