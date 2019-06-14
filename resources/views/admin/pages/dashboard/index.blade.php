@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Dashboard</h4>
			<ol class="breadcrumb">
				
				<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
			</ol>
		</div>

		<div class="row ">
			<div class="col-xl-6 col-lg-6 col-md-12">
				<div class="card">
					<div class="card-body text-center">
						<h5>Live Bidding</h5>
						<h2 class="counter">{{count($liveBid)}}</h2>
						<a href="{{ route('admin.liveAuctionList') }}" class="btn btn-outline-success btn-sm">View More</a>
					</div>
				</div>
			</div>
			
			<!-- <div class="col-xl-4 col-lg-6 col-md-12 ">
				<div class="card">
					<div class="card-body text-center">
						<h5>Sold Bidding</h5>
						<h2 class="counter">562</h2>
						<a href="{{route('admin.soldAuctionList')}}" class="btn btn-outline-warning btn-sm">View More</a>
					</div>
				</div>
			</div> -->
			<div class="col-xl-6 col-lg-6 col-md-12">
				<div class="card">
					<div class="card-body text-center">
						<h5>Expired Bidding</h5>
						<h2 class="counter">198</h2>
						<a href="{{route('admin.expiredAuctionList')}}" class="btn btn-outline-danger btn-sm">View More</a>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-8 col-lg-6 col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Latest Bidding List</h3>
					</div>
					<div class="user-table">
						<div class="table-responsive ">
							<table class="table card-table  table-hover table-vcenter text-nowrap">
								<thead>
									<tr>
										<th>Property Name</th>
										<th>Owner Name</th>
										<th>Price</th>
										<th>Last Date</th>
	
									</tr>
								</thead>
								<tbody>
									@if(!$liveBid->isEmpty())
									@foreach($liveBid as $val)
									<tr>
										<td>
											<div class="d-flex align-items-center">
												
												<div class="">
													<h5 class="mb-0 mt-2 font-weight-semibold">{{$val->prop_name}}</h5>
													
												</div>
											</div>
										</td>

										<td>
											<div class="d-flex align-items-center">
												
												<div class="">
													<h5 class="mb-0 mt-2 font-weight-semibold">{{$val->user->name}}</h5>
													
												</div>
											</div>
										</td>

										<td>
											<a href="#" class="text-danger">TT$ {{$val->prop_price}}</a>
										</td>
										<td class="font-weight-semibold">{{date('d-M-y', strtotime($val->endDate))}}</td>
										
									</tr>
									@endforeach
									@endif
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Latest Bidder Bid</h3>
					</div>
					<div class="card-body">
						<div class="">
							<div class="media meida-md mt-0">
								<div class="media-left">
									<a href="#">
										<img class="media-object mr-2 br-2" src="{{ asset('images/products/products/b2.jpg') }}" alt="media1">
									</a>
								</div>
								<div class="media-body">
									<h6 class="media-heading text-uppercase">More Beauty Products </h6>
									<p class="text-muted mb-0">At vero eos et accusamus et iusto   blanditiis praesentium </p>
								</div>
							</div>
							<div class="media meida-md ">
								<div class="media-left">
									<a href="#">
										<img class="media-object mr-2 br-2" src="{{ asset('images/products/products/j2.jpg') }}" alt="media1">
									</a>
								</div>
								<div class="media-body">
									<h6 class="media-heading   text-uppercase">More Business Ads </h6>
									<p class="text-muted mb-0">Accusamus et iusto odio dignissimos  blanditiis praesentium </p>
								</div>
							</div>
							<div class="media meida-md ">
								<div class="media-left">
									<a href="#">
										<img class="media-object mr-2 br-2" src="{{ asset('images/products/products/v3.jpg') }}" alt="media1">
									</a>
								</div>
								<div class="media-body">
									<h6 class="media-heading text-uppercase">Very easy to Buy  a Car </h6>
									<p class="text-muted mb-0">At accusamus et iusto odio dignissimos ducimus </p>
								</div>
							</div>
							<div class="media meida-md ">
								<div class="media-left">
									<a href="#">
										<img class="media-object mr-2 br-2" src="{{ asset('images/products/products/f2.jpg') }}" alt="media1">
									</a>
								</div>
								<div class="media-body">
									<h6 class="media-heading   text-uppercase">More Ads for Classifieds </h6>
									<p class="text-muted mb-0">At vero eos et accusamus et iusto odio dignissimos ducimus </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-8 col-lg-7 col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">New Join Bidder List</h3>
					</div>
					<div class="user-table">
						<div class="table-responsive ">
							<table class="table card-table  table-hover table-vcenter text-nowrap">
								<thead>
									<tr>
										<th>User</th>
										<th>Email</th>
										<th>Register</th>
										
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="mr-3"><img class="avatar avatar-md brround " src="{{ asset('images/faces/female/6.jpg') }}" alt="avatar-img"></div>
												<div class="">
													<h5 class="mb-0 mt-2 font-weight-semibold">Hanna Gover</h5>
													<p class="text-muted mb-0">Gover@han</p>
												</div>
											</div>
										</td>
										<td>
											<a href="#" class="text-danger">hannagover@gmail.com</a>
										</td>
										<td class="font-weight-semibold">14-11-2019</td>
										
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="mr-3"><img class="avatar avatar-md brround " src="{{ asset('images/faces/male/6.jpg') }}" alt="avatar-img"></div>
												<div class="">
													<h5 class="mb-0 mt-2 font-weight-semibold">Daniel Kristeen</h5>
													<p class="text-muted mb-0">kristeengoo</p>
												</div>
											</div>
										</td>
										<td>
											<a href="#" class="text-danger">danielkristeen@gmail.com</a>
										</td>
										<td class="font-weight-semibold">21-10-2019</td>
										
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="mr-3"><img class="avatar avatar-md brround " src="{{ asset('images/faces/female/4.jpg') }}" alt="avatar-img"></div>
												<div class="">
													<h5 class="mb-0 mt-2 font-weight-semibold">Jan Petrovic</h5>
													<p class="text-muted mb-0">petrovicqw</p>
												</div>
											</div>
										</td>
										<td>
											<a href="#" class="text-danger">janpetrovic@gmail.com</a>
										</td>
										<td class="font-weight-semibold">02-10-2019</td>
										
									</tr>
									<tr>
										<td>
											<div class="d-flex align-items-center">
												<div class="mr-3"><img class="avatar avatar-md brround " src="{{ asset('images/faces/male/4.jpg') }}" alt="avatar-img"></div>
												<div class="">
													<h5 class="mb-0 mt-2 font-weight-semibold">Leo Amy</h5>
													<p class="text-muted mb-0">leo345</p>
												</div>
											</div>
										</td>
										<td>
											<a href="#" class="text-danger">leoamy@gmail.com</a>
										</td>
										<td class="font-weight-semibold">28-09-2019</td>
										
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-md-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Today's Expire Bidding List</h3>
					</div>
					<div class="card-body">
						<div class="">
							<div class="media meida-md mt-0">
								<div class="media-left">
									<a href="#">
										<img class="media-object mr-2 br-2" src="{{ asset('images/products/products/b2.jpg') }}" alt="media1">
									</a>
								</div>
								<div class="media-body">
									<h6 class="media-heading text-uppercase">More Beauty Products </h6>
									<p class="text-muted mb-0">At vero eos et accusamus et iusto   blanditiis praesentium </p>
								</div>
							</div>
							<div class="media meida-md ">
								<div class="media-left">
									<a href="#">
										<img class="media-object mr-2 br-2" src="{{ asset('images/products/products/j2.jpg') }}" alt="media1">
									</a>
								</div>
								<div class="media-body">
									<h6 class="media-heading   text-uppercase">More Business Ads </h6>
									<p class="text-muted mb-0">Accusamus et iusto odio dignissimos  blanditiis praesentium </p>
								</div>
							</div>
							<div class="media meida-md ">
								<div class="media-left">
									<a href="#">
										<img class="media-object mr-2 br-2" src="{{ asset('images/products/products/v3.jpg') }}" alt="media1">
									</a>
								</div>
								<div class="media-body">
									<h6 class="media-heading text-uppercase">Very easy to Buy  a Car </h6>
									<p class="text-muted mb-0">At accusamus et iusto odio dignissimos ducimus </p>
								</div>
							</div>
							<div class="media meida-md ">
								<div class="media-left">
									<a href="#">
										<img class="media-object mr-2 br-2" src="{{ asset('images/products/products/f2.jpg') }}" alt="media1">
									</a>
								</div>
								<div class="media-body">
									<h6 class="media-heading   text-uppercase">More Ads for Classifieds </h6>
									<p class="text-muted mb-0">At vero eos et accusamus et iusto odio dignissimos ducimus </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			
			<div class="card-header col-xl-12 col-lg-12 col-md-12">
				<h3 class="card-title">Latest Bidding Property List</h3>
			</div>
			@if(!$latestProperty->isEmpty())
			@foreach($latestProperty as $val)
				<div class="col-xl-4 col-lg-12 col-md-12">
					<div class="card">
						
						<div class="item-card7-img">
							<div class="item-card7-imgs">
								<a href="realestate.html"></a>
								<img src="{{ asset('upload/property/'.$val->picture) }}" alt="img" class="cover-image">
							</div>
							<div class="item-card7-overlaytext">
								<a href="realestate.html" class="text-white"> {{$val->category->cat_name}}</a>
								<h4  class="font-weight-semibold mb-0">TT$ {{$val->prop_price}}</h4>
							</div>
						</div>
						<div class="card-body">
							<div class="item-card7-desc">
								<a href="realestate.html" class="text-dark"><h4 class="font-weight-semibold">{{$val->prop_name}}</h4></a>
							</div>
							<div class="item-card7-text">
								<ul class="icon-card mb-0">
									<li class=""><a href="#" class="icons"><i class="si si-location-pin text-muted mr-1"></i>{{$val->prop_city}}</a></li>

									<li><a href="#" class="icons"><i class="si si-user text-muted mr-1"></i> {{$val->user->name}}</a></li>

									<li class="mb-0"><a href="#" class="icons"><i class="si si-event text-muted mr-1"></i> {{$val->user->name}}</a></li>

									<li class="mb-0"><a href="#" class="icons"><i class="si si-phone text-muted mr-1"></i> 567 9876 087</a></li>

									
								</ul>
							</div>
						</div>
					</div>
				</div>
			@endforeach
			@endif
			<!-- <div class="col-xl-4 col-lg-12 col-md-12">
				<div class="card">
					
					<div class="item-card7-img">
						<div class="item-card7-imgs">
							<a href="realestate.html"></a>
							<img src="{{ asset('images/products/products/h1.jpg') }}" alt="img" class="cover-image">
						</div>
						<div class="item-card7-overlaytext">
							<a href="realestate.html" class="text-white"> Real Estate</a>
							<h4  class="font-weight-semibold mb-0">TT$ 889</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="item-card7-desc">
							<a href="realestate.html" class="text-dark"><h4 class="font-weight-semibold">Land</h4></a>
						</div>
						<div class="item-card7-text">
							<ul class="icon-card mb-0">
								<li class=""><a href="#" class="icons"><i class="si si-location-pin text-muted mr-1"></i>  Los Angles</a></li>
								<li><a href="#" class="icons"><i class="si si-event text-muted mr-1"></i> 5 hours ago</a></li>
								<li class="mb-0"><a href="#" class="icons"><i class="si si-user text-muted mr-1"></i> Sally Peake</a></li>
								<li class="mb-0"><a href="#" class="icons"><i class="si si-phone text-muted mr-1"></i> 567 9876 087</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-12 col-md-12">
				<div class="card">
					
					<div class="item-card7-img">
						<div class="item-card7-imgs">
							<a href="jobs.html"></a>
							<img src="{{ asset('images/products/products/j2.jpg') }}" alt="img" class="cover-image">
						</div>
						<div class="item-card7-overlaytext">
							<a href="jobs.html" class="text-white"> Jobs</a>
							<h4  class="font-weight-semibold mb-0">TT$ 854</h4>
						</div>
					</div>
					<div class="card-body">
						<div class="item-card7-desc">
							<a href="jobs.html" class="text-dark"><h4 class="font-weight-semibold">Hair dresser-Beauticia</h4></a>
						</div>
						<div class="item-card7-text">
							<ul class="icon-card mb-0">
								<li class=""><a href="#" class="icons"><i class="si si-location-pin text-muted mr-1"></i>  Los Angles</a></li>
								<li><a href="#" class="icons"><i class="si si-event text-muted mr-1"></i> 5 hours ago</a></li>
								<li class="mb-0"><a href="#" class="icons"><i class="si si-user text-muted mr-1"></i> Sally Peake</a></li>
								<li class="mb-0"><a href="#" class="icons"><i class="si si-briefcase text-muted mr-1"></i>Beauty Span</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div> -->
			
		</div>
	</div>
</div>
@endsection