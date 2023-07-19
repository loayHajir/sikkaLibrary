<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Book Table</title>
    <style>
    /* CSS styling for the table */
    button {
        padding: 0.5rem 1rem;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
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
        color: black;
    }
    </style>
</head>

<body>
<<<<<<< HEAD
    <div class="button-container">
        <button id="add-button"><a href="add.php">Add</a></button>
=======
    <div class=" button-container">
<<<<<<< HEAD
        <button id="add-button"><a href="add.php">Add</a></button>
=======
        <button id="add-button"  ><a href="add.php">Add</a></button>
>>>>>>> 47344cb3b5ca2f3717949eb5cc901e8a529c39db
>>>>>>> 0ae9fbf06929600952669eb42f30cdcc12ac2d10
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Description</th>
                <th>Language</th>
                <th>Available</th>
                <th>PDF</th>
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
<<<<<<< HEAD
                    $available = $row['Avilable'];
                    $pdf = $row['PDF'];
=======
                    $available = $row['Available'];
>>>>>>> 0ae9fbf06929600952669eb42f30cdcc12ac2d10
                    echo ' 
    <tr> 
    <th scope="row">' . $id . '</th>
    <td>' . $bookname . '</td>
    <td>' . $desc . '</td>
    <td>' . $lang . '</td>
    <td>' . $available . '</td>
    <td> <a href="' . $pdf . '" download>' . $pdf . '</a> </td>
    <td> 
    <button class="btn btn-primary"><a href="update.php? updateid=' . $id . '" class="text-light">Update</a></button>

    <button class="btn btn-danger" onclick="return msg()"><a href="delete.php? deleteid=' . $id . '"
    class="text-light">delete</a></button>
    </td>
    </tr>';
                }}
                ?>
        </tbody>
    </table>
</body>

</html>
<script>
<<<<<<< HEAD
    function msg(){
=======
function msg() {
>>>>>>> 47344cb3b5ca2f3717949eb5cc901e8a529c39db
    var confirmation = confirm("Are you want to delete?");
    if (confirmation) {
        alert("deleted successfully!");
    } else {
<<<<<<< HEAD
        return false;
    }
}
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
        return false;
    }
}
=======
<<<<<<< HEAD
return false;
=======
>>>>>>> cae9cc550ab51f1836339cf5c1671465d674c409
        return false;
    }
}

>>>>>>> 47344cb3b5ca2f3717949eb5cc901e8a529c39db
>>>>>>> 0ae9fbf06929600952669eb42f30cdcc12ac2d10
</script>