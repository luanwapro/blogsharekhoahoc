

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
                            <select class="custom-select" name="capchude" id="capchude" onchange="capchude1(idcap='capchude')">
                                <option value="1">Cấp  1</option>
                                <option value="2" selected>Cấp 2</option>
                            </select>
                        </div>
                        <div class="form-group" id="select2_chudecha">

                            <select id="chudecha"  name="chudecha" class="chude form-control ui-autocomplete-input select2-single select2-hidden-accessible custom-select" tabindex="-1" aria-hidden="true" style="width: 100%;height:20%">



                            </select>
                        </div>


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

<!--Cập nhật chủ đề-->
<?php foreach ($chude as $valueup) :?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="capnhat_<?php echo $valueup->id ?>" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                            <input type="text" class="form-control" value="<?php echo $valueup->tenchude ?>" name="chude" id="chude" placeholder="quan ly chu de">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Cấp Bậc Chủ Đề</label>
                            <select class="custom-select" name="capchude" >
                                <?php if($valueup->cap==1): ?>
                                <option value="1" selected>Cấp  1</option>
                                    <option value="2" >Cấp 2</option>
                                <?php else: ?>
                                <option value="1" selected>Cấp  1</option>
                                <option value="2" selected>Cấp 2</option>
                               <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group"  >

                            <select  class="form-control ui-autocomplete-input select2-single  custom-select chude" tabindex="-1" aria-hidden="true" style="width: 100%;height:20%"  onchange="timchude(idselect2='select2_chude_<?php echo $valueup->id ?>')" id="select2_chude_<?php echo $valueup->id ?>">
                                <?php if($value->id_chude!=0) :?>
                                    <?php foreach($chude as $valuefk) :?>



                                        <?php if($valuefk->id==$value->id_chude) :?>
                                          <option><?=  $valuefk->tenchude  ?></option>
                                        <?php endif; ?>

                                    <?php endforeach; ?>
                                <?php endif; ?>



                            </select>
                        </div>


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

<?php endforeach; ?>
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
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>


                             <?php foreach($chude as $value) :?>
                            <tr>
                                <td><?=  $value->id  ?></td>
                                <td><?=  $value->tenchude  ?></td>

                                  <?php if($value->id_chude!=0) :?>
                                <?php foreach($chude as $valuefk) :?>



                                <?php if($valuefk->id==$value->id_chude) :?>
                                  <td><?=  $valuefk->tenchude  ?></td>
                                  <?php endif; ?>

                                <?php endforeach; ?>
                                <?php else: ?>

                                  <td> Không Tồn Tại</td>
                                <?php endif; ?>

                                <td><?=  $value->cap  ?></td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm Chủ Đề</button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#capnhat_<?php echo $value->id ?>">Cập Nhật Chủ Đề</button>
                                    <button type="button" class="btn  btn-danger" onclick="xoachude(idchude=<?=  $value->id  ?>)" data-toggle="" data-target=".bd-example-modal-lg">Xóa Chủ Đề</button>
                                </td>
                            </tr>
                             <?php endforeach; ?>
                        <?php if(count($chude)<1) :?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm Chủ Đề</button>
                               <button type="button" class="btn btn-success" data-toggle="" data-target=".bd-example-modal-lg">Cập Nhật Chủ Đề</button>
                              <button type="button" class="btn  btn-danger" data-toggle="" data-target=".bd-example-modal-lg">Xóa Chủ Đề</button></td>
                            </tr>
                            <?php endif; ?>
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


<script>

    function xoachude(){

        Swal.fire({
            title: 'Bạn có chắc xóa chủ đề hay không?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Delete`,

        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire('Delete!', '', 'success');
                $.post('',{'idchudecanxoa':idchude},function (data){
                    location.href="";
                });
            }
        })

    }


</script>
<script>
    var capcd=2;
    function capchude1(){
        capcd=$('#'+idcap).val();
        if(capcd==1){

            $('#chudecha').next(".select2-container").hide();
        }else {
            $('#chudecha').next(".select2-container").show();
        }
    }


    $("#capchude").on("change", function() {

        if($('select[name=capchude] option').filter(':selected').val()=="2"){

            $("#chudecha").select2({
                placeholder: "Chọn Chủ Đề Cấp 1",
                allowClear: true
            });
        }
    });

    $(".chude").select2({
        placeholder: "Chọn Chủ Đề Cấp 1",
        allowClear: true
    });






    $('body').on('keyup', '.select2-search__field', function() {
         var selectItem = $('.select2-container--open').prev();
         var index = selectItem.index();
          var id = selectItem.attr('id');


        $.post('',{'chudecantim': $("#"+id).data("select2").dropdown.$search.val()},function(data){
            $("#"+id).html("");
            $("#"+id).append(data);
            })

    });
</script>
<?= $this->endSection() ?>
