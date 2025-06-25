<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Peta Indonesia - Hover Data</title>
  <link href="{{ asset('/') }}dist/jqvmap.css" rel="stylesheet" />

  <style>
    html, body {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
    }

    #vmap {
      width: 100%;
      height: 100%;
    }

    #tooltip {
      position: absolute;
      background: rgba(0, 0, 0, 0.75);
      color: #fff;
      padding: 5px 10px;
      font-size: 14px;
      border-radius: 5px;
      display: none;
      pointer-events: none;
      z-index: 1000;
    }
  </style>
</head>
<body>
  <div id="vmap"></div>
  <div id="tooltip"></div>

  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="{{ asset('/') }}dist/jquery.vmap.js"></script>
  <script src="{{ asset('/') }}dist/maps/jquery.vmap.indonesia.js" charset="utf-8"></script>

  <script>
    const dataWilayah = {
      'id-ac': 2982, // Aceh
      'id-su': 1245, // Sumatera Utara
      'id-jk': 1500, // DKI Jakarta
      'id-jr': 3210, // Jawa Barat
      'id-jt': 2789, // Jawa Tengah
      'id-ji': 3560, // Jawa Timur
      'id-yo': 780,  // Yogyakarta
      'id-bt': 980,  // Banten
      'id-ks': 1120, // Kalimantan Selatan
      'id-ki': 870,  // Kalimantan Timur
      'id-ib': 590,  // Papua Barat
      'id-pa': 1300, // Papua
      // Tambahkan provinsi lain sesuai kebutuhan
    };

    $('#vmap').vectorMap({
      map: 'indonesia_id',
      backgroundColor: '#ffffff',
      showTooltip: false,
      regionStyle: {
        initial: {
          fill: '#c4c4c4',
          "fill-opacity": 1,
          stroke: 'none',
          "stroke-width": 0,
          "stroke-opacity": 1
        },
        hover: {
          fill: '#f4a582'
        },
        selected: {
          fill: '#ff0000'
        }
      },
      onRegionOver: function(event, code, region) {
        const jumlah = dataWilayah[code] ?? 0;
        $('#tooltip')
          .html(`${region}<br>Total data: ${jumlah}`)
          .css({ display: 'block' });
      },
      onRegionOut: function(event, code, region) {
        $('#tooltip').hide();
      },
      onRegionMove: function(event, code, region) {
        $('#tooltip').css({
          top: event.pageY + 10 + 'px',
          left: event.pageX + 10 + 'px'
        });
      }
    });
  </script>
</body>
</html>
