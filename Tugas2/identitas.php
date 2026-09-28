<?php

interface Identitas
{
    public function ringkasan(): string;
    public function statusAkademik(): string; 
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;
    protected float $ipk;

    public function __construct(string $nim, string $nama, float $ipk)
    {
        if (!preg_match('/^[0-9]{10}$/', $nim)) {
            throw new InvalidArgumentException('NIM harus berupa 10 digit angka.');
        }

        $this->nim = $nim;
        $this->nama = $nama;
        $this->setIpk($ipk);
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus 0 sampai 4.');
        }
        $this->ipk = $ipk;
    }

    public function getNim(): string { return $this->nim; }
    public function getNama(): string { return $this->nama; }
    public function getIpk(): float { return $this->ipk; }

    public function ringkasan(): string
    {
        return $this->nim . ' - ' . $this->nama . ' - IPK: ' . $this->ipk;
    }

    public function statusAkademik(): string
    {
        if ($this->ipk >= 3.5) return 'Cumlaude';
        elseif ($this->ipk >= 3.0) return 'Sangat Baik';
        else return 'Baik';
    }
}

$mhs = new Mahasiswa('4524210073', 'Nadine Agietha Bethesda', 3.87);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #e9e9e9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .kartu {
            width: 380px;
            background: #f4f4f4;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            overflow: hidden;
        }

        .header {
            background: #bf63c1;
            color: white;
            text-align: center;
            padding: 25px 15px;
            font-weight: bold;
            font-size: 16px;
            line-height: 1.5;
            letter-spacing: 1px;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            color: #000;
            font-size: 18px;
            padding: 20px 15px 5px;
            line-height: 1.4;
        }

        .isi {
            padding: 15px 30px 30px;
        }

        .baris {
            display: flex;
            margin-bottom: 14px;
            font-size: 14px;
            color: #000;
        }

        .baris .label {
            width: 110px;
        }

        .baris .titik {
            width: 15px;
        }

        .baris .nilai {
            flex: 1;
        }
    </style>
</head>
<body>

    <div class="kartu">

        <div class="header">
            <p>UNIVERSITAS<br>PANCASILA
        </div>

        <div class="judul">
            KARTU IDENTITAS<br>MAHASISWA
        </div>

        <div class="isi">

            <div class="baris">
                <div class="label">Nama</div>
                <div class="titik">:</div>
                <div class="nilai"><?= htmlspecialchars($mhs->getNama()) ?></div>
            </div>

            <div class="baris">
                <div class="label">NPM</div>
                <div class="titik">:</div>
                <div class="nilai"><?= htmlspecialchars($mhs->getNim()) ?></div>
            </div>

            <div class="baris">
                <div class="label">IPK</div>
                <div class="titik">:</div>
                <div class="nilai"><?= htmlspecialchars((string) $mhs->getIpk()) ?></div>
            </div>

            <div class="baris">
                <div class="label">Status</div>
                <div class="titik">:</div>
                <div class="nilai"><?= htmlspecialchars($mhs->statusAkademik()) ?></div>
            </div>

        </div>

    </div>

</body>
</html>