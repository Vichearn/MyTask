@extends('layouts.app')

@section('content')

<div class="container">
<h1>Showing : {{ $show->pd_name }}</h1>

    <div class="jumbotron">
	    <table>
			<tr>
				<td>
					<strong>Name:</strong>
				</td>
				<td>
					{{ $show->pd_name }}
				</td>
			</tr>
	    </table>
	</div>
    <a class="btn btn-small btn-success" href="{{ URL::to('products') }}">Back</a>
</div>
@endsection