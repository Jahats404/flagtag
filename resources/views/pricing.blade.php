@extends('master')
@section('content')
    <div class="row mt-n3">
        <div class="col-md-11 col-lg-10 col-xl-9 col-xxl-8 mx-auto position-relative">
            <h1 class="text-center header-title">We have a plan for everyone</h1>
            <p class="lead text-center mb-4 header-subtitle">Whether you're a business or an individual, 14-day trial no credit card
                required.</p>

            <div class="row justify-content-center mt-3 mb-2">
                <div class="col-auto">
                    <nav class="nav btn-group">
                        <a href="#monthly" class="btn btn-primary active" data-bs-toggle="tab">Monthly billing</a>
                        {{-- <a href="#annual" class="btn btn-light" data-bs-toggle="tab">Annual billing</a> --}}
                    </nav>
                </div>
            </div>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="monthly">
                    <div class="row py-4">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card text-center h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="mb-4">
                                        <h5>Paket A</h5>
                                        <span class="display-4">Rp. 1.000.000</span>
                                    </div>
                                    <h6>Includes:</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            duration 6 months
                                        </li>
                                        <li class="mb-2">
                                            Consultation via video meeting: 3 times
                                        </li>
                                    </ul>
                                    <div class="mt-auto">
                                        <a href="#" class="btn btn-lg btn-outline-primary btn-sm">Try it for free</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card text-center h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="mb-4">
                                        <h5>Paket B</h5>
                                        <span class="display-4">Rp. 1.500.000</span>
                                        <span>/mo</span>
                                    </div>
                                    <h6>Includes:</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            duration 6 months
                                        </li>
                                        <li class="mb-2">
                                            Consultation via video meeting: 6 times
                                        </li>
                                    </ul>
                                    <div class="mt-auto">
                                        <a href="#" class="btn btn-lg btn-primary btn-sm">Try it for free</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="card text-center h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="mb-4">
                                        <h5>Paket C</h5>
                                        <span class="display-4">Rp. 2.500.000</span>
                                        <span>/mo</span>
                                    </div>
                                    <h6>Includes:</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            duration 1 years
                                        </li>
                                        <li class="mb-2">
                                            Consultation via video meeting: 10 times
                                        </li>
                                    </ul>
                                    <div class="mt-auto">
                                        <a href="#" class="btn btn-lg btn-outline-primary btn-sm">Try it for free</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="annual">
                    <div class="row py-4">
                        <div class="col-sm-4 mb-3 mb-md-0">
                            <div class="card text-center h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="mb-4">
                                        <h5>Free</h5>
                                        <span class="display-4">$0</span>
                                    </div>
                                    <h6>Includes:</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            1 users
                                        </li>
                                        <li class="mb-2">
                                            5 projects
                                        </li>
                                        <li class="mb-2">
                                            5 GB storage
                                        </li>
                                    </ul>
                                    <div class="mt-auto">
                                        <a href="#" class="btn btn-lg btn-outline-primary">Sign up</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3 mb-md-0">
                            <div class="card text-center h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="mb-4">
                                        <h5>Standard</h5>
                                        <span class="display-4">$199</span>
                                        <span class="text-small4">/mo</span>
                                    </div>
                                    <h6>Includes:</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            5 users
                                        </li>
                                        <li class="mb-2">
                                            50 projects
                                        </li>
                                        <li class="mb-2">
                                            50 GB storage
                                        </li>
                                        <li class="mb-2">
                                            Security policy
                                        </li>
                                        <li class="mb-2">
                                            Weekly backups
                                        </li>
                                    </ul>
                                    <div class="mt-auto">
                                        <a href="#" class="btn btn-lg btn-primary">Try it for free</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mb-3 mb-md-0">
                            <div class="card text-center h-100">
                                <div class="card-body d-flex flex-column">
                                    <div class="mb-4">
                                        <h5>Plus</h5>
                                        <span class="display-4">$399</span>
                                        <span>/mo</span>
                                    </div>
                                    <h6>Includes:</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-2">
                                            Unlimited users
                                        </li>
                                        <li class="mb-2">
                                            Unlimited projects
                                        </li>
                                        <li class="mb-2">
                                            250 GB storage
                                        </li>
                                        <li class="mb-2">
                                            Priority support
                                        </li>
                                        <li class="mb-2">
                                            Security policy
                                        </li>
                                        <li class="mb-2">
                                            Daily backups
                                        </li>
                                        <li class="mb-2">
                                            Custom CSS
                                        </li>
                                    </ul>
                                    <div class="mt-auto">
                                        <a href="#" class="btn btn-lg btn-outline-primary">Try it for free</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <div class="text-center my-4">
                <h2>Frequently asked questions</h2>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="h6 card-title">Do I need a credit card to sign up?</h5>
                            <p class="mb-0">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper
                                libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus
                                pulvinar, hendrerit id, lorem.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="h6 card-title">Do you offer a free trial?</h5>
                            <p class="mb-0">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper
                                libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus
                                pulvinar, hendrerit id, lorem.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="h6 card-title">What if I decide to cancel my plan?</h5>
                            <p class="mb-0">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper
                                libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus
                                pulvinar, hendrerit id, lorem.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="h6 card-title">Can I cancel at anytime?</h5>
                            <p class="mb-0">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper
                                libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus
                                pulvinar, hendrerit id, lorem.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection