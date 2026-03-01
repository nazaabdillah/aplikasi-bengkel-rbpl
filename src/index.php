<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Bengkel Motor</title>
</head>
<body>
    <h1>Sistem Manajemen Bengkel Motor</h1>
    <hr>
    
    <?php 
    if (file_exists('form_input.php')) {
        include 'form_input.php'; 
    } else {
        echo "<p><i>[Menunggu Fahar push file form_input.php]</i></p>";
    }
    ?>

</body>
</html>