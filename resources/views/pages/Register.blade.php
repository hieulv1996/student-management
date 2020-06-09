@extends("Security")
@section("security")
    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-header text-center p-4 bg-primary">
                            <h4 class="text-white mb-0 mt-0">Quản lý Sinh Viên</h4>
                            <h5 class="text-white font-13 mb-0">Đăng ký tài khoản</h5>
                        </div>
                        <div class="card-body">
                            <form action="#" class="p-2">
                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email :</label>
                                    <input class="form-control"
                                           type="email" id="emailaddress"
                                           required=""
                                           placeholder="john@deo.com">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="username">Họ tên :</label>
                                    <input class="form-control"
                                           type="text"
                                           id="username"
                                           required=""
                                           placeholder="john deo">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Mật khẩu :</label>
                                    <input class="form-control"
                                           type="password"
                                           id="password"
                                           required=""
                                           placeholder="Enter your password">
                                </div>

                                <div class="form-group text-right mt-4 mb-4">
                                    <div class="col-12">
                                        <button class="btn btn-md btn-primary waves-effect waves-light"
                                                type="submit">
                                            Đăng Ký
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-sm-12 text-center">
                                        <a href="{{route("login")}}">Đã có tài khoản ?</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <!-- end row -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection
