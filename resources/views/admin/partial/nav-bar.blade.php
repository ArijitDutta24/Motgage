<div class="app-header1 header py-1 d-flex">
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="index.html">
								<img src="{{ asset('images/brand/logo1.png') }}" class="header-brand-img" alt="Pinlist logo">
							</a>
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div class="header-navicon">
								<a href="#" data-toggle="search" class="nav-link d-lg-none navsearch-icon">
									<i class="fa fa-search"></i>
								</a>
							</div>
							
							<div class="d-flex order-lg-2 ml-auto">
								
								<div class="dropdown ">
									<a href="#" class="nav-link pr-0 leading-none user-img" data-toggle="dropdown">
										@if(Auth::guard('admin')->user()->image != 'NULL')
											<img src="{{ asset('upload/profile/'.Auth::guard('admin')->user()->image) }}" alt="profile-img" class="avatar avatar-md brround">
										@else
											<img src="{{ asset('upload/profile/index.png') }}" alt="profile-img" class="avatar avatar-md brround">
										@endif
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
										<a class="dropdown-item" href="{{route('admin.profile')}}">
											<i class="dropdown-icon si si-user"></i> My Profile
										</a>
										
										

										<a class="dropdown-item" href="{{ route('admin.logout') }}"
				               				onclick="event.preventDefault();
				                             document.getElementById('logout-form').submit();">
				                             <i class="dropdown-icon si si-power"></i>
				                		{{ __('Logout') }}
						            </a>
						            <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
						                @csrf
						            </form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>