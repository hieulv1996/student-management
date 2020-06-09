@extends("BasicLayout")
@section("content")
    <div class="row" style="margin-top: 20px">
        @include("components.StudentManagementHead", ['departments' => $departments, 'majors' => $majors])
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="m-t-0 header-title mb-4"><b>Danh sách Sinh Viên</b></h4>

                    <table id="datatable-buttons"
                           class="table table-striped table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr class="text-center">
                            <th>MSSV</th>
                            <th>Họ Tên</th>
                            <th>Lớp</th>
                            <th>Khoa</th>
                            <th>Giới tính</th>
                            <th>Số ĐT</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">{{$user->userId}}</td>
                                <td>{{$user->fullName}}</td>
                                <td class="text-center">{{$user->classCode}}</td>
                                <td></td>
                                <td class="text-center">{{($user->gender) ? "Nam" : "Nữ"}}</td>
                                <td class="text-right">{{$user->phoneNumber}}</td>
                                <td class="text-center">
                                    <button type="button"
                                            class="btn btn-warning waves-effect width-xs waves-light text-white"
                                            data-toggle="modal"
                                            data-target="#updateStudent-{{$user->userId}}">
                                        <i class="mdi mdi-account-edit" style="font-size: 15px"></i>
                                    </button>

                                    <button type="button"
                                            class="btn btn-danger waves-effect width-xs waves-light"
                                            data-toggle="modal"
                                            data-target="#deleteStudent-{{$user->userId}}">
                                        <i class="mdi mdi-delete-outline" style="font-size: 15px"></i>
                                    </button>
                                </td>
                                <div id="deleteStudent-{{$user->userId}}" class="modal" data-backdrop="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form name="form"
                                                  action="{{route("api-delete-student")}}"
                                                  method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Xóa Sinh Viên</h5>
                                                </div>
                                                <div class="modal-body text-center p-lg">
                                                    <p>Xác nhận xóa Sinh Viên <strong>{{ $user->fullName }}</strong>
                                                        ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                            class="btn btn-secondary waves-effect"
                                                            data-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-danger waves-effect waves-light">
                                                        Xóa
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div>
                                </div>

                                <div id="updateStudent-{{$user->userId}}" class="modal" data-backdrop="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form name="form"
                                                  action="{{route("api-update-student")}}"
                                                  method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Cập nhật thông tin Sinh Viên</h5>
                                                </div>
                                                <div class="modal-body text-center p-lg">
                                                    <div class="modal-body text-left p-lg">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="fullName">Họ Tên</label>
                                                                    <input type="text" class="form-control"
                                                                           id="fullName"
                                                                           name="fullName"
                                                                           placeholder="{{$user->fullName}}"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="phone">Số điện thoại</label>
                                                                    <input type="text" class="form-control"
                                                                           id="phone"
                                                                           name="phone"
                                                                           placeholder="{{$user->phoneNumber}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="dob">Ngày Sinh</label>
                                                                    <input type="date"
                                                                           class="form-control"
                                                                           id="dob"
                                                                           name="dob"
                                                                           value="{{$user->dob}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="gender">Giới tính</label>
                                                                    <select class="form-control input-c" id="gender" name="gender" >
                                                                        <option {{$user->gender ? 'selected' : ''}} value="true">Nam</option>
                                                                        <option {{!$user->gender ? 'selected' : ''}} value="false">Nữ</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="identityCard">CMND</label>
                                                                    <input type="text" class="form-control"
                                                                           id="identityCard"
                                                                           name="identityCard"
                                                                           placeholder="{{$user->identityCard}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="classCode">Lớp</label>
                                                                    <input type="text" class="form-control"
                                                                           id="classCode"
                                                                           name="classCode"
                                                                           placeholder="{{$user->classCode}}">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="department">Khoa</label>
                                                                    <input type="text" class="form-control"
                                                                           id="department"
                                                                           name="department"
                                                                           placeholder="Nhập Khoa">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="permanentAddress">Địa chỉ thường trú</label>
                                                            <textarea id = "permanentAddress"
                                                                      name="permanentAddress"
                                                                      class="form-control"
                                                                      placeholder="{{$user->permanentAddress}}" ></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="temporaryAddress">Địa chỉ tạm trú</label>
                                                            <textarea id = "temporaryAddress"
                                                                      name="temporaryAddress"
                                                                      class="form-control"
                                                                      placeholder="{{$user->temporaryAddress}}" ></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="image">Ảnh</label>
                                                            <input name="image" type="file" id="image" class="form-control" accept="image/*">
                                                            <p class="help-block">Chỉ chấp nhận các tệp định dạng ảnh.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button"
                                                            class="btn btn-secondary waves-effect"
                                                            data-dismiss="modal">
                                                        Hủy
                                                    </button>
                                                    <button type="submit"
                                                            class="btn btn-warning waves-effect waves-light text-white">
                                                        Cập nhật
                                                    </button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
@if(session('alert'))
    @if(session('alert') == 'success')
        @push('scripts')
            <script !src="">
                $(document).ready(function () {
                    toastr["success"]("Thao tác thành công !");
                });
            </script>
        @endpush
    @else
        @push('scripts')
            <script !src="">
                $(document).ready(function () {
                    toastr["error"]("Thao tác thất bại !")
                });

            </script>
        @endpush
    @endif
@endif
@push('scripts')
    <script !src="">
        $(document).ready(function () {
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            $("#datatable").DataTable();
            let a = $("#datatable-buttons").DataTable({
                lengthChange: !1,
                buttons: ["copy", "excel", "pdf"],
                "pageLength": 10,
            });
            $("#key-datatable").DataTable({keys: !0}), $("#selection-datatable").DataTable({select: {style: "multi"}}), a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
        });
    </script>
@endpush
