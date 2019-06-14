@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title">Add New Category</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Category</a></li>
					<li class="breadcrumb-item active" aria-current="page">Add New Category</li>
				</ol>

			</div>
			<div class="row ">
				
				<div class="col-lg-12">
					<form class="card" method="post" action="{{ route('admin.catStore')}}">
						@csrf
						<div class="card-header">
							<h3 class="card-title">Add New Category</h3>
						</div>
						<div class="card-body">
							<div class="row">
								
								<div class="col-sm-6 col-md-8">
									<div class="form-group">
										<label class="form-label">Parent Category</label>
										<select class="form-control custom-select" name="category"  id="category" data-dependent="subcat" onchange="getval(this)">
											<option value="0">--Select--</option>
											@foreach($cat as $val)
												<option value="{{ $val->id }}">{{$val->cat_name}}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-sm-6 col-md-8">
									<div class="form-group">
										<label class="form-label">Sub Category</label>
										<select class="form-control custom-select" name="subcat"  id="subcat">	
											<option value="0">--Select--</option>
										</select>
									</div>
								</div>
								

								<div class="col-sm-6 col-md-8">
									<div class="form-group">
										<label class="form-label"> Category</label>
										<input type="text" class="form-control" placeholder="Sub Category" name="subsubcat">
									</div>
								</div>								
							</div>
						</div>
						<div class="card-footer text-center">
							<button type="submit" class="btn btn-primary" >Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

<script type="text/javascript">
		function getval(sel)
		{
			var catId = sel.value;
			var _token    = $('input[name="_token"]').val();

			if(catId != '')
			{

				$.ajax({
				    method: "POST", 
				    url	  : "{{ route('admin.catFetch') }}", 
				    data  : {'id' : catId, '_token':_token},
				    success: function(result)
				    { 
				       	$('#subcat').html(result);
				       	
					}
				});
			}
		}

		
</script>
