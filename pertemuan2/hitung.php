<?php

interface BisaDihitung
{
    public function hargaAkhir(): float;
    public function infoProduk(): string; 
}

class Produk implements BisaDihitung
{
    public function __construct(
        protected string $nama,
        protected float $harga
    ) {
        //validasi harga negatif
        if ($harga < 0) {
            throw new InvalidArgumentException("Harga tidak boleh negatif!");
        }
    }

    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function infoProduk(): string
    {
        return $this->nama . " (Harga Normal)";
    }
}

class ProdukDiskon extends Produk
{
    public function __construct(string $nama, float $harga, private float $diskon)
    {
        parent::__construct($nama, $harga);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }

    public function infoProduk(): string
    {
        return $this->nama . " (Diskon {$this->diskon}%)";
    }
}

$daftar = [
    new Produk('Keyboard', 250000),
    new ProdukDiskon('Mouse', 150000, 10)
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            width: 500px;
            max-width: 90%;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        h1 {
            text-align: center;
            color: #3a3f7b;
            margin-top: 0;
            font-size: 22px;
        }

        .subtitle {
            text-align: center;
            color: #7f8c8d;
            font-size: 13px;
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #5d3a7b;
            color: white;
            font-size: 14px;
        }

        td {
            font-size: 15px;
            color: #333;
        }

        tr:hover {
            background: #f9f9f9;
        }

        .harga {
            font-weight: bold;
            color: #4027ae;
            text-align: right;
        }

        .no {
            width: 40px;
            text-align: center;
            color: #999;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Daftar Produk</h1>

        <table>
            <thead>
                <tr>
                    <th class="no">No</th>
                    <th>Nama Produk</th>
                    <th style="text-align:right;">Harga Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($daftar as $produk): ?>
                <tr>
                    <td class="no"><?= $no++ ?></td>
                    <td><?= htmlspecialchars($produk->getNama()) ?></td>
                    <td class="harga">
                        Rp <?= number_format($produk->hargaAkhir(), 0, ',', '.') ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>