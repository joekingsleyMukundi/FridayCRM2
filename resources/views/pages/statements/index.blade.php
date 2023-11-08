@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
					</div>
				</form>
				<div class="d-flex justify-content-end">
					<form id="status-form"
						  action="/statement-by-status"
						  method="GET"
						  class="w-25">
						<select class="custom-select w-100"
								name="status"
								onchange="
								event.preventDefault(); 
								document.getElementById('status-form').submit();
								">
							<option value="pending"
									{{
									app("request")->input("status") == 'pending' ? 'selected' : ''}}>Pending</option>
							<option value="paid"
									{{
									app("request")->input("status") == 'paid' ? 'selected' : '' }}>Paid</option>
						</select>
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
						<div class="d-flex w-100 justify-content-between">
							<div>
								<p class="mb-1">{{ $order->product->name }}</p>
								<small class="text-success">KES {{ $order->product->price }}</small>
							</div>
							<div>
								<small
									   class="rounded-pill text-capitalize py-2 px-4 {{ $order->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
									{{ $order->status }}
								</small>
							</div>
						</div>
					</a>
					@endforeach
				</div>
			</div>
			<div class="card-footer">
				{{ $orders->links() }}
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- end custom content list  -->
		<!-- ============================================================== -->
	</div>
	<div class="col-sm-6"></div>
</div>
@endsection