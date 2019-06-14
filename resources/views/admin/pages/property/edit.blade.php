@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title">Edit Motgage Property</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Motgage Property</a></li>
					<li class="breadcrumb-item active" aria-current="page">Edit Motgage Property</li>
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
					<form class="card" method="post" action="{{ route('admin.propupdate', base64_encode($prop->id))}}" enctype="multipart/form-data">
						@csrf
						<div class="card-header">
							<h3 class="card-title">Edit Motgage Property</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<input type="hidden" name="edit_id" value="{{ $prop->id }}" id="edit_id">
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Client Name*</label>
										<select class="form-control custom-select" name="user_id" id="user_id">
											<option value="0">--Select--</option>
											@foreach($user as $val)
											<option value="{{ $val->id }}" {{ $prop->user_id == $val->id ? 'selected' : '' }}>{{ $val->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
								

								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Property Name*</label>
										<input type="text" class="form-control" placeholder="Name" name="name" value="{{ $prop->prop_name }}">
									</div>
								</div>


								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">Category*</label>
										<select class="form-control custom-select" name="propcat" id="propcat1" onchange="getpropval(this)">
											<option value="">--Select--</option>
											@if($prop->category['parent_type'] == 2)
												@foreach($catg as $val)
													<option value="{{ $val->id }}" {{ $cat->id == $val->id ? 'selected' : '' }}>{{ $val->cat_name }}</option>
												@endforeach
											@else
												@foreach($cat as $val)
													<option value="{{ $val->id }}" {{ $subcat->id == $val->id ? 'selected' : '' }}>{{ $val->cat_name }}</option>
												@endforeach
											@endif
										</select>
									</div>
								</div>


								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">Sub Category*</label>
										<select class="form-control custom-select" name="subcat" id="propsubcat1" onchange="getpropsubval(this)">
											<option value="0">--Select--</option>
											@if($prop->category['parent_type'] == 2)
												@foreach($allsubcat1 as $val)
													<option value="{{ $val->id }}" {{ $subcat->id == $val->id ? 'selected' : '' }}>{{ $val->cat_name }}</option>
												@endforeach
											@else
												@foreach($catg1 as $val)
													<option value="{{ $val->id }}" {{ $prop->category['id'] == $val->id ? 'selected' : '' }}>{{ $val->cat_name }}</option>
												@endforeach
											@endif
											
										</select>
									</div>
								</div>


								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">Sub Sub Category</label>
										<select class="form-control custom-select" name="subsubcat" id="propsubsubcat1">
											<option value="0">--Select--</option>
											@if($prop->category['parent_type'] == 2)
												@foreach($catg1 as $val)
													<option value="{{ $val->id }}" {{ $prop->category['id'] == $val->id ? 'selected' : '' }}>{{ $val->cat_name }}</option>
												@endforeach
											@endif
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
										<input type="text" class="form-control" placeholder="State" name="state" value="{{ $prop->prop_state }}">
									</div>
								</div>


								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label class="form-label">City*</label>
										<input type="text" class="form-control" placeholder="City" name="city" value="{{ $prop->prop_city }}">
									</div>
								</div>


								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label class="form-label">Postal Code*</label>
										<input type="text" class="form-control" placeholder="e.g.700019" name="zipcode" value="{{ $prop->prop_pincode }}">
									</div>
								</div>


								<div class="col-sm-6 col-md-12">
									<div class="form-group">
										<label class="form-label">Address*</label>
										<input type="text" class="form-control" placeholder="Place Address" name="addr" value="{{ $prop->prop_addr }}">
									</div>
								</div>


								<div class="col-sm-6 col-md-12">
									<div class="form-group">
										<label class="form-label">Description*</label>
										<textarea class="form-control" name="desc">{{ $prop->prop_desc }}</textarea>
									</div>
								</div>

								
								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">End Date*</label>
										<input class="form-control" type="date" id="example-date-input" name="enddate" value="{{ $prop->endDate }}">
									</div>
								</div>


								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">End Time*</label>
										<input class="form-control" type="time" id="example-time-input" name="etime" value="{{ $prop->endTime }}">
									</div>
								</div>


								<div class="col-sm-6 col-md-4">
									<div class="form-group">
										<label class="form-label">Price*</label>
										<input type="text" class="form-control" placeholder="Price" name="price" value="{{ $prop->prop_price }}">
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
			var catId   = sel.value;
			var _token  = $('input[name="_token"]').val();
			
			if(catId != '')
			{

				$.ajax({
				    method: "POST", 
				    url	  : "{{ route('admin.catPropFetch') }}", 
				    data  : {'id' : catId, '_token':_token},
				    success: function(result)
				    { 
				       	$('#propsubcat1').html(result);
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
				       	$('#propsubsubcat1').html(result);
				       	// alert(result);
					}
				});
			}
		}

		
</script>