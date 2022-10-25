<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('dashboard') ?>" class="brand-link">
      <img src="<?php echo base_url() ?>assets/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AREM MODEL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url() ?>assets/admin/dist/img/logo_arem.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo site_url ('profil') ?>" class="d-block">
            <?php echo $this->session->userdata('nama'); ?>
            <br> <small> (<?php echo $this->session->userdata('akses_level'); ?>) </small>
            <!-- <br> <small> (<?php echo $this->session->userdata('id_user'); ?>) </small> -->
            <!-- <br> <small> (<?php echo $this->session->userdata('email'); ?>) </small> -->
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- Dashboar Page -->
          <li class="nav-item">
            <a href="<?php echo site_url('dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                DASHBOARD
                <span class="right badge badge-danger">Baru</span>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo site_url('pengaturan') ?>" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                PENGATURAN
                <span class="right badge badge-danger">Baru</span>
              </p>
            </a>
          </li>

          <!-- Menu Project Goal  -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-bullseye"></i>
              <p>
                GOAL DAN FITUR SISTEM
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('goal') ?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Goal</p>
                </a>
              </li>

               <li class="nav-item">
                  <a href="<?php echo site_url('goal') ?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Fitur Goal</p>
                </a>
              </li>

            </ul>
          </li>

          <!-- Menu GOAL ACTIVITIES  -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                DATA AKTIFITAS GOAL
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('activities')?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Aktifitas</p>
                </a>
              </li>

               <li class="nav-item">
                  <a href="<?php echo site_url('activities_resources') ?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Sumber Daya Aktifitas</p>
                </a>
              </li>
              
              <!--
              <li class="nav-item">
                  <a href="<?php echo site_url('activities_obstacle') ?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Obstacle Aktifitas</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo site_url('activities_actor') ?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Aktor Aktifitas</p>
                </a>
              </li>
              -->
             

            </ul>
          </li>


           <!-- Menu Procedure Activities  -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                DATA PROSEDUR 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('procedure')?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Prosedur Aktifitas</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo site_url('procedure_detail')?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Detail Prosedur</p>
                </a>
              </li>

              <!--
              <li class="nav-item">
                  <a href="<?php echo site_url('procedure_actor') ?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Aktor Prosedur</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="<?php echo site_url('procedure_resources') ?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Sumber Daya Prosedur</p>
                </a>
              </li>
              -->

            </ul>
          </li>

          <!-- Menu Project Stakeholder  -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                PROYEK STAKEHOLDER
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('project_stakeholder')?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Proyek Stakeholder</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu Stakeholder  -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                DATA STAKEHOLDER
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('stakeholder')?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Stakeholder</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Menu Project  -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-project-diagram"></i>
              <p>
                DATA PROYEK
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('project')?>" class="nav-link">
                  <i class="fas fa-table nav-icon"></i>
                  <p>Data Proyek</p>
                </a>
              </li>
            </ul>
          </li>

          <?php if($this->session->userdata('akses_level')=="Admin") { ?>
           <!-- Data User menu -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                DATA ADMIN SISTEM
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('user')?>" class="nav-link">
                  <i class="fas fa-users nav-icon"></i>
                  <p>Data Administrator Sistem</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url('pasien/user/tambah')?>" class="nav-link">
                  <i class="fas fa-user-plus nav-icon"></i>
                  <p>Tambah Administrator</p>
                </a>
              </li>
            </ul>
          </li>

          <?php } ?>
          <!-- Panduan Sistem -->
              <li class="nav-item">
            <a href="<?php echo site_url('panduan')?>" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku Panduan
              </p>
            </a>
          </li>
          <!-- Logout -->
              <li class="nav-item">
            <a href="<?php echo site_url('login/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active"><?php echo $title ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <div class="col-md-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $title ?></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

            <?php
            if($this->session->flashdata('sukses')) {
             ?>
              <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fas fa-check"></i> 
                  <?php echo $this->session->flashdata('sukses'); ?>
                </div>
            <?php }
            
            ?>

            <!-- Validasi error -->
            <?php echo validation_errors('<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <i class="icon fas fa-check"></i>','</div>') ?>
