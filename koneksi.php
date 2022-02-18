<?php
    $koneksi = mysqli_connect("localhost", "root", "", "db_vaksin");
    if(mysqli_connect_errno())
    {
        echo "db_error".mysqli_error();
    }
?>