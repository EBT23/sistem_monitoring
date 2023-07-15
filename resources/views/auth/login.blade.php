@extends('auth.base_auth')
@section('content')
<div class="wrapper">
   <section class="login-content">
      <div class="row m-0 align-items-center bg-white vh-100">
         @if(session('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
         @endif
         <div class="col-md-6">
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                     <div class="card-body">
                        <a href="/" class="navbar-brand align-items-center mb-3">
                           <!--Logo start-->
                           <!--logo End-->
                           <!--Logo start-->
                           <div class="logo-main" style="align-content: center" align="center">
                              <div class="logo-normal">
                                 <img src="{{ asset('assets/images/logo-kalteng.png') }}" width="80" height="90" alt=""
                                    srcset="">
                              </div>
                              <div class="logo-mini text-center">
                                 <img src="{{ asset('assets/images/logo-kalteng.png') }}" width="80" height="90" alt=""
                                    srcset="">
                              </div>
                           </div>
                           <!--logo End-->
                        </a>
                        <h2 class="mb-2 text-center">Welcome Back</h2>
                        <p class="text-center">SISTEM INFORMASI MONITORING KOMODITAS.</p>
                        <form action="{{ route('login.action') }}" method="POST">
                           @csrf
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                       aria-describedby="email" placeholder=" ">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                       aria-describedby="password" placeholder=" ">
                                 </div>
                              </div>
                           </div>
                           <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary">Sign In</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sign-bg">
               <svg width="280" height="230" viewBox="0 0 431 398" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g opacity="0.05">
                     <rect x="-157.085" y="193.773" width="543" height="77.5714" rx="38.7857"
                        transform="rotate(-45 -157.085 193.773)" fill="#3B8AFF" />
                     <rect x="7.46875" y="358.327" width="543" height="77.5714" rx="38.7857"
                        transform="rotate(-45 7.46875 358.327)" fill="#3B8AFF" />
                     <rect x="61.9355" y="138.545" width="310.286" height="77.5714" rx="38.7857"
                        transform="rotate(45 61.9355 138.545)" fill="#3B8AFF" />
                     <rect x="62.3154" y="-190.173" width="543" height="77.5714" rx="38.7857"
                        transform="rotate(45 62.3154 -190.173)" fill="#3B8AFF" />
                  </g>
               </svg>
            </div>
         </div>
         <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
            <img src="../../assets/images/auth/01.png" class="img-fluid gradient-main animated-scaleX" alt="images">
         </div>
      </div>
   </section>
</div>
@endsection