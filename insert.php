<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Data Buku</title>
</head>
<body>
    <h1>Submit Data</h1>
    <form method="POST" action="save.php" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label>Judul Buku:</label>
                </td>
                <td>
                    <input type="text" name="judul" required autocomplete="none">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Pengarang:</label>
                </td>
                <td>
                    <input type="text" name="pengarang" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Tahun Terbit:</label>
                </td>
                <td>
                    <input type="number" name="tahunTerbit" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Halaman:</label>
                </td>
                <td>
                    <input type="number" name="halaman" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Penerbit:</label>
                </td>
                <td>
                    <input type="text" name="penerbit" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Kategori:</label>
                </td>
                <td>
                    <input type="text" name="kategori" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Cover:</label>
                </td>
                <td>
                    <input type="file" name="cover" accept="image/*" required>
                </td>
            </tr>
        </table>
        <input type="submit" value="Simpan">
    </form>
    <br><br>
    <a href='index.php'><button>Cek Data</button></a>
</body>
</html>
