<nav id="sidebar" class="sidebar">
    <div class="sidebar-content">
        <div class="sidebar-user">
            <img src="{{ asset('/') }}img/flagshiiip_logo.png" class="img-fluid rounded-circle mb-2" alt="Linda Miller" />
            <div class="fw-bold">{{ Auth::user()->name }}</div>
            <small>{{ Auth::user()->role->level }}</small>
        </div>

        <ul class="sidebar-nav">
            @if (Auth::check() && Auth::user()->role_id == '2')
                
            <li class="sidebar-header">
                Owner
            </li>
            <li class="sidebar-item {{ Request::routeIs('bo.dashboard*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('bo.dashboard') }}">
                    <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>
            {{-- <li class="sidebar-item {{ Request::routeIs('bitcoin*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('bitcoin') }}">
                    <i class="align-middle me-2 fab fa-fw fa-bitcoin"></i> <span class="align-middle">Bitcoin Treasuries</span>
                </a>
            </li> --}}

            {{-- <li class="sidebar-item {{ Request::routeIs('bitcoin*') || Request::routeIs('bitcoin*') ? 'active' : '' }}">
                <a data-bs-target="#periksa" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle me-2 fab fa-fw fa-bitcoin"></i> <span class="align-middle">Bitcoin Treasuries</span>
                </a>
                <ul id="periksa" class="sidebar-dropdown list-unstyled collapse {{ Request::routeIs('bitcoin*') || Request::routeIs('bitcoin') ? 'show' : '' }}" data-bs-parent="#sidebar">
                    <li class="sidebar-item {{ Request::routeIs('bitcoin') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('bitcoin') }}">Playlist</a>
                    </li>
                    <li class="sidebar-item {{ Request::routeIs('bitcoin.crud') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('bitcoin.crud') }}">CRUD</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item {{ Request::routeIs('pricing*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('pricing') }}">
                    <i class="align-middle me-2 fas fa-fw fa-dollar-sign"></i> <span class="align-middle">Pricing</span>
                </a>
            </li> --}}

            <li class="sidebar-item {{ Request::routeIs('bo.produk*') || Request::routeIs('bo.produk*') ? 'active' : '' }}">
                <a data-bs-target="#produks" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle me-2" data-feather="box"></i> <span class="align-middle">Produk</span>
                </a>
                <ul id="produks" class="sidebar-dropdown list-unstyled collapse {{ Request::routeIs('bo.produk') || Request::routeIs('detail.produk') ? 'show' : '' }}" data-bs-parent="#sidebar">
                    <li class="sidebar-item {{ Request::routeIs('bo.produk') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('bo.produk') }}">Data Produk</a>
                    </li>
                    <li class="sidebar-item {{ Request::routeIs('kepemilikan.produk') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepemilikan.produk') }}">Kepemilikan Produk</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item {{ Request::routeIs('data.pelanggan*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('data.pelanggan') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data Pelanggan</span>
                </a>
            </li>

            {{-- <li class="sidebar-item {{ Request::routeIs('data.distributor*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('data.distributor') }}">
                    <i class="align-middle me-2" data-feather="truck"></i> <span class="align-middle">Data Distributor</span>
                </a>
            </li> --}}

            {{-- <li class="sidebar-item">
                <a data-bs-target="#bpom" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle me-2" data-feather="check-circle"></i> <span class="align-middle">BPOM</span>
                </a>
                <ul id="bpom" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Data BPOM</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Data BPOM</a>
                    </li>
                </ul>
            </li> --}}

            <li class="sidebar-item">
                <a data-bs-target="#crm" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-user-cog"></i> <span class="align-middle">CRM</span>
                </a>
                <ul id="crm" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Data CRM</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Data CRM</a>
                    </li>
                </ul>
            </li>
            
            {{-- <li class="sidebar-item">
                <a data-bs-target="#garansi" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-hand-holding-heart"></i> <span class="align-middle">Garansi</span>
                </a>
                <ul id="garansi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Data Garansi</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Data Garansi</a>
                    </li>
                </ul>
            </li> --}}
            
            {{-- <li class="sidebar-item">
                <a data-bs-target="#insentif" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle me-2 fas fa-fw fa-hand-holding-usd"></i> <span class="align-middle">Program Insentif</span>
                </a>
                <ul id="insentif" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Data Insentif</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Data Insentif</a>
                    </li>
                </ul>
            </li> --}}
            
            {{-- <li class="sidebar-item">
                <a data-bs-target="#poin-distributor" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="ion ion-ios-swap me-2"></i> <span class="align-middle">Poin Distributor</span>
                </a>
                <ul id="poin-distributor" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Poin Distributor</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Poin Distributor</a>
                    </li>
                </ul>
            </li> --}}
            
            <li class="sidebar-item">
                <a data-bs-target="#laporan" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle me-2" data-feather="file-text"></i> <span class="align-middle">Laporan</span>
                </a>
                <ul id="laporan" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Data Laporan</a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="">Data Laporan</a>
                    </li>
                </ul>
            </li>

            {{-- <li class="sidebar-item">
                <a class="sidebar-link" href="">
                    <i class="align-middle me-2" data-feather="slack"></i> <span class="align-middle">Affiliasi</span>
                </a>
            </li> --}}
            @endif

            @if (Auth::check() && Auth::user()->role_id == '3')
                <li class="sidebar-header">
                    Admin
                </li>
                <li class="sidebar-item {{ Request::routeIs('c.dashboard*') ? 'active' : '' }}">
                    <a class="sidebar-link" href="{{ route('c.dashboard') }}">
                        <i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::routeIs('c.token*') || Request::routeIs('c.token*') ? 'active' : '' }}">
                    <a data-bs-target="#tokens" data-bs-toggle="collapse" class="sidebar-link">
                        <i class="align-middle me-2 fas fa-fw fa-smoking"></i> <span class="align-middle">Smoking Area</span>
                    </a>
                    <ul id="tokens" class="sidebar-dropdown list-unstyled collapse {{ Request::routeIs('c.token') || Request::routeIs('detail.produk') ? 'show' : '' }}" data-bs-parent="#sidebar">
                        <li class="sidebar-item {{ Request::routeIs('c.token') || Request::routeIs('c.token.with.kode') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('c.token') }}">Token</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Request::routeIs('bo.produk*') || Request::routeIs('bo.produk*') ? 'active' : '' }}">
                    <a data-bs-target="#produks" data-bs-toggle="collapse" class="sidebar-link">
                        <i class="align-middle me-2" data-feather="box"></i> <span class="align-middle">Produk</span>
                    </a>
                    <ul id="produks" class="sidebar-dropdown list-unstyled collapse {{ Request::routeIs('bo.produk') || Request::routeIs('detail.produk') ? 'show' : '' }}" data-bs-parent="#sidebar">
                        <li class="sidebar-item {{ Request::routeIs('bo.produk') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('bo.produk') }}">Data Produk</a>
                        </li>
                        <li class="sidebar-item {{ Request::routeIs('kepemilikan.produk') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('kepemilikan.produk') }}">Kepemilikan Produk</a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="sidebar-header">
                Customer
            </li>
                
            <li class="sidebar-item {{ Request::routeIs('data.riwayat*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('data.riwayat') }}">
                    <i class="ion ion-ios-bookmark me-2"></i> <span class="align-middle">Riwayat</span>
                </a>
            </li>

            {{-- <li class="sidebar-item {{ Request::routeIs('bitcoin*') || Request::routeIs('bitcoin*') ? 'active' : '' }}">
                <a data-bs-target="#distributor" data-bs-toggle="collapse" class="sidebar-link">
                    <i class="align-middle me-2" data-feather="box"></i> <span class="align-middle">distributor</span>
                </a>
                <ul id="distributor" class="sidebar-dropdown list-unstyled collapse {{ Request::routeIs('data.distributor') || Request::routeIs('data.distributor') ? 'show' : '' }}" data-bs-parent="#sidebar">
                    <li class="sidebar-item {{ Request::routeIs('data.distributor') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('data.distributor') }}">Data Distributor</a>
                    </li>
                    <li class="sidebar-item {{ Request::routeIs('data.distributor') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ route('kepemilikan.produk') }}">Kepemilikan Produk</a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</nav>