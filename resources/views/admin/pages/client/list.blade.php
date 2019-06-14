@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">All Client List</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Client</a></li>
				<li class="breadcrumb-item active" aria-current="page">All Client List</li>
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
						<h3 class="card-title">Client List</h3>

					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th>Client Name</th>
									<th>Role</th>
									<th>Created Date</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							@foreach($clientData as $val)
								<tr>
									<td><a href="{{ route('admin.proDetails', base64_encode($val->id)) }}" >{{ $val->name }} </a></td>

									<td>
										@if($val->role_id == 1)
											Admin
										@endif
										@if($val->role_id == 2)
											Client
										@endif
									</td>

									<td>{{ $val->created_at }}</td>


									
									<td>
									@if($val->is_active == 1)
										<span class="status-icon bg-success"></span> Active
									@else
										<span class="status-icon bg-danger"></span> Inactive
									@endif
									</td>

									
									<td class="text-right">
										<a class="icon" href="javascript:void(0)"></a>
										<a href="{{ route('admin.bidDetails', base64_encode($val->id)) }}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i> Property</a>

										<a class="icon" href="#"></a>
										<a href="{{ route('admin.cliEdit', base64_encode($val->id)) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

										<a class="icon" href="javascript:void(0)"></a>
										 
										@if($val->is_active ==1)
											<a href="{{ route('admin.active', base64_encode($val->id)) }}" class="btn btn-green btn-sm"><i class="fa fa-link"></i>Active
										@else
											<a href="{{ route('admin.active', base64_encode($val->id)) }}" class="btn btn-secondary btn-sm"><i class="fa fa-link"></i>
											Inactive
										@endif
										</a>

										<a class="icon" href="javascript:void(0)"></a>
										<a href="#" class="btn btn-danger btn-sm" onclick="myFunClient('{{base64_encode($val->id)}}')"><i class="fa fa-trash"></i> Delete</a>
									</td>
								</tr>

							@endforeach
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

<script type="text/javascript">
			function myFunClient(id) 
			{

				var delId = id;
				var token = $("meta[name='csrf-token']").attr("content");
				var link = base_url + "admin/client/delete/" +delId;

				
				var x = confirm("Are you sure you want to delete?");
				
				  if(x)
				  {
					    $.ajax({
						url     : link,
						method  : "delete",
						data    : {'id' : delId, '_token' : token},
						success : function(result){
							window.location= "{{ route('admin.clientList') }}";
							// alert(result);
						}
					});
				  }
				  else
				  {
				    return false;
				  }
				
				
			}
</script>