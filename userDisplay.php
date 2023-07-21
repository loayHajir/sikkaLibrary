<?php
include "connect.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Book Table</title>
    <style>
    CSS styling for the table button {
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
    }


    </style>
</head>

<body>
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
                    $available = $row['Available'];
                    $pdf = $row['PDF'];                   
                    echo ' 
    <tr> 
    <th scope="row">' . $id . '</th>
    <td>' . $bookname . '</td>
    <td>' . $desc . '</td>
    <td>' . $lang . '</td>
    <td>' . $available . '</td>
    <td> <a id="down" href="download.php?file=' . urlencode($pdf) . '">Download PDF</a></td>
    <td> 
    <a id="logout" href="logout.php? logout=' . $id . '" class="text-light">Logout</a>
    </td>
    </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>