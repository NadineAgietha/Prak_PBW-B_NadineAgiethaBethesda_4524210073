<?php
function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'nim'=> '4524210073',
    'nama'=> 'Nadine Agietha',
    'prodi'=> 'Teknik Informatika',
    'semester'=> '5',
    'ipk'=> '3.83',
];
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <tittle>Biodata</tittle>
</head>

<body>
    <h1>Biodata Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $kunci => $nilai): ?>

            <li><?= ucfirst($kunci) ?>:  <?= htmlspecialchars((string)$nilai) ?></li>
            <?php endforeach; ?>
    </ul>
    <p>Predikat: <?= statusKelulusan($mahasiswa['ipk']) ?></p>
</body>
</html>

