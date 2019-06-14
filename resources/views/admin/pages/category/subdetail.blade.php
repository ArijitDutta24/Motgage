@extends('admin.layout.master')

@section('content')

<div class="app-content  my-3 my-md-5">
	<div class="side-app">
		<div class="page-header">
			<h4 class="page-title">Sub Sub Category List</h4>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Category</a></li>
				<li class="breadcrumb-item " aria-current="page"><a href="{{ route('admin.catList') }}">Parent Category List</a></li>
				<li class="breadcrumb-item " aria-current="page"><a href="{{ route('admin.catDet',base64_encode($data->parent_id)) }}">Sub Category List</a></li>
				<li class="breadcrumb-item active" aria-current="page">Sub Sub Category List</li>
			</ol>

		</div>
		<div class="row ">
			<div class="col-md-12">
				<div class="card">
					
					<div class="card-header">
						<h3 class="card-title">Sub Sub Category List</h3>

					</div>
					<div class="table-responsive">
						<table class="table card-table table-vcenter text-nowrap">
							<thead>
								<tr>
									<th>Sub Category</th>
									<th>Parent Category</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								
								@foreach($cat as $val)
								<tr>
									<td>{{ $val->cat_name }}</td>
									<td>{{ $data->cat_name }}</td>
									<td class="text-right">

										<a class="icon" href="javascript:void(0)"></a>
										<a href="{{ route('admin.catEdit', base64_encode($val->id))}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Edit</a>

										
										<a class="icon" href="javascript:void(0)"></a>
										<a href="#" class="btn btn-danger btn-sm" onclick="myFun('{{base64_encode($val->id)}}')"><i class="fa fa-trash"></i> Delete</a>

										
									</td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
						
					</div>
				</div>
				<a href="{{ route('admin.catDet',base64_encode($data->parent_id)) }}" class="btn btn-primary btn-sm" style="text-align: right;">Back</a>
			</div>
		</div>
	</div>
</div>

@endsection