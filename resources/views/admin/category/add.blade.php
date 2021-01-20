@extends('admin.layout')

@section('content')
	
	<div class="row">
		<div class="col">
			<section class="card">
				<header class="card-header">
					<h2 class="card-title">Add Category</h2>
				</header>
				<div class="card-body">
					<form enctype="multipart/form-data" action="{{ route('category.save')}}" method="post">
						{{ csrf_field() }}

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

					    <div class="form-group mb-3">
							<label class="font-weight-bold">Name *</label>
							<input name="name" type="text" placeholder="Enter Name" value="{{old('name')}}"  class="form-control " required="" />
						</div>

						<div class="form-group mb-3">
							<label class="font-weight-bold">Parent Category *</label>
							<select multiple data-plugin-selectTwo class="form-control populate" required="" name="parent[]">
								<option value="0">None</option>
								@foreach($categories as $category)
									<option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->name }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group mb-3">
							<label class="font-weight-bold">Status *</label>
							<select data-plugin-selectTwo name="status" required="" class="form-control populate">
								<option value="active" @if(old('status') == 'active') selected @endif>Active</option>
								<option value="=delete" @if(old('status') == 'delete') selected @endif>Delete</option>
							</select>
						</div>

					   
						<div class="row">
							<div class="col-sm-12">
								<button type="submit" class="btn btn-success mt-2">
									<i class="fa fa-plus-circle"></i> Add Product
								</button>
							</div>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>

	
@endsection