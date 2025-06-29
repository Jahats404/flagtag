<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Produk</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('landing-scan/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('landing-scan/flagtag.png') }}" alt="Ethos Logo">
        </div>

        <h1>P E R I N G A T A N !</h1>

        <div class="badge">
            <img src="{{ asset('landing-scan/warning.png') }}" alt="Original Produk">
        </div>

        <div class="info-warning">
            Produk Anda Sudah <span style="color: rgb(255, 55, 28);">Pernah di Verifikasi</span> Sebelumnya! Pada tanggal 
            <strong>{{ \Carbon\Carbon::parse($hologram->updated_at)->translatedFormat('d F Y \p\u\k\u\l H:i') }}</strong>
        </div>

        <div class="contact">
            Apabila Anda belum pernah melakukan Proses Verifikasi sebelumnya, silahkan laporkan melalui:<br>
            FlagAi (WhatsApp): 081233308691 (08.00-16.00 WIB)<br>
            Email: berkahmanutgusti01@gmail.com
        </div>
        <div class="claim-button">
            <a href="{{ route('cek.session', ['kode' => encrypt_id($hologram->kode_hologram)]) }}">Klaim Token</a>
        </div>
    </div>
</body>
</html>


<script>
document.addEventListener("DOMContentLoaded", function () {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(success, error, {
            enableHighAccuracy: true
        });
    } else {
        console.log("Geolocation tidak didukung browser.");
    }

    function success(position) {
        let lat = position.coords.latitude;
        let lng = position.coords.longitude;

        // Kirim ke server via AJAX
        fetch("{{ route('hologram.location') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                kode_hologram: "{{ $hologram->kode_hologram }}",
                latitude: lat,
                longitude: lng
            })
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.log(error));
    }

    function error(err) {
        console.log("Gagal mendapatkan lokasi:", err.message);
    }
});
</script>
