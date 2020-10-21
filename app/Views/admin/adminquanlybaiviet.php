

<?= $this->extend('admin/adminHeader') ?>

<?= $this->section('content') ?>

<!--thêm chủ đề-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm Chủ Đề</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Chủ Đề</label>
                            <input type="text" class="form-control" name="chude" id="chude" placeholder="quan ly chu de">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cấp Bậc Chủ Đề</label>
                            <select class="custom-select" name="capchude" id="capchude">
                                <option value="1">Cấp  1</option>
                                <option value="2" selected>Cấp 2</option>
                            </select>
                        </div>
                        <div class="form-group" id="select2_chudecha">

                            <select id="chudecha"  name="chudecha" class="form-control ui-autocomplete-input select2-single select2-hidden-accessible custom-select" tabindex="-1" aria-hidden="true" style="width: 100%;height:20%">

                            </select>
                        </div>

                        <script>




                            $("#chudecha").select2({
                                placeholder: "Chọn Chủ Đề Cấp 1",
                                allowClear: true
                            });


                            $('#select2-data-1-3kv9').height(80);
                            $("#capchude").on("change", function() {

                              if($('select[name=capchude] option').filter(':selected').val()=="2"){
                                 $('#select2_chudecha').html('  <select id="chudecha"  class="form-control ui-autocomplete-input select2-single select2-hidden-accessible custom-select" tabindex="-1" aria-hidden="true" style="width: 100%;height:20%">');
                                  $("#chudecha").select2({
                                      placeholder: "Chọn Chủ Đề Cấp 1",
                                      allowClear: true
                                  });
                              }else{
                                  $('#select2_chudecha').html('');
                              }
                            });


                        </script>
                        <div class="form-check">

                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Thêm Chủ Đề</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Quản Lý Chủ Đề</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Chủ Đề</th>
                                <th>FK Chủ Đề </th>
                                <th>Cấp Độ</th>

                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm Chủ Đề</button></td>
                            </tr>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?= $this->endSection() ?>
