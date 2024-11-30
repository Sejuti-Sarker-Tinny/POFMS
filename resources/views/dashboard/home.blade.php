@extends('layouts.admin-dashboard')
@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">

      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$total_income}}</h3>

            <p>Total Income</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$total_expense}}</h3>

            <p>Total Expense</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$total_income-$total_expense}}</h3>

            <p>Savings</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-light">
            <div class="row">
              <div class="col-md-8 card_header_text">
                Last 7 Day's Status
              </div>
              <div class="col-md-4 card_header_for_three_button">
              
              </div>
            </div>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table id="alltableinfo" class="table table-striped table-bordered table_customize">
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
                @foreach($last_7days_income as $data)
                <tr>
                  <td>{{$data->income_date}}</td>
                  <td>{{$data->categoryName->incate_name}}</td>
                  <td>{{$data->income_details}}</td>
                  <td>{{$data->income_amount}}</td>
                  <td>---</td>
                </tr>
                @endforeach
                @foreach($last_7days_expense as $data)
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
                  <th>{{$last_7days_all_income}}</th>
                  <th>{{$last_7days_all_expense}}</th>
                </tr>
                <tr>
                  <th colspan="5" class="text-center">
                    Total Savings:
                    @if($last_7days_all_income > $last_7days_all_expense)
                    <span class="text-success">{{$last_7days_all_income-$last_7days_all_expense}}</span>
                    @else
                    <span class="text-danger">{{$last_7days_all_income-$last_7days_all_expense}}</span>
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
