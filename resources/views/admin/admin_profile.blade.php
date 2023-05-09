@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">

        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="rounded card">
                    <div class="card-body">
                        <div class="mb-2 d-flex align-items-center justify-content-between">
                            <div>
                                <img width="100" height="100" class="rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/demo.png')}}" alt="profile">
                                <span class="h4 ms-3 text-light">{{ $profileData->username }}</span>
                              </div>
                        </div>
                        <div class="mt-3">
                            <label class="mb-0 tx-11 fw-bolder text-uppercase">Name:</label>
                            <p class="text-muted">{{ $profileData->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="mb-0 tx-11 fw-bolder text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="mb-0 tx-11 fw-bolder text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData->phone }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="mb-0 tx-11 fw-bolder text-uppercase">Address:</label>
                            <p class="text-muted">{{ $profileData->address }}</p>
                        </div>
                        <div class="mt-3 d-flex social-links">
                            <a href="javascript:;" class="border btn btn-icon btn-xs me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-github">
                                    <path
                                        d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                    </path>
                                </svg>
                            </a>
                            <a href="javascript:;" class="border btn btn-icon btn-xs me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter">
                                    <path
                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                    </path>
                                </svg>
                            </a>
                            <a href="javascript:;" class="border btn btn-icon btn-xs me-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram">
                                    <rect x="2" y="2" width="20" height="20" rx="5"
                                        ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- left wrapper end -->
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">

                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Update Profile</h6>

                        <form class="forms-sample" method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" autocomplete="off"
                                    value="{{ $profileData->username }}">
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $profileData->name }}">
                            </div>
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $profileData->email }}">
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $profileData->phone }}">
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $profileData->address }}">
                            </div>

                            <div class="mb-3">
                                <label for="photo" class="form-label">Upload Photo</label>
                                <input class="form-control" type="file" id="photo" name="photo">
                            </div>

                            <div class="mb-3">
                                <img width="70" height="70" class="rounded-circle" src="{{ (!empty($profileData->photo)) ? url('upload/admin_images/'.$profileData->photo) : url('upload/demo.png')}}" alt="profile" id="imgPreview"> 
                            </div>
                            
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- middle wrapper end -->

        </div>

    </div>

    <script>
        $(document).ready(() => {
            $("#photo").change(function () {
                const file = this.files[0];
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $("#imgPreview").attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
            });
        });
    </script>
@endsection
