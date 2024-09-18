<?php $this->load->view('layout/navbar') ?>
            <div class="page-wrap">
                <?php $this->load->view('layout/sidebar') ?>
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="page-header">
                            <div class="row align-items-end">
                                <div class="col-lg-8">
                                    <div class="page-header-title">
                                        <i class="<?php echo $icon_title ?> bg-blue"></i>
                                        <div class="d-inline">
                                            <h5><?php echo isset($pageTitle) ? $pageTitle : $title  ?></h5>
                                            <span><?php echo isset($pageSubTitle) ? $pageSubTitle : '' ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?php echo base_url('/')?>"><i class="ik ik-home"></i></a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#"><?php echo isset($pageTitle) ? $title : '' ?></a>
                                            </li>
                                           
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <?php if($message=$this->session->flashdata('sucesso')): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><?php echo $message; ?></strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="ik ik-x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($message=$this->session->flashdata('error')): ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-danger fade show" role="alert">
                                    <strong><?php echo $message; ?></strong> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="ik ik-x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><a href="<?php echo base_url('produto/core/') ?>" class="btn btn-success" >Novo</a></div>
                                    <div class="card-body">
                                        <table class="table data_table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nome</th>
                                                    <th>Preço</th>
                                                    <th>Estoque</th>
                                                    <th>Estatus</th>
                                                    <th class="nosort">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($product as $line) : ?>
                                                 <tr>
                                                    <td><?php echo $line->id; ?></td>
                                                    <td><?php echo $line->name; ?></td>
                                                    <td><?php echo number_format($line->price,2,',','.'); ?></td>
                                                    <td><?php echo $line->stock; ?></td>
                                                    <td><?php echo ($line->active==1 ? '<span class="badge badge-pill badge-success mb-1"><i class="ik ik-unlock"></i></span>':'<span class="badge badge-pill badge-dark mb-1"><i class="ik ik-lock"></i></span>'); ?> </td>
                                                    <td>
                                                        <div class="table-actions">
                                                            <a data-toggle="tooltip" data-placement="bottom" title="Ativar/Desativar" href="<?php echo base_url('produto/activeProduct/'.$line->id) ?>"><i class="ik ik-lock"></i></a>
                                                            <a data-toggle="tooltip" data-placement="bottom" title="Editar" href="<?php echo base_url('produto/core/'.$line->id) ?>"><i class="ik ik-edit-2"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <div class="w-100 clearfix">
                        <span class="text-center text-sm-left d-md-inline-block">Copyright © <?php echo date('Y') ?> ThemeKit v2.0. All Rights Reserved.</span>
                        <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Custom by <a href="javascript:void" class="text-dark">Augusto Santana</a></span>
                    </div>
                </footer>
                
            </div>
        </div>

