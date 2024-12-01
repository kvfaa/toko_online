<?php
$conn = mysqli_connect('localhost', 'root', '', 'toko');
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else
    echo '<script>console.log("Hello World")</script>'
        ?>