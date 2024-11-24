<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $resume = $_FILES["resume"];

    // validasi form
    if (empty($fullname) || strlen($fullname) < 3) {
        die("Nama lengkap harus diisi minimal 3 karakter.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Format email tidak valid.");
    }

    if (strlen($password) < 8) {
        die("Password harus terdiri minimal 8 karakter.");
    }

    if ($resume["type"] !== "text/plain") {
        die("Hanya file .txt yang dapat diunggah.");
    }

    if ($resume["size"] > 2 * 1024 * 1024) {
        die("Ukuran file terlalu besar.");
    }

    // Fungsi untuk menyimpan file
    $uploadDir = "uploads/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $filepath = $uploadDir . basename($resume["name"]);
    if(!move_uploaded_file($resume["tmp_name"], $filepath)) {
        die("Gagal mengupload file.");
    }

    // Simpan data ke dalam session
    $_SESSION["form_data"] = [
        "fullname" => $fullname,
        "email" => $email,
        "password" => $password,
        "gender" => $gender,
        "resume" => $filepath,
    ];

    header("Location: result.php");
    exit();
}
?>