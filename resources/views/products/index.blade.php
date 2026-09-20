<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Information System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f6f9;
        }
        h2 { color: #333; }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        /* Style logika conditional untuk stok kritis (< 3) */
        tr.stok-kritis {
            background-color: #ffe6e6;
            color: #d9534f;
            font-weight: bold;
        }
        .badge-kritis {
            background-color: #d9534f;
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.8em;
        }
        .total-box {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9ecef;
            border-left: 5px solid #007bff;
            font-size: 1.1em;
        }
    </style>
</head>
<body>

    <h2>Product Information System</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                {{-- Logika conditional untuk membedakan warna baris jika stok < 3 --}}
                <tr class="{{ $product['stok'] < 3 ? 'stok-kritis' : '' }}">
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['nama'] }}</td>
                    <td>{{ $product['kategori'] }}</td>
                    <td>Rp {{ number_format($product['harga'], 0, ',', '.') }}</td>
                    <td>
                        {{ $product['stok'] }}
                        @if ($product['stok'] < 3)
                            <span class="badge-kritis">Stok Kritis!</span>
                        @endif
                    </td>
                    <td>{{ $product['deskripsi'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-box">
        <strong>Total Nilai Aset Gudang:</strong> Rp {{ number_format($totalNilaiStok, 0, ',', '.') }}
    </div>

</body>
</html>