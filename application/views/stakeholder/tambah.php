<div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Stakeholder Baru</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                            
              <div class="form-group row">
                  <label for="stakeholder_name" class="col-sm-3 col-form-label">Nama Stakeholder</label>
                  <div class="col-sm-9">
                    <input type="text" name="stakeholder_name" class="form-control" placeholder="Nama Stakeholder" value="<?php echo set_value('stakeholder_name') ?>" required>
                  </div>
              </div>

              <div class="form-group row">
                <label for="stakeholder_type" class="col-sm-3 col-form-label">Stakeholder Role</label>
                <div class="col-sm-9">
                <select name="stakeholder_type" class="form_control select2">
                      <option value="Pegawai">Pegawai</option>
                      <option value="Pimpinan">Pimpinan</option>
                      <option value="Analis">Analis</option>
                      <option value="Pengguna">Pengguna</option>
                    </select>
                </div>
              </div>

              <div class="form-group row">
                  <label for="stakeholder_competence" class="col-sm-3 col-form-label">Kompetensi Stakeholder</label>
                  <div class="col-sm-9">
                    <input type="text" name="stakeholder_competence" class="form-control" placeholder="Kompetensi Stakeholder" value="<?php echo set_value('stakeholder_competence') ?>" required>
                  </div>
              </div>

              <div class="form-group row">
                <label for="project_id" class="col-sm-3 col-form-label">Pilih Proyek</label>
                <div class="col-sm-9">
                  <select name="project_id" class="form-control select2" required>
                    <option value="">Pilih Proyek ...</option>
                    <!-- Ambil data pasien dari Controller -->
                    <?php foreach ($project as $project) { ?>
                      <option value="<?php echo $project->project_id ?>">
                      <?php echo $project->project_id ?> - <?php echo $project->project_name ?> 
                      </option>
                    <?php } ?>
                    }
                    
                  </select>
                </div>
              </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">
                <i class="fa fa-times"> </i> Tutup
              </button>
              
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