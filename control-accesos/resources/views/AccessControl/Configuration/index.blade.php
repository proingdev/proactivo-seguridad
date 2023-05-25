@extends('layouts.app')
@section('title', 'Configuración')
@section('content')
<div class="pagetitle">
    <h1>Configuración</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Configuración</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section profile">
    <div class="card">
        <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered" id="myTabs">

                <li class="nav-item">
                    <a class="nav-link" id="configuration-company-tab" data-bs-toggle="tab"
                        href="#configuration-company" role="tab" aria-controls="configuration-company"
                        aria-selected="true">Empresas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-area-tab" data-bs-toggle="tab" href="#configuration-area"
                        role="tab" aria-controls="configuration-area" aria-selected="false">Áreas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-cargos-tab" data-bs-toggle="tab" href="#configuration-cargos"
                        role="tab" aria-controls="configuration-cargos" aria-selected="false">Cargos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-locations-tab" data-bs-toggle="tab"
                        href="#configuration-locations" role="tab" aria-controls="configuration-locations"
                        aria-selected="false">Ubicaciones</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-identifications-type-tab" data-bs-toggle="tab"
                        href="#configuration-identifications-type" role="tab"
                        aria-controls="configuration-identifications-type" aria-selected="false">Tipos de
                        identificación</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="configuration-arl-tab" data-bs-toggle="tab" href="#configuration-arl"
                        role="tab" aria-controls="configuration-arl" aria-selected="false">ARL</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <!-- Companies -->
                <div class="tab-pane fade p-3" id="configuration-company" role="tabpanel"
                    aria-labelledby="configuration-company-tab">
                    @include('AccessControl.Configuration.components.create-show-companies')
                </div>

                <!-- Areas -->
                <div class="tab-pane fade p-3" id="configuration-area" role="tabpanel"
                    aria-labelledby="configuration-area-tab">
                    <!-- Contenido de la Tab 2 -->
                    @include('AccessControl.Configuration.components.create-show-areas-companies')
                </div>

                <!-- in charge -->
                <div class="tab-pane fade p-3" id="configuration-cargos" role="tabpanel"
                    aria-labelledby="configuration-cargos-tab">
                    <!-- Contenido de la Tab 3 -->
                    @include('AccessControl.Configuration.components.create-show-job-titles')
                </div>

                <!-- Locations -->
                <div class="tab-pane fade p-3" id="configuration-locations" role="tabpanel"
                    aria-labelledby="configuration-locations-tab">
                    <!-- Contenido de la Tab 3 -->
                    @include('AccessControl.Configuration.components.create-show-locations')
                </div>

                <!-- identifications type -->
                <div class="tab-pane fade p-3" id="configuration-identifications-type" role="tabpanel"
                    aria-labelledby="configuration-identifications-type-tab">
                    <!-- Contenido de la Tab 3 -->
                    @include('AccessControl.Configuration.components.create-show-identification-type')
                </div>

                <!-- arl -->
                <div class="tab-pane fade p-3" id="configuration-arl" role="tabpanel"
                    aria-labelledby="configuration-arl-tab">
                    <!-- Contenido de la Tab 3 -->
                    @include('AccessControl.Configuration.components.create-show-arl')
                </div>


            </div>
            <!-- End Bordered Tabs -->
        </div>
    </div>
</section>
<!-- Modals -->
<!-- Modal update company -->
<div class="modal fade" id="modalUpdateCompany" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-company-modal')
</div>

<!-- Modal update Area -->
<div class="modal fade" id="modalUpdateArea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-area-modal')
</div>

<!-- Modal update Job Title -->
<div class="modal fade" id="modalUpdateJobTitle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    @include('AccessControl.Configuration.components.modals.edit-job-title-modal')
</div>

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
<script src="js/modals/updateJobTitleModal.js"></script>
<script src="js/modals/updateLocationModal.js"></script>
<script src="js/modals/updateIdentificationTypeModal.js"></script>
<script src="js/modals/updateArlModal.js"></script>
@endsection