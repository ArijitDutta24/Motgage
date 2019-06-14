@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title">Edit CMS</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">CMS</a></li>
					<li class="breadcrumb-item active" aria-current="page">Edit CMS</li>
				</ol>

			</div>
			<div class="row ">
				
				<div class="col-lg-12">
					<form class="card" method="post" action="{{ route('admin.cmsUpdate', base64_encode($editCms->id)) }}">
						@csrf
						<div class="card-header">
							<h3 class="card-title">Edit CMS</h3>
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-sm-6 col-md-12">
									
									<div class="form-group">
										<label class="form-label">CMS Title</label>
										<input type="text" class="form-control"  placeholder="Company" value="{{ $editCms->cms_title }}" readonly name="title">
									</div>
								</div>
								
								<div class="col-sm-6 col-md-12">
									<div class="form-group mb-0">
										<label class="form-label">Description</label>
										<textarea rows="5" class="form-control" placeholder="Enter About your description" name="desc">{{ $editCms->cms_desc }}</textarea>
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