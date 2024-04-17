<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-md-12">
                <div class="app-brand justify-content-center">
                <a href="" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
              </span>
                  <span class="app-brand-text demo text-body fw-bolder">Job Portal</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Welcome to Portal! 👋</h4>
              <p class="mb-4">Please Register to your account and start the adventure</p>
              <a href="{{route('login')}}" class="app-brand-link gap-2">
                  <p class="mb-4">Click to Login</p> </a>
                  <div class="card mb-4">
                   
                    <!-- Account -->
                    
                    <hr class="my-0" />
                    <div class="card-body">
                    <form action="{{route('candidate.store')}}" method="post" enctype="multipart/form-data" >
                        {!! csrf_field() !!}
                        <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Name</label>
                            <input class="form-control" type="text" id="name"  name="name" placeholder="Name" autofocus />
                            @error('name')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Email</label>
                            <input class="form-control" type="email" id="email"  name="email" placeholder="Email" autofocus />
                            @error('email')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                          
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="Treatment" class="form-label">Phone</label>
                                <input class="form-control" type="number" id="phone" name="phone" placeholder="Phone" />
                                @error('phone')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                            </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Experience(in Years)</label>
                            <input class="form-control" type="number" id="experience" name="experience" placeholder="Experience"  />
                            @error('experience')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="Treatment" class="form-label">Notice Period (in Days)</label>
                                <input class="form-control" type="number" id="notice_period" name="notice_period" placeholder="Notice Period" />
                                @error('notice_period')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                            </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Skills           (add skills with "," seperation)</label>
                            <input class="form-control" type="text"id="skills" name="skills" placeholder="Skills"  />
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
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                  @endforeach
                                  </select>
                                    @error('city_id')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                                </div>
                                </div>
                            </div>
                          <div class="mb-3 col-md-6">
                            <label for="Treatment" class="form-label">Resume</label>
                            <input class="form-control" type="file" id="resume" name="resume" placeholder="Resume"  />
                            @error('resume')<span class="error-message"role="alert">{{ $message }} </span>@enderror
                          </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="Treatment" class="form-label">Photo</label>
                                <input class="form-control" type="file" id="photo" name="photo" placeholder="Photo" />
                                @error('photo')<span class="error-message"role="alert">{{ $message }} </span>@enderror
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
                    <!-- /Account -->
                  </div>
                </div>
              </div>
            </div>

    <!-- / Content -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.country_select').select2();
    $('.state_select').select2();
    $('.city_select').select2();
});
</script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
