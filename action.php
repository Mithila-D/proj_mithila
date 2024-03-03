<?php
ob_start(); 
if (isset($_POST['submit'])) {

    if (isset($_POST['algo'])) {

        $algo = $_POST['algo'];

        if ($algo == 'stacks') {
            header("Location:http://localhost:3000/page1.html");
            exit();
        } else {
            header("Location: page2.html");
            exit();
        }
    } else {
        echo 'algo not selected'; 
    }
}
ob_end_clean();
