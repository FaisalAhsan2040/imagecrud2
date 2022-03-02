@extends('product.layout')
  
  @section('content')
  <div class="row">
      <div class="col-lg-12 margin-tb">
          <div class="pull-left">
              <h2>Add New Product</h2>
          </div>
      </div>
  </div>

  <form action="{{url('store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
       <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Name:</strong>
                  <input type="text" name="name" class="form-control" placeholder="Name">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Roll No:</strong>
                  <input type="number" class="form-control" name="roll_no" placeholder="Roll No">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Phone:</strong>
                  <input type="number" class="form-control" name="phone" placeholder="Phone">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group">
                  <strong>Image:</strong>
                  <input type="file" name="image" class="form-control" placeholder="image">
              </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
       
  </form>
  @endsection