<?php
// logout.php

session_start();

// Clear specific session data
unset($_SESSION['username']); 
unset($_SESSION['token']); 


 echo "<script>window.location.href='http://localhost/trade/'</script>";

exit();
?>