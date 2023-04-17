<?php
session_start();
session_destroy();
echo "<h5>You have been logout</h5>
<a href='login.html'>Proceed</a>";
?>