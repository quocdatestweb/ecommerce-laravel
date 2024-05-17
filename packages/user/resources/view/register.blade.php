@extends('products::layouts.app')
@section('content')


    <!-- SECTION -->
        <div class="section">
        <!-- container -->
        <div class="container">
            <div id="logreg-forms">
                <form class="form-signin" method="POST" action="{{ route('user.register') }}">
                    @csrf
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Đăng ký</h1>
                    <input name="name" type="text" id="inputFullname" class="form-control" placeholder="Full name" required="">
                    <br>
                    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="">
                    <br>
                    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                    <br>
                    <input name="password_confirmation" type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirm Password" required="">
                    <br>
                    <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Đăng ký</button>
                </form>
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
