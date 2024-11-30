@extends('layouts.admin-dashboard')
@section('content')

<section class="content">
  <div class="container-fluid">
    <div class="row">
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-light">
            <div class="row">
              <div class="col-md-8 card_header_text">
                Monthly Report
              </div>
              <div class="col-md-4 card_header_for_three_button">
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row summary_date_form_section">
              <div class="col-md-9"></div>
              <div class="col-md-3 summary_month_name_section">
                <p><b>Month : <span class="text-danger">{{$fullMonth}}</span></b></p>
              </div>
            </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered" id="alltableinfo">
              <thead>
                <tr>
                  
                  <th>Date</th>
                  <th>Category</th>
                  <th>Details</th>
                  <th>Credit</th>
                  <th>Debit</th>
                </tr>
              </thead>
              <tbody>
                @foreach($incomes as $data)
                <tr>
                  <td>{{$data->income_date}}</td>
                  <td>{{$data->categoryName->incate_name}}</td>
                  <td>{{$data->income_details}}</td>
                  <td>{{$data->income_amount}}</td>
                  <td>---</td>
                </tr>
                @endforeach
                @foreach($expenses as $data)
                <tr>
                  <td>{{$data->expense_date}}</td>
                  <td>{{$data->categoryName->excate_name}}</td>
                  <td>{{$data->expense_details}}</td>
                  <td>---</td>
                  <td>{{$data->expense_amount}}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th></th>
                  <th></th>
                  <th>Total</th>
                  <th>{{$incomeTotal}}</th>
                  <th>{{$expenseTotal}}</th>
                </tr>
                <tr>
                  <th colspan="5" class="text-center">
                    Total Savings:
                    @if($incomeTotal > $expenseTotal)
                    <span class="text-success">{{$incomeTotal-$expenseTotal}}</span>
                    @else
                    <span class="text-danger">{{$incomeTotal-$expenseTotal}}</span>
                    @endif
                  </th>
                </tr>
              </tfoot>
            </table>
          </div>
          </div>
          
          <div class="card-footer text-muted">

          </div>
        </div>
      </div>
    </div>
    <!-- Main row -->
    <div class="row">

    <!-- /.content -->
    </div>
  </div>
</section>

<script>

// Data Table

    $('#alltableinfo').DataTable({
        ordering:  true,
        searching: true,
        paging: true,
        select: true,
        //pageLength: 10
    });


</script>

@endsection
