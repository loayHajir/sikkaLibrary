<?php

include "core/connect.php";
include "core/admin.php";
$title = 'Book Table';
ob_start();
?>
<link rel="stylesheet" href="assets/css/owner.css">
<style>

</style>

<div class="button-container">
    <a href="book-add.php" id="button add-button">Add Book</a>
    <a id="logout" href="logout.php? logout=' . $id . '" class="button text-light">Logout</a>
</div>
<div class="buttoncontainer">
    <a href="category-add.php" class="button" id="add-button">Add Category</a>
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
<a class="btn btn-primary" href="book-update.php? updateid=' . $id . '" class="text-light">Update</a>

<a class="btn btn-danger" onclick="return msg()" href="book-delete.php? deleteid=' . $id . '"
class="text-light">delete</a>
</td>
</tr>';
            }
        }
        ?>
    </tbody>
</table>

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

<?php

$page = ob_get_clean();

include 'templates/html.php';
