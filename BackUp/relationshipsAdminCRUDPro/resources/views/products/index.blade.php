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
			        <h5 class="card-title">{{ $show->pd_name }}</h5>
			        <h3 class="card-title">
			        	{{ number_format($show->pd_price, 2) }}
			        </h3>
			        <p class="card-text">
			        	{{ \Illuminate\Support\Str::words($show->pd_detail, 5,'...') }}
			        </p>
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
	</div>
	<a href="{{ URL::route('welcome') }}">Home</a>
@endsection
