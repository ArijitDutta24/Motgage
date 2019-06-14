@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">All Category List</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Category</a></li>
				<li class="breadcrumb-item active" aria-current="page">All Category List</li>
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
						<h3 class="card-title">Category List</h3>

					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th>Category</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($category as $val)
								<tr>
									<td><a href="{{ route('admin.catDet', base64_encode($val->id)) }}">{{ $val->cat_name }}</a></td>
									
									<td class="text-right">

										<a class="icon" href="javascript:void(0)"></a>
										<a href="{{ route('admin.catDet', base64_encode($val->id))}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> Details</a>

										<a class="icon" href="javascript:void(0)"></a>
										<a href="{{ route('admin.catEdit', base64_encode($val->id))}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


