@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">All Currency List</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Currency</a></li>
				<li class="breadcrumb-item active" aria-current="page">All Currency List</li>
			</ol>

		</div>
		<div class="row ">
			<div class="col-md-12">
				<div class="card">
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
					<div class="card-header">
						<h3 class="card-title">Currency List</h3>

					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th>Currency Name</th>
									<th>Currency Code</th>
									<th>Exchange Price</th>
									<th>Status</th>
									<th>Update Date</th>
									<th></th>
								</tr>
							</thead>
							@if(!$curr->isEmpty())
							<tbody>
								
								@foreach($curr as $val)
								<tr>
									<td>{{ $val->curr_name }}</td>

									<td>{{ $val->curr_code }}</td>

									<td>{{ $val->curr_rate }}</td>

									<td>
										@if($val->status == 1)
										<span class="status-icon bg-success"></span> Active
										@else
										<span class="status-icon bg-danger"></span> Inactive
										@endif
									</td>

									<td>{{ $val->updated_at }}</td>
									
									<td class="text-right">
										
										<a class="icon" href="#"></a>
										<a href="{{ route('admin.curredit', base64_encode($val->id)) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

										<a class="icon" href="javascript:void(0)"></a>
										@if($val->status == 1)
											<a href="{{ route('admin.currstatus', base64_encode($val->id)) }}" class="btn btn-green btn-sm"><i class="fa fa-link"></i>Active
										@else
											<a href="{{ route('admin.currstatus', base64_encode($val->id)) }}" class="btn btn-secondary btn-sm"><i class="fa fa-link"></i>
											Inactive
										@endif

										<a class="icon" href="javascript:void(0)"></a>
										<a href="#deleteModal{{$val->id}}" title="Delete" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>

										@include('admin.partial.curr_del_modal')
									</td>
								</tr>	
								@endforeach							
							</tbody>
							@endif
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

