@extends('layouts.app')

@section('content')
<div class="row">
	{{-- basic table --}}
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card">
			<div class="d-flex justify-content-between card-header">
				<h3 class="">Customers</h3>
				<a href="/users/create"
				   class="btn btn-primary btn-rounded">Create</a>
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Email</th>
							<th scope="col">Phone</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($users as $user)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->phone }}</td>
							<td>
								<div class="d-flex">
									<a href="/users/{{ $user->id }}/edit"
									   class="btn btn-sm btn-primary btn-rounded">Edit</a>
									<div class="mx-1">
										{{-- Confirm Delete Modal End --}}
										<div class="modal fade"
											 id="deleteModal{{ $user->id }}"
											 tabIndex="-1"
											 aria-labelledby="deleteModalLabel"
											 aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 id="deleteModalLabel"
															class="modal-title fs-5 text-danger">
															Delete Club
														</h1>
														<button type="button"
																class="btn-close"
																data-bs-dismiss="modal"
																aria-label="Close"></button>
													</div>
													<div class="modal-body text-wrap">
														Are you sure you want to delete {{ $user->name }}.
														This process is irreversible.
													</div>
													<div class="modal-footer justify-content-between">
														<button type="button"
																class="btn btn-secondary rounded-pill"
																data-bs-dismiss="modal">
															Close
														</button>
														<button type="button"
																class="btn btn-danger rounded-pill text-white"
																data-bs-dismiss="modal"
																onclick="event.preventDefault();
						                                                     document.getElementById('deleteForm{{ $user->id }}').submit();">
															Delete
														</button>
														<form id="deleteForm{{ $user->id }}"
															  action="/users/{{ $user->id }}"
															  method="POST"
															  style="display: none;">
															<input type="hidden"
																   name="_method"
																   value="DELETE">
															@csrf
														</form>
													</div>
												</div>
											</div>
										</div>
										{{-- Confirm Delete Modal End --}}

										{{-- Button trigger modal --}}
										<button type="button"
												class="btn btn-sm btn-danger rounded-pill text-white"
												data-bs-toggle="modal"
												data-bs-target="#deleteModal{{ $user->id }}">
											Delete
										</button>
									</div>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	{{-- end basic table --}}
</div>
@endsection