@extends('layouts.app')

@section('content')
	<div class="container">
		<br />
		<div class="row">
			@foreach($products as $show)
			  <div class="col-sm-2">
			    <div class="card" style="width: 10rem;">
			    	<a href="{{ URL::to('products/' . $show->id) }}">
			    		<img class="card-img-top" src="{!! url('/images/'.$show->pd_image) !!}">
			    	</a>
			      <div class="card-body">
			        <h5 class="card-title">{{$show->pd_name}}</h5>
			        <h3 class="card-title">{{$show->pd_price}}</h3>
			        <p class="card-text">{{$show->pd_detail}}</p>
			        <button type="button" class="btn btn-sm" style="margin-bottom: 10px;">
						สินค้าคงเหลือ <span class="badge badge-light">4</span>
					</button>
			        <a href="#" class="btn btn-primary">Add to Cart</a>
			      </div>
			    </div>
			    	<br />
			  </div>
			@endforeach
			<br>
		</div>
		{{ $products->render() }}

		<br />

		<div class="row justify-content-center">
	        <div class="col-md-12">
	        	{{ HTML::ul($errors->all()) }}
	        	@if (Session::has('message'))
	            	<div class="alert alert-info">{{ Session::get('message') }}</div>
	        	@endif
	            <div class="card">
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
