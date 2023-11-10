@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- basic form  -->
<!-- ============================================================== -->
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card">
			<div class="d-flex justify-content-between card-header">
				<h3 class="">Edit Order</h3>
				<a href="/orders"
				   class="btn btn-primary btn-rounded">View All</a>
			</div>
			<div class="card-body">
				<form action="/orders/{{ $order->id }}"
					  method="POST">
					@csrf
					<input type="hidden"
						   name="_method"
						   value="PUT" />
					<div class="form-group">
						<label for="user_id"
							   class="col-form-label">Customer</label>
						<select id="user_id"
								name="user_id"
								class="form-control">
							<option value="">Choose a Customer</option>
							@foreach ($users as $user)
							<option value="{{ $user->id }}"
									{{
									$order->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="product"
							   class="col-form-label">Product</label>
						<select id="product"
								name="product_id"
								class="form-control">
							<option value="">Choose a Product</option>
							@foreach ($products as $product)
							<option value="{{ $product->id}}"
									{{
									$order->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}
							</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="inputText4"
							   class="col-form-label">Date</label>
						<input id="inputText4"
							   type="date"
							   name="date"
							   class="form-control">
					</div>
					<div class="form-group">
						<label for="inputText4"
							   class="col-form-label">Vehicle Registration</label>
						<input id="vehicle_registration"
							   type="text"
							   name="vehicle_registration"
							   placeholder="{{ $order->vehicle_registration }}"
							   class="form-control">
					</div>
					<div class="form-group">
						<label for="inputText4"
							   class="col-form-label">Entry Number</label>
						<input id="entry_number"
							   type="text"
							   name="entry_number"
							   placeholder="{{ $order->entry_number }}"
							   class="form-control">
					</div>
					<div class="form-group">
						<label for="inputText4"
							   class="col-form-label">KRA Due</label>
						<input id="kra_due"
							   type="number"
							   name="kra_due"
							   placeholder="{{ $order->kra_due }}"
							   class="form-control">
					</div>
					<div class="form-group">
						<label for="inputText4"
							   class="col-form-label">KEBS Due</label>
						<input id="kebs_due"
							   type="number"
							   name="kebs_due"
							   placeholder="{{ $order->kebs_due }}"
							   class="form-control">
					</div>
					<div class="form-group">
						<textarea id="other_query"
								  name="other_query"
								  placeholder="{{ $order->other_query }}"
								  class="form-control"
								  cols="30"
								  rows="10">
							</textarea>
					</div>
					<div class="d-flex justify-content-end">
						<button type="submit"
								class="btn btn-primary btn-rounded">Update Order</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- ============================================================== -->
<!-- end basic form  -->
<!-- ============================================================== -->
@endsection