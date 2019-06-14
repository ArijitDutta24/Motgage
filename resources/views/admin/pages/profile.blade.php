@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Profile Update</h4>
							<ol class="breadcrumb">
								
								<li class="breadcrumb-item active" >Profile</li>
							</ol>

						</div>

						<div class="col-md-12">
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

						<div class="row">
							<div class="col-md-12">

							</div>
							<div class="col-lg-12 col-xl-12">
								<div class="card card-profile cover-image "  data-image-src="../assets/images/photos/8.jpg">
									<div class="card-body text-center">
										<form action="{{ route('admin.profilePicUpdate', base64_encode($data->id)) }}" method="post" enctype="multipart/form-data">
											{{csrf_field()}}
											@if($data->image !='NULL')
											<img class="card-profile-img" src="
											{{ asset('upload/profile/'.$data->image) }}" alt="img" style="width: 96px; height: 94px;">
											@else
											<img class="card-profile-img" src="
											{{ asset('upload/profile/index.png') }}" alt="img">
											@endif
											<label for="profilepic">
												<i class="fa fa-camera"></i>
												<input type="file" name="profilepic" id="profilepic" style="display:none">

											</label>
											<h3 class="mb-1 ">{{$data->name}}</h3>
											<p class="mb-2 ">Admin</p>
											<input type="submit" name="submit" value="Update Picture" class="btn btn-success btn-sm mt-2">
										</form>
										<!-- <img class="card-profile-img" src="{{ asset('images/faces/male/25.jpg') }}" alt="img">
										<h3 class="mb-1 ">{{$data->name}}</h3>
										<p class="mb-2 ">Admin</p>
										
										<a href="editprofile.html" class="btn btn-success btn-sm mt-2">Update Picture</a> -->
									</div>
								</div>
								
							</div>
							<div class="col-lg-12 col-xl-12">
								<form class="card" method="post" action="{{ route('admin.updateProfile', base64_encode($data->id)) }}">
									@csrf
									
									<div class="card-body">
										<div class="row">
											
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Email address</label>
													<input type="email" class="form-control" placeholder="Email" name="email" value="{{ $data->email }}" readonly="">
												</div>
											</div>
											
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Name</label>
													<input type="text" class="form-control" placeholder="Name" name="name" value="{{ $data->name }}">
												</div>
											</div>


											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Password</label>
													<input type="password" class="form-control" placeholder="Password" name="pword">
												</div>
											</div>
											<div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Confirm Password</label>
													<input type="password" class="form-control" placeholder="Confirm Password" name="cpword">
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