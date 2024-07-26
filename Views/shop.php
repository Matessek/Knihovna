<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
    <title>Ola amigo</title>
</head>
<body>

<?php
// Načtení helperu URL
//helper('url');

$currentURL = current_url();

// Rozdělení URL podle lomítek
$urlParts = explode('/', $currentURL);

// Odstranění prázdných hodnot v poli (vzniklých dvojitým lomítkem)
$urlParts = array_filter($urlParts);

// Získání poslední hodnoty v poli
$lastSegment = end($urlParts);

echo "Relativní URL: $lastSegment";


?>
<h1>Classic editor</h1>
    <div id="editor">
        <p>This is some sample content.</p>
    </div>
    <script>
 ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
   

</body>
</html>