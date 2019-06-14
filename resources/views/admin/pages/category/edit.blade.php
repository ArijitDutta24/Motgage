@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title">Edit Category</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Category</a></li>
					<li class="breadcrumb-item active" aria-current="page">Edit Category</li>
				</ol>

			</div>
			<div class="row ">
				
				<div class="col-lg-12">
					<form class="card" method="post" action="{{route('admin.catUpdate', base64_encode($editData->id))}}">
						@csrf
						<div class="card-header">
							<h3 class="card-title">Edit Category</h3>
						</div>
						<div class="card-body">
							<div class="row">
								
								<div class="col-sm-6 col-md-12">
									<div class="form-group">
										<label class="form-label">Parent Category</label>
										<select class="form-control custom-select" name="parent">
											<option value="0">--Select--</option>
											@if(!$selectData->isEmpty())
											@foreach($selectData as $val)
											<option value="{{$val->id}}" {{ $editData->parent_id == $val->id ? 'selected' : '' }} >{{$val->cat_name}}</option>
											@endforeach
											@endif
										</select>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Sub Category</label>
										<input type="text" class="form-control" placeholder="Sub Category" name="subcat" value="{{ $editData->cat_name }}">
									</div>
								</div>								
							</div>
						</div>
						<div class="card-footer text-center">
							<button type="submit" class="btn btn-primary" >Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection

