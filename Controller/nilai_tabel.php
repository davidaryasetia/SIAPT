<?php
// page1.php

session_start();
?>

<?php

echo 'Welcome to page #1';


$_SESSION['favcolor'] = 1;
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();

// Works if session cookie was accepted
echo '<Pbr /><a href="page2 .php">page 2</a>';

// Or maybe pass along the session id, if needed
echo '<br /><a href="page2.php?' . SID . '">page 2</a>';
?>