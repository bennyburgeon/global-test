
@extends('candidate.layout.layout')
@section('body')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
    <h5 class="card-header">Change Password</h5>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
    {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="card-body">
                      <form action="{{route('candidates.password.update')}}" method="post"  >
                      {!! csrf_field() !!}
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Old Password</label>
                            <input class="form-control" value="{{ old('old_password') }}" type="text"  id="old_password" name="old_password"  autofocus />
                            
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">New Password</label>
                            <input class="form-control" type="text"  value="{{ old('new_password') }}" id="new_password" name="new_password" />
                          </div>
                         
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Confirm Password</label>
                            <input class="form-control" type="text" value="{{ old('confirm_password') }}"  id="confirm_password" name="confirm_password"   />
                          </div>
                          
                        </div>
                        
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Search</button>
                         </div>
                      </form>
                    </div>
    
  </div>
  </div>
  @endsection
  @push('css')

  @endpush
  @push('js')
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.city_select').select2();
});
</script>
  @endpush