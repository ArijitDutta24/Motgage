@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title">Edit Client</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Client</a></li>
					<li class="breadcrumb-item active" aria-current="page">Edit Client</li>
				</ol>

			</div>
			<div class="row ">
				
				<div class="col-lg-12">
					<form class="card" method="post" action="{{ route('admin.cliUpdate', base64_encode($editUser->id))}}">
						@csrf
						<div class="card-header">
							<h3 class="card-title">Edit Client</h3>
						</div>
						<div class="card-body">
							<div class="row">
								
								<div class="col-sm-6 col-md-12">
									<div class="form-group">
										<label class="form-label">Email address</label>
										<input type="email" class="form-control" placeholder="Email" name="email" readonly="" value="{{ $editUser->email }}">
									</div>
								</div>
								<div class="col-sm-6 col-md-12">
									<div class="form-group">
										<label class="form-label">Full Name</label>
										<input type="text" class="form-control" placeholder="Company" name="fname" value="{{ $editUser->name }}" readonly="">
									</div>
								</div>
								
								@foreach($userInfo as $val)
								<div class="col-md-12">
									<div class="form-group">
										<label class="form-label">Address</label>
										<input type="text" class="form-control" placeholder="Home Address" name="addr" value="{{ $val->address }}">
									</div>
								</div>
								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">City</label>
										<input type="text" class="form-control" placeholder="City" name="city" value="{{ $val->city }}">
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label class="form-label">Postal Code</label>
										<input type="text" class="form-control" placeholder="ZIP Code" name="zipcode" value="{{ $val->postal_code }}">
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label class="form-label">Country</label>
										<select class="form-control custom-select" name="country">
											<option value="0">--Select--</option>
											<option value="1">Germany</option>
											<option value="2">Canada</option>
											<option value="3">Usa</option>
											<option value="4">Aus</option>
										</select>
									</div>
								</div>
								@endforeach
							</div>
						</div>
						<div class="card-footer text-center">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

