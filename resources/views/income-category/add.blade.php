@extends('layouts.admin-dashboard')
@section('content')
<div class="container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-light">
            <div class="row">
              <div class="col-md-10 card_header_text">
                Add Income Category
              </div>
              <div class="col-md-2 card_header_for_one_button">
              </div>
            </div>
          </div>
          <form method="post" action="{{url('admin/income/category/insert')}}">
            @csrf
          <div class="card-body">
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Income Category Name <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="" name="name" value="{{old('name')}}">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Remarks</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="" name="remarks" value="{{old('remarks')}}">
                </div>
                <div class="col-sm-1">
                </div>
              </div>
          </div>
          <div class="card-footer text-muted text-center">
            <button type="submit" class="btn btn-success">Save</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
