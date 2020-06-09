@extends("BasicLayout")
@section("content")
    <div class="row" style="margin-top: 20px">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="m-t-0 header-title mb-4"><b>Quản lý Khoa</b></h4>
                    <div class="button-list">
                        <button type="button"
                                class="btn btn-primary waves-effect width-md waves-light"
                                data-toggle="modal"
                                data-target="#addNewDepartment">
                            <i class="ion ion-ios-add-circle-outline"></i> Thêm Khoa
                        </button>
                    </div>
                    <div id="addNewDepartment" class="modal" data-backdrop="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Thêm Khoa</h5>
                                </div>
                                <form action="{{route('api-create-department')}}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="modal-body text-left p-lg">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="departmentName">Tên khoa</label>
                                                    <input type="text" class="form-control"
                                                           id="departmentName"
                                                           name="departmentName"
                                                           placeholder="Nhập tên khoa" required/>
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
                            <th>Khoa</th>
                            <th>Số Sinh Viên</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td class="text-center">{{$department['id']}}</td>
                                <td>{{$department['departmentName']}}</td>
                                <td class="text-center">{{$department['studentSize']}}</td>
                                <td class="text-center">{{($department['active']) ? "Active" : "InActive"}}</td>
                                <td class="text-center">
                                    <button type="button"
                                            class="btn btn-warning waves-effect width-xs waves-light text-white"
                                            data-toggle="modal"
                                            data-target="#updateDepartment-{{$department['id']}}">
                                        <i class="ion ion-ios-create" style="font-size: 13px"></i>
                                    </button>
                                    @if($department['active'])
                                    <button type="button"
                                            class="btn btn-danger waves-effect width-xs waves-light"
                                            data-toggle="modal"
                                            data-target="#deleteDepartment-{{$department['id']}}">
                                        <i class="mdi mdi-delete-outline" style="font-size: 13px"></i>
                                    </button>
                                    @endif
                                </td>
                                <div id="deleteDepartment-{{$department['id']}}" class="modal" data-backdrop="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form name="form"
                                                  action="{{route("api-delete-department")}}"
                                                  method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="id" value="{{$department['id']}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Xóa Khoa</h5>
                                                </div>
                                                <div class="modal-body text-center p-lg">
                                                    <p>Xác nhận xóa Khoa <strong>{{ $department['departmentName'] }}</strong>
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

                                <div id="updateDepartment-{{$department['id']}}" class="modal" data-backdrop="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form name="form"
                                                  action="{{route("api-update-department")}}"
                                                  method="POST">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <input type="hidden" name="id" value="{{$department['id']}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Cập nhật thông tin Khoa</h5>
                                                </div>
                                                <div class="modal-body text-center p-lg">
                                                    <div class="modal-body text-left p-lg">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="departmentName">Tên Khoa</label>
                                                                    <input type="text" class="form-control"
                                                                           id="departmentName"
                                                                           name="departmentName"
                                                                           placeholder="{{$department['departmentName']}}"/>
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
                                                                                   type="checkbox" {{$department['active'] ? 'checked' : ''}}
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
