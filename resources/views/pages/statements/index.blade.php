@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
		<!-- ============================================================== -->
		<!-- custom content list  -->
		<!-- ============================================================== -->
		<div class="card">
			<h5 class="card-header">Statements</h5>
			<div class="card-header">
				<form action="{{ route('statements.by.customer.name') }}"
					  method="GET">
					<div class="input-group mb-3">
						<input type="text"
							   placeholder="Search by Customers"
							   name="search"
							   class="form-control"
							   value="{{ old('search') }}">
						<div class="input-group-append">
							<button type="submit"
									class="btn btn-primary">Search</button>
						</div>
				</form>
			</div>
		</div>
		<div class="card-body">
			<div class="list-group">
				@foreach ($orders as $order)
				<a href="#"
				   class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1">{{ $order->user->name }}</h5>
						<small class="text-muted">{{ $order->created_at }}</small>
					</div>
					<p class="mb-1">{{ $order->product->name }}</p>
					<small class="text-success">KES {{ $order->product->price }}</small>
				</a>
				@endforeach
			</div>
		</div>
	</div>
	<!-- ============================================================== -->
	<!-- end custom content list  -->
	<!-- ============================================================== -->
</div>
<div class="col-sm-6"></div>
</div>
@endsection