<?php
session_start();
session_destroy();
echo"
<script>
alert('log out!');
location.replace('../index.php');
</script>
";
?>