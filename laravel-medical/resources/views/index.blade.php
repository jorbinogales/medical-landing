@extends('layouts.app')

@section('content')
<div class="card">
		<div class="card-header">
            <h5 class="card-title text-info">Clientes Registrados</h5>
        </div>
		<div class="card-body">
			<div class="table-responsive-sm">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-secondary">Nombre Completo</th>
							<th class="text-secondary">Empresa</th>
							<th class="text-secondary">Tipo de empresa</th>
							<th class="text-secondary">Correo</th>
							<th class="text-secondary">Teléfono</th>
							<th class="text-secondary text-center">Fecha de Suscripción</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($contacts as $contact)
	                        <tr>
	                            <td>{{ $contact->name }}</td>
	                            <td>{{ $contact->business }}</td>
	                            <td>{{ $contact->businessType }}</td>
	                            <td>{{ $contact->email }}</td>
								<td>{{ $contact->phone }}</td>
	                            <td class="text-center">{{ $contact->created_at->format('d/m/Y g:i a') }}</td>
	                        </tr>
	                    @endforeach
					</tbody>
				</table>
				 {{ $contacts->links('vendor.pagination.bootstrap') }}
			</div>
		</div>
</div>
@endsection