@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Motgage Property Details </h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('admin.propList')}}">Motgage Propety</a></li>
								<li class="breadcrumb-item"><a href="{{route('admin.propList')}}">Motgage Property List</a></li>
								<li class="breadcrumb-item active" aria-current="page">Motgage Property Details</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Property Details</div>
									</div>
									<div class="card-body">
										
										<form class="form-horizontal">
											<div class="form-group ">
												<div class="row">

													<div class="col-md-6">
														<label class="form-label" id="examplenameInputname2"><h5><b>Property Onwer Name</b></h5></label>
													</div>
													<div class="col-md-6">
														<div class="text-muted"><b>{{$propDetail->user['name']}}</b></div>
													</div>

													<div class="col-md-6">
														<label class="form-label" id="examplenameInputname2"><h5><b>Property Name</b></h5></label>
													</div>
													<div class="col-md-6">
														<div class="text-muted"><b>{{$propDetail->prop_name}}</b></div>
													</div>


													<div class="col-md-6">
														<label class="form-label" id="examplenameInputname2"><h5><b>Category</b></h5></label>
													</div>
													<div class="col-md-6">
														<div class="text-muted"><b>{{$propDetail->category['cat_name']}}</b></div>
													</div>


													<div class="col-md-6">
														<label class="form-label" id="examplenameInputname2"><h5><b>Property Address</b></h5></label>
													</div>
													<div class="col-md-6">
														<div class="text-muted"><b>{{$propDetail->prop_addr.', '.$propDetail->prop_pincode.', '.$propDetail->prop_city.', '.$propDetail->prop_state.', '.$propDetail->prop_country}}</b></div>
													</div>


													<div class="col-md-6">
														<label class="form-label" id="examplenameInputname2"><h5><b>Property Price</b></h5></label>
													</div>
													<div class="col-md-6">
														<div class="text-muted"><b>{{$propDetail->prop_price}}</b></div>
													</div>


													<div class="col-md-6">
														<label class="form-label" id="examplenameInputname2"><h5><b>Property Status</b></h5></label>
													</div>
													<div class="col-md-6">
														<div class="text-muted"><b>@if($propDetail->status == 1)
														<span class="status-icon bg-success"></span> Active
														@else
														<span class="status-icon bg-danger"></span> Inactive
														@endif</b></div>
													</div>


													<div class="col-md-6">
														<label class="form-label" id="examplenameInputname2"><h5><b>Property Bidding End Date And Time</b></h5></label>
													</div>
													<div class="col-md-6">
														<div class="text-muted"><b>{{$propDetail->endDate.' '.$propDetail->endTime}}</b></div>
													</div>


													<div class="col-md-6">
														<label class="form-label" id="examplenameInputname2"><h5><b>Property Position</b></h5></label>
													</div>
													<div class="col-md-6">
														<div class="text-muted"><b><span class="status-icon bg-danger"></span> Sold</b></div>
													</div>

												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<a href="{{ route('admin.propList') }}" class="btn btn-primary btn-sm" style="text-align: right;">Back</a>
						</div>
					</div>
				</div>

@endsection

