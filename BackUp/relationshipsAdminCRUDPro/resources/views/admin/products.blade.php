@extends('admin.layouts.admin')

@section('content')	
	<a class="btn btn-dark" href="{{ URL::to('admin/create') }}" style="border-radius: 50px;">
	        <span class="oi oi-plus" aria-hidden="true"></span> 
	        Add Product
	</a>
	<div class="container">
		@yield('content')
		<br/>
		<div class="row justify-content-center">
	        <div class="col-md-12">
	        	{{ HTML::ul($errors->all()) }}
	        	@if (Session::has('message'))
	            	<div class="alert alert-info">{{ Session::get('message') }}</div>
	        	@endif
	            <div class="card" style="border: 2px solid black; padding-top: 20px;">
	            	<div class="card-header">
					      <table class="table table-striped table-bordered" style="border-top: double; border-bottom: double;">
		                    <thead align="center">
		                        <tr>
		                            <th>Product Name</th>
		                            <th>Product Detail</th>
		                            <th>Product Price</th>
		                            <th>Product Type</th>
		                            <th>Product Image</th>
		                            <th colspan="3">Actions</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    @foreach($products as $key => $value)
		                        <tr>
		                            <td> {{ $value->pd_name }}</td>
		                            <td> 
		                            	{{ \Illuminate\Support\Str::words($value->pd_detail, 3,'...') }}
		                            </td>
		                            <td> {{ $value->pd_price }}</td>
		                            <td> {{ $value->category->name }}</td>
		                            <td style="text-align: center;"><img src="{!! url('images/'.$value->pd_image) !!}" data-imagezoom="true" class="img-responsive" style="width: 50px; height: 50px;">
		                            </td>
		                            <td><a href="{{ URL::to('admin/' . $value->id) }}">Show</a></td>
		                            <td><a href="{{ URL::to('admin/' . $value->id . '/edit') }}">
		                            	Edit
		                        	</a></td>
		                            <td>
		                            {{ Form::open(['id'=>'deleteForm','method'=>'DELETE','url'=>'admin/' . $value->id]) }}
	                                {{ Form::hidden('_method', 'DELETE') }}
	                                {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) }}
	                                {{ Form::close() }}
	                            	</td>
		                        </tr>
		                    @endforeach
		                </table>
					</div>
		        </div>
		        <br/>
		        {{ $products->render() }}
	        </div>
	    </div>
	</div>
@endsection