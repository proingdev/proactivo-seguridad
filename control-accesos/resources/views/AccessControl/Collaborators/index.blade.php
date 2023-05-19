@extends('layouts.app')
@section('title', 'Colaboradores')
@section('content')
<div class="pagetitle">
    <h1>Colaboradores</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Colaboradores</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h5 class="card-title"> {{__('Colaboradores')}} </h5>
                </div>
                <div>
                    <a href="{{ route('colaboradores.create') }}" class="btn btn-primary">
                        <i class="bi bi-person-add"></i> {{__('Crear colaborador')}}
                    </a>

                    <a href="" class="btn btn-success">
                        <i class="bi bi-file-earmark-excel"></i> {{__('Exportar a excel')}}
                    </a>
                </div>
            </div>
            <hr>

            <div class="table-responsive">
                <table class="table table-hover table-colaborator" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"></th>
                            <th scope="col">
                                Colaborador
                            </th>
                            <th scope="col">Área</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"> 1 </th>
                            <td>
                                <img src="{{ asset('images/daniel_muelas.jpg') }}" alt="" srcset="">
                            </td>
                            <td>
                                <div class="card-title">
                                    {{__('DANIEL ALEXANDER MUELAS RIVERA')}}
                                </div>
                                {{__('CC.')}} {{__('1144097956')}}
                            </td>
                            <td>
                                {{__('Sistemas de información')}}
                            </td>
                            <td>
                                {{__('Coordinador de TI')}}
                            </td>
                            <td>
                                {{__('Edificio antiguo')}}
                            </td>
                            <td>
                                <a href="" class="btn btn-primary">
                                    <i class="bi bi-eye"></i>
                                    {{ __('Ver más') }}
                                </a>

                                <a href="{{ route('colaboradores.edit', '1') }}" class="btn btn-secondary">
                                    <i class="bi bi-pencil"></i>
                                    {{ __('Editar') }}
                                </a>

                                <a href="" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                    {{ __('Eliminar') }}
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
/**
 * Manage the tabs
 */
document.addEventListener('DOMContentLoaded', function() {
    var tabs = document.querySelectorAll('#myTabs .nav-link');

    tabs.forEach(function(tab, index) {
        tab.addEventListener('click', function() {
            localStorage.setItem('lastTab', index.toString());
        });

        var lastTab = localStorage.getItem('lastTab');
        if (lastTab !== null && parseInt(lastTab) === index) {
            tab.classList.add('active');
            document.querySelector(tab.getAttribute('href')).classList.add('show', 'active');
        }
    });
});
</script>

<script src="js/modals/updateCompanyModal.js"></script>
<script src="js/modals/updateAreaModal.js"></script>
@endsection
