@extends('layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-6">
            <div class="row">
                <!-- Main panel -->
                <div class="card">
                    <div class="card-body card-main px-5">
                        <h5 class="card-title"> {{ __('Panel de control') }}
                            <span>| {{ __('Colaboradores') }}</span>
                        </h5>
                        <hr>
                        <div class="activity">

                            <div class="search">
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <img src="{{ asset('images/pisa.png') }}" class="company-logo">
                                    </span>

                                    <input class="form-control" list="datalistOptions" id="exampleDataList"
                                        placeholder="Buscar colaborador, visitante ...">

                                    <datalist id="datalistOptions">
                                        <option value="Fabian Riquet">
                                        <option value="Raquel Perez">
                                        <option value="Jaider Vasquez">
                                        <option value="Daniel Muelas">
                                    </datalist>

                                    <span class="input-group-text">
                                        <i class="bi bi-search"></i>
                                    </span>
                                </div>
                            </div>

                            <!-- User Information -->
                            <div class="row">
                                <div class="col-4 mt-4">
                                    <div class="user-image">
                                        <img src="{{ asset('images/daniel_muelas.jpg') }}" alt="">
                                    </div>
                                </div>

                                <div class="align-self-center col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-4">
                                    <div class="card-title">
                                        DANIEL ALEXANDER MUELAS RIVERA
                                    </div>
                                    <div>
                                        <i class="bi bi-person-vcard-fill"></i> <span> 1144097956 </span>
                                    </div>
                                    <div>
                                        <i class="bi bi-geo-alt-fill"></i> <span> Técnologia, Edificio Antiguo </span>
                                    </div>
                                    <div>
                                        <i class="bi bi-person-fill"></i> <span> Coordinador de Técnologia </span>
                                    </div>
                                </div>
                                <div class="col-4 mt-2 align-self-center">
                                    <a href="" class="dashboard-user-door door-in">
                                        <div class="content-icon"> <i class="bi bi-box-arrow-right"></i> </div>
                                        <div class="content-text"> {{ __('Ingreso peatonal') }} </div>
                                    </a>

                                    <a href="" class="dashboard-user-door door-out mt-2">
                                        <div class="content-icon"> <i class="bi bi-box-arrow-left"></i> </div>
                                        <div class="content-text"> {{ __('Salida peatonal') }} </div>
                                    </a>
                                </div>
                            </div>
                            <!-- End user information -->
                            <hr>
                            <div class="d-flex justify-content-center">

                                <a href="" class="dashboard-user-action user-action-primary m-1">
                                    <div class="content-icon"> <i class="bi bi-person-fill-add"></i> </div>
                                    <div class="content-text"> {{ __('Registrar visitante') }} </div>
                                </a>

                                <a href="" class="dashboard-user-action user-action-warning m-1">
                                    <div class="content-icon"> <i class="bi bi-person-video"></i> </div>
                                    <div class="content-text"> {{ __('Ver colaborador') }} </div>
                                </a>

                                <a href="" class="dashboard-user-action user-action-success m-1">
                                    <div class="content-icon"> <i class="bi bi-person-fill-check"></i> </div>
                                    <div class="content-text"> {{ __('Ver permisos') }} </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End main Panel-->
            </div>
        </div>
        <!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-6">
            <!-- Visitors today -->
            <div class="card">
                <div class="card-body card-summary">
                    <h5 class="card-title"> {{ __('Visitantes') }} <span>| {{ __('Hoy') }}</span></h5>
                    <hr>
                    <div class="activity">
                    </div>
                </div>
            </div>
            <!-- End  Visitors Today-->

            <!-- Visitors today -->
            <div class="card">
                <div class="card-body card-summary">
                    <h5 class="card-title"> {{ __('Permisos') }} <span>| {{ __('Hoy') }}</span></h5>
                    <hr>
                    <div class="activity">
                    </div>
                </div>
            </div>
            <!-- End  Visitors Today-->

        </div>
        <!-- End Right side columns -->
    </div>
</section>
@endsection