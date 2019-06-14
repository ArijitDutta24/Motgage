@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title">Add New Motgage Property</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Motgage Property</a></li>
					<li class="breadcrumb-item active" aria-current="page">Add New Motgage Property</li>
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
					<form class="card" method="post" action="{{ route('admin.propStore')}}" enctype="multipart/form-data">
						@csrf
						<div class="card-header">
							<h3 class="card-title">Add New Motgage Property</h3>
						</div>
						<div class="card-body">
							<div class="row">

								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Client Name*</label>
										<select class="form-control custom-select" name="user_id" id="user_id">
											<option value="0">--Select--</option>
											@foreach($user as $val)
											<option value="{{ $val->id }}">{{ $val->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
								

								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Property Name*</label>
										<input type="text" class="form-control" placeholder="Name" name="name">
									</div>
								</div>


								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">Category*</label>
										<select class="form-control custom-select" name="propcat" id="propcat" onchange="getpropval(this)">
											<option value="">--Select--</option>
											@foreach($cat as $val)
											<option value="{{ $val->id }}">{{ $val->cat_name }}</option>
											@endforeach
										</select>
									</div>
								</div>


								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">Sub Category*</label>
										<select class="form-control custom-select" name="subcat" id="propsubcat" onchange="getpropsubval(this)">
											<option value="0">--Select--</option>
											
										</select>
									</div>
								</div>


								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">Sub Sub Category</label>
										<select class="form-control custom-select" name="subsubcat" id="propsubsubcat">
											<option value="0">--Select--</option>
											
										</select>
									</div>
								</div>
								

								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label class="form-label">Country*</label>
										<select class="form-control custom-select" name="country">
											<option value="0">--Select--</option>
											<option value="1">Germany</option>
											<option value="2">Canada</option>
											<option value="3">Usa</option>
											<option value="4">Aus</option>
										</select>
									</div>
								</div>


								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label class="form-label">State*</label>
										<input type="text" class="form-control" placeholder="State" name="state">
									</div>
								</div>


								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label class="form-label">City*</label>
										<input type="text" class="form-control" placeholder="City" name="city">
									</div>
								</div>


								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label class="form-label">Postal Code*</label>
										<input type="text" class="form-control" placeholder="e.g.700019" name="zipcode">
									</div>
								</div>


								<div class="col-sm-6 col-md-12">
									<div class="form-group">
										<label class="form-label">Address*</label>
										<input type="text" class="form-control" placeholder="Place Address" name="addr">
									</div>
								</div>


								<div class="col-sm-6 col-md-12">
									<div class="form-group">
										<label class="form-label">Description*</label>
										<textarea class="form-control" name="desc"></textarea>
									</div>
								</div>

								
								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">End Date*</label>
										<input class="form-control" type="date" id="example-date-input" name="enddate">
									</div>
								</div>


								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">End Time*</label>
										<input class="form-control" type="time" id="example-time-input" name="etime">
									</div>
								</div>


								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">Price*</label>
										<input type="text" class="form-control" placeholder="Price" name="price">
									</div>
								</div>


								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Main Picture*</label>
										<input type="file" class="form-control" name="main_pic">
									</div>
								</div>


								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Gallery Picture*</label>
										<input type="file" class="form-control"name="gallery_pic[]" multiple>
									</div>
								</div>

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

<script type="text/javascript">
		function getpropval(sel)
		{
			var catId = sel.value;
			var _token    = $('input[name="_token"]').val();

			if(catId != '')
			{

				$.ajax({
				    method: "POST", 
				    url	  : "{{ route('admin.catPropFetch') }}", 
				    data  : {'id' : catId, '_token':_token},
				    success: function(result)
				    { 
				       	$('#propsubcat').html(result);
				       	// alert(result);
					}
				});
			}
		}



		function getpropsubval(id)
		{
			var catId = id.value;
			var _token    = $('input[name="_token"]').val();

			if(catId != '')
			{

				$.ajax({
				    method: "POST", 
				    url	  : "{{ route('admin.catPropSubFetch') }}", 
				    data  : {'id' : catId, '_token':_token},
				    success: function(result)
				    { 
				       	$('#propsubsubcat').html(result);
				       	// alert(result);
					}
				});
			}
		}

		
</script>