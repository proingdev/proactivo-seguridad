<!-- Company Form -->
<h5 class="card-title"> {{__('Crear Cargos')}} </h5>
<form class="row needs-validation" action="{{ route('areas.store') }}" method="POST" novalidate>
    @csrf
    <div class="col-auto">
        <label for="name" class="form-label fw-bold"> Nombre del cargo: <small class="required">*</small></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Cargo" required>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('El nombre del cargo es requerido') }}</strong>
        </span>
    </div>

    <div class="col-auto">
        <label for="name" class="form-label fw-bold"> Área del cargo:
            <small class="required">*</small></label>
        <select name="company_id" id="company_id" class="form-select" required>
            <option value="" selected>Seleccione...</option>
            @if( isset($areas) && sizeof($areas) > 0 )
            @foreach( $areas as $key => $area )
            <option value="{{ __($area->id) }}">{{ $area->name }}</option>
            @endforeach
            @endif
        </select>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('El área a la que pertenece es requerida') }}</strong>
        </span>
    </div>

    <div class="col-auto">
        <label for="name" class="form-label fw-bold"> Empresa:
            <small class="required">*</small></label>
        <select name="company_id" id="company_id" class="form-select" required>
            <option value="" selected>Seleccione...</option>
            @if( isset($companies) && sizeof($companies) > 0 )
            @foreach( $companies as $key => $company )
            <option value="{{ __($company->id) }}">{{ $company->name }}</option>
            @endforeach
            @endif
        </select>
        <span class="invalid-feedback" role="alert">
            <strong>{{ __('La empresa es requerido') }}</strong>
        </span>
    </div>

    <div class="col-auto d-flex align-items-end">
        <button type="submit" class="btn btn-primary">Crear área</button>
    </div>
</form>

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@elseif(session('error'))
<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<hr>


<div class="table-responsive p-2">
    <table class="table table-hover" id="dataTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Area</th>
                <th scope="col">Empresa</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if( isset($areas) && sizeof($areas) > 0 )
            @foreach( $areas as $key => $area )

            <tr>
                <th scope="row"> {{ $key + 1 }} </th>
                <td> {{ $area->name }}</td>
                <td> {{ $area->company->name }} </td>
                <td>
                    <div class="row">
                        <div class="col-4">
                            <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalUpdateArea" data-bs-area-id="{{ $area->id }}"
                                data-bs-area-name="{{ $area->name }}" data-bs-company-id="{{ $area->company_id }}"
                                data-bs-company-name="{{ $area->company->name}}">
                                <i class="bi bi-pencil-fill"></i>
                                {{ __('Editar') }}
                            </a>
                        </div>
                        <div class="col-4">
                            <form action="{{ route('areas.destroy', $area->id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm" type="submit"
                                    onclick="return confirm('¿Desea eliminar...?')">
                                    <i class="bi bi-trash-fill"></i>
                                    {{ __('Eliminar') }}
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