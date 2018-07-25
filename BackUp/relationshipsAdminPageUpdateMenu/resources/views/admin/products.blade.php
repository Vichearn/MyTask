@extends('admin.layouts.admin')

@section('content')	
	<div class="container">
		@yield('content')
		<div class="row justify-content-center">
	        <div class="col-md-12">
	        	{{ HTML::ul($errors->all()) }}
	        	@if (Session::has('message'))
	            	<div class="alert alert-info">{{ Session::get('message') }}</div>
	        	@endif
	            <div class="card" style="border: 2px solid black;">
	            	<div class="card-header">
					      <table class="table table-striped table-bordered">
		                    <thead align="center">
		                        <tr>
		                            <td>Product Name</td>
		                            <td>Product Detail</td>
		                            <td>Product Price</td>
		                            <td>Product Type</td>
		                            <td>Product Image</td>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    @foreach($products as $key => $value)
		                        <tr>
		                            <td> {{ $value->pd_name }}</td>
		                            <td> {{ $value->pd_detail }}</td>
		                            <td> {{ $value->pd_price }}</td>
		                            <td> {{ $value->category->name }}</td>
		                            <td> <img src="{!! url('images/'.$value->pd_image) !!}" data-imagezoom="true" class="img-responsive" style="width: 100px; height: 100px;">
		                            </td>
		                        </tr>
		                    @endforeach
		                </table>
	        			<a class="btn btn-dark" href="{{ URL::route('products.create') }}">
	        				<span class="oi oi-plus" aria-hidden="true">
	        				</span> Add Product
	        			</a>
					</div>
		        </div>
	        </div>
	    </div>
	</div>
@endsection