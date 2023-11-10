@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- basic form  -->
<!-- ============================================================== -->
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card">
			<div class="d-flex justify-content-between card-header">
				<h3 class="">Create Product</h3>
				<a href="/products"
				   class="btn btn-primary btn-rounded">View All</a>
			</div>
			<div class="card-body">
				<form action="/products"
					  method="POST">
					@csrf
					<div class="form-group">
						<label for="name"
							   class="col-form-label">Name</label>
						<input id="name"
							   type="text"
							   name="name"
							   placeholder="John Doe"
							   class="form-control"
							   required>
					</div>
					<div class="d-flex justify-content-end">
						<button type="submit"
								class="btn btn-primary btn-rounded">Create Product</button>
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