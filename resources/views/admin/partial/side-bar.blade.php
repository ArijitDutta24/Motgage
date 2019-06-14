<aside class="app-sidebar doc-sidebar">
			<div class="app-sidebar__user clearfix">
				<div class="dropdown user-pro-body">
					<div>
						@if(Auth::guard('admin')->user()->image != 'NULL')
						<img src="{{ asset('upload/profile/'.Auth::guard('admin')->user()->image) }}" alt="user-img" class="avatar avatar-lg brround">
						<a href="{{route('admin.profile')}}" class="profile-img">
							<span class="fa fa-pencil" aria-hidden="true"></span>
						</a>
						@else
							<img src="{{ asset('upload/profile/index.png') }}" alt="user-img" class="avatar avatar-lg brround">
						<a href="{{route('admin.profile')}}" class="profile-img">
							<span class="fa fa-pencil" aria-hidden="true"></span>
						</a>
						@endif
					</div>
					<div class="user-info">
						<h2>{{ Auth::guard('admin')->user()->name }}</h2>
						@if(Auth::guard('admin')->user()->role_id == 1)
						<span>Admin</span>
						@elseif(Auth::guard('admin')->user()->role_id == 2)
						<span>Client</span>
						@endif
					</div>
				</div>
			</div>
			<ul class="side-menu">
				
				<li class="slide">
					<a class="side-menu__item" href="{{ route('admin.dashboard') }}"><i class="side-menu__icon fa fa-tachometer"></i><span class="side-menu__label">Dashboard</span></a>
				</li>
				

				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Client</span><i class="angle fa fa-angle-right"></i></a>
					<ul class="slide-menu">
						<li><a class="slide-item" href="{{ route('admin.clientList') }}">List</a></li>
						<li><a class="slide-item" href="{{ route('admin.client') }}">Add</a></li>
					</ul>
				</li>


				<li class="slide">
					<a class="side-menu__item" href="{{ route('admin.bidder') }}"><i class="side-menu__icon fa fa-gavel"></i><span class="side-menu__label">Bidder</span></a>
					
				</li>

				<li class="slide">
					<a class="side-menu__item" href="{{ route('admin.cms') }}"><i class="side-menu__icon fa fa-file"></i><span class="side-menu__label">CMS Pages</span></a>
					
				</li>


				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-list-alt"></i><span class="side-menu__label">Category</span><i class="angle fa fa-angle-right"></i></a>
					<ul class="slide-menu">
						<li><a class="slide-item" href="{{ route('admin.catList') }}">List</a></li>
						<li><a class="slide-item" href="{{ route('admin.catAdd') }}">Add</a></li>
					</ul>
				</li>


				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-building"></i><span class="side-menu__label">Property</span><i class="angle fa fa-angle-right"></i></a>
					<ul class="slide-menu">
						<li><a class="slide-item" href="{{ route('admin.propList') }}">List</a></li>
						<li><a class="slide-item" href="{{ route('admin.propAdd') }}">Add</a></li>
					</ul>
				</li>


				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-coin"></i><span class="side-menu__label">Currency</span><i class="angle fa fa-angle-right"></i></a>
					<ul class="slide-menu">
						<li><a class="slide-item" href="{{ route('admin.currList') }}">List</a></li>
						<li><a class="slide-item" href="{{ route('admin.currAdd') }}">Add</a></li>
					</ul>
				</li>


				<li class="slide">
					<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon fa fa-"></i><span class="side-menu__label">Bidding</span><i class="angle fa fa-angle-right"></i></a>
					<ul class="slide-menu">
						<li><a class="slide-item" href="{{route('admin.liveAuctionList')}}">Live List</a></li>
						<!-- <li><a class="slide-item" href="{{route('admin.soldAuctionList')}}">Sold List</a></li> -->
						<li><a class="slide-item" href="{{route('admin.expiredAuctionList')}}">Expired List</a></li>
					</ul>
				</li>

				

				
			</ul>
			<div class="app-sidebar-footer">
				<a href="emailservices.html">
					<span class="fa fa-envelope" aria-hidden="true"></span>
				</a>
				<a href="profile.html">
					<span class="fa fa-user" aria-hidden="true"></span>
				</a>
				<a href="editprofile.html">
					<span class="fa fa-cog" aria-hidden="true"></span>
				</a>
				<a href="login.html">
					<span class="fa fa-sign-in" aria-hidden="true"></span>
					</a>
				<a href="chat.html">
					<span class="fa fa-comment" aria-hidden="true"></span>
				</a>
			</div>
		</aside>