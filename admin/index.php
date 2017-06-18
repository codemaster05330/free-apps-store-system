<?php
include_once('platform.functions.php');
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
<div id="quickActions">
<h4>Quick Actions</h4>
<table>
<tr><th>Categories</th><th>Platforms</th><th>Users</th><th>Developers</th><th>Apps</th><th>Reviews</th></tr>
<tr><td><a href="./category.php" class="hrefBtn">all categories</a></td>
<td><a href="./platform.php"class="hrefBtn">all platforms</a></td>
<td><a href="./user.php"class="hrefBtn">all users</a></td>
<td><a href="./developers.php"class="hrefBtn">all developers</a></td>
<td><a href="./apps.php"class="hrefBtn">all apps</a></td>
<td><a href="./reviews.php"class="hrefBtn">all reviews</a></td></tr>

<tr><td><a href="./category.php?action=new" class="hrefBtn">New</a></td>
<td><a href="./platform.php?action=new"class="hrefBtn">New</a></td>
<td></td>
<td><a href="./developers.php?action=pending"class="hrefBtn">review pending</a></td>
<td><a href="./apps.php?action=pending"class="hrefBtn">review pending</a></td>
<td><a href="./reviews.php?action=pending"class="hrefBtn">review pending</a></td></tr>

</table>
</div>
<?php
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