<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Informasi Produk</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" /> --}}
    <link href="{{ asset('/') }}css/dark.css" rel="stylesheet">
    <style>
        .card {
            max-width: 700px;
            margin: auto;
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .card-header {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: white;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        
        .product-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .product-detail {
            display: flex;
            justify-content: space-between;
            padding: 0.4rem 0;
            border-bottom: 1px dashed #ccc;
        }
        
        .product-detail:last-child {
            border-bottom: none;
        }
        
        .product-label {
            font-weight: 500;
            color: #555;
        }
        
        .card-footer {
            background-color: #f8f9fc;
            text-align: center;
            font-size: 0.85rem;
            color: #6c757d;
            padding: 0.75rem;
        }
        
        .btn-connect {
            background-color: #ffffff;
            color: #4e73df;
            font-weight: 500;
            border: 1px solid #ffffff;
        }
        
        .btn-connect:hover {
            background-color: #e1e7ff;
            color: #224abe;
        }
    </style>
</head>

<body>

    {{-- MODAL CONNECT --}}
    <div class="modal fade" id="modalConnect" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content border-0">
                <div class="modal-header justify-content-center">
                    <h5 class="modal-title text-center">Connect Wallet</h5>
                    <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <ul class="list-group list-unstyled">
                        @php
                            $wallets = [
                                ['name' => 'WalletConnect', 'icon' => 'walletconnect.png'],
                                ['name' => 'MetaMask', 'icon' => 'metamask.png'],
                                ['name' => 'Trust Wallet', 'icon' => 'trustwallet.png'],
                                ['name' => 'Coin Base', 'icon' => 'coinbase.png'],
                            ];
                        @endphp
                        @foreach($wallets as $wallet)
                        <li class="d-flex align-items-center justify-content-between p-2 rounded mb-2 wallet-item" style="transition: 0.3s; cursor: pointer;">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('img/wallets/' . $wallet['icon']) }}" alt="{{ $wallet['name'] }}" width="30" class="me-2">
                                <strong>{{ $wallet['name'] }}</strong>
                            </div>
                            <button class="btn btn-outline-primary btn-sm">Connect</button>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        .wallet-item:hover {
            background-color: #f0f0f0;
        }
    </style>

    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <div class="product-title">Informasi Produk</div>
                <button class="btn btn-sm btn-connect" data-bs-toggle="modal" data-bs-target="#modalConnect">Connect Wallet</button>
            </div>
            <div class="card-body">
                <div class="product-detail">
                    <span class="product-label">ID Produk</span>
                    <span>P001</span>
                </div>
                <div class="product-detail">
                    <span class="product-label">Nama Produk</span>
                    <span>Etawalin</span>
                </div>
                <div class="product-detail">
                    <span class="product-label">SKU</span>
                    <span>200 ml</span>
                </div>
                <div class="product-detail">
                    <span class="product-label">Komposisi</span>
                    <span>Susu Kambing</span>
                </div>
                <div class="product-detail">
                    <span class="product-label">Tanggal Produksi</span>
                    <span>01 Jan 2025</span>
                </div>
                <div class="product-detail">
                    <span class="product-label">Expired</span>
                    <span>01 Jan 2026</span>
                </div>
                <div class="product-detail">
                    <span class="product-label">Tempat Produksi</span>
                    <span>Bekasi</span>
                </div>
                <div class="product-detail">
                    <span class="product-label">Total</span>
                    <span>2.000</span>
                </div>
                <div class="product-detail">
                    <span class="product-label">Status</span>
                    <span><span class="badge bg-success">Berhasil</span></span>
                </div>
                <div class="product-detail">
                    <a href="/" class="text-black text-decoration-underline d-block mb-2" style="font-size: 0.9rem;">
                        Lihat Selengkapnya...
                    </a>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-outline-primary">CLAIM</button>
                <hr>
            </div>
            <div class="card-footer">
                Powered by <strong>FLAGSHIIIP</strong>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>