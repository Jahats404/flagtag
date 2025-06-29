<!DOCTYPE html>
<html>
<head>
    <title>Cetak QR Code</title>
    <style>
        @media print {
            body {
                margin: 0;
            }
        }
        .qr-container {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body onload="window.print()">
    <div class="qr-container">
        <h2>QR Code Produk</h2>
        <p>{{ $hologram->kode_hologram }}</p>
        <img src="data:image/png;base64, 
        {!! base64_encode(QrCode::format('png')->size(200)->generate(route('hologram.verify', ['kode' => encrypt_id($hologram->kode_hologram)]))) !!} ">
        <p><strong>{{ $hologram->batchProduk->produk->nama_produk }}</strong></p>
    </div>
</body>
</html>
