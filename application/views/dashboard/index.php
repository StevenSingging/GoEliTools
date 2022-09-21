
<!-- Info boxes -->
<div class="row">
  <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-folder"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Data Project</span>
        <span class="info-box-number">
          <?php echo $project->total ?>
          <small>Project</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->

    <p class="btn btn-group btn-block">
      <a href="<?php echo site_url('project') ?>" class="btn btn-success">
        <i class="fa fa-folder"></i> Data Project
      </a>
      <a href="<?php echo site_url('project') ?>" class="btn btn-info">
        <i class="fa fa-plus"></i> Tambah Project Baru
      </a>
    </p>

  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-cog"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Data Stakeholder</span>
        <span class="info-box-number"><?php echo $stakeholder->total ?> <small>orang</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->

    <p class="btn btn-group btn-block">
      <a href="<?php echo site_url('stakeholder') ?>" class="btn btn-success">
        <i class="fa fa-user-cog"></i> Data Stakeholder
      </a>
      <a href="<?php echo site_url('stakeholder') ?>" class="btn btn-info">
        <i class="fa fa-plus"></i> Tambah Stakeholder Baru
      </a>
    </p>

  </div>
  <!-- /.col -->


  
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">User</span>
        <span class="info-box-number"><?php echo $user->total ?> <small>Orang</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->

    <p class="btn btn-group btn-block">
      <a href="<?php echo site_url('user') ?>" class="btn btn-success">
        <i class="fa fa-users"></i> Data User
      <a href="<?php echo site_url('user') ?>" class="btn btn-info">
        <i class="fa fa-plus"></i> Tambah User Baru
      </a>
    </p>

  </div>
  <!-- /.col -->
</div>
        <!-- /.row -->