<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link rel="stylesheet" href="formStyle.css">
</head>
<body>

    <header>
        <h1>Form Pendaftaran</h1>
    </header>
    <nav>
        <a href="form.php">Form</a>
        <a href="result.php">Result</a>
    </nav>

    <div class="form-container">
        <form action="process.php" method="post" enctype="multipart/form-data">
            <h2>Register</h2>
            <table>
                <tr>
                    <td><label for="fullname">Nama Lengkap</label></td>
                    <td>:</td>
                    <td>
                        <input type="text" id="fullname" name="fullname" placeholder="Handayogi Tambunan" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td>:</td>
                    <td>
                        <input type="email" id="email" name="email" placeholder="handayogi@example.com" required>
                    </td>
                </tr>
                <tr>
                    <td><label for="pw">Password</label></td>
                    <td>:</td>
                    <td>
                        <input type="password" id="pw" name="password" placeholder="Password" minlength="8" required>
                        <h5>Password minimal 8 karakter</h5>
                    </td>
                </tr>
                <tr>
                    <td><label for="gender">Jenis Kelamin</label></td>
                    <td>:</td>
                    <td>
                        <input type="radio" id="laki-laki" name="gender" value="Laki-laki" required>
                        <label for="laki-laki">Laki-laki</label>
                        <input type="radio" id="perempuan" name="gender" value="Perempuan" required>
                        <label for="perempuan">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="resume">Upload CV (.txt)</label></td>
                    <td>:</td>
                    <td>
                        <input type="file" id="resume" name="resume" accept=".txt" required>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" colspan="3"><button type="submit">Register</button></td>
                </tr>
            </table>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>