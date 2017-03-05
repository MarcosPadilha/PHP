<?php
session_start();
include_once "../config.php";
require_once ('../classes/bd.php');
BD::conn;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>bem vindo ao chat</title>
</head>

<body>

<?php
echo $_SESSION['id_user'];

?>
</body>
</html>