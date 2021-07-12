<?php

if(isset($_FILES['fieldfile'])){
        $file = $_FILES['fieldfile'];
        // file properties
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
  
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));
  
        $allowed = array('jpg', 'png');
  
  
        if(in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size <= 14194304) {
                    
                    $file_destination = 'images/' . $file_name;
  
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                      $_SESSION['success'] = "Transfer zakonczony.";
                      header('Location: profile.php');
                    }
                    else {
                      $_SESSION['status'] = "Niepowodzenie.";
                      header('Location: profile.php');
                    }
                }
            }
        }
     }
  
     ?>