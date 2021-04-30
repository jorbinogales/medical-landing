@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-body shadow-lg">
			<div class="table-responsive-sm">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="text-secondary">Nombre</th>
							<th class="text-secondary">Apellido</th>
							<th class="text-secondary">Correo</th>
							<th class="text-secondary">Teléfono</th>
							<th class="text-secondary text-center">Fecha de Suscripción</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($contacts as $contact)
	                        <tr>
	                            <td>{{ $contact->name }}</td>
	                            <td>{{ $contact->subname }}</td>
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