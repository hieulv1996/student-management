<div class="col-12">
    <div class="card">
        <div class="card-body table-responsive">
            <h4 class="m-t-0 header-title mb-4"><b>Quản lý Sinh Viên</b></h4>
            <div class="button-list">
                <button type="button"
                        class="btn btn-primary waves-effect width-md waves-light"
                        data-toggle="modal"
                        data-target="#addNewStudent">
                    <i class="ion ion-ios-add-circle-outline"></i> Thêm Sinh Viên
                </button>
            </div>
        </div>
    </div>
</div>

<div id="addNewStudent" class="modal" data-backdrop="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Thêm Sinh Viên</h5>
            </div>
            <form action="{{route('api-post-student')}}" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="modal-body text-left p-lg">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="fullName">Họ Tên</label>
                                <input type="text" class="form-control"
                                       id="fullName"
                                       name="fullName"
                                       placeholder="Nhập họ tên Sinh Viên" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control"
                                       id="phone"
                                       name="phone"
                                       placeholder="Nhập số điện thoại" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="dob">Ngày Sinh</label>
                                <input type="date"
                                       class="form-control"
                                       id="dob"
                                       name="dob"
                                       placeholder="Nhập ngày sinh" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Giới tính</label>
                                <select class="form-control input-c" id="gender" name="gender" required>
                                    <option value="true">Nam</option>
                                    <option value="false">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="identityCard">CMND</label>
                                <input type="text" class="form-control"
                                       id="identityCard"
                                       name="identityCard"
                                       placeholder="Nhập CMND" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="classCode">Lớp</label>
                                <input type="text" class="form-control"
                                       id="classCode"
                                       name="classCode"
                                       placeholder="Nhập lớp" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="department">Khoa</label>
                                <select class="form-control input-c" id="department" name="department" required >
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->departmentName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="major">Ngành học</label>
                                <select class="form-control input-c" id="major" name="major" required>
                                    @foreach($majors as $major)
                                        <option value="{{$major->id}}">{{$major->majorName}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="yearNum">Khóa</label>
                                <input type="text" class="form-control"
                                       id="yearNum"
                                       name="yearNum"
                                       placeholder="Nhập khóa" required />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="permanentAddress">Địa chỉ thường trú</label>
                        <textarea id="permanentAddress"
                                  name="permanentAddress"
                                  class="form-control"
                                  placeholder="Nhập địa chỉ thường trú"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="temporaryAddress">Địa chỉ tạm trú</label>
                        <textarea id="temporaryAddress"
                                  name="temporaryAddress"
                                  class="form-control"
                                  placeholder="Nhập địa chỉ tạm trú"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        <p class="help-block">Chỉ chấp nhận các tệp định dạng ảnh.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary waves-effect"
                            data-dismiss="modal">
                        Hủy
                    </button>
                    <button type="submit"
                            class="btn btn-primary waves-effect waves-light text-white">
                        Thêm
                    </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>
