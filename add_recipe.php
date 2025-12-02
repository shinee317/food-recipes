<?php
$servername = "localhost";  // эсвэл серверийн IP
$username = "root";         // MySQL хэрэглэгч
$password = "0121";     // MySQL нууц үг
$dbname = "webdb";  // Database нэр

// Холболт үүсгэх
$conn = new mysqli($servername, $username, $password, $dbname);

// Холболт шалгах
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$imagePath = NULL;

if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);   // create folder if missing
    }

    $fileName = time() . "_" . basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $imagePath = $targetFile;
    }
}

// POST өгөгдөл авах
$name = $_POST['name'];
$ingredients = $_POST['ingredients'];
$instructions = $_POST['instructions'];
$type = $_POST['type'];

// SQL query
$sql = "INSERT INTO recipes (name, ingredients, instructions, image, type)
        VALUES ('$name', '$ingredients', '$instructions', '$imagePath', '$type')";
if ($conn->query($sql)) {
    echo "Жор амжилттай нэмэгдлээ!";
} else {
    echo "Алдаа: " . $conn->error;
}


$conn->close();
?>
