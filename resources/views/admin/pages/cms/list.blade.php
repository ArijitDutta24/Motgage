@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">All CMS List</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">CMS</a></li>
				<li class="breadcrumb-item active" aria-current="page">All CMS List</li>
			</ol>

		</div>
		<div class="row ">
			<div class="col-sm-6 col-md-10">
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
						<h3 class="card-title">CMS List</h3>

					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th>CMS Name</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($cmsData as $value)
								<tr>
									<td><a href="store.html" class="text-inherit">{{ $value->cms_title }}</a></td>
									
									<td class="text-right">
										<a class="icon" href="javascript:void(0)"></a>
										<a href="{{ route('admin.cmsEdit', base64_encode($value->id)) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>
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