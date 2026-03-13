<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Gajian - <?= $setting['nama_barbershop'] ?></title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .kop-surat {
            width: 100%;
            border-bottom: 3px solid #224abe;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop-surat table {
            width: 100%;
            border: none;
        }
        .kop-surat td {
            vertical-align: middle;
        }
        .logo-box {
            width: 100px;
            text-align: left;
        }
        .kop-text {
            text-align: center;
        }
        .kop-text h1 {
            margin: 0;
            font-size: 24px;
            color: #224abe;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .kop-text p {
            margin: 5px 0 0 0;
            font-size: 12px;
            color: #555;
        }
        .title-doc {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            text-decoration: underline;
        }
        .periode {
            text-align: center;
            margin-bottom: 20px;
            font-style: italic;
        }
        table.data {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table.data th, table.data td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        table.data th {
            background-color: #f8f9fa;
            font-weight: bold;
            text-align: center;
            color: #444;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .text-bold { font-weight: bold; }
        .bg-light { background-color: #f8f9fa; }
        .summary-box {
            width: 350px;
            float: right;
            border: 1px solid #224abe;
            border-radius: 5px;
            padding: 10px;
            background-color: #f4f7f6;
            margin-bottom: 40px;
        }
        .summary-box table {
            width: 100%;
            border: none;
        }
        .summary-box td {
            padding: 5px;
            border: none;
        }
        .total-bersih {
            font-size: 14px;
            font-weight: bold;
            color: #224abe;
            border-top: 1px solid #ccc;
        }
        .ttd-box {
            width: 250px;
            float: right;
            text-align: center;
            clear: both;
            margin-top: 30px;
        }
        .ttd-box p {
            margin: 0 0 60px 0;
        }
    </style>
</head>
<body>

    <div class="kop-surat">
        <table>
            <tr>
                <td class="logo-box">
                    <?php if($setting['logo']): ?>
                        <img src="<?= base_url('uploads/logo/' . $setting['logo']) ?>" style="max-height: 80px;">
                    <?php endif; ?>
                </td>
                <td class="kop-text">
                    <h1><?= strtoupper($setting['nama_barbershop']) ?></h1>
                    <p><?= $setting['alamat'] ?></p>
                </td>
            </tr>
        </table>
    </div>

    <div class="title-doc">LAPORAN REKAPITULASI GAJIAN KARYAWAN</div>
    
    <div class="periode">
        Periode: <?= date('d M Y', strtotime($start_date)) ?> s/d <?= date('d M Y', strtotime($end_date)) ?>
    </div>

    <p class="text-bold">A. Rincian Pendapatan Karyawan</p>
    <table class="data">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="15%">Tanggal</th>
                <th width="25%">Nama Karyawan</th>
                <th width="20%">Jenis Cukur</th>
                <th width="15%">Tambahan</th>
                <th width="20%">Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $total_gaji = 0;
            if(empty($transaksi)): ?>
                <tr><td colspan="6" class="text-center">Tidak ada transaksi pada periode ini.</td></tr>
            <?php else: foreach($transaksi as $t): 
                $total_gaji += $t['total_pendapatan'];
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= date('d/m/Y', strtotime($t['tanggal'])) ?></td>
                    <td><?= $t['nama_lengkap'] ?></td>
                    <td class="text-center"><?= $t['nama_varian'] ?></td>
                    <td class="text-center"><?= $t['nama_biaya'] ?? '-' ?></td>
                    <td class="text-right">Rp <?= number_format($t['total_pendapatan'], 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; endif; ?>
            <tr class="bg-light text-bold">
                <td colspan="5" class="text-right">Total Pendapatan:</td>
                <td class="text-right">Rp <?= number_format($total_gaji, 0, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>

    <p class="text-bold">B. Rincian Potongan Pinjaman Karyawan</p>
    <table class="data">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Tanggal Pinjam</th>
                <th width="50%">Nama Karyawan</th>
                <th width="25%">Jumlah Pinjaman</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            $total_pinjaman = 0;
            if(empty($pinjaman)): ?>
                <tr><td colspan="4" class="text-center">Tidak ada pinjaman pada periode ini.</td></tr>
            <?php else: foreach($pinjaman as $p): 
                $total_pinjaman += $p['jumlah_pinjaman'];
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td class="text-center"><?= date('d/m/Y', strtotime($p['tanggal'])) ?></td>
                    <td><?= $p['nama_lengkap'] ?></td>
                    <td class="text-right">Rp <?= number_format($p['jumlah_pinjaman'], 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; endif; ?>
            <tr class="bg-light text-bold">
                <td colspan="3" class="text-right">Total Pinjaman:</td>
                <td class="text-right">Rp <?= number_format($total_pinjaman, 0, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>

    <div class="summary-box">
        <table>
            <tr>
                <td>Total Pendapatan</td>
                <td class="text-right">Rp <?= number_format($total_gaji, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td>Total Potongan Pinjaman</td>
                <td class="text-right">- Rp <?= number_format($total_pinjaman, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td colspan="2"><hr style="border: 0.5px solid #ccc; margin: 5px 0;"></td>
            </tr>
            <tr class="total-bersih">
                <td>Gaji Bersih Diterima</td>
                <td class="text-right">Rp <?= number_format($total_gaji - $total_pinjaman, 0, ',', '.') ?></td>
            </tr>
        </table>
    </div>

    <div class="ttd-box">
        <p>Disetujui Oleh,</p>
        <span class="text-bold text-decoration-underline"><?= strtoupper($setting['nama_pimpinan']) ?></span><br>
        <span>Pemilik Barbershop</span>
    </div>

</body>
</html>