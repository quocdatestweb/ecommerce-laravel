@extends('products::layouts.app')
@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <div id="logreg-forms">

                @if ($err!="")
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        {{ $err}}
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        {{ Session::get('error') }}
                    </div>
                @endif
                

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> success!</h4>
                        {{ Session::get('success') }}
                    </div>
                @endif


                <form action="{{ route('user.logins') }}" class="form-signin" method="POST">
                    @csrf
                    <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">Đăng nhập</h1>
                
                    <div class="form-group">
                        <input name="email" type="email" value="{{ old('email') }}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address">
                
                        @error('email')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                
                    <div class="form-group">
                        <input name="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                
                        @error('password')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                
                    <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Đăng nhập</button>
                </form>
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
