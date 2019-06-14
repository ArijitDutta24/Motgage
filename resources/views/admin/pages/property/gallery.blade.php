@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h1 class="page-title">Main Picture</h1>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Motgage Property</a></li>
								<li class="breadcrumb-item active" aria-current="page">Motgage Property Gallery</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-8 col-sm-6 col-xs-12">
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
							</div>
						</div>
						<div class="row">

							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="card">
									
									<div class="card-body">
										<div class="image gallery gallery-first">
											<img  src="{{ asset('upload/property/'.$data->picture) }}" alt="image">
											<div class="mask"></div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6 col-sm-6 col-xs-12">
								<form action="{{ route('admin.mainPicUpdate', base64_encode($data->id)) }}" method="post" enctype="multipart/form-data">
									{{csrf_field()}}
									<label for="mainpic">
										<i class="fa fa-camera"></i>
										<input type="file" name="mainpic" id="mainpic" style="display:none">

									</label>
									<input type="submit" name="submit" value="Update" class="btn btn-success">
								</form>
							</div>
							
						</div>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title">Multiple Image Gallery</h3>
								<div class="card-options">
									<a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
									<a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
								</div>
							</div>
							<div class="card-body">
								<div class="demo-gallery">
									<ul id="lightgallery" class="list-unstyled row">
										@if(!$allPic->isEmpty())
										@foreach($allPic as $val)
										<li class="col-xs-6 col-sm-4 col-md-4" data-responsive="{{ asset('upload/property/'.$val->prop_pic) }}" data-src="{{ asset('upload/property/'.$val->prop_pic) }}" >
											
												<img class="img-responsive" src="{{ asset('upload/property/'.$val->prop_pic) }}" alt="Thumb">
											
										</li>

										<li class="col-xs-6 col-sm-4 col-md-6">
											
											<form action="{{ route('admin.mulPicUpdate', base64_encode($val->id)) }}" method="post" enctype="multipart/form-data">
											{{csrf_field()}}
												<label for="multiplePic">
													<i class="fa fa-camera"></i>
													<input type="file" name="multiplePic" id="multiplePic">

												</label>
												<input type="submit" name="submit" value="Update" class="btn btn-primary btn-sm">
											</form>

											<a class="icon" href="#"></a>
											<a href="#deleteModal{{$val->id}}" title="Delete" data-toggle="modal"class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
											@include('admin.partial.gallery_del_modal')
										</li>
										@endforeach
										@endif
									</ul>
								</div>
							</div>
						</div>
					</div>
			</div>

@endsection

