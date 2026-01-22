<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Detail Kategori - {{ $category->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            margin: 0;
            font-size: 20px;
        }

        .info-table {
            width: 100%;
            margin-bottom: 20px;
        }

        .info-table td {
            padding: 5px 0;
        }

        .info-table .label {
            width: 150px;
            font-weight: bold;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .items-table th,
        .items-table td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }

        .items-table th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .items-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            position: fixed;
            bottom: 20px;
            left: 20px;
            right: 20px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }

        .no-items {
            text-align: center;
            color: #666;
            font-style: italic;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Detail Kategori</h1>
    </div>

    <table class="info-table">
        <tr>
            <td class="label">Nama Kategori</td>
            <td>: {{ $category->name }}</td>
        </tr>
        <tr>
            <td class="label">Kode Kategori</td>
            <td>: {{ $category->kode }}</td>
        </tr>
    </table>

    <h3>Daftar Item dengan Kategori "{{ $category->name }}"</h3>

    @if ($masterItems->count() > 0)
        <table class="items-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Item</th>
                    <th>Jenis</th>
                    <th>Harga Beli</th>
                    <th>Supplier</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($masterItems as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->kode }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>Rp {{ number_format($item->harga_beli) }}</td>
                        <td>{{ $item->supplier }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="no-items">Belum ada item dengan kategori ini.</p>
    @endif

    <div class="footer">
        Dicetak pada: {{ $printDate }}
    </div>
</body>

</html>
