<x-guest-layout>
    {{-- <div class="row">
            <div class="col-md-6 m-x-auto pull-xs-none vamiddle">
                <div class="card-group ">
                    <div class="card p-a-2">
                        <div class="card-block">
                            <h1 style="text-align: center;margin-bottom: 20px;">تسجيل الدخول</h1>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group m-b-1">
                                    <div class="input-group-addon"><i class="icon-user"></i>
                                    </div>
                                    <input id="email" type="email" name="email" :value="old('email')" required
                                        autofocus class="form-control en" placeholder="اكنب البريد الالكتروني للمستخدم" />
                                    @error('email')
                                        <span class="help-block text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group m-b-2">
                                    <span class="input-group-addon"><i class="icon-lock"></i>
                                    </span>
                                    <input type="password" name="password" id="password" required
                                        autocomplete="current-password" class="form-control en"
                                        placeholder="اكتب كلمة المرور الان">
                                    @error('password')
                                        <span class="help-block text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Remember Me -->
                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                            name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('تذكرني') }}</span>
                                    </label>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <button type="submit" class="btn btn-primary p-x-2">
                                            <i class="icon-login"></i>
                                            دخول الان </button>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <div class="col-xs-6 text-xs-right">
                                            <a href="{{ route('password.request') }}" class="btn btn-link p-x-0">نسيت كلمة
                                                المرور ؟ </a>
                                        </div>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div> --}}
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-12">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">تسجيل الدخول</h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                        <div class="input-group custom">
                            <input id="email" type="email" name="email" :value="old('email')" required autofocus
                                class="form-control form-control-lg" placeholder="اكنب البريد الالكتروني للمستخدم">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-email1"></i></span>
                            </div>
                        </div>
                        @error('email')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div>
                        <div class="input-group custom">
                            <input type="password" name="password" id="password" required
                                autocomplete="current-password" class="form-control form-control-lg"
                                placeholder="اكتب كلمة المرور الان">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                            @error('password')
                                <span class="help-block text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                        <div class="row pb-30">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                                    <label class="custom-control-label" for="remember_me">تذكرني</label>
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="col-6">
                                    <div class="forgot-password"><a href="{{ route('password.request') }}">
                                            نسيت كلمة المرور ؟
                                        </a>
                                    </div>
                                </div>
                            @endif
                            {{-- <div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div> --}}
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">

                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="تسجيل الدخول">


                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
