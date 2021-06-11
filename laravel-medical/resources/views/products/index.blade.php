@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
        </div>
    @endif

      @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Ups!</strong> Ocurrio un error al crear producto
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <button class="btn btn-success mb-2"><i class="icon-plus"></i> Nuevo Producto</button>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title text-info">Productos en la pagina</h5>
        </div>
		<div class="card-body">
			<div class="row">
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card bg-light d-block w-100">
                        <div class="card-body">

                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button class="btn btn-primary">VER</button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-success">MODIFICAR</button>
                            </div>
                            <div class="col-4">
                                <button class="btn btn-danger">ELIMINAR</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
    </div>


@endsection