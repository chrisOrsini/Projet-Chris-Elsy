<?php
function pdo_connect_mysql()
{
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'root';
    $DATABASE_NAME = 'mes_images2';
    try {
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
        // If there is an error with the connection, stop the script and display the error.
        exit('Failed to connect to database!');
    }
}

function template_header($title)
{
    echo "
   <!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>$title</title>
		<link href='style.css' rel='stylesheet' type='text/css'>
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css'>
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65' crossorigin='anonymous'>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4' crossorigin='anonymous'></script>
	</head>
	<body>
    <nav class='navtop'>
    	<div>
    		<h1>Website Title</h1>
            <a href='index.php'><i class='fas fa-home'></i>inscription</a>
            <a href='read.php'><i class='fas fa-address-book'></i>Read</a>
            </div>
        </nav>
    ";
}
function template_footer()
{
    echo <<<EOT
        </body>
    </html>
    EOT;
}
