@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- basic form  -->
<!-- ============================================================== -->
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card">
			<div class="d-flex justify-content-between card-header">
				<h3 class="">Create Order</h3>
				<a href="/orders"
				   class="btn btn-primary btn-rounded">View All</a>
			</div>
			<div class="card-body">
				<form action="/orders"
					  method="POST">
					@csrf
					<div class="form-group">
						<label for="user"
							   class="col-form-label">Customer</label>
						<select id="user"
								name="user_id"
								class="form-control"
								required>
							<option value="">Choose a Customer</option>
							@foreach ($users as $user)
							<option value="{{ $user->id}}">{{ $user->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label for="user"
							   class="col-form-label">Product</label>
						<select id="product"
								name="product_id"
								class="form-control"
								required>
							<option value="">Choose a Product</option>
							@foreach ($products as $product)
							<option value="{{ $product->id}}">{{ $product->name }}</option>
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
							   placeholder="Vehicle Registration"
							   class="form-control"
							   required>
					</div>
					<div class="form-group">
						<label for="inputText4"
							   class="col-form-label">Entry Number</label>
						<input id="entry_number"
							   type="text"
							   name="entry_number"
							   placeholder="Entry Number"
							   class="form-control">
					</div>
					<div class="form-group">
						<label for="inputText4"
							   class="col-form-label">Kra Due</label>
						<input id="kra_due"
							   type="number"
							   name="kra_due"
							   placeholder="Enter Amount"
							   class="form-control">
					</div>
					<div class="form-group">
						<label for="inputText4"
							   class="col-form-label">Kebs Due</label>
						<input id="kebs_due"
							   type="number"
							   name="kebs_due"
							   placeholder="Enter Amount"
							   class="form-control">
					</div>
					<div class="form-group">
						<label for="other_charges"
							   class="col-form-label">Other Charges</label>
						<input id="other_charges"
							   type="number"
							   name="other_charges"
							   placeholder="Enter Amount"
							   class="form-control">
					</div>
					<div class="form-group">
						<label for="total_value"
							   class="col-form-label">Total Value</label>
						<input id="total_value"
							   type="number"
							   name="total_value"
							   class="form-control"
							   value=:100300
							   disabled>
					</div>
					<div class="d-flex justify-content-end">
						<button type="submit"
								class="btn btn-primary btn-rounded">Create Order</button>
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