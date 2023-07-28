<?php

// get id from params
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $contact_id = $_GET['id'];

    // Create a new Contact object

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        form{
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.5);
            padding: 20px;
            border-radius: 10px;
        }

        input[type="submit"]{
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        a{
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: red;
            color: white;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
    <title>Confirm delete</title>
</head>
<body>
    <!-- create a div container for confirm delete -->
    <div class="container">
        <!-- create a form for confirm delete -->
        <form action="delete.php" method="post">
            <!-- create input type hidden for id -->
            <input type="hidden" name="id" value="<?php echo $contact_id; ?>">
            <p>Are you sure you want to delete this contact?</p>
            <input type="submit" value="Yes">
            <a href="index.php">No</a>
        </form>

</body>
</html>