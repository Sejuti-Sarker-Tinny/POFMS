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
                <b>View Expense Information</b>
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
                  <td>Expense Details</td>
                  <td>:</td>
                  <td>
                      {{$data->expense_details}}
                  </td>
                </tr>
                <tr>
                  <td>Expense Category</td>
                  <td>:</td>
                  <td>
                      {{$data->categoryName->excate_name}}
                  </td>
                </tr>
                <tr>
                  <td>Expense Date</td>
                  <td>:</td>
                  <td>
                      {{$data->expense_date}}
                  </td>
                </tr>
                <tr>
                  <td>Amount</td>
                  <td>:</td>
                  <td>
                      {{$data->expense_amount}}
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
