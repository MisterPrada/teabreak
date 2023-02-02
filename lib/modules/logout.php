<?PHP

if (isset($_SESSION['logged_in'])) {
		unset($_SESSION['logged_in']) ;
		unset($_SESSION['login']);
		unset($_SESSION['firstname']);
		unset($_SESSION['lastname']);
		unset($_SESSION['email']);
		unset($_SESSION['phone']);
		unset($_SESSION['address']);
		unset($_SESSION['address2']);
}
redirect('catalog.php');
?>

