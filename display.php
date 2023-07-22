<?php
include "connect.php";
session_start();

if (!isset($_SESSION['Type']) || $_SESSION['Type'] !== 'Admin') {
    // If the user is not an admin, redirect them to the login page
    header("location: login.php");
    exit(); // Stop script execution after redirecting
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Book Table</title>
    <style>
    /* CSS styling for the table */
    .btn,
    button {
        padding: 0.5rem 1rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        display: inline-block;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    .button-container {
        text-align: left;
    }

    .button-container button {
        padding: 0.5rem 1rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    a {
        text-decoration: none;
        color: white;
    }

    #down {
        color: blue;
        text-decoration: underline;
    }

    #logout {
        padding: 0.5rem 1rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        position: absolute;
        bottom: 20px;
        right: 50px;
    }
    </style>
</head>

<body>

    <div class=" button-container">
        <button id="add-button"><a href="add.php">Add</a></button>
        <td>
            <a id="logout" href="logout.php? logout=' . $id . '" class="text-light">Logout</a>
        </td>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Description</th>
                <th>Language</th>
                <th>Available</th>
                <th></th>
            </tr>
        </thead>

        <tbody id="table-body">
            <?php
            $SQL = "select * from `books`";
            $result = mysqli_query($conn, $SQL);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['ID'];
                    $bookname = $row['BookName'];
                    $desc = $row['Description'];
                    $lang = $row['Language'];
                    $available = $row['Available'];
                    echo ' 
    <tr> 
    <th scope="row">' . $id . '</th>
    <td>' . $bookname . '</td>
    <td>' . $desc . '</td>
    <td>' . $lang . '</td>
    <td>' . $available . '</td>
    <td> 
    <a class="btn btn-primary" href="update.php? updateid=' . $id . '" class="text-light">Update</a>

    <a class="btn btn-danger" onclick="return msg()" href="delete.php? deleteid=' . $id . '"
    class="text-light">delete</a>
    </td>
    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>
<script>
function msg() {

    var confirmation = confirm("Are you want to delete?");
    if (confirmation) {
        alert("deleted successfully!");
    } else {
        return false;
    }

}
</script>