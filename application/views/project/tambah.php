<div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Project Baru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          
              <div class="form-group row">
                  <label for="project_name" class="col-sm-3 col-form-label">Nama Proyek</label>
                  <div class="col-sm-9">
                    <input type="text" name="project_name[]" id="project_name1" alt="1" class="form-control" placeholder="Nama Proyek" value="<?php echo set_value('project_name[]') ?>" required>
                  </div>
              </div>
              <div class="form-group row">
                  <label for="project_desc" class="col-sm-3 col-form-label mb-3">Deskripsi Proyek</label>
                  <div class="col-sm-9">
                    <input type="text" name="project_desc[]" id="project_desc1" alt="1" class="form-control" placeholder="Deskripsi Proyek"  value="<?php echo set_value('project_desc[]') ?>"  required>
                  </div>
              </div>

              <div class="ln_solid"></div>
              <div id="nextkolom" name="nextkolom"></div>
              <button type="button" id="jumlahkolom" value="1" style="display:none"></button>
            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">
                <i class="fa fa-times"> </i> Tutup
              </button>

              <button type="button" class="btn btn-info tambah-form">Tambah Form</button>

              <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i> Simpan Data
              </button>

              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <script src="<?php echo base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
      <script>
            $(document).ready(function() {
                var i=2;
                $(".tambah-form").on('click', function(){        
                    row ='<div class="rec-element">'+
                            '<div class="form-group row">'+
                              '<label for="project_name" class="col-sm-3 col-form-label">Nama Proyek '+i+''+
                              '</label>'+
                                  '<div class="col-sm-9 ">'+
                                      '<input type="text" name="project_name[]" id="project_name'+i+'" alt="'+i+'" class="form-control" placeholder="Nama Proyek" required>'+
                                  '</div>'+
                            '</div>'+
                            '<div class="form-group row">'+
                              '<label for="project_desc" class="col-sm-3 col-form-label">Deskripsi Proyek '+i+''+
                              '</label>'+
                                  '<div class="col-sm-9 mb-1">'+
                                      '<input type="text" name="project_desc[]" id="project_name'+i+'" alt="'+i+'" class="form-control" placeholder="Deskripsi Proyek" required>'+
                                  '</div>'+
                            '</div>'+
                                  '<span class="input-group-btn">'+
                                    '<button type="button" class="btn btn-danger del-element mt-2"><i class="fas fa-trash-alt"></i> Hapus</button>'+
                                  '</span>'+
                            '<div class="ln_solid mb-3"></div>'+
                            '</div>';

                          
                    $(row).insertBefore("#nextkolom");
                    $('#jumlahkolom').val(i+1);
                    i++;        
                });
                $(document).on('click','.del-element',function (e) {        
                    e.preventDefault()
                    i--;
                    //$(this).parents('.rec-element').fadeOut(400);
                    $(this).parents('.rec-element').remove();
                    $('#jumlahkolom').val(i-1);
                });        
            });
        </script>