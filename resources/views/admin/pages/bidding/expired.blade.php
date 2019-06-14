@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Expired Bidding List</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Bidding</a></li>
				<li class="breadcrumb-item active" aria-current="page">Expired Bidding List</li>
			</ol>

		</div>
		<div class="row ">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Expired Bidding List</h3>

					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th>Property Name</th>
									<th>Owner Name</th>
									<th>Location</th>
									<td>Bidding Price</td>
									<td>Expired Date/Time</td>			
								</tr>
							</thead>
							<tbody>

								<tr>
									<td><a href="store.html" class="text-inherit">Banglow </a></td>
									<td>Arijit Dutta</td>
									<td>Kolkata</td>
									<td>TT$ 999.00</td>
									<td>30 May 2019/13:00 PM</td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection