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
                Update Income Category Information
              </div>
              <div class="col-md-2 card_header_for_one_button">
              </div>
            </div>
          </div>
          <form method="post" action="{{url('admin/income/category/update')}}">
            @csrf
          <div class="card-body">
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Income Category Name <span class="text-danger req_star">*</span></label>
                <div class="col-sm-8">
                  <input type="hidden" name="id" value="{{$data->incate_id}}">
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="" name="name" value="{{$data->incate_name}}">
                  @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-sm-1"></div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Remarks</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="" name="remarks" value="{{$data->remarks}}">
                </div>
                <div class="col-sm-1"></div>
              </div>
          </div>
          <div class="card-footer text-muted text-center">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
