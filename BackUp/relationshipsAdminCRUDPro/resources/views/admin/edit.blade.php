@extends('admin.layouts.admin')

@section('content')	
	<div class="container">
		<h1>Edit : {{ $product->title }}</h1>

		{{ HTML::ul($errors->all()) }}

		{{ Form::model($product, array('route' => array('admin.update', $product->id), 'files' => true, 'method' => 'PUT')) }}

		    <div class="form-group col-md-6">
	          {{ Form::label('category->id', 'Product Category: ', array('class' => 'h4')) }}
			  {{ Form::select('category_id',
			  	[
			  	   '0' => 'Selcet',
				   '1' => 'PC',
				   '2' => 'Notebook',
				   '3' => 'Phone'
				], array('class' => 'dropdown-menu')) }}			          
	        </div>

		    <div class="form-group col-md-8">
	          {{ Form::label('pd_name', 'Product Name: ', array('class' => 'h4')) }}
	          {{ Form::text('pd_name', Input::old('pd_name'), array('class' => 'form-control', 'placeholder' => 'ชื่อสินค้า')) }}
	        </div>

	        <div class="form-group col-md-8">
	          {{ Form::label('pd_detail', 'Product Detail: ', array('class' => 'h4')) }}
	          {{ Form::textarea('pd_detail', Input::old('pd_detail'), array('class' => 'form-control', 'placeholder' => 'รายละเอียดสินค้า')) }}
	        </div>

	        <div class="form-group col-md-8">
	          {{ Form::label('pd_price', 'Product Price: ', array('class' => 'h4')) }}
	          {{ Form::text('pd_price', Input::old('pd_price'), array('class' => 'form-control', 'placeholder' => 'ราคาสินค้า')) }}
	        </div>

	        <div class="form-group col-md-8">
	          {{ Form::label('pd_image', 'Product Image: ', array('class' => 'h4')) }}
	          {{ Form::file('pd_image', Input::old('pd_image'), array('class' => 'form-control', 'placeholder' => 'รูปภาพสินค้า')) }}
	        </div>

		    {{ Form::submit('Edit the Product!', array('class' => 'btn btn-primary')) }}
		    <a class="btn btn-small btn-success" href="{{ URL::to('admin/products') }}">Back</a>

		{{ Form::close() }}
	</div>
@endsection