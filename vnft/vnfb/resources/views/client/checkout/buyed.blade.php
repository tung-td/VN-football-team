@extends('layout')
@section('content')
<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="card mb-3">
			<div class="card-body">
				<div class="jumbotron text-center">
				  <h1 class="display-3">Thank You!</h1>
				  <p class="lead">
				    <a class="btn btn-primary btn-sm" href="{{route('product.list')}}" role="button">Shopping now</a>
				    <a class="btn btn-grape btn-sm" href="{{route('client.history')}}" role="button">Watch checkout history</a>
				  </p>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-2"></div>
</div>

@endsection