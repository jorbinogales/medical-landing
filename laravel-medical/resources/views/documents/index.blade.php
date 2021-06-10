@extends('layouts.app')

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
        </div>
    @endif

      @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Ups!</strong> Ocurrio un error al cargar el archivo
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
    @endif

    <div class="row">
        <div class="col-12 col-md-7">
            <div class="card">
                <div class="card-header">
                        <h5 class="card-title text-info">Lista de todos los catalogos</h5>
                </div>
                <div class="card-body">
                    
                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-secondary">ID</th>
                                    <th class="text-secondary">Nombre</th>
                                    <th class="text-secondary">Fecha</th>
                                    <th class="text-secondary"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    if(count($documents) > 0){
                                        $i = 0;
                                        foreach($documents as $document):

                                           @endphp

                                           <tr>
                                                <td>{{ $document->id }}</td>
                                                <td>{{ substr($document->originalName, 0, 10) }}</td>
                                                <td>{{ $document->created_at}}</td>
                                                <td>
                                                    <a
                                                    class="btn btn-success"
                                                    data-toggle="modal" 
                                                    data-target="#modal-send-<?php echo $document->id ?>">
                                                        Enviar
                                                    </a>
                                                </td>
                                           </tr>

                                           @php
                                           $i++;

                                        endforeach;

                                    }
                                @endphp
                            </tbody>
                        </table>
                        {{ $documents->links('vendor.pagination.bootstrap') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5">

            <div class="card">
                <div class="card-header">
                        <h5 class="card-title text-info">Lista de todos los catalogos</h5>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                            
                                <form action="/documents" method="post" enctype="multipart/form-data" class='w-100'>
                                    @csrf
                                    <div class="form-group w-100">
                                        <input type="file" name="file" class="form-control" required>
                                    </div>
                                    <input class="btn btn-success btn-block mt-2 d-block w-50" type="submit" value="SUBIR">
                                </form>
                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @php

        if(count($documents) > 0){

            $j = 0;

            foreach($documents as $document):

                @endphp
                <!-- Modal -->
                <div 
                    class="modal fade" 
                    id="modal-send-<?php echo $document->id ?>" 
                    tabindex="-1" 
                    role="dialog" 
                    aria-hidden="true"
                >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Selecciona destinarios</h5>
                            <button type="button" class="close btn-close btn btn-secondary" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{ url('documents/send/') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Selecciona el tipo de empresa que deseas enviar el catálogo</label>
                                    <select class="form-control" 
                                            name="businessType">
                                            <option value="all">Todos</option>
                                            <option value="farmacía">Farmacía</option>
                                            <option value="droguería">Droguería</option>
                                            <option value="otros">Otro</option>
                                    </select>
                                </div>
                                <input type="hidden" name="documentID" value="{{ $document->id }}">
                                <input type="submit" style="display:none" id="submit-<?php echo $j ?>">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <label 

                                for="submit-<?php echo $j ?>"
                                class="btn btn-success"
                                onclick="sendMail(event)"
                                >
                                <span class="spinner d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Enviar Catálogo
                            </label>
                        </div>
                    </div>
                </div>
            </div>
                
                @php
                $j++;
            endforeach;
        }
                                    
    @endphp

    <script>
        function sendMail(e){
            e.target.disabled = true;
            $('.spinner').css({'display':'block !important'});
        }
    </script>

@endsection