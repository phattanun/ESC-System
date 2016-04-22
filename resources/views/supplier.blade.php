@extends('masterpage')

@section('title')
    จัดการข้อมูลผู้จำหน่ายพัสดุอุปกรณ์
@endsection

@section('body-attribute')
    style ="background-color:#FCFCFC;"
@endsection

@section('contactNavToggle')
    active
@endsection

@section('bodyTitle')
    จัดการข้อมูลผู้จำหน่ายพัสดุอุปกรณ์
@endsection

@section('content')
    <section style="margin-top: -40px">
        <div class="container">
            <div class="panel panel-default">
                <div class="panel-body">

                    {{-- begin add box --}}
                    <div class="row" style="margin-bottom: 15px">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="margin-bottom-20"><b>ค้นหาข้อมูลผู้จำหน่ายพัสดุอุปกรณ์</b></label>
                            </div>
                            <div class="col-md-3">
                                <input id="nameSearch" name="nameSearch" class="form-control typeahead" placeholder="กรอกชื่อร้านค้า" type="text">
                            </div>
                            <div class="col-md-3">
                                <input id="addressSearch" name="addressSearch" class="form-control typeahead" placeholder="กรอกที่อยู่ร้านค้า" type="text">
                            </div>
                            <div class="col-md-3">
                                <input id="telSearch" name="telSearch" class="form-control typeahead" placeholder="กรอกหมายเลขโทรศัพท์ร้านค้า" type="text">
                            </div>
                            <div class="col-md-1">
                                <div class="input-group-btn" id="find-supplier-btn">
                                    <a class="btn btn-success">ค้นหา</a>
                                </div>
                            </div>
                            <div class="col-md-2 text-right">
                                <a id="add-supplier-btn" class="btn btn-3d btn-reveal btn-blue" data-toggle="modal" data-target="#addSupplierDialog">
                                    <i class="fa fa-plus"></i>
                                    <span>เพิ่มร้านค้า</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- end add box --}}

                    {{-- begin table --}}
                    <div class="table-responsive margin-bottom-30">
                        <table class="table nomargin" id="supplier-table">
                            <tr>
                                <th></th>
                                <th style="text-align:center">ชื่อร้านค้า</th>
                                <th style="text-align:center">ที่อยู่</th>
                                <th style="text-align:center">หมายเลขโทรศัพท์</th>
                                <th></th>
                            </tr>

                            {{-- begin content --}}
                            @foreach($all_supplier as $supplier)
                                <tr id="tuple-{{$supplier['supplier_id']}}">
                                    <td class="text-center">
                                        <a id="{{$supplier['supplier_id']}}" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-placement="top" title="ลบ" data-toggle="modal" data-target="#confirmDeleteDialog" onclick="prepareDelete('{{$supplier['supplier_id']}}','{{$supplier['name']}}')">
                                            <i class="fa fa-minus"></i>
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                    <td id="name-{{$supplier['supplier_id']}}">{{$supplier['name']}}</td>
                                    <td id="addr-{{$supplier['supplier_id']}}">{{$supplier['address']}}</td>
                                    <td style="text-align:center" id="phone-{{$supplier['supplier_id']}}">{{$supplier['phone_no']}}</td>
                                    <td class="text-center">
                                        <a id="{{$supplier['supplier_id']}}" class="btn btn-3d btn-reveal btn-yellow" data-toggle="modal" data-target="#editSupplierDialog" onclick="prepareEdit('{{$supplier['supplier_id']}}','{{$supplier['name']}}','{{$supplier['address']}}','{{$supplier['phone_no']}}')">
                                            <i class="fa fa-gear"></i>
                                            <span>แก้ไข</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            {{-- end content --}}

                        </table>
                    </div>
                    {{-- end table --}}

                </div>
            </div>
        </div>
    </section>
    <div id="confirmDeleteDialog" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 id="confirmDeleteTitle" class="modal-title">ยืนยันการลบข้อมูลร้าน</h4>
                </div>
                <div class="modal-footer">
                    <a id="confirmDelete" class="btn btn-3d btn-reveal btn-black" data-dismiss="modal">
                        <i class="fa fa-trash-o"></i>
                        <span>ยืนยันการลบ</span>
                    </a>
                    <a id="cancelDelete" class="btn btn-default" data-dismiss="modal">
                        <span>ยกเลิก</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <div id="editSupplierDialog" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">แก้ไขข้อมูลร้านค้า</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <span>ชื่อร้านค้า</span>
                        </div>
                        <div class="col-md-8">
                            <input id="editSupplierName" class="form-control" placeholder="กรอกชื่อร้านค้า" type="text">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <span>ที่อยู่</span>
                        </div>
                        <div class="col-md-8">
                            <textarea id="editSupplierAddr" rows="5" class="form-control" data-maxlength="200" data-info="textarea-words-info" placeholder="กรอกที่อยู่ร้านค้า"></textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <span>หมายเลขโทรศัพท์</span>
                        </div>
                        <div class="col-md-8">
                            <input  id="editSupplierPhone" type="text" class="form-control masked"
                                    data-format="(999) 999-9999" data-placeholder="X"
                                    placeholder="(08X) XXX-XXXX">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="confirmEdit" class="btn btn-3d btn-reveal btn-green" data-dismiss="modal">
                        <i class="fa fa-check"></i>
                        <span>แก้ไข</span>
                    </a>
                    <a id="cancelEdit" class="btn btn-default" data-dismiss="modal">
                        <span>ยกเลิก</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <div id="addSupplierDialog" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form id="addSupplierDialogForm" class="validate">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">เพิ่มข้อมูลร้านค้า</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <span>ชื่อร้านค้า</span>
                        </div>
                        <div class="col-md-8">
                            <input name="supplierName" required id="addSupplierName" class="form-control" placeholder="กรอกชื่อร้านค้า" type="text">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <span>ที่อยู่</span>
                        </div>
                        <div class="col-md-8">
                            <textarea name="supplierAddr" required id="addSupplierAddr" rows="5" class="form-control" data-maxlength="200" data-info="textarea-words-info" placeholder="กรอกที่อยู่ร้านค้า"></textarea>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <span>หมายเลขโทรศัพท์</span>
                        </div>
                        <div class="col-md-8">
                            <input  id="addSupplierPhone" type="text" class="form-control masked"
                                    data-format="(999) 999-9999" data-placeholder="X"
                                    placeholder="(08X) XXX-XXXX">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="confirmAdd" class="btn btn-3d btn-reveal btn-green">
                        <i class="fa fa-check"></i>
                        <span>เพิ่ม</span>
                    </button>
                    <a id="cancelAdd" class="btn btn-default" data-dismiss="modal">
                        <span>ยกเลิก</span>
                    </a>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function main () {
            $("#confirmDelete").click(function () {
                var URL_ROOT = '{{Request::root()}}';
                var id = $("#confirmDelete").attr('num');
                $.post(URL_ROOT+'/supplies/delete_supplier', {_token: '{{csrf_token()}}', id: id});
                $('#tuple-'+id).remove();
            });
            $("#confirmEdit").click(function () {
                var URL_ROOT = '{{Request::root()}}';
                var id = $("#confirmEdit").attr('num');
                var name = $("#editSupplierName").val();
                var addr = $("#editSupplierAddr").val();
                var phone = $("#editSupplierPhone").val();
                $.post(URL_ROOT+'/supplies/edit_supplier', {_token: '{{csrf_token()}}', id: id, name: name, addr: addr, phone: phone});
                $('#name-'+id).text(name);
                $('#addr-'+id).text(addr);
                $('#phone-'+id).text(phone);
            });
            $("#cancelAdd").click(function () {
                $("#addSupplierName").val("");
                $("#addSupplierAddr").val("");
                $("#addSupplierPhone").val("");
            });
            $("#confirmAdd").click(function () {
                if($("#addSupplierDialogForm").valid()){
                var URL_ROOT = '{{Request::root()}}';
                var name = $("#addSupplierName").val();
                var addr = $("#addSupplierAddr").val();
                var phone = $("#addSupplierPhone").val();
                if(name)
                $.post(URL_ROOT+'/supplies/add_supplier', {_token: '{{csrf_token()}}', name: name, addr: addr, phone: phone}).success(function(response) {
                    var id = response[0].supplier_id;
                    $('#supplier-table').append(
                            '<tr id="tuple-'+id+'">'+
                            '<td class="text-center">'+
                            '<a id="'+id+'" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-placement="top" title="ลบ" data-toggle="modal" data-target="#confirmDeleteDialog" onclick="prepareDelete(\''+id+'\',\''+name+'\')">'+
                            '<i class="fa fa-minus"></i>'+
                            '<i class="fa fa-trash"></i>'+
                            '</a>'+
                            '</td>'+
                            '<td id="name-'+id+'">'+name+'</td>'+
                            '<td id="addr-'+id+'">'+addr+'</td>'+
                            '<td style="text-align:center" id="phone-'+id+'">'+phone+'</td>'+
                            '<td class="text-center">'+
                            '<a id="'+id+'" class="btn btn-3d btn-reveal btn-yellow" data-toggle="modal" data-target="#editSupplierDialog" onclick="prepareEdit(\''+id+'\',\''+name+'\',\''+addr+'\',\''+phone+'\')">'+
                            '<i class="fa fa-gear"></i>'+
                            '<span>แก้ไข</span>'+
                            '</a>'+
                            '</td>'+
                            '</tr>');
                    $("#addSupplierName").val("");
                    $("#addSupplierAddr").val("");
                    $("#addSupplierPhone").val("");
                    $('#addSupplierDialog').modal('hide');
                });
                }
            });
            $("#find-supplier-btn").click(function() {
                var URL_ROOT = '{{Request::root()}}';
                var name = $("#nameSearch").val();
                var addr = $("#addressSearch").val();
                var phone = $("#telSearch").val();
                $.post(URL_ROOT+'/supplies/supplier/search', {_token: '{{csrf_token()}}', name: name, addr: addr, phone: phone}).success(function(response) {
                    if(response=='fail') {
                        $('#supplier-table').html('');
                        $('#supplier-table').append('<div class = \'text-center\'>ไม่พบข้อมูลร้านค้าที่ต้องการ</div>');
                        return false;
                    }
                    else {
                        $('#supplier-table').html('');
                        var tableheader =
                            '<tr>'+
                            '<th></th>'+
                            '<th style="text-align:center">ชื่อร้านค้า</th>'+
                            '<th style="text-align:center">ที่อยู่</th>'+
                            '<th style="text-align:center">หมายเลขโทรศัพท์</th>'+
                            '<th></th>'+
                            '</tr>';
                        $('#supplier-table').append(tableheader);
                        for(var i = 0; i < response.length; i++) {
                            var tuple =
                                '<tr id="tuple-'+response[i]['supplier_id']+'">'+
                                '<td class="text-center">'+
                                    '<a id="'+response[i]['supplier_id']+'" class="delete-a-tuple social-icon social-icon-sm social-icon-round social-yelp" data-placement="top" title="ลบ" data-toggle="modal" data-target="#confirmDeleteDialog" onclick="prepareDelete(\''+response[i]['supplier_id']+'\',\''+response[i]['name']+'\')">'+
                                        '<i class="fa fa-minus"></i>'+
                                        '<i class="fa fa-trash"></i>'+
                                    '</a>'+
                                '</td>'+
                                '<td id="name-'+response[i]['supplier_id']+'">'+response[i]['name']+'</td>'+
                                '<td id="addr-'+response[i]['supplier_id']+'">'+response[i]['address']+'</td>'+
                                '<td style="text-align:center" id="phone-'+response[i]['supplier_id']+'">'+response[i]['phone_no']+'</td>'+
                                '<td class="text-center">'+
                                    '<a id="'+response[i]['supplier_id']+'" class="btn btn-3d btn-reveal btn-yellow" data-toggle="modal" data-target="#editSupplierDialog" onclick="prepareEdit(\''+response[i]['supplier_id']+'\',\''+response[i]['name']+'\',\''+response[i]['address']+'\',\''+response[i]['phone_no']+'\')">'+
                                        '<i class="fa fa-gear"></i>'+
                                        '<span>แก้ไข</span>'+
                                    '</a>'+
                                '</td>'+
                            '</tr>';
                            $('#supplier-table').append(tuple);
                        }
                    }
                }).fail(function () {
                    _toastr("ระบบทำงานผิดพลาด กรุณาลองใหม่อีกครั้ง", "top-right", "error", false);
                    return false;
                });
            });
        }
        $(document).ready(main);
        function prepareDelete(id, name) {
            $("#confirmDelete").attr('num',id);
            $("#confirmDeleteTitle").text('ยืนยันการลบข้อมูลร้าน '+name);
        }
        function prepareEdit(supplier_id, name, address, phone_no) {
            $("#editSupplierName").val(name);
            $("#editSupplierAddr").val(address);
            $("#editSupplierPhone").val(phone_no);
            $("#confirmEdit").attr('num',supplier_id);
        }
    </script>
@endsection