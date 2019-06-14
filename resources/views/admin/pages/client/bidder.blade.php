@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Client Property Details</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Client</a></li>
				<li class="breadcrumb-item"><a href="{{ route('admin.clientList') }}">All Property List</a></li>
				<li class="breadcrumb-item active" aria-current="page">Client Property Details</li>
			</ol>

		</div>
		<div class="row ">
			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header">
						<h3 class="card-title">{{$user->name}} Property Details</h3>
						

					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th>Name</th>
									<th>Address</th>
									<th>Price</th>
									<th>Status</th>
									
									
								</tr>
							</thead>
							<tbody>
								@if(!$prop->isEmpty())
								@foreach($prop as $val)
								<tr>
									<td>{{$val->prop_name}}</td>
									<td>{{$val->prop_addr.', '.$val->prop_pincode.', '.$val->prop_city.', '.$val->prop_state.', '.$val->prop_country}}</td>
									<td>{{$val->prop_price}}</td>
									<td>@if($val->status == 1)
										<span class="status-icon bg-success"></span> Active
										@else
										<span class="status-icon bg-danger"></span> Inactive
										@endif
									</td>
									

								</tr>
								@endforeach
								@endif
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