@extends("Security")
@section("security")
    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-header p-4 bg-primary">
                            <h4 class="text-white text-center mb-0 mt-0">Quản lý Sinh Viên</h4>
                        </div>
                        <div class="card-body">
                            @if(session('alert'))
                                <div style="margin-top: 5%" class="alert alert-danger">
                                    <strong>Thông báo: </strong> {{session('alert')}}
                                </div>
                            @endif
                            <form name="form"
                                  action="{{route("api-login")}}"
                                  method="POST"
                                  class="p-2">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email :</label>
                                    <input class="form-control"
                                           type="text"
                                           id="emailaddress"
                                           name="email"
                                           required
                                           placeholder="Nhập địa chỉ email" />
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Mật khẩu :</label>
                                    <input class="form-control"
                                           type="password"
                                           name="password"
                                           required
                                           id="password"
                                           placeholder="Nhập mật khẩu" />
                                </div>

                                <div class="form-group mb-4">
                                    <div class="checkbox checkbox-success">
                                        <input id="remember" type="checkbox" checked="">
                                        <label for="remember">
                                            Ghi nhớ đăng nhập
                                        </label>
                                        <a href="pages-recoverpw.html"
                                           class="text-muted float-right">
                                            Quên mật khẩu ?
                                        </a>
                                    </div>
                                </div>

                                <div class="form-group row text-center mt-4 mb-4">
                                    <div class="col-12">
                                        <button class="btn btn-md btn-block btn-primary waves-effect waves-light"
                                                type="submit">Đăng Nhập
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-sm-12 text-center">
                                        <p class="text-muted mb-0">
                                            Chưa có tài khoản? <a href="{{route("register")}}"
                                                                  class="text-dark m-l-5">
                                                <b>Đăng Ký</b>
                                            </a>
                                        </p>
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
