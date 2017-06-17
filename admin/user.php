<?php
include_once('user.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard</title>
</head>

<body>
<div id="wrapper">
<div id="upperPanel">
<?php
include_once('./layout/upperPanel.php');
?>
</div>
<div id="navigationBar">
<?php
include_once('./layout/menu.php');
?>
</div>
<div id="content">
<?php
printError();
printSuccess();

?>
</div>
<div id="footer">
<?php
include_once('./layout/footer.php');
?>
</div>
</div>
</body>
</html>