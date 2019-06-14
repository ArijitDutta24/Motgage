@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Client Personal Details</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Client</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.clientList') }}">All Client List</a></li>
				<li class="breadcrumb-item active" aria-current="page">Client Personal Details</li>
			</ol>

		</div>
		<div class="row ">
			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header">
						<h3 class="card-title">{{$user->name}} Personal Details</h3>
						

					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th>Address</th>
									<th>City</th>
									<th>Zip Code</th>
									<th>Country</th>
									
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>{{ $data->address }}</td>
									<td>{{ $data->city }}</td>
									<td>{{ $data->postal_code }}</td>
									<td>{{ $data->country_id }}</td>

								</tr>
							</tbody>
						</table>

					</div>
				</div>
				<a href="{{ route('admin.clientList') }}" class="btn btn-primary btn-sm" style="text-align: right;">Back</a>
			</div>
		</div>
	</div>
</div>

@endsection