
<!-- Info boxes -->
<div class="row">
  <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-project-diagram"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Data Proyek</span>
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
        <i class="fa fa-project-diagram"></i> Data Proyek
      </a>
      <a href="<?php echo site_url('project') ?>" class="btn btn-info">
        <i class="fa fa-plus"></i> Tambah Proyek Baru
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
        <span class="info-box-text">Pengguna</span>
        <span class="info-box-number"><?php echo $user->total ?> <small>Orang</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->

    <p class="btn btn-group btn-block">
      <a href="<?php echo site_url('user') ?>" class="btn btn-success">
        <i class="fa fa-users"></i> Data Pengguna
      <a href="<?php echo site_url('user') ?>" class="btn btn-info">
        <i class="fa fa-plus"></i> Tambah Pengguna Baru
      </a>
    </p>

  </div>
  <!-- /.col -->

  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-bullseye"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Goal</span>
        <span class="info-box-number"><?php echo $goal->total ?> <small>Goal</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->

    <p class="btn btn-group btn-block">
      <a href="<?php echo site_url('user') ?>" class="btn btn-success">
        <i class="fa fa-bullseye"></i> Data Goal
      <a href="<?php echo site_url('user') ?>" class="btn btn-info">
        <i class="fa fa-plus"></i> Tambah Goal
      </a>
    </p>

  </div>
  <!-- /.col -->

  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-folder"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Aktifitas</span>
        <span class="info-box-number"><?php echo $activities->total ?> <small>Aktifitas</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->

    <p class="btn btn-group btn-block">
      <a href="<?php echo site_url('user') ?>" class="btn btn-success">
        <i class="fa fa-folder"></i> Data Aktifitas
      <a href="<?php echo site_url('user') ?>" class="btn btn-info">
        <i class="fa fa-plus"></i> Tambah Aktifitas
      </a>
    </p>

  </div>
  <!-- /.col -->

  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-light elevation-1"><i class="fas fa-tasks"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Prosedur</span>
        <span class="info-box-number"><?php echo $procedure->total ?> <small>Prosedur</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->

    <p class="btn btn-group btn-block">
      <a href="<?php echo site_url('user') ?>" class="btn btn-success">
        <i class="fa fa-tasks"></i> Data Prosedur
      <a href="<?php echo site_url('user') ?>" class="btn btn-info">
        <i class="fa fa-plus"></i> Tambah Prosedur
      </a>
    </p>

  </div>
  <!-- /.col -->

  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-6">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-light elevation-1"><i class="fa fa-spinner"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Detail Prosedur</span>
        <span class="info-box-number"><?php echo $procdet->total ?> <small>Detail Prosedur</small></span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->

    <p class="btn btn-group btn-block">
      <a href="<?php echo site_url('user') ?>" class="btn btn-success">
        <i class="fa fa-spinner"></i> Data Detail Prosedur
      <a href="<?php echo site_url('user') ?>" class="btn btn-info">
        <i class="fa fa-plus"></i> Tambah Detail Prosedur
      </a>
    </p>

  </div>
  <!-- /.col -->
</div>
        <!-- /.row -->