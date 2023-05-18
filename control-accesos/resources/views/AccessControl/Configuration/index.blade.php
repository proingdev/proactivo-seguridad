@extends('layouts.app')
@section('title', 'Configuración')
@section('content')
<div class="pagetitle">
    <h1>Configuración</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
            <li class="breadcrumb-item active">Configuración</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile">
    <div class="card">
        <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#configuration-company">
                        {{__('Empresas')}}
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#configuration-area">
                        {{__('Áreas')}}
                    </button>
                </li>

            </ul>
            <div class="tab-content pt-2">

                <div class="tab-pane fade show active configuration-company p-3" id="configuration-company">
                    <!-- Company Form -->
                    <div class="container">
                        <div class="row">
                            <h5 class="card-title"> {{__('Crear empresa')}} </h5>
                            <form class="row needs-validation" action="{{ route('empresas.store') }}" method="POST"
                                novalidate>
                                @csrf
                                <div class="col-4">
                                    <label for="nit" class="form-label fw-bold"> Nit: <small
                                            class="required">*</small></label>
                                    <input type="text" class="form-control" id="nit" name="nit" placeholder="Nit"
                                        required>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('El nit es requerido') }}</strong>
                                    </span>
                                </div>

                                <div class="col-4">
                                    <label for="name" class="form-label fw-bold"> Nombre de la empresa:
                                        <small class="required">*</small></label>
                                    <input type="text" class="form-control" id="name" name="name" name="name"
                                        placeholder="Nombre de la empresa" required>
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ __('El nombre de la empresa es requerido') }}</strong>
                                    </span>
                                </div>

                                <div class="col-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Crear empresa</button>
                                </div>
                            </form>

                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @elseif(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                            @endif
                            <hr>


                            <div class="table-responsive">
                                <table class="table table-hover table responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nit</th>
                                            <th scope="col">Empresa</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if( isset($companies) && sizeof($companies) > 0 )
                                        @foreach( $companies as $key => $company )

                                        <tr>
                                            <th scope="row"> {{ $key + 1 }} </th>
                                            <td> {{ $company->nit }}</td>
                                            <td> {{ $company->name }} </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <a href="#" class="btn btn-primary btn-sm"
                                                            data-bs-toggle="modal" data-bs-target="#modalUpdateCompany"
                                                            data-bs-id="{{ $company->id }}"
                                                            data-bs-name="{{ $company->name }}"
                                                            data-bs-nit="{{ $company->nit }}">

                                                            <i class="bi bi-pencil-fill"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-4">
                                                        <form action="{{ route('empresas.destroy', $company->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button class="btn btn-danger btn-sm" type="submit"
                                                                onclick="return confirm('¿Desea eliminar...?')">
                                                                <i class="bi bi-trash-fill"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif()
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Company Form -->
                </div>

                <div class="tab-pane fade configuration-area p-3" id="configuration-area">
                    <h5 class="card-title"> Áreas </h5>

                </div>

            </div><!-- End Bordered Tabs -->
        </div>
    </div>
</section>
<!-- Modals -->

<!-- Modal update company -->
<div class="modal fade" id="modalUpdateCompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-company-modal')
</div>
@endsection

@section('scripts')
<script src="js/modals/updateCompanyModal.js"></script>
@endsection