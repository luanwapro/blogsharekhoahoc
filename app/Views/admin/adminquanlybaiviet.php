

<?= $this->extend('admin/adminHeader') ?>

<?= $this->section('content') ?>

<!--thêm chủ đề-->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Thêm Bài Viết</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Khóa Học</label>
                            <input type="text" class="form-control" name="tenkhoahoc"  placeholder="PHP">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Chủ Đề</label>
                        
                            <select class="custom-select" name="chude" >
                            
                                <?php foreach($danhsachchude1 as $valueds)   :?>
                                   <?php if($valueds->cap!=1) :?>
                                <option value="<?=$valueds->id  ?>"><?= $valueds->tenchude ?></option>
                                <?php endif ;?>
                                <?php endforeach ;?>
                            </select>
                        </div>
                        <label for="exampleInputPassword1">Ảnh Bài Viết</label>
                        <div class="form-group">

                        <div class="input-group">
                      
                     
                      <div class="custom-file">
                    
                        <input type="file" class="custom-file-input" name="anhbaiviet" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                       </div>


                        </div>
                        <div class="form-group">

                            <textarea id="themnoidung" name="themnoidung"></textarea>


                            </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Link cmt</label>
                            <input type="text" class="form-control" name="linkcmt"  placeholder="link cmt">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Link Bai Viet</label>
                            <input type="text" class="form-control" name="linkbaiviet"  placeholder="Link bai viet">
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
                        <button type="submit" name="thembaiviet" class="btn btn-primary">Thêm Bài Viết</button>
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
                        <h3 class="card-title">Quản Lý Bài Viết</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Chủ Đề</th>
                                <th>Tên Khóa Học </th>
                                <th>CMT</th>
                                <th>Link</th>
                                <th>Nội Dung</th>
                                <th>Edit</th>

                            </tr>
                            </thead>
                            <tbody>

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm Bài Viết</button></td>
                            </tr>
                           
                    
                            <?php foreach($baiviet as $value) :?>
                                <tr>
                                <td><?= $value->id ?></td>
                           
                                <?php foreach($danhsachchude1 as $danhsachchude) :?>
                            <?php  if($danhsachchude->id==$value->id_chude)  :?>

                            <td><?= $danhsachchude->tenchude ?></td>

                            <?php   endif  ;?>
                            <?php  endforeach  ;?>


                            
                            <td><?= $value->tenkhoahoc ?>
                        
                            <img src="<?= $value->anh ?>" width="200px" height="150px">
                                 </td>
                            <td><?= $value->cmt ?></td>
                            <td><?= $value->link ?></td>
                            <td><?= $value->noidung ?></td>
                            <td>


                            <button type="button" class="btn  btn-danger" onclick="xoachude(idchude=<?=  $value->id  ?>)" data-toggle="" data-target=".bd-example-modal-lg">Xóa Chủ Đề</button>
                            </td>
                           
                            </tr>
                            <?php endforeach   ;?>
                      

                            </tbody>
                      
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
<script src="<?php echo base_url() ?>/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'themnoidung' );
</script>

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
<?= $this->endSection() ?>
