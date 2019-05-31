<?php


// Check Values
// Call the function
if (isset($_FILES) && isset($_FILES['uploaded_file'])) {
    uPloadItems();
}

if (isset($_GET) && isset($_GET['see'])) {
    $ruta = getPath() . "img/" . $_GET['see']; // Indicar ruta
    echo '<img src="' . $ruta . '">' . "\n";
}

// Get Path File
function getPath($size = 2)
{
    $n = "";
    $pathFileTemp = "";
    $Chars = count_chars($_SERVER["PHP_SELF"], 1);
    foreach ($Chars as $Char => $nChars) {
        if ($Char == 47) {
            $n = $nChars;
            break;
        }
    }
    if ($n == 0) {
        $pathFileTemp = "";
    } else {
        $pathFileTemp = str_pad("", ($n - $size) * 3, "../");
    }
    return $pathFileTemp;
}

function uPloadItems()
{
    $messagge = "";
    $file_path = getPath() . "img/";
    $newFile = $file_path . basename($_FILES['uploaded_file']['name']);

    // Make Folder
    if (!file_exists($file_path)) {
        mkdir($file_path, 0777, true);
        $messagge .= getCount("La carpeta $file_path se ha creado.");
    }

    //Make File
    if (file_exists($newFile)) {
        $messagge .= getCount("El Archivo $newFile se ha modificado.");
    } else {
        // Move Image
        echo $_FILES['uploaded_file']['tmp_name'] . ", " . $newFile;
        if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $newFile)) {
            $messagge .= getCount("success");
        } else {
            $messagge .= getCount("file");
        }
        $messagge .= getCount("El Archivo $newFile se ha creado.");
    }
    echo $messagge;
}

function getCount($txt = "")
{
    $cont = 0;
    return ($cont++) . ") $txt";
}

?>
