<?php
$conn = new mysqli("localhost", "root", "", "web_programming_1");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

$sql = "SELECT id, nim, nama, program_studi, email
        FROM mahasiswa
        ORDER BY id ASC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="tugas.css">
</head>

<body>

<header>
    <h1>Data Mahasiswa</h1>
    <p>Web Programming 1</p>
</header>

<nav>
    <a href="tugas.html">Biodata</a>
    <a href="data_mahasiswa.php">Data Mahasiswa</a>
</nav>

<main>
    <section>
        <h2>Daftar Mahasiswa</h2>

        <table class="data-table">
            <caption>Data Mahasiswa dari MySQL</caption>

            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Program Studi</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $no = 1;

                while ($row = $result->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo htmlspecialchars($row["nim"]); ?></td>
                        <td><?php echo htmlspecialchars($row["nama"]); ?></td>
                        <td><?php echo htmlspecialchars($row["program_studi"]); ?></td>
                        <td><?php echo htmlspecialchars($row["email"]); ?></td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>

    </section>
</main>

<footer>
    <p>Web Programming 1</p>
</footer>

</body>
</html>

<?php
$conn->close();
?>