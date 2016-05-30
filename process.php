<?php
require_once('config.php');
require_once('functions.php');


/*Check to see if the form was submitted from the installed domain. If so,
process the data. If not, kill the script. Obviously, you can disable this, but
it's strongly recommended that you keep this check in place.*/
$domain = $_SERVER['HTTP_HOST'];
$uri = parse_url($_SERVER['HTTP_REFERER']);
$r_domain = substr($uri['host'], strpos($uri['host'], "."), strlen($uri['host']));

if ( $domain == $r_domain ) {

	/*Open the connection to our database use the info from the config file.*/
	$link = f_sqlConnect(DB_USER, DB_PASSWORD, DB_NAME);
	
	/*This cleans our &_POST array to prevent against SQL injection attacks.*/
	$_POST = f_clean($_POST);

	/*These are the main variables we'll use to process the form.*/
	$table = $_POST['formID'];
	$keys = implode(", ", (array_keys($_POST))); 
	$values = implode("', '", (array_values($_POST)));

	/*These are variables for our redirect.*/
	$redirect = $_POST['redirect_to'];
	$referred = $_SERVER['HTTP_REFERER'];
	$query = parse_url($referred, PHP_URL_QUERY);
	$referred = str_replace(array('?', $query), '', $referred);
	
	/*These are the extra data fields we'll collect on form submission.*/
	$x_fields = 'timestamp, ip';
	$x_values = time() . "', '" . f_getIP();

	/*Check to see if the table exists and if it doesn't create it.*/
	if ( !f_tableExists($table, DB_NAME) ) {
		$sql = "CREATE TABLE $table (
			ID int NOT NULL AUTO_INCREMENT,
			PRIMARY KEY(ID),
			timestamp int NOT NULL,
			ip int NOT NULL
		)";
		
		$result = mysql_query($sql);
		
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		}
		
	} 

	/*Check to see if the fields specified in the form exist and if they don't, create them.*/
	foreach ($_POST as $key => $value) {
		$column = mysql_real_escape_string($key);
		$alter = f_fieldExists($table, $column, $column_attr = "VARCHAR( 255 ) NULL" );
		
		if (!alter) {
			echo 'Unable to add column: ' . $column;
		}
	}

	/*Insert out values into the database.*/
	$sql="INSERT INTO $table ($keys, $x_fields) VALUES ('$values', '$x_values')";

	if (!mysql_query($sql)) {
		die('Error: ' . mysql_error());
	}

	/*Close our database connection.*/
	mysql_close();

	/*Redirect the user after a successful form submission*/
	if ( !empty ( $redirect ) ) {
		header("Location: $redirect?msg=1");
	} else {
		header("Location: $referred?msg=1");
	}
} else {
	die('You are not allowed to submit data to this form');
}
?>