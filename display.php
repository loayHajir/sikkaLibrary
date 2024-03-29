<?php

include "core/connect.php";
$title = 'Book Table';
    ob_start();
?>

<link rel="stylesheet" href="assets/css/owner.css">
<link rel="stylesheet" href="assets/css/header.css">
<div class="display-content">
    <div class="button-container">
        <?php if (isAdmin()) { ?>
        <a href="book-add.php" class="add-book-btn">Add Book</a>
        <a href="category-add.php" class="add-category-btn">Add Category</a>
        <?php } ?>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Language</th>
                <th>Date of publication</th>
                <th>Available</th>
                <?php if (isAdmin()) {?>
                <th></th>
                <?php }?>
            </tr>
        </thead>

        <tbody id="table-body">
            <?php
            $SQL = "select * from `books`";
            if (isset($_GET['category'])) {
                $SQL .= ' where CatagoryNo = ' . $_GET['category'];
            }
            $result = mysqli_query($conn, $SQL);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['ID'];
                    $bookname = $row['BookName'];
                    $dop = $row['dop'];
                    $lang = $row['Language'];
                    $available = $row['Available'];
                    echo ' 
                    
<tr> 
<th scope="row"><a class="link-desc" href="description.php?ID=' . $id . '">' . $id . '</a></th>
<td>' . $bookname . '</td>
<td>' . $lang . '</td>
<td>' . $dop . '</td>
<td>' . $available . '</td>
'
                        . (isAdmin() ? '<td> 
<a class="update-btn" href="book-update.php? updateid=' . $id . '" class="text-light">Update</a>

<a class="delete-btn" onclick="return msg()" href="book-delete.php? deleteid=' . $id . '"
class="text-light">delete</a>
</td>' : '')
                        . '</tr>';
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