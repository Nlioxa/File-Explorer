<!DOCTYPE html>

<?php

include 'start_session.php';

?>

<html>
    <head>        
        <title>Lab4</title>
        <link rel='stylesheet' type='text/css' href='styles.css'>
    </head>
    <body>
		<p class='dirname'><b>Current directory</b></p>
		<div class='dirname'>
			<?php echo $_SESSION['path'] ?>
		</div>
		<form action='index.php' method='get'>
            <input class='query' type='text' name='path' placeholder='select directory...'>
        </form>
        <table>
            <tr>
				<th>ico</th>
                <th>Name</th>
                <th>Date modified</th>
                <th>Type</th>
                <th>Size</th>
            </tr>
            <?php require 'dir_info.php' ?>
        </table>
    </body>
</html>