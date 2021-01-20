@extends('admin.layout')

@section('content')
    
    @if (count($errors) > 0)
      <div class="alert alert-danger mt-2">
          <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>

    @endif

    @if ($message = Session::get('success'))
          <div class="alert alert-success  mt-2">
              <strong>{{ $message }}</strong>
          </div>
    @endif

     @if ($message = Session::get('error'))
          <div class="alert alert-danger  mt-2">
              <strong>{{ $message }}</strong>
          </div>
    @endif
              

    <div class="row">
        <div class="col-lg-12">
      
          <div data-collapsed="0" class="card">
            <div class="card-header">
              <div class="card-title">
                <h2 class="card-title">My Profile</h2>
              </div>
            </div>
      
            <div class="card-body">
             <form enctype="multipart/form-data" action="{{ route('profile.update')}}" method="post">
              {{ csrf_field() }}

              <div class="form-group row">
                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Name</label>
                <div class="col-lg-6">
                  <input type="text" name="name" class="form-control" value="{{ $user->name }}" >
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Email</label>
                <div class="col-lg-6">
                  <input type="email" name="email" class="form-control" value="{{ $user->email }}" >
                </div>
              </div>
              
                <div class="row">
                  <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-success mt-2">
                      <i class="fa fa-plus-circle"></i> Update Profile
                    </button>
                  </div>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div data-collapsed="0" class="card">
            <div class="card-header">
              <div class="card-title">
                <h2 class="card-title">Update Password</h2>
              </div>
            </div>
      
            <div class="card-body">
             <form enctype="multipart/form-data" action="{{ route('password.update')}}" method="post">
              {{ csrf_field() }}

              <div class="form-group row">
                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Password</label>
                <div class="col-lg-6">
                  <input type="password" name="password" class="form-control" id="inputDefault">
                </div>
              </div>

              <div class="form-group row">
                <label class="col-lg-3 control-label text-lg-right pt-2" for="inputDefault">Confirm Password</label>
                <div class="col-lg-6">
                  <input type="password" name="password_confirmation" class="form-control" id="inputDefault">
                </div>
              </div>
                <div class="row">
                  <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-success mt-2">
                      <i class="fa fa-plus-circle"></i> Password Update
                    </button>
                  </div>
                </div>
                </form>
            </div>
          </div>
        </div>
      </div>
@stop