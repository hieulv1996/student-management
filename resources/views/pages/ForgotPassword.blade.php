@extends("Security")
@section("security")
    <!-- ############ LAYOUT START-->
    <div class="center-block w-xxl w-auto-xs p-y-md">
        <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
            <div class="m-b">
                Quên mật khẩu?
                <p class="text-xs m-t">
                    Vui lòng nhập tài khoản bạn muốn lấy lại mật khẩu.
                </p>
            </div>
            <form name="reset">
                <div class="md-form-group">
                    <input type="email" class="md-input" name="email" required/>
                    <label>Email</label>
                </div>
                <button type="submit" class="btn primary btn-block p-x-md">Gửi</button>
            </form>
        </div>
        <p id="alerts-container"></p>
        <div class="p-v-lg text-center">
            Quay lại <a href="{{asset("login")}}" class="text-primary _600">Đăng Nhập</a></div>
    </div>
    <!-- ############ LAYOUT END-->
@endsection
