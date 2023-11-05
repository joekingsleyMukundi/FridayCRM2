@extends('layouts.app')

@section('content')
<!-- ============================================================== -->
<!-- basic form  -->
<!-- ============================================================== -->
<div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card">
			<div class="d-flex justify-content-between card-header">
				<h3 class="">Create User</h3>
				<a href="/users"
				   class="btn btn-primary btn-rounded">View All</a>
			</div>
			<div class="card-body">
				<form action="/users"
					  method="POST">
					@csrf
					<div class="form-group">
						<label for="inputText3"
							   class="col-form-label">Name</label>
						<input id="inputText3"
							   type="text"
							   name="name"
							   placeholder="John Doe"
							   class="form-control">
					</div>
					<div class="form-group">
						<label for="inputEmail">Email address</label>
						<input id="inputEmail"
							   type="email"
							   name="email"
							   placeholder="name@example.com"
							   class="form-control">
						<p>We'll never share your email with anyone else.</p>
					</div>
					<div class="form-group">
						<label for="inputText4"
							   class="col-form-label">phone</label>
						<input id="inputText4"
							   type="tel"
							   name="phone"
							   class="form-control"
							   placeholder="0700123456">
					</div>
					<div class="d-flex justify-content-end">
						<button type="submit"
								class="btn btn-primary btn-rounded">Create User</button>
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