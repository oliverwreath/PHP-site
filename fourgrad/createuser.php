<?php
include('header.php');
include('auth.php');
?>

<h2>Create an Account</h2>

<form action="" method="post">
	<table>
		<tr>
			<td>NickName</td>
			<td><input type="text" name="name" /></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
			<td>Account Type:</td>
			<td><select name="account_type">
					<option value="tutor">Tutor</option>
					<option value="student">Student</option>
			</select>
			</td>
		</tr>
	</table>
	<input type="submit" />
</form>

<?php
if($_POST["name"]==""){
	die('Empty name.');
}
if($_POST["email"]==""){
	die('Empty Email.');
}
if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
	die('Invalid Email.');
}
if($_POST["password"]==""){
	die('Empty password.');
}
if($_POST["account_type"]==""){
	die('Empty account_type.');
}
{
	$name=$_POST["name"];
	$password=$_POST["password"];
	$email=$_POST["email"];
	$account_type=$_POST["account_type"];
}

$connection = mysql_connect($server, $user, $pass);
if (!$connection) {
	die('Could not connect to mySql: ' . mysql_error());
}

mysql_select_db($db, $connection);
$existing_id = mysql_query("SELECT id FROM `User` WHERE email = '$email' LIMIT 0,1");
if (! $existing_id) {
	die('Could not select database: ' . mysql_error());
}
$user_exists = mysql_num_rows($existing_id)>0;
if($user_exists) {
	die('User with that email already registered.' . mysql_error());
}

$insert_user = mysql_query("INSERT INTO `$db`.`User` (`id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email','$password')"); 
if (!$insert_user) {
	die('Query error: ' . mysql_error());
}

// Shows which userid was generated for User
$newuser = mysql_query("SELECT * FROM `User` WHERE email = '$email' LIMIT 0,1");
if (!$newuser ) {
	die('Query error ' . mysql_error());
}
$row = mysql_fetch_array($newuser);
//Use same userid as in User table for consistency
$newuserid=$row['id'];

if($account_type=="tutor") {
	if (!mysql_query("INSERT INTO $db.`Tutor` (`id`, `education`, `language`, `price`, `avgRating`) VALUES ('$newuserid',NULL, NULL, NULL, '0')") )
	{
		die('Query error: ' . mysql_error());
	}

} else if ($account_type=="student") {
	if (!mysql_query("INSERT INTO $db.`Student` (`id`, `major`) VALUES ('$newuserid',NULL)") )
	{
		die('Query error: ' . mysql_error());
	}
} else {
	die("Invalid user type");
}
?>
