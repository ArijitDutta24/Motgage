@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title">Add New Currency</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Currency</a></li>
					<li class="breadcrumb-item active" aria-current="page">Add New Currency</li>
				</ol>

			</div>
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
			<div class="row ">
				
				<div class="col-lg-12">
					<form class="card" method="post" action="{{ route('admin.currupdate', base64_encode($data->id))}}">
						@csrf
						<div class="card-header">
							<h3 class="card-title">Add New Currency</h3>
						</div>
						<div class="card-body">
							<div class="row">

								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Currency Name*</label>
										<input type="text" class="form-control" placeholder="Currency Name" name="cname" readonly="" value="{{ $data->curr_name }}">
									</div>
								</div>
								

								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Currency Code*</label>
										<input type="text" class="form-control" placeholder="Currency Code" name="ccode" readonly="" value="{{ $data->curr_code }}">
									</div>
								</div>



								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Exchange Price*</label>
										<input type="text" class="form-control" placeholder="Exchange Price" name="cprice" value="{{ $data->curr_rate }}">
									</div>
								</div>


								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Status*</label>
										<select class="form-control custom-select" name="status">
											@if($data->status == 1)
												<option value="1" selected>Active</option>
												<option value="2">Inactive</option>
											@else
												<option value="1">Active</option>
												<option value="2" selected>Inactive</option>
											@endif
										</select>
									</div>
								</div>

							</div>
						</div>
						<div class="card-footer text-center">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

