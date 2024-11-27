<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
        if (isset($_FILES['file']) && is_uploaded_file("file")) {
            echo "SIIII";
        }
    }
?>