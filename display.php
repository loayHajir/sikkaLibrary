    <?php
    include "connect.php";
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Book Table</title>
        <style>
            /* CSS styling for the table */
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
        </style>
    </head>

    <body>
        <div class="button-container">
            <button id="add-button">Add</button>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Description</th>
                    <th>Language</th>
                    <th>Available</th>
                </tr>
            </thead>
            <tbody id="table-body">
    <?php
    $SQL = "select * from `books`";
    $result = mysqli_query($conn, $SQL);
    if($result){
    while ($row = mysqli_fetch_assoc($result)) {
    $id = $row ['ID'];
    $bookname= $row['Bookname'];
    $desc = $row['Description'];
    $lang = $row['Language'];
    $available=$row['Available'];
    echo ' 
    <tr> 
    <th scope="row">'.$id.'</th>
    <td>'.$bookname.'</td>
    <td>'.$desc.'</td>
    <td>'.$lang.'</td>
    <td>'.$available.'</td>
    <td> 
    <button class="btn btn-primary"><a href="update.php? upadateid='.$id.'" class="text-light">Update</a></button>

    <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'"
    class="text-light">delete</a></button>
</td>
    </tr>
    ';
    }

    }

    ?>
 
            </tbody>
        </table>

    </body>

    </html>

    <!-- <button type="delete">Delete</button> <button
                type="update">Update</button> -->