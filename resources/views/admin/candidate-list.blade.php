
@extends('admin.layout.layout')
@section('body')
<div class="container-xxl flex-grow-1 container-p-y">
<div class="card">
    <h5 class="card-header">Candidate List</h5>
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
                      <form action="{{route('candidates.list')}}" method="get"  >
                        
                        <div class="row">
                          <div class="mb-3 col-md-3">
                            <label for="Treatment" class="form-label">Name</label>
                            <input class="form-control" type="text" value="{{ $search_key['name'] ?? '' }}" id="name" name="name" placeholder="Name" autofocus />
                            
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="Treatment" class="form-label">Email</label>
                            <input class="form-control" type="text" value="{{ $search_key['email'] ?? '' }}" id="email" name="email" placeholder="Email" />
                          </div>
                         
                          <div class="mb-3 col-md-3">
                            <label for="Treatment" class="form-label">Min Experience</label>
                            <input class="form-control" type="text" value="{{ $search_key['min_exp'] ?? '' }}" id="min_exp" name="min_exp" placeholder="Min Experience"  />
                          </div>
                          <div class="mb-3 col-md-3">
                            <label for="Treatment" class="form-label">Max Experience</label>
                            <input class="form-control" type="text" value="{{ $search_key['max_exp'] ?? '' }}" id="max_exp" name="max_exp" placeholder="Max Experience"  />
                          </div>
                        </div>
                        <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Required Skills    (add skills with "," seperation)</label>
                            <input class="form-control" type="text" value="{{ $search_key['req_skills'] ?? '' }}" id="req_skills" name="req_skills" placeholder="Required Skills"  />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Preffered Locations</label>
                            <select  name="city_id[]" multiple="multiple" class="form-control city_select" id="city_id[]">
                                    @foreach($cities as $city)
                                    <option   @if($search_key['city_id']) @if(in_array($city->id,$search_key['city_id'])) selected @endif    @endif  value="{{ $city->id }}">{{ $city->name }}</option>
                                  @endforeach
                                  </select>
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Search</button>
                         </div>
                      </form>
                    </div>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Experience</th>
            <th>Resume</th>
            <th>Photo</th>
            <th>Notice Period</th>
            <th>Skills</th>
            <th>Location</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach($lists as $list)
            <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $list->name }} {{ $list->lastname }}</strong></td>
                <td>{{ $list->email }}</td>
                <td>{{ $list->phone }}</td>
                <td>{{ $list->experience }}</td>
                <td><a target="blank" href="{{ asset('files/resume') }}/{{ $list->resume }}">view resume </a></td>
                <td><img src="{{ asset('files/image') }}/{{ $list->photo }}" width="50" height="50"></td>
                <td>{{ $list->notice_period }}</td>
                <td>{{ $list->all_skills }}</td>
                <td>{{ $list->all_location }}</td>
                <td>
                    <a href="{{ route('candidate.edit',encrypt($list->id))}}">
                        <button type="button" class="btn btn-xs btn-outline-success"><i class="bx bx-edit me-1"></i></button>
                    </a>
                    
                    <form method="POST" action="{{ route('candidate.destroy', encrypt($list->id)) }}">
@csrf
<input name="_method" type="hidden" value="DELETE">
<button type="submit" class="btn btn-xs btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="bx bx-trash me-1"></i></button>
</form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
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