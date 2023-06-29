@extends('layout-customers.app')
@section('title', 'Sparepart - Home')

@section('content')
<!-- page banner area start -->
<div class="page-banner">
    <img src="{{ asset('assets/img/bg3.png') }}" alt="Page Banner" />
</div>
<!-- page banner area end -->
<!-- my account page content section start -->
<section class="account-page section-padding">
    <div class="container">
        <div class="account-title">
            <h3>My Account</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="single-check m-bottom50">
                    <div class="row">
                        <form action="{{ route('user.update',$user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="single-input clearfix">
                                <div class="col-xs-12">
                                    <div class="check-title">
                                        <h3>Your personal information</h3>
                                        <p>Please be sure to update your personal information if it has changed</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <label>Your Full Name:</label>
                                    <div class="input-text" style="margin-bottom: 20px;">
                                        <input type="text" name="name" value="{{ $user->name }}" style="margin:0 !important" required />
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <label>Email:</label>
                                    <div class="input-text" style="margin-bottom: 20px;">
                                        <input type="text" name="email" value="{{ $user->email }}" readonly style="margin:0 !important" required />
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <label>New Password:</label>
                                    <div class="input-text" style="margin-bottom: 20px;">
                                        <input type="password" name="password" style="margin:0 !important" required />
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <label>Confirmation:</label>
                                    <div class="input-text" style="margin-bottom: 20px;">
                                        <input type="password" name="password_confirmation" style="margin:0 !important" required />
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="submit-text">
                                        <input type="hidden" name="role" value="customer" />
                                        
                                        <input type="submit" name="submit" value="Save">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- my account page content section end -->
@endsection