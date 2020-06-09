@extends("BasicLayout")
@section("content")
    <div class="row" style="margin-top: 20px">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="m-t-0 header-title mb-4"><b>Quản lý Ngành Học</b></h4>
                    <div class="button-list">
                        <button type="button"
                                class="btn btn-primary waves-effect width-md waves-light"
                                data-toggle="modal"
                                data-target="#addNewMajor">
                            <i class="ion ion-ios-add-circle-outline"></i> Thêm Ngành học
                        </button>
                    </div>
                    <div id="addNewMajor" class="modal" data-backdrop="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Thêm Ngành học</h5>
                                </div>
                                <form action="{{route('api-create-major')}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="modal-body text-left p-lg">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="majorCode">Mã Ngành</label>
                                                    <input type="text" class="form-control"
                                                           id="majorCode"
                                                           name="majorCode"
                                                           placeholder="Nhập mã Ngành" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="majorName">Tên Ngành</label>
                                                    <input type="text" class="form-control"
                                                           id="majorName"
                                                           name="majorName"
                                                           placeholder="Nhập tên Ngành" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="departmentId">Khoa</label>
                                                    <select class="form-control input-c" id="departmentId" name="departmentId" >
                                                        @foreach($departments as $department)
                                                            <option value="{{$department->id}}">{{$department->departmentName}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="majorTimeTraining">Năm đào tạo</label>
                                                    <select class="form-control input-c" id="majorTimeTraining" name="majorTimeTraining" >
                                                        @for($i = 3; $i <= 5; $i++)
                                                            <option value="{{$i }}">{{$i}} năm</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="majorCostPerCredit">Giá tín chỉ</label>
                                                    <input type="text" class="form-control"
                                                           id="majorCostPerCredit"
                                                           name="majorCostPerCredit"
                                                           placeholder="Nhập giá tín chỉ" required/>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="switchery-demo">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <label for="active">Active </label>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input id="active" name="active"
                                                                   type="checkbox" checked=""
                                                                   data-plugin="switchery" data-color="#64b0f2"
                                                                   data-size="small" />
                                                        </div>
                                                    </div>
                                                </div>
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
                                                class="btn btn-primary waves-effect waves-light text-white">
                                            Thêm
                                        </button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="m-t-0 header-title mb-4"><b>Danh sách Khoa</b></h4>
                    <table id="datatable-buttons"
                           class="table table-striped table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Ngành</th>
                            <th>Khoa</th>
                            <th>Thời gian đào tạo</th>
                            <th>Số Sinh Viên</th>
                            <th>Giá tín chỉ</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($majors as $major)
                            <tr>
                                <td class="text-center">{{$major['majorCode']}}</td>
                                <td>{{$major['majorName']}}</td>
                                <td>{{$major['departmentName']}}</td>
                                <td class="text-center">{{$major['majorTimeTraining']}} năm</td>
                                <td class="text-center">{{$major['studentSize']}}</td>
                                <td class="text-center">{{$major['majorCostPerCredit']}} đ</td>
                                <td class="text-center">{{($major['active']) ? "Active" : "InActive"}}</td>
                                <td class="text-center">
                                    <button type="button"
                                            class="btn btn-warning waves-effect width-xs waves-light text-white"
                                            data-toggle="modal"
                                            data-target="#updateMajor-{{$major['id']}}">
                                        <i class="ion ion-ios-create" style="font-size: 13px"></i>
                                    </button>
                                    @if($major['active'])
                                        <button type="button"
                                                class="btn btn-danger waves-effect width-xs waves-light"
                                                data-toggle="modal"
                                                data-target="#deleteMajor-{{$major['id']}}">
                                            <i class="mdi mdi-delete-outline" style="font-size: 13px"></i>
                                        </button>
                                    @endif
                                </td>
                                <div id="deleteMajor-{{$major['id']}}" class="modal" data-backdrop="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form name="form"
                                                  action="{{route("api-delete-major")}}"
                                                  method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="id" value="{{$major['id']}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Xóa Khoa</h5>
                                                </div>
                                                <div class="modal-body text-center p-lg">
                                                    <p>Xác nhận xóa Ngành <strong>{{ $major['majorName'] }}</strong>
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

                                <div id="updateMajor-{{$major['id']}}" class="modal" data-backdrop="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form name="form"
                                                  action="{{route("api-update-major")}}"
                                                  method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="id" value="{{$major['id']}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Cập nhật thông tin Ngành</h5>
                                                </div>
                                                <div class="modal-body text-center p-lg">
                                                    <div class="modal-body text-left p-lg">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="majorCode">Mã Ngành</label>
                                                                    <input type="text" class="form-control"
                                                                           id="majorCode"
                                                                           name="majorCode"
                                                                           placeholder="{{$major['majorCode']}}" disabled />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="majorName">Tên Ngành</label>
                                                                    <input type="text" class="form-control"
                                                                           id="majorName"
                                                                           name="majorName"
                                                                           placeholder="{{$major['majorName']}}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="departmentId">Khoa</label>
                                                                    <select class="form-control input-c" id="departmentId" name="departmentId" >
                                                                        @foreach($departments as $department)
                                                                            <option {{$major['departmentId'] == $department->id ? 'selected' : ''}}
                                                                                    value="{{$department->id}}">{{$department->departmentName}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="majorTimeTraining">Năm đào tạo</label>
                                                                    <select class="form-control input-c" id="majorTimeTraining" name="majorTimeTraining" >
                                                                        @for($i = 3; $i <= 5; $i++)
                                                                            <option {{$major['majorTimeTraining'] == $i ? 'selected' : ''}}
                                                                                    value="{{$i }}">{{$i}} năm</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="majorCostPerCredit">Giá tín chỉ</label>
                                                                    <input type="text" class="form-control"
                                                                           id="majorCostPerCredit"
                                                                           name="majorCostPerCredit"
                                                                           placeholder="{{$major['majorCostPerCredit']}}" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="switchery-demo">
                                                                    <div class="form-group row">
                                                                        <div class="col-md-4">
                                                                            <label for="active">Active </label>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input id="active" name="active"
                                                                                   type="checkbox" {{$major['active'] ? 'checked' : ''}}
                                                                                   data-plugin="switchery" data-color="#64b0f2"
                                                                                   data-size="small" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                buttons: ["excel"],
                "pageLength": 10,
                "search": {
                    "caseInsensitive": true
                }
            });
            $("#key-datatable").DataTable({keys: !0}), $("#selection-datatable").DataTable({select: {style: "multi"}}), a.buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
        });
    </script>
@endpush
