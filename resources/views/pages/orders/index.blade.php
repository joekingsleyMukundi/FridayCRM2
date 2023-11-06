@extends('layouts.app')

@section('content')
<div class="row">
	{{-- basic table --}}
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
		<div class="card">
			<div class="d-flex justify-content-between card-header">
				<h3 class="">Orders</h3>
				<h4 class="text-success">KES {{ $ordersPendingValue }}</h4>
				<a href="/orders/create"
				   class="btn btn-primary btn-rounded">Create</a>
			</div>
			<div class="card-body">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Date</th>
							<th scope="col">Vehicle Registration</th>
							<th scope="col">Entry Number</th>
							<th scope="col">Customer</th>
							<th scope="col">Product</th>
							<th scope="col">KRA Due</th>
							<th scope="col">KEBS Due</th>
							<th scope="col">Other Query</th>
							<th scope="col">Total Value</th>
							<th scope="col">Status</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($orders as $order)
						<tr>
							<th scope="row">{{ $loop->iteration }}</th>
							<td>{{ $order->date }}</td>
							<td>{{ $order->vehicle_registration }}</td>
							<td>{{ $order->entry_number }}</td>
							<td>{{ $order->user->name }}</td>
							<td>{{ $order->product->name }}</td>
							<td>{{ $order->kra_due }}</td>
							<td>{{ $order->kebs_due }}</td>
							<td>{{ $order->other_query }}</td>
							<td>{{ $order->total_value }}</td>
							<td>
								<span @class(['py-2
									  px-4
									  rounded-pill
									  text-capitalize'
									  , 'bg-warning-subtle'=> $order->invoice?->status == 'pending'
									, 'bg-success-subtle'=> $order->invoice?->status == 'paid'
									])>
									{{ $order->invoice?->status }}
								</span>
							</td>
							<td>
								<div class="d-flex">
									<a href="/orders/{{ $order->id }}/edit"
									   class="btn btn-sm btn-primary btn-rounded">Edit</a>
									<div class="mx-1">
										{{-- Confirm Delete Modal End --}}
										<div class="modal fade"
											 id="deleteModal{{ $order->id }}"
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
														Are you sure you want to delete Order.
														This process is irreversible.
													</div>
													<div class="modal-footer justify-content-between">
														<button type="button"
																class="btn btn-light rounded-pill"
																data-bs-dismiss="modal">
															Close
														</button>
														<button type="button"
																class="btn btn-danger rounded-pill text-white"
																data-bs-dismiss="modal"
																onclick="event.preventDefault();
						                                                     document.getElementById('deleteForm{{ $order->id }}').submit();">
															Delete
														</button>
														<form id="deleteForm{{ $order->id }}"
															  action="/orders/{{ $order->id }}"
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
												data-bs-target="#deleteModal{{ $order->id }}">
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