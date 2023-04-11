<?php

include 'database.php';


// Check if action is add
if (isset($_POST["action"]) && $_POST["action"] == "add") {
    // Get input data
    $title=$_POST['title'];
    $isbn=$_POST['isbn'];
    $author=$_POST['author'];
    $publisher=$_POST['publisher'];
    $year_published=$_POST['year_published'];

    //Validate input data
    if (empty($title) || empty($isbn) || empty($author) || empty($publisher) || empty($year_published) || !preg_match('/^\d{4}$/', $year_published)) {
        // header("HTTP/1.1 400 Bad Request");
        echo "Invalid input of data!";
        exit();
    }

    // Insert record in database
    $sql = "INSERT INTO book (title, isbn, author, publisher, year_published) VALUES ('$title', '$isbn', '$author', '$publisher', '$year_published')";
    if (mysqli_query($conn, $sql)) {
        header("HTTP/1.1 200 OK");
        exit();
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        exit();
    }
}

// Check if action is update
if (isset($_POST["action"]) && $_POST["action"] == "update") {
    // Get input data

    $id=$_POST['id'];
    $title=$_POST['title'];
    $isbn=$_POST['isbn'];
    $author=$_POST['author'];
    $publisher=$_POST['publisher'];
    $year_published=$_POST['year_published'];

    //Validate input data
    if (empty($title) || empty($isbn) || empty($author) || empty($publisher) || empty($year_published) || !preg_match('/^\d{4}$/', $year_published)) {
        // header("HTTP/1.1 400 Bad Request");
        echo "Invalid input of data!";
        exit();
    }

    // Insert record in database
    $sql = "UPDATE book SET title='$title', isbn='$isbn', author='$author', publisher='$publisher', year_published='$year_published' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("HTTP/1.1 200 OK");
        exit();
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        exit();
    }
}

// check if action is delete
if (isset($_POST["action"]) && $_POST["action"] == "delete") {
    // Get input data

    $id=$_POST['id'];


    //Validate input data
    if (empty($id)) {
        header("HTTP/1.1 400 Bad Request");
        exit();
    }

    // Insert record in database
    $sql = "DELETE FROM book WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header("HTTP/1.1 200 OK");
        exit();
    } else {
        header("HTTP/1.1 500 Internal Server Error");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && $_GET["action"] == "show") {
    // Loop through the results and display each row in the HTML table
    $sql = "SELECT * FROM book";
    $result = mysqli_query($conn, $sql);

     $html = '';
    // Loop through the results and add each row to the HTML table
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            $html .= '<td class="title">' . $row['title'] . '</td>';
            $html .= '<td class="isbn">' . $row['isbn'] . '</td>';
            $html .= '<td class="author">' . $row['author'] . '</td>';
            $html .= '<td class="publisher">' . $row['publisher'] . '</td>';
            $html .= '<td class="year_published">' . $row['year_published'] . '</td>';
            $html .= '<td>';
            $html .= '<button type="button" class="btn btn-success float-right text-uppercase edit" 
                
                data-toggle="modal" 
                data-target="#myModalUPDATE"
                data-id="'. $row['id'] .'"
                data-title="'. $row['title'] .'"
                data-isbn="'. $row['isbn'] .'"
                data-author="'. $row['author'] .'"
                data-publisher="'. $row['publisher'] .'"
                data-year-published="'. $row['year_published'] .'"
                id="edit" style="margin-right: 10px;">Edit</button>';

            $html .= '<button type="button" class="btn btn-danger float-right text-uppercase delete" 
                data-toggle="modal" 
                data-id="'. $row['id'] .'"
                >Delete</button>';
                
            $html .= '</td>';
            $html .= '</tr>';
        }
    } else {
        $html .= '<tr><td colspan="7">No data found.</td></tr>';
    }

    // Return the HTML table
    echo $html;
}
mysqli_close($conn);






