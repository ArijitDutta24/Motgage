@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Live Bidding List</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Bidding</a></li>
				<li class="breadcrumb-item active" aria-current="page">Live Bidding List</li>
			</ol>

		</div>
		<div class="row ">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Live Bidding List</h3>

					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th>Property Name</th>
									<th>Owner Name</th>
									<th>Location</th>
									<th>Price</th>
									<th>End Date/Time</th>			
								</tr>
							</thead>
							<tbody>
								@if(!$liveBid->isEmpty())
								@foreach($liveBid as $val)
								<tr>
									<td><a href="store.html" class="text-inherit">{{$val->prop_name}} </a></td>
									<td>{{$val->user->name}}</td>
									<td>{{$val->prop_city}}</td>
									<td>TT$ {{$val->prop_price}}</td>
									<td>{{date('d-M-y', strtotime($val->endDate)).'/'.$val->endTime}}</td>
								</tr>
								@endforeach
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection