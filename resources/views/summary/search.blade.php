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
              Custom Report: <span class="text-primary">{{$from}}</span> <span class="text-danger">to</span> <span class="text-primary">{{$to}}</span>
              </div>
              <div class="col-md-4 card_header_for_two_button">
              </div>
            </div>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table id="alltableinfo" class="table table-striped table-bordered">
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
                @foreach($income as $data)
                <tr>
                  <td>{{$data->income_date}}</td>
                  <td>{{$data->categoryName->incate_name}}</td>
                  <td>{{$data->income_details}}</td>
                  <td>{{$data->income_amount}}</td>
                  <td>---</td>
                </tr>
                @endforeach
                @foreach($expense as $data)
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
