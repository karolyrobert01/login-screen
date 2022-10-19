<!DOCTYPE html>
<html>
<head>
	<title>Károly Róbert - CRQQAV</title>
	<link rel="icon" type="image/x-icon" href="kricon.ico">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>Károly Róbert - CRQQAV</h2>
     	<h4>Login:</h4>

     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<label>Email</label>
     	<input type="text" name="uname" placeholder="email"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="password"><br>

     	<button type="submit">Login</button>
        <!--<img src="<?php echo $kep; ?>">-->
     </form>
</body>
</html>
