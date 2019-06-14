@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title">Add New Client</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Client</a></li>
					<li class="breadcrumb-item active" aria-current="page">Add New Client</li>
				</ol>

			</div>
			<div class="row ">
				
				<div class="col-lg-12">
					<form class="card" method="post" action="{{ route('admin.addClient')}}">
						@csrf
						<div class="card-header">
							<h3 class="card-title">Add New Client</h3>
						</div>
						<div class="card-body">
							<div class="row">
								
								<div class="col-sm-6 col-md-12">
									<div class="form-group">
										<label class="form-label">Email address</label>
										<input type="email" class="form-control" placeholder="Email" name="email">
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">First Name</label>
										<input type="text" class="form-control" placeholder="First Name" name="fname">
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Last Name</label>
										<input type="text" class="form-control" placeholder="Last Name" name="lname">
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Password</label>
										<input type="password" class="form-control" placeholder="Password" name="pword" id="pass">
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Confirm Password</label>
										<input type="password" class="form-control" placeholder="Confirm Password" name="cpword" id="cpass">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="form-label">Address</label>
										<input type="text" class="form-control" placeholder="Home Address" name="addr">
									</div>
								</div>
								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">City</label>
										<input type="text" class="form-control" placeholder="City" name="city">
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label class="form-label">Postal Code</label>
										<input type="text" class="form-control" placeholder="ZIP Code" name="zipcode">
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
								
							</div>
						</div>
						<div class="card-footer text-center">
							<button type="submit" class="btn btn-primary" onclick="validate()" >Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

<script type="text/javascript">
	
	function validate() 
	{
		
		var pword = $('#pass').val();
		var cpword = $('#cpass').val();

		if(pword === cpword)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
</script>