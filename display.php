<?php

include "core/connect.php";
include "core/admin.php";
$title = 'Book Table';
ob_start();
?>

<link rel="stylesheet" href="assets/css/owner.css">
<link rel="stylesheet" href="assets/css/header.css">
<div class="display-content">
    <div class="button-container">
        <a href="book-add.php" class="add-book-btn">Add Book</a>
        <a href="category-add.php" class="add-category-btn">Add Category</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Language</th>
                <th>Date of publication</th>
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
                    $dop = $row['dop'];
                    $lang = $row['Language'];
                    $available = $row['Available'];
                    echo ' 
<tr> 
<th scope="row">' . $id . '</th>
<td>' . $bookname . '</td>
<td>' . $lang . '</td>
<td>' . $dop . '</td>
<td>' . $available . '</td>
<td> 
<a class="update-btn" href="book-update.php? updateid=' . $id . '" class="text-light">Update</a>

<a class="delete-btn" onclick="return msg()" href="book-delete.php? deleteid=' . $id . '"
class="text-light">delete</a>
</td>
</tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>

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
include 'templates/header.php';
include 'templates/html.php';