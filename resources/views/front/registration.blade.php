@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-3">
        <div class="container py-5">
            <div class="py-lg-2">&nbsp;</div>
            <div class="col-lg-12">
                <div class="card border-0 shadow mb-4 ">
                    <div class="card-body card-form p-4">
                        <h3 class="fs-4 mb-1">User Registration</h3>
                        <form action="" id="registrationForm" name="registrationForm">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Name<span class="req">*</span></label>
                                <input type="text" placeholder="Enter Name" id="name" name="name" class="form-control">
                                <p></p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="" class="mb-2">Email<span class="req">*</span></label>
                                <input type="email" placeholder="Enter Email" id="email" name="email"
                                    class="form-control">
                                <p></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6  mb-4">
                                <label for="" class="mb-2">Contact<span class="req">*</span></label>
                                <input type="tel" placeholder="Enter Contact No " id="contact_no" name="contact_no"
                                    class="form-control">
                                <p></p>
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2">Password</label>
                                <input type="password" placeholder="Enter Password" id="password" name="password"
                                    class="form-control">
                                <p></p>
                            </div>
                        </div>
                            <div class="mb-4 col-md-6">
                                <label for="" class="mb-2"> Confirm Password</label>
                                <input type="password" placeholder="Please Confirm Password" id="c_password"
                                    name="c_password" class="form-control">
                                <p></p>
                            </div>

                            <div class="d-flex justify-content-start">
                                <button type="submit" class="btn btn-primary mx-3">Register</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
<script>
    $("#registrationForm").submit(function(e){
        e.preventDefault();

        $.ajax({
            url: '{{ route("account.registrationProcess") }}',
            type: 'POST',
            data: $("#registrationForm").serializeArray(),
            dataType: 'json',
            success: function(response){
                if(response.status == false){
                    var errors = response.errors;
                    if(errors.name){
                        $('#name').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.name)
                    } else{
                        $('#name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if(errors.email){
                        $('#email').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.email)
                    } else{
                        $('#email').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if(errors.contact_no){
                        $('#contact_no').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.contact_no)
                    } else{
                        $('#contact_no').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if(errors.password){
                        $('#password').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.password)
                    } else{
                        $('#password').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                    if(errors.c_password){
                        $('#c_password').addClass('is-invalid')
                        .siblings('p')
                        .addClass('invalid-feedback')
                        .html(errors.c_password)
                    } else{
                        $('#c_password').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')
                    }

                } else {
                    $('#name').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                    $('#email').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                    $('#contact_no').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                    $('#password').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                    $('#c_password').removeClass('is-invalid')
                        .siblings('p')
                        .removeClass('invalid-feedback')
                        .html('')

                    window.location.href = '{{ route("account.login") }}';
                }
            }
        })
    });
</script>
@endsection

