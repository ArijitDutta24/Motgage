@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Motgage Property List</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Motgage Property</a></li>
				<li class="breadcrumb-item active" aria-current="page">Motgage Property List</li>
			</ol>

		</div>
		<div class="row ">
			<div class="col-md-12">
				<div class="card">
					@if(Session::has('success'))

						<div class="alert alert-primary">
							<p>{{ Session::get('success') }}</p>
						</div>

					@endif

					@if(Session::has('errors'))

						<div class="alert alert-danger">
							<p>{{ Session::get('errors') }}</p>
						</div>

					@endif
					<div class="card-header">
						<h3 class="card-title">Motgage Property List</h3>

					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th>Property Name</th>
									<th>Category</th>
									<th>Price</th>
									<th>Client Name</th>
									<th>End Date/Time</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							@if(!$user->isEmpty())
							<tbody>
								
								@foreach($user as $val)
								<tr>
									<td>{{ $val->prop_name }}</td>

									<td>{{ $val->category['cat_name'] }}</td>

									
									<td>{{ $val->prop_price }}</td>

									<td>{{ $val->user['name'] }}</td>

									<td>{{ $val->endDate.'/'.$val->endTime }}</td>

									<td>
										@if($val->status == 1)
										<span class="status-icon bg-success"></span> Active
										@else
										<span class="status-icon bg-danger"></span> Inactive
										@endif
									</td>

									
									<td class="text-right">
										
										<a class="icon" href="javascript:void(0)"></a>
										<a href="{{ route('admin.propGalleryList', base64_encode($val->id))}}" ><i class="fa fa-camera" title="Gallery"></i></a>

										<a class="icon" href="javascript:void(0)"></a>
										<a href="{{ route('admin.propdetails', base64_encode($val->id))}}" ><i class="fa fa-eye" title="View"></i></a>


										<a class="icon" href="javascript:void(0)"></a>
										<a href="{{ route('admin.propedit', base64_encode($val->id))}}" title="Edit"><i class="fa fa-pencil"></i></a>

										<a class="icon" href="javascript:void(0)"></a>
										<a href="{{ route('admin.propstatus', base64_encode($val->id))}}" title="Active/Inactive"><i class="fa fa-link"></i></a>
										

										<a class="icon" href="javascript:void(0)"></a>
										<a href="#deleteModal{{$val->id}}" title="Delete" data-toggle="modal"><i class="fa fa-trash"></i></a>

									@include('admin.partial.prod_del_modal')
									</td>
								</tr>
								@endforeach
								
							</tbody>
							@endif
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

