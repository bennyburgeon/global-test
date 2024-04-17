
@extends('candidate.layout.layout')
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
    <form action="{{route('candidate.update',$candidate->id)}}" method="post" enctype="multipart/form-data" >
    @csrf 
     @method('PUT')
                        <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Name</label>
                            <input class="form-control"  value="{{ $candidate->name  }}" type="text" id="name"  name="name" placeholder="Name" autofocus />
                            @error('name')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Email</label>
                            <input class="form-control" value="{{ $candidate->email  }}" type="email" id="email"  name="email" placeholder="Email" autofocus />
                            @error('email')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                          
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="Treatment" class="form-label">Phone</label>
                                <input class="form-control" value="{{ $candidate->phone  }}" type="number" id="phone" name="phone" placeholder="Phone" />
                                @error('phone')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                            </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Experience(in Years)</label>
                            <input class="form-control" type="number" value="{{ $candidate->experience  }}" id="experience" name="experience" placeholder="Experience"  />
                            @error('experience')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="Treatment" class="form-label">Notice Period (in Days)</label>
                                <input class="form-control" value="{{ $candidate->notice_period  }}" type="number" id="notice_period" name="notice_period" placeholder="Notice Period" />
                                @error('notice_period')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                            </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Skills           (add skills with "," seperation)</label>
                            <input class="form-control"  value="{{ $candidate->all_skills  }}" type="text"id="skills" name="skills" placeholder="Skills"  />
                            @error('skills')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label for="Treatment" class="form-label">City</label>
                                    <select  name="city_id[]" multiple="multiple" class="form-control city_select" id="city_id[]">
                                    @foreach($cities as $city)
                                    <option @if(in_array($city->id,$locations_array) ) selected=selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
                                  @endforeach
                                  </select>
                                    @error('city_id')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                                </div>
                                </div>
                            </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Resume</label>
                            <input class="form-control" type="file" id="resume" name="resume" placeholder="Resume"  />
                            <a target="blank" href="{{ asset('files/resume') }}/{{ $candidate->resume }}">view resume </a>
                          </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="Treatment" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="photo" name="photo" placeholder="Photo" />
                                <img src="{{ asset('files/image') }}/{{ $candidate->photo }}" width="50" height="50">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="mb-3 col-md-6"></div>
                            <div class="mb-3 col-md-6">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
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