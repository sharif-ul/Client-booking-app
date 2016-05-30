<?php

$db = new PDO('mysql:dbname=bookingform;host=127.0.0.1', 'root', '');

//User input
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 5;

//Positioning
$start = ($page > 1) ? ($page*$perPage) - $perPage : 0;

//Query
$articles = $db->prepare("
		SELECT SQL_CALC_FOUND_ROWS ID, username, email, phone 
		FROM bookingform
		LIMIT {$start}, {$perPage}

	");

$articles->execute();

$articles = $articles->fetchAll(PDO::FETCH_ASSOC);

//Pages
$total = $db->query("SELECT FOUND_ROWS() as total")->fetch()['total'];
$pages = ceil($total / $perPage);

?>

<!DOCTYPE html>
<html>
    <head>
    	<meta charset="UTF-8">
        <title>Pagination</title>
        <style>
        	.pagination a.selected {
        		font-weight: bold;
        	}
        </style>

    </head>
    	<body>
        	<?php foreach ($articles as $article): ?>
        		<div class="article">
        			<?php echo '<div style="border: 1px solid #e4e4e4; padding: 1px; margin-bottom: 2px;">'; ?>
        			<p><?php echo $article['ID']; ?>.<br> <strong>Name: </strong> <?php echo $article['username']; ?> <br><strong>E-mail: </strong> <?php echo $article['email']; ?><br> <strong>Phone: </strong> <?php echo $article['phone']; ?></p>
        		</div>
        	<?php endforeach; ?>
        	<div class="pagination">
        		<?php for ($x=1; $x <= $pages ; $x++): ?>
        			<a href="?page=<?php echo $x; ?>&per-page=<?php echo $perPage; ?>"<?php if($page === $x){ echo 'class="selected"'; } ?>><?php echo $x; ?></a>
        		<?php endfor; ?>
        	</div>
        </body>
</html>