<!DOCTYPE html>
<html>
<head>
    <title>Form Input Tugas PHP</title>
</head>
<body>
    <h2>Form Input Tugas PHP</h2>
    <form method="POST" action="">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label><br>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>

        <label for="pekerjaan">Pekerjaan:</label><br>
        <select id="pekerjaan" name="pekerjaan" required>
            <option value="Manager">Manager</option>
            <option value="Staff">Staff</option>
            <option value="Freelancer">Freelancer</option>
        </select><br><br>

        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Ambil data dari form
        $nama = $_POST['nama'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $pekerjaan = $_POST['pekerjaan'];

        // Hitung umur berdasarkan tanggal lahir
        $tanggal_lahir_obj = new DateTime($tanggal_lahir);
        $tanggal_sekarang = new DateTime();
        $umur = $tanggal_sekarang->diff($tanggal_lahir_obj)->y;

        // Tentukan gaji berdasarkan pekerjaan
        $gaji = 0;
        switch ($pekerjaan) {
            case 'Manager':
                $gaji = 50000000;
                break;
            case 'Staff':
                $gaji = 30000000;
                break;
            case 'Freelancer':
                $gaji = 15000000;
                break;
        }

        // Tampilkan hasil output
        echo "<h2>Output Tugas PHP:</h2>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Umur: " . $umur . " tahun<br>";
        echo "Pekerjaan: " . htmlspecialchars($pekerjaan) . "<br>";
        echo "Gaji: Rp " . number_format($gaji, 0, ',', '.') . "<br>";
    }
    ?>
</body>
</html>
