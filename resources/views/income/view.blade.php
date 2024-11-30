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
                <b>View Income Information</b>
              </div>
              <div class="col-md-2 card_header_for_one_button">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <table class="table table-striped table-bordered view_table">
                <tr>
                  <td>Income Details</td>
                  <td>:</td>
                  <td>
                      {{$data->income_details}}
                  </td>
                </tr>
                <tr>
                  <td>Income Category</td>
                  <td>:</td>
                  <td>
                      {{$data->categoryName->incate_name}}
                  </td>
                </tr>
                <tr>
                  <td>Income Date</td>
                  <td>:</td>
                  <td>
                      {{$data->income_date}}
                  </td>
                </tr>
                <tr>
                  <td>Amount</td>
                  <td>:</td>
                  <td>
                      {{$data->income_amount}}
                  </td>
                </tr>
              </table>
            </div>
            <div class="col-md-2"></div>
            </div>
          </div>
          <div class="card-footer text-muted">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
