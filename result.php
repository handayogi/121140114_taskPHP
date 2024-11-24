<?php
session_start();
if (!isset($_SESSION["form_data"])) {
    die("Tidak ada data yang dapat ditampilkan.");
}

// Mengambil data dari session
$data = $_SESSION["form_data"];

// Baca isi file yang diunggah
$isiResume = [];
if (file_exists($data["resume"])) {
    $handleFile = fopen($data["resume"], "r");
    while (($line = fgets($handleFile)) !== false) {
        $isiResume[] = $line;
    }
    fclose($handleFile);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Page</title>
    <link rel="stylesheet" href="resultStyle.css">
</head>
<body>

    <header>
        <h1>Hasil Pendaftaran</h1>
    </header>
    <nav>
        <a href="form.php">Form</a>
        <a href="result.php">Result</a>
    </nav>

    <div class="result-container">
        <h2>Result Form</h2>
        <table>
            <tr>
                <th>Nama Lengkap</th>
                <td><?php echo htmlspecialchars($data["fullname"]); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($data["email"]); ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?php echo htmlspecialchars($data["gender"]); ?></td>
            </tr>
        </table>

        <h3>Isi file resume:</h3>
        <?php if (!empty($isiResume)): ?>
            <table>
                <tr>
                    <th>Baris</th>
                    <th>Isi</th>
                </tr>
                <?php foreach ($isiResume as $lineNumber => $line): ?>
                    <tr>
                        <td><?php echo $lineNumber + 1; ?></td>
                        <td><?php echo htmlspecialchars($line); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>Tidak ada isi file resume.</p>
        <?php endif; ?>
    </div>
    
</body>
</html>