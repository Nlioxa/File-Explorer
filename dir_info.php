<?php

if (isset($_GET["path"])) {
    $path = $_GET["path"];
}
else {
    $path = $_SESSION["root_path"];
}

if (is_dir($path)) {
	$_SESSION['path'] = $path;
    $dir_content = scandir($path);
    foreach ($dir_content as $file) {
        $full_path = $path . "/" . $file;
        $name = pathinfo($file, PATHINFO_FILENAME);
        $type = pathinfo($full_path, PATHINFO_EXTENSION);
        $size = round (filesize($full_path) / 1024) . ' KB';
        $last_modified_time = date("d-M-y H:i", filemtime($full_path));
        if ($name == '' or $name == '.') {
            $type = '';
            $size = '';
            $last_modified_time = '';
            if ($name === '') {
                $name = 'root';
                $full_path = $_SESSION['root_path'];
            }
            else {
                $name = 'up';
            }
            $img_path = 'folder-icon.png';			
        }
        elseif ($type !== '') {
			$img_path = 'file-icon.png';
            $full_path = $path;
        }
        echo "
        <tr>
			<td><img src='" . $img_path . "' alt='icon' height='42' width='42'></td>
            <td>
                <a href='?path=$full_path/'>" . $name . "</a>
            </td>
            <td>" . $last_modified_time . "</td>
            <td>" . $type . "</td>
            <td>" . $size . "</td>
        </tr>";
    }
}
else {
    echo "<p style='text-align: center;'>" 
		. "Path: '" . $path . "' is incorrect!" . "</p>";
}

?>