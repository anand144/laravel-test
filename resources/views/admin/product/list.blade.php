@extends('admin.layout')
@section('css')
	<link rel="stylesheet" href="{{asset('theme/admin/vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
	<style type="text/css">
		div.dataTables_wrapper div.dataTables_filter{
			text-align:left;
		}
	</style>
@endsection
@section('content')

		<div class="row">
			<div class="col">
				<section class="card">
					<header class="card-header">
						<div class="card-actions">
							Total Product: {{count($products)}}
						</div>
		
						<h2 class="card-title">Products List </h2>
					</header>
					<div class="card-body">
						
						@if (count($errors) > 0)
					      <div class="alert alert-danger">
					          <ul>
					              @foreach ($errors->all() as $error)
					              <li>{{ $error }}</li>
					              @endforeach
					          </ul>
					      </div>

					    @endif

					    @if ($message = Session::get('success'))
					          <div class="alert alert-success">
					              <strong>{{ $message }}</strong>
					          </div>
					    @endif

					     @if ($message = Session::get('error'))
					          <div class="alert alert-danger">
					              <strong>{{ $message }}</strong>
					          </div>
					    @endif

						<table class="table table-no-more table-bordered table-striped mb-0" id="datatable-tabletools">
							<thead>
								<tr>
									<th>ID</th>
									<th>Date</th>
									<th>Name</th>
									<th>Price</th>
									<th>Category</th>
									<th>Status</th>
									<th width="11%">Action</th>
								</tr>
							</thead>
							<tbody>
								@if(count($products)>0)
									@foreach($products as $product)
										<tr>
											<td data-title="ID">{{ $product->id }}</td>
											<td data-title="Date"> {{ $product->created_at  }}</td>
											<td data-title="Title">{{ $product->name }}</td>
											<td data-title="Price">{{ $product->price }}</td>
											<td data-title="Category">

												@if (count($product->productCategory) > 0)
									                @foreach ($product->productCategory as $index => $pCat)
									                   {{ $pCat->category->name }} 
									                   @if($index < (count($product->productCategory) - 1) )
									                   	{{', '}}
									                   @endif
									                @endforeach
												@endif
												
											</td>
											<td data-title="Status" >
												<span class="text-uppercase">{{$product->status}}</span>
											</td>
											<td data-title="Action">
												<a class="btn btn-sm btn-warning mr-1" data-original-title="Edit" data-toggle="tooltip" title="" href="{{route('product.edit',['id' => $product->id ])}}">
													<i class="fa fa-edit"></i>
												</a>
												<button id="deletebutton" class="btn btn-sm btn-danger mr-1"  data-toggle="modal" data-name="{{$product->name }}" data-id="{{$product->id}}" data-target="#deleteModal">
													<i class="fa fa-trash"></i>
												</button>
											</td>
										</tr>
									@endforeach
                                @else
                                    <tr>
                                        <td colspan="6">No product found.</td>
                                    </tr>
                                @endif
							</tbody>
						</table>
					</div>
				</section>
			</div>
		</div>

	<!-- Modal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel"></h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form action="{{route('product.delete')}}" method="post">
	      	@csrf
		      <div class="modal-body">
		      		<input type="hidden" name="delete_id" id="delete_id" value="" />
		        	<p><strong>Are you sure you want to delete this product? </strong></p>
		      </div>
		      <div class="modal-footer">
		      	<button type="submit" class="btn btn-danger float-left">Delete</button>
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>
@endsection
@section('js')
	<script type="text/javascript">
		$('#deleteModal').on('shown.bs.modal', function (event) {
		  var button = $(event.relatedTarget);
		  var name = button.data('name');
		  console.log(name);
		  $('#delete_id').val(button.data('id'));
		  var modal = $(this);
		  modal.find('.modal-title').text('Delete ' + name + ' ?')
		})
	</script>

	<script src="{{asset('theme/admin/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('theme/admin/vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('theme/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('theme/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('theme/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('theme/admin/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('theme/admin/vendor/datatables/extras/TableTools/JSZip-2.5.0//jszip.min.js')}}"></script>
	<script src="{{asset('theme/admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js')}}"></script>
	<script src="{{asset('theme/admin/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js')}}"></script>
	<script src="{{asset('theme/admin/js/examples/examples.datatables.tabletools.js')}}"></script>
@endsection