<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penawaran - {{ $penawaran->nama_perusahaan }}</title>
    <style>
        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #111;
            margin: 0;
        }

        .header {
            display: table;
            width: 100%;
            border-bottom: 2px solid #111;
            padding-bottom: 12px;
            margin-bottom: 18px;
        }

        .header-left {
            display: table-cell;
            vertical-align: middle;
        }

        .header-right {
            display: table-cell;
            vertical-align: middle;
            text-align: right;
            width: 120px;
        }

        .logo {
            width: 96px;
            height: 96px;
            object-fit: contain;
        }

        .company-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .company-info {
            line-height: 1.4;
        }

        .title {
            font-size: 16px;
            font-weight: bold;
            margin: 16px 0 10px;
            text-align: center;
            text-transform: uppercase;
        }

        .section {
            margin-top: 14px;
        }

        .label {
            width: 140px;
            display: inline-block;
            font-weight: bold;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        .table th,
        .table td {
            border: 1px solid #999;
            padding: 8px;
            vertical-align: top;
        }

        .footer {
            margin-top: 28px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="header-left">
            <div class="company-name">{{ $perusahaan->nama ?? 'Perusahaan' }}</div>
            <div class="company-info">
                {{ $perusahaan->alamat ?? '-' }}<br>
                Email: {{ $perusahaan->email ?? '-' }}<br>
                Telp/WA: {{ $perusahaan->no_wa ?? '-' }}
            </div>
        </div>
        <div class="header-right">
            @if (!empty($perusahaan->logo))
                @php
                    $path = public_path('storage/' . ltrim($perusahaan->logo, '/'));
                    if (file_exists($path)) {
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    } else {
                        $base64 = '';
                    }
                @endphp
                @if ($base64)
                    <img class="logo" src="{{ $base64 }}" alt="Logo">
                @endif
            @endif
        </div>
    </div>

    <div class="title">Dokumen Penawaran</div>

    <div class="section">
        <div><span class="label">Nama Perusahaan</span>: {{ $penawaran->nama_perusahaan ?? '-' }}</div>
        <div><span class="label">Alamat</span>: {{ $penawaran->alamat ?? '-' }}</div>
        <div><span class="label">Layanan</span>: {{ $penawaran->layanan?->nama ?? '-' }}</div>
        <div><span class="label">Tanggal</span>:
            {{ $penawaran->tanggal_permintaan ? \Illuminate\Support\Carbon::parse($penawaran->tanggal_permintaan)->format('d-m-Y') : '-' }}
        </div>
        <div><span class="label">Status</span>: {{ $penawaran->status ?? '-' }}</div>
    </div>

    <div class="section">
        <div class="label">Deskripsi</div>
        <div>{!! nl2br(e($penawaran->deskripsi ?? '-')) !!}</div>
    </div>

    <div class="section">
        <table class="table">
            <thead>
                <tr>
                    <th width="30%">Catatan</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{!! nl2br(e($penawaran->catatan ?? '-')) !!}</td>
                    <td>{{ $penawaran->file ?? '-' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="footer">
        <div>Dicetak pada: {{ now()->format('d-m-Y H:i') }}</div>
    </div>
</body>

</html>
