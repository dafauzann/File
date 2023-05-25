<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $file = "dataBuku.txt";
    if (file_exists($file) && filesize($file) > 0) {
        $getContent = file_get_contents($file);
        if (preg_match_all('/Kode Buku: (\d+)/', $getContent, $matches)) {
            $kode = $matches[1];
            $kodeAkhir = max($kode);
            $kodeBuku = $kodeAkhir + 1;
        }
    } else {
        $kodeBuku = 1;
    }
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahunTerbit = $_POST['tahunTerbit'];
    $halaman = $_POST['halaman'];
    $penerbit = $_POST['penerbit'];
    $kategori = $_POST['kategori'];
    
    
    $dataBuku = "<table style='border-collapse: collapse;'>";
    $dataBuku .= "<tr><td style='border: 1px solid black; padding: 8px;'><strong>Kode Buku</strong></td><td style='border: 1px solid black; padding: 8px;'>$kodeBuku</td></tr>";
    $dataBuku .= "<tr><td style='border: 1px solid black; padding: 8px;'><strong>Judul Buku</strong></td><td style='border: 1px solid black; padding: 8px;'>$judul</td></tr>";
    $dataBuku .= "<tr><td style='border: 1px solid black; padding: 8px;'><strong>Pengarang</strong></td><td style='border: 1px solid black; padding: 8px;'>$pengarang</td></tr>";
    $dataBuku .= "<tr><td style='border: 1px solid black; padding: 8px;'><strong>Tahun Terbit</strong></td><td style='border: 1px solid black; padding: 8px;'>$tahunTerbit</td></tr>";
    $dataBuku .= "<tr><td style='border: 1px solid black; padding: 8px;'><strong>Jumlah Halaman</strong></td><td style='border: 1px solid black; padding: 8px;'>$halaman</td></tr>";
    $dataBuku .= "<tr><td style='border: 1px solid black; padding: 8px;'><strong>Penerbit</strong></td><td style='border: 1px solid black; padding: 8px;'>$penerbit</td></tr>";
    $dataBuku .= "<tr><td style='border: 1px solid black; padding: 8px;'><strong>Kategori</strong></td><td style='border: 1px solid black; padding: 8px;'>$kategori</td></tr>";
    $dataBuku .= "</table>";
    
    
    if ($_FILES['cover']['error'] === UPLOAD_ERR_OK) {
        $ekstensiFile = strtolower(pathinfo($_FILES['cover']['name'], PATHINFO_EXTENSION));
        $namaFile = $kodeBuku . "_" . $pengarang . "_" . $judul . "." . $ekstensiFile;
        $namaSementara = $_FILES['cover']['tmp_name'];
        $lokasiFile = 'cover/' . $namaFile;
        move_uploaded_file($namaSementara, $lokasiFile);
    }

    $dataBuku .= "<tr><td style='border: 1px solid black; padding: 8px;'><strong>Cover Buku: </strong></td> $lokasiFile<td style='border: 1px solid black; padding: 8px;'></td></tr>" . PHP_EOL . PHP_EOL;
    

    if (file_put_contents($file, $dataBuku, FILE_APPEND) > 0){
        echo "<p> Data Written successfully </p>";
    }else{
        echo "<p> Data Written failed </p>";
    }

    $fileIndiv = "$kodeBuku - $judul - $pengarang.txt";

    if (file_put_contents($fileIndiv, $dataBuku) > 0){
        echo "<p> $fileIndiv Written successfully </p>";


        echo "<table>";
        echo "<tr><th>Kode Buku</th><th>Judul Buku</th><th>Pengarang</th><th>Tahun Terbit</th><th>Jumlah Halaman</th><th>Penerbit</th><th>Kategori</th><th>Cover Buku</th></tr>";
        echo "<tr>";
        echo "<td>$kodeBuku</td>";
        echo "<td>$judul</td>";
        echo "<td>$pengarang</td>";
        echo "<td>$tahunTerbit</td>";
        echo "<td>$halaman</td>";
        echo "<td>$penerbit</td>";
        echo "<td>$kategori</td>";
        echo "<td><img src='$lokasiFile' alt='Cover Buku'></td>";
        echo "</tr>";
        echo "</table>";
    }else{
        echo "<p> Data Written failed </p>";
    }
}

echo "<br> <a href='insert.php'><button>Back</button></a>";
echo "<br> <a href='index.php'><button>Cek Data</button></a>"
?>

