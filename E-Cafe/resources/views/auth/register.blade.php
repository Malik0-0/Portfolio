@extends('layouts.app')

@section('content')
<form id="form_register">
    <section class="vh-100 gradient-custom">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px;">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                    <form class="mx-1 mx-md-4">

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="text"  class="form-control" name="nama" id="nama">
                          <label class="form-label" for="form3Example1c">Your Name</label>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="email"  class="form-control" name="email" id="email">
                          <label class="form-label" for="form3Example3c">Your Email</label>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="number"  class="form-control" name="no_hp"  id="no_hp">
                          <label class="form-label" for="form3Example3c">Phone Number</label>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password"  class="form-control" name="password"  id="password">
                          <label class="form-label" for="form3Example4c">Password</label>
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input type="password"  class="form-control" name="password2" id="password2">
                          <label class="form-label" for="form3Example4cd">Repeat your password</label>
                        </div>
                      </div>

                      <div class="form-check d-flex justify-content-center mb-5">
                        <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                        <label class="form-check-label" for="form2Example3">
                          I agree all statements in Terms of service
                        </label>
                      </div>


                      <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                        <button type="button" id="tombol_register" onclick="auth('#tombol_register','#form_register','doregister','Sign Up','{{route('login')}}');" class="btn btn-primary btn-lg">Register</button>
                      </div>

                      <div class="form-check d-flex justify-content-center">
                        <p>Already have an account? <a href="{{route('login')}}" class="text-dark-50 fw-bold">Login</a></p>
                      </div>

                      <div class="form-check d-flex justify-content-center ">
                        <p>Go Back <a href="/home" class="text-dark-50 fw-bold">Home</a></p>
                      </div>

                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>
@endsection
