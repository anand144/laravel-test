@extends('admin.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12">
      
          <div data-collapsed="0" class="card">
      
            <div class="card-header">
              <div class="card-title">
                <div class="card-actions">
                  <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                  <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                </div>
      
                <h2 class="card-title">Dashboard</h2>
              </div>
            </div>
      
            <div class="card-body">

              <div class="row">
                <div class="col-lg-6 col-sm-12">
                  <section class="card">
                    <div class="card-body">
                      <div class="h4 font-weight-bold mb-0">{{ $categories }}</div>
                      <p class="text-3 text-muted mb-0">Category</p>
                    </div>
                  </section>

                </div>
                <div class="col-lg-6 col-sm-12">
                   <section class="card">
                    <div class="card-body">
                      <div class="h4 font-weight-bold mb-0">{{ $products }}</div>
                      <p class="text-3 text-muted mb-0">Product</p>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop