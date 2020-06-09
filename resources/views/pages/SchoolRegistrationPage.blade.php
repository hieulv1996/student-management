@extends("PublicLayout")
@section("content")
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-4">THÔNG TIN HỒ SƠ</h4>
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputFullName" class="col-form-label">Họ tên</label>
                                            <input type="text" class="form-control" id="inputFullName"
                                                   required
                                                   name="fullname"
                                                   placeholder="Nhập họ và tên">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputGender" class="col-form-label">Giới tính</label>
                                            <select id="inputGender" class="form-control" name="gender" required>
                                                <option>Chọn</option>
                                                <option value="Nam">Nam</option>
                                                <option value="Nữ">Nữ</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputDOB" class="col-form-label">Ngày sinh</label>
                                            <input type="date" class="form-control" id="inputDOB"
                                                   required
                                                   name="dob"
                                                   placeholder="Nhập ngày sinh">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPeople" class="col-form-label">Dân tộc</label>
                                            <input type="text" class="form-control" id="inputPeople"
                                                   required
                                                   name="people"
                                                   placeholder="Nhập dân tộc">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputReligion" class="col-form-label">Tôn giáo</label>
                                            <input type="text" class="form-control" id="inputReligion"
                                                   required
                                                   name="religion"
                                                   placeholder="Nhập tôn giáo">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPlaceOfBirth" class="col-form-label">Nơi sinh</label>
                                            <select id="inputPlaceOfBirth" class="form-control" name="placeOfBirth" required>
                                                <option>Chọn</option>
                                                @foreach($locations as $location)
                                                <option value="{{$location}}">{{$location}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputGraduationYear" class="col-form-label">Năm tốt nghiệp</label>
                                            <select id="inputGraduationYear" class="form-control" name="gender" required>
                                                @for($yearNow = date("Y"); $yearNow >= date("Y") - 20; --$yearNow )
                                                <option value="{{$yearNow}}">{{$yearNow}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputHocLuc" class="col-form-label">Học lực lớp 12</label>
                                            <select id="inputHocLuc" class="form-control" name="hocLuc" required>
                                                <option>Chọn</option>
                                                <option>Giỏi</option>
                                                <option>Khá</option>
                                                <option>Trung bình</option>
                                                <option>Yếu</option>
                                                <option>Kém</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputHanhKiem" class="col-form-label">Hạnh kiểm lớp 12</label>
                                            <select id="inputHanhKiem" class="form-control" name="hanhKiem" required>
                                                <option>Chọn</option>
                                                <option>Tốt</option>
                                                <option>Khá</option>
                                                <option>Trung bình</option>
                                                <option>Yếu</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputAddress" class="col-form-label">Hộ khẩu thường trú</label>
                                        <input type="text" class="form-control" id="inputAddress"
                                               placeholder="Nhập hộ khẩu thường trú">
                                        <p>Ghi rõ tên tỉnh (thành phố), huyện (quận), xã (phường) vào ô hộ khẩu thường trú.</p>
                                    </div>

                                    <p><strong>Nơi học THPT hoặc tương đương (ghi tên trường và nơi trường đóng: huyện (quận), tỉnh (thành phố)):</strong></p>


                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label class="col-form-label"><h5>Năm lớp 10</h5></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="inputAddress" class="col-form-label">Tên tỉnh/TP</label>
                                            <select id="inputPlaceOfBirth" class="form-control" name="placeOfBirth" required>
                                                <option>Chọn</option>
                                                @foreach($locations as $location)
                                                    <option value="{{$location}}">{{$location}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="inputLocationCode" class="col-form-label">Mã tỉnh/TP</label>
                                            <input type="text" class="form-control" id="inputLocationCode" disabled />
                                        </div>

                                        <div class="col-md-3">
                                            <label for="inputSchool" class="col-form-label">Tên trường</label>
                                            <input type="text" class="form-control" id="inputSchool" placeholder="Nhập tên trường" />
                                        </div>

                                        <div class="col-md-3">
                                            <label for="inputSchoolCode" class="col-form-label">Mã trường</label>
                                            <input type="text" class="form-control" id="inputSchoolCode" disabled />
                                        </div>
                                    </div>

{{--                                    <div class="form-row">--}}
{{--                                        <div class="form-group col-md-6">--}}
{{--                                            <label for="inputEmail4" class="col-form-label">Email</label>--}}
{{--                                            <input type="email" class="form-control" id="inputEmail4"--}}
{{--                                                   placeholder="Email">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-6">--}}
{{--                                            <label for="inputPassword4" class="col-form-label">Password</label>--}}
{{--                                            <input type="password" class="form-control" id="inputPassword4"--}}
{{--                                                   placeholder="Password">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="inputAddress" class="col-form-label">Address</label>--}}
{{--                                        <input type="text" class="form-control" id="inputAddress"--}}
{{--                                               placeholder="1234 Main St">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="inputAddress2" class="col-form-label">Address 2</label>--}}
{{--                                        <input type="text" class="form-control" id="inputAddress2"--}}
{{--                                               placeholder="Apartment, studio, or floor">--}}
{{--                                    </div>--}}
{{--                                    <div class="form-row">--}}
{{--                                        <div class="form-group col-md-6">--}}
{{--                                            <label for="inputCity" class="col-form-label">City</label>--}}
{{--                                            <input type="text" class="form-control" id="inputCity">--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-4">--}}
{{--                                            <label for="inputState" class="col-form-label">State</label>--}}
{{--                                            <select id="inputState" class="form-control">--}}
{{--                                                <option>California</option>--}}
{{--                                                <option>Nevada</option>--}}
{{--                                                <option>Texas</option>--}}
{{--                                                <option>New york</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group col-md-2">--}}
{{--                                            <label for="inputZip" class="col-form-label">Zip</label>--}}
{{--                                            <input type="text" class="form-control" id="inputZip">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div class="form-check">--}}
{{--                                            <label class="form-check-label">--}}
{{--                                                <input class="form-check-input" type="checkbox"> Check me out--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <button type="submit" class="btn btn-primary">Sign in</button>
                                </form>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
