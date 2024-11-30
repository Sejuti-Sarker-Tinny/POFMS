@extends('layouts.admin-dashboard')
@section('content')
@if(Session::has('insert_success'))
<script>
swal("Done!", "New income category created successfully!", "success");
</script>
@elseif(Session::has('insert_error'))
<script>
swal("Oops!", "New income category creation is unsuccessful!", "error");
</script>
@endif

@if(Session::has('update_success'))
<script>
swal("Done!", "Income category updated successfully!", "success");
</script>
@elseif(Session::has('update_error'))
<script>
swal("Oops!", "Income category update is unsuccessful!", "error");
</script>
@endif

@if(Session::has('softDelete_success'))
<script>
swal("Done!", "Income category deleted successfully!", "success");
</script>
@elseif(Session::has('softDelete_error'))
<script>
swal("Oops!", "Income category delete is unsuccessful!", "error");
</script>
@endif
<div class="container">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-light">
            <div class="row">
              <div class="col-md-10 card_header_text">
                All Income Category
              </div>
              <div class="col-md-2 card_header_for_one_button">
              </div>
            </div>
          </div>
          <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Category Remarks</th>
                  <th>Manage</th>
                </tr>
              </thead>
              <tbody>
                @foreach($all as $data)
                <tr>
                  <td>{{$data->incate_name}}</td>
                  <td>{{$data->incate_remarks}}</td>
                  <td>
                    <a href="{{url('admin/income/category/view/'.$data->incate_slug)}}"><i class="fas fa-plus-square"></i></a>
                    <a href="{{url('admin/income/category/edit/'.$data->incate_slug)}}"><i class="fas fa-edit"></i></a>
                    <!-- <a id="softDelete" data-toggle="modal" data-target="#mySoftDelete" data-id="{{$data->incate_id}}" href="#"><i class="fas fa-trash-alt"></i></a> -->
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          </div>
          <div class="card-footer text-muted">

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="mySoftDelete" tabindex="-1" aria-labelledby="mySoftDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="{{url('admin/income/category/softdelete')}}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="mySoftDeleteLabel">Confirm Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete?
          <input type="hidden" id="modal_id" name="modal_id">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Confirm</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
