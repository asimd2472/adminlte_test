@extends('user.layouts.user')

@section('content')

<div class="app-content-header">
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
        <h3 class="mb-0">Profile</h3>
        </div>
    </div>
    </div>
</div>

<div class="app-content">
          <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Profile Details</h3>
                    </div>
                    <form method="post" id="userProfileUpdateForm" action="{{route('user.update_profile')}}" class="needs-validation mt-4" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="admin-imgupload">
                                <div class="admin-imgupload-edit">
                                    <input type="file" name="profile_image" id="imgUpload" accept=".jpg, .jpeg, .png">
                                    <label for="imgUpload"></label>
                                </div>
                                <div class="admin-img-preview">
                                    @if ($user_details->profile_image!='')
                                        <div id="imagePreview" style="background-image: url('{{asset('storage/images/'.$user_details->profile_image)}}');"></div>
                                    @else
                                        <div id="imagePreview" style="background-image: url('{{ Vite::asset('resources/images/profile-image.png')}}');"></div>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="input1" class="form-label required">Name</label>
                                    <input type="text" class="form-control admin-input" name="name" placeholder="Name" value="{{@$user_details->name}}" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="input2" class="form-label required">Email</label>
                                    <input type="text" class="form-control admin-input" name="email" placeholder="Email" value="{{@$user_details->email}}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>
                    <form method="post" id="userChangepasswordform" action="{{route('user.change_password')}}" class="needs-validation" novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="input1" class="form-label required">Password</label>
                                    <input type="text" class="form-control admin-input" name="password" id="password" placeholder="" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="input2" class="form-label required">Confirm Password</label>
                                    <input type="text" class="form-control admin-input" name="confirm_password" placeholder="">
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@push('scripts')
<script type="module">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imgUpload").change(function() {
        readURL(this);
    });
</script>
@endpush