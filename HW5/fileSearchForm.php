<html>
<head>
<title>File Search</title>
</head>
<body>

<?php
    function find_file($filename, $path = '.', $handleFile = printFile) {
        $dir = opendir($path);
        
        if(hasValue($dir)) {
            while(TRUE) {
                $file = readdir($dir);
                if(!hasValue($file)) break;
                
                $new_path = $path . '/' . $file;
                if(strcmp($file, $filename) == 0) {
                    $handleFile($new_path);
                    return TRUE;
                }
                if(is_dir($new_path) && $file != '..' && $file != '.') {
                    if(find_file($filename, $new_path, $handleFile)) {
                        return TRUE;
                    }
                }
            }
        }        
        return FALSE;
    }

    function printFile($path) {
        echo $path . '<br/>';
    }

    function hasValue($var) {
        return $var != null && $var != FALSE;
    }
 
    $filename = $_POST["fileName"];
    
    if($filename != null) {
        if(find_file($filename) == FALSE) {
            echo "OMG A BEAR! FILE NOT FOUND";
        }
    }
    else {
 ?>
        <form action="fileSearchForm.php" method="POST">
            <input type="text" name="fileName" />
            <br />
            <input type="submit" value="Search" />
        </form>

<?php
    }
?>

</body>
<html>
