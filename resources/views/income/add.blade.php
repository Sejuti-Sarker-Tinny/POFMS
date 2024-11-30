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
                Add Income Information
              </div>
              <div class="col-md-2 card_header_for_one_button">
              </div>
            </div>
          </div>
          <form method="post" action="{{url('admin/income/insert')}}">
            @csrf
          <div class="card-body">
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">Income Details <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control @error('details') is-invalid @enderror" id="" name="details" value="{{old('details')}}">
                @error('details')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">Amount <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="number" class="form-control @error('amount') is-invalid @enderror" id="" name="amount" value="{{old('amount')}}">
                @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">Income Date <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="text" class="form-control @error('date') is-invalid @enderror" id="income_date" name="date" value="{{old('date')}}">
                @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-1"></div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">Income Category <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <select class="form-control @error('category') is-invalid @enderror" name="category">
                <option value="">Select Category</option>
                @foreach($cateList as $cate)
                <option value="{{$cate->incate_id}}">{{$cate->incate_name}}</option>
                @endforeach
                </select>
                @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-sm-1"></div>
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
