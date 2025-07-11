@extends('master')
@section('content')

    {{-- @if ($lengkap == false)
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'warning',
                    title: 'Data Belum Lengkap',
                    text: 'Silakan lengkapi data perusahaan Anda terlebih dahulu!',
                    confirmButtonText: 'Lengkapi Sekarang'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/dashboard';
                    }
                });
            });
        </script>
    @endif --}}

    <div class="header">
        <h1 class="header-title">
            Dashboard
        </h1>
        {{-- <p class="header-subtitle">Your bounce rate increased by 5.25% over the past 30 days.</p> --}}
    </div>

    <div class="row">
        <div class="col-xl-4 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Total Pelanggan</h5>
                        </div>
                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="align-middle" data-feather="users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-2 mb-4">2.562</h1>
                    {{-- <div class="mb-0">
                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.65% </span>
                        Less visitors than usual
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Total Aset</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-2 mb-4">$17.212</h1>
                    {{-- <div class="mb-0">
                        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.50% </span>
                        More activity than usual
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Scan Produk</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="ion ion-ios-qr-scanner"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-2 mb-4">3.333.333</h1>
                    {{-- <div class="mb-0">
                        <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 8.35% </span>
                        More visitors than usual
                    </div> --}}
                </div>
            </div>
        </div> 
        <div class="col-xl-4 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Produk Terdaftar</h5>
                        </div>

                        <div class="col-auto">
                            <div class="avatar">
                                <div class="avatar-title rounded-circle bg-primary-dark">
                                    <i class="align-middle" data-feather="package"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="display-5 mt-2 mb-4">500</h1>
                    {{-- <div class="mb-0">
                        <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -4.25% </span>
                        Less activity than usual
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-xxl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <a href="#" class="me-1">
                            <i class="align-middle" data-feather="refresh-cw"></i>
                        </a>
                        <div class="d-inline-block dropdown show">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="align-middle" data-feather="more-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Real-Time</h5>
                </div>
                <div class="card-body px-4">
                    <div id="world_map" style="height:275px;"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 col-md-6 col-xxl-12 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <select name="produk" class="form-select d-inline-block" id="produk">
                            <option value="djarum" selected>djarum</option>
                            <option value="aqua">aqua</option>
                        </select>
                    </div>
                    <h5 class="card-title mb-0">Grafik Analitik Pelanggan Scan Produk</h5>
                </div>
                <div class="card-body py-3">
                    <div class="chart chart-md">
                        <canvas id="chartjs-dashboard-line"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-12 col-md-12 col-xxl-4 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <a href="#" class="me-1">
                            <i class="align-middle" data-feather="refresh-cw"></i>
                        </a>
                        <div class="d-inline-block dropdown show">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="align-middle" data-feather="more-vertical"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Languages</h5>
                </div>
                <table class="table table-striped my-0">
                    <thead>
                        <tr>
                            <th>Language</th>
                            <th class="text-end">Users</th>
                            <th class="d-none d-xl-table-cell w-75">% Users</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>en-us</td>
                            <td class="text-end">735</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 43%;" aria-valuenow="43"
                                        aria-valuemin="0" aria-valuemax="100">43%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>en-gb</td>
                            <td class="text-end">223</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 27%;" aria-valuenow="27"
                                        aria-valuemin="0" aria-valuemax="100">27%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>fr-fr</td>
                            <td class="text-end">181</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 22%;" aria-valuenow="22"
                                        aria-valuemin="0" aria-valuemax="100">22%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>es-es</td>
                            <td class="text-end">132</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 16%;" aria-valuenow="16"
                                        aria-valuemin="0" aria-valuemax="100">16%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>de-de</td>
                            <td class="text-end">118</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 15%;" aria-valuenow="15"
                                        aria-valuemin="0" aria-valuemax="100">15%</div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>ru-ru</td>
                            <td class="text-end">98</td>
                            <td class="d-none d-xl-table-cell">
                                <div class="progress">
                                    <div class="progress-bar bg-primary-dark" role="progressbar" style="width: 13%;" aria-valuenow="13"
                                        aria-valuemin="0" aria-valuemax="100">13%</div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xxl-4 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <a href="#" class="me-1">
                            <i class="align-middle" data-feather="refresh-cw"></i>
                        </a>
                        <div class="d-inline-block dropdown show">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="align-middle" data-feather="more-vertical"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Interests</h5>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="chartjs-dashboard-radar"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-xxl-4 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <a href="#" class="me-1">
                            <i class="align-middle" data-feather="refresh-cw"></i>
                        </a>
                        <div class="d-inline-block dropdown show">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="align-middle" data-feather="more-vertical"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Mobile / Desktop</h5>
                </div>
                <div class="card-body d-flex w-100">
                    <div class="align-self-center chart">
                        <canvas id="chartjs-dashboard-bar-alt"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-7 col-xl-8 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <a href="#" class="me-1">
                            <i class="align-middle" data-feather="refresh-cw"></i>
                        </a>
                        <div class="d-inline-block dropdown show">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="align-middle" data-feather="more-vertical"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Traffic</h5>
                </div>
                <table id="datatables-dashboard-traffic" class="table table-striped my-0">
                    <thead>
                        <tr>
                            <th>Source</th>
                            <th class="text-end">Users</th>
                            <th class="d-none d-xl-table-cell text-end">Sessions</th>
                            <th class="d-none d-xl-table-cell text-end">Bounce Rate</th>
                            <th class="d-none d-xl-table-cell text-end">Avg. Session Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Google</td>
                            <td class="text-end">1023</td>
                            <td class="d-none d-xl-table-cell text-end">1265</td>
                            <td class="d-none d-xl-table-cell text-end text-success">27.23%</td>
                            <td class="d-none d-xl-table-cell text-end">00:06:25</td>
                        </tr>
                        <tr>
                            <td>Bing</td>
                            <td class="text-end">504</td>
                            <td class="d-none d-xl-table-cell text-end">623</td>
                            <td class="d-none d-xl-table-cell text-end text-danger">66.76%</td>
                            <td class="d-none d-xl-table-cell text-end">00:04:42</td>
                        </tr>
                        <tr>
                            <td>Twitter</td>
                            <td class="text-end">462</td>
                            <td class="d-none d-xl-table-cell text-end">571</td>
                            <td class="d-none d-xl-table-cell text-end text-success">31.53%</td>
                            <td class="d-none d-xl-table-cell text-end">00:08:05</td>
                        </tr>
                        <tr>
                            <td>Pinterest</td>
                            <td class="text-end">623</td>
                            <td class="d-none d-xl-table-cell text-end">770</td>
                            <td class="d-none d-xl-table-cell text-end text-danger">52.81%</td>
                            <td class="d-none d-xl-table-cell text-end">00:03:10</td>
                        </tr>
                        <tr>
                            <td>DuckDuckGo</td>
                            <td class="text-end">693</td>
                            <td class="d-none d-xl-table-cell text-end">856</td>
                            <td class="d-none d-xl-table-cell text-end text-success">37.36%</td>
                            <td class="d-none d-xl-table-cell text-end">00:09:12</td>
                        </tr>
                        <tr>
                            <td>GitHub</td>
                            <td class="text-end">713</td>
                            <td class="d-none d-xl-table-cell text-end">881</td>
                            <td class="d-none d-xl-table-cell text-end text-success">38.09%</td>
                            <td class="d-none d-xl-table-cell text-end">00:06:19</td>
                        </tr>
                        <tr>
                            <td>Direct</td>
                            <td class="text-end">872</td>
                            <td class="d-none d-xl-table-cell text-end">1077</td>
                            <td class="d-none d-xl-table-cell text-end text-success">32.70%</td>
                            <td class="d-none d-xl-table-cell text-end">00:09:18</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-12 col-lg-5 col-xl-4 d-flex">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="card-actions float-end">
                        <a href="#" class="me-1">
                            <i class="align-middle" data-feather="refresh-cw"></i>
                        </a>
                        <div class="d-inline-block dropdown show">
                            <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                <i class="align-middle" data-feather="more-vertical"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-title mb-0">Browser Usage</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="py-3">
                            <div class="chart chart-xs">
                                <canvas id="chartjs-dashboard-pie"></canvas>
                            </div>
                        </div>

                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-circle text-primary fa-fw"></i> Chrome</td>
                                    <td class="text-end">4401</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-circle text-warning fa-fw"></i> Firefox</td>
                                    <td class="text-end">4003</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-circle text-danger fa-fw"></i> IE</td>
                                    <td class="text-end">1589</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <script src="{{ asset('/') }}js/app.js"></script>

    <script>
		document.addEventListener("DOMContentLoaded", function() {
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				selectedRegions: [
					'US',
					'SA',
					'DE',
					'FR',
					'CN',
					'AU',
					'BR',
					'IN',
					'GB'
				],
				regionStyle: {
					initial: {
						fill: '#e4e4e4',
						"fill-opacity": 0.9,
						stroke: 'none',
						"stroke-width": 0,
						"stroke-opacity": 0
					},
					selected: {
						fill: window.theme.primary,
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
			setTimeout(function() {
				map.updateSize();
			}, 250);
		});
	</script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Pie chart
            new Chart(document.getElementById("chartjs-dashboard-pie"), {
                type: 'pie',
                data: {
                    labels: ["Chrome", "Firefox", "IE", "Other"],
                    datasets: [{
                        data: [4401, 4003, 1589],
                        backgroundColor: [
                            window.theme.primary,
                            window.theme.warning,
                            window.theme.danger,
                            "#E8EAED"
                        ],
                        borderColor: "transparent"
                    }]
                },
                options: {
                    responsive: !window.MSInputMethodContext,
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 75
                }
            });
        });
    </script>

    <script>
        const datasets = {
            djarum: [412, 233, 616, 322, 400, 532, 783, 344, 589, 800, 923, 534],
            aqua: [342, 488, 514, 699, 791, 399, 587, 423, 783, 812, 982, 1000],
        };

        let chart; // Global variable

        function renderChart(data) {
            const ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");

            if (chart) chart.destroy(); // Destroy old chart if exists
            ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);

            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Orders",
                        fill: true,
                        backgroundColor: window.theme?.primary || 'rgba(54, 162, 235, 0.2)',
                        borderColor: window.theme?.primary || 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        data: data
                    }]
                },
                options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					elements: {
						point: {
							radius: 0
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 5
							},
							display: true,
							gridLines: {
								color: "rgba(0,0,0,0)",
								fontColor: "#fff"
							}
						}]
					}
				}
            });
        }

        document.addEventListener("DOMContentLoaded", function () {
            // Render default chart (Aqua)
            renderChart(datasets.djarum);

            // Event listener for dropdown
            document.getElementById("produk").addEventListener("change", function () {
                const selected = this.value;
                console.log(selected);
                if (datasets[selected]) {
                    renderChart(datasets[selected]);
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Radar chart
            new Chart(document.getElementById("chartjs-dashboard-radar"), {
                type: "radar",
                data: {
                    labels: ["Technology", "Sports", "Media", "Gaming", "Arts"],
                    datasets: [{
                        label: "Interests",
                        backgroundColor: "rgba(0, 123, 255, 0.2)",
                        borderColor: "#2979ff",
                        pointBackgroundColor: "#2979ff",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "#2979ff",
                        data: [70, 53, 82, 60, 33]
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Bar chart
            new Chart(document.getElementById("chartjs-dashboard-bar-alt"), {
                type: "bar",
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        label: "Last year",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }, {
                        label: "This year",
                        backgroundColor: "#E8EAED",
                        borderColor: "#E8EAED",
                        hoverBackgroundColor: "#E8EAED",
                        hoverBorderColor: "#E8EAED",
                        data: [69, 66, 24, 48, 52, 51, 44, 53, 62, 79, 51, 68],
                        barPercentage: .75,
                        categoryPercentage: .5
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: false
                            },
                            stacked: false,
                            ticks: {
                                stepSize: 20
                            }
                        }],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                color: "transparent"
                            }
                        }]
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $("#datatables-dashboard-traffic").DataTable({
                pageLength: 7,
                lengthChange: false,
                bFilter: false,
                autoWidth: false,
                order: [
                    [1, "desc"]
                ]
            });
        });
    </script>


    @include('validation.notifications')
@endsection