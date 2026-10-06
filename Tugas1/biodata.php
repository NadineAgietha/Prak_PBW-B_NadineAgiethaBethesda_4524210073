<?php

function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';

    return 'Perlu Peningkatan';
}

function kategoriIPK(float $ipk): string
{
    if ($ipk >= 3.75) return 'Predikat A';
    if ($ipk >= 3.50) return 'Predikat AB';
    if ($ipk >= 3.00) return 'Predikat B';

    return 'Predikat C';
}

$mahasiswa = [
    'nim'      => '4524210073',
    'nama'     => 'Nadine Agietha',
    'prodi'    => 'Teknik Informatika',
    'semester' => '5',
    'ipk'      => '3.83',
];

$ipk = (float) $mahasiswa['ipk'];

$angkatan = '20' . substr($mahasiswa['nim'], 4, 2);

if ($ipk >= 3.50) {
    $statusClass = 'sangat-baik';
} elseif ($ipk >= 3.00) {
    $statusClass = 'baik';
} else {
    $statusClass = 'perlu-peningkatan';
}

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Biodata Mahasiswa</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;

            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            font-family: Arial, sans-serif;

            background: linear-gradient(
                135deg,
                #667eea,
                #764ba2
            );

            padding: 30px;
        }

        .card {
            width: 500px;
            max-width: 100%;

            background: white;

            border-radius: 20px;

            padding: 30px;

            box-shadow:
                0 20px 40px rgba(0, 0, 0, 0.25);
        }

        .header {
            text-align: center;

            margin-bottom: 25px;
        }

        .icon {
            width: 80px;
            height: 80px;

            margin: 0 auto 15px;

            display: flex;
            justify-content: center;
            align-items: center;

            border-radius: 50%;

            background: #667eea;

            font-size: 40px;
        }

        h1 {
            margin: 0;

            color: #333;

            font-size: 28px;
        }

        .subtitle {
            color: #777;

            margin-top: 8px;
        }

        .data {
            display: flex;

            justify-content: space-between;
            align-items: center;

            padding: 14px 0;

            border-bottom: 1px solid #eee;
        }

        .label {
            color: #777;

            font-weight: bold;
        }

        .value {
            color: #333;

            font-weight: 500;

            text-align: right;
        }

        .ipk-box {
            margin-top: 25px;

            padding: 20px;

            border-radius: 15px;

            text-align: center;

            background: #f5f6ff;
        }

        .ipk-title {
            color: #666;

            margin-bottom: 5px;
        }

        .ipk {
            font-size: 42px;

            font-weight: bold;

            color: #667eea;
        }

        .status {
            display: inline-block;

            margin-top: 10px;

            padding: 8px 16px;

            border-radius: 20px;

            font-weight: bold;
        }

        .sangat-baik {
            background: #d1e7dd;

            color: #0f5132;
        }

        .baik {
            background: #cff4fc;

            color: #055160;
        }

        .perlu-peningkatan {
            background: #f8d7da;

            color: #842029;
        }

        .footer {
            margin-top: 25px;

            text-align: center;

            color: #999;

            font-size: 13px;
        }

    </style>

</head>

<body>

    <div class="card">

        <div class="header">

            <h1>
                Biodata Mahasiswa
            </h1>

            <div class="subtitle">
                Data Akademik Mahasiswa
            </div>

        </div>

        <div class="data">

            <span class="label">
                NIM
            </span>

            <span class="value">
                <?= htmlspecialchars($mahasiswa['nim']) ?>
            </span>

        </div>

        <div class="data">

            <span class="label">
                Nama
            </span>

            <span class="value">
                <?= htmlspecialchars($mahasiswa['nama']) ?>
            </span>

        </div>

        <div class="data">

            <span class="label">
                Program Studi
            </span>

            <span class="value">
                <?= htmlspecialchars($mahasiswa['prodi']) ?>
            </span>

        </div>

        <div class="data">

            <span class="label">
                Semester
            </span>

            <span class="value">
                <?= htmlspecialchars($mahasiswa['semester']) ?>
            </span>

        </div>

        <!-- MODIFIKASI 2: Menampilkan angkatan -->

        <div class="data">

            <span class="label">
                Angkatan
            </span>

            <span class="value">
                <?= htmlspecialchars($angkatan) ?>
            </span>

        </div>

        <div class="ipk-box">

            <div class="ipk-title">
                Indeks Prestasi Kumulatif
            </div>

            <div class="ipk">
                <?= htmlspecialchars((string) $ipk) ?>
            </div>

            <!-- Status IPK otomatis berubah -->

            <div class="status <?= $statusClass ?>">

                <?= htmlspecialchars(statusKelulusan($ipk)) ?>

            </div>

            <p>

                <strong>
                    <?= htmlspecialchars(kategoriIPK($ipk)) ?>
                </strong>

            </p>

</div>

    </div>

</body>

</html>