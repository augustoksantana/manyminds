
            

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
                                                <a href="<?php echo base_url($this->router->fetch_class())?>">Listar usuários</a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <a href="#"><?php echo isset($pageTitle) ? $title : '' ?></a>
                                            </li>
                                           
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><i class="ik ik-calendar ik-2x">&nbsp</i> Última atualização: <?php echo (isset($user->last_updated) ? formatDateBdHour($user->last_updated) : '' )?></div>
                                    <div class="card-body">
                                        <form class="forms-sample" name="form_core" method="POST">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Nome</label>
                                                        <input type="text" class="form-control" name="first_name" value="<?php echo (isset($user) ? $user->first_name : set_value('first_name')) ?>">
                                                        <?php echo form_error('fris_name','<div class="text-danger">','</div>')?>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Sobrnome</label>
                                                        <input type="text" class="form-control" name="last_name" value="<?php echo (isset($user) ? $user->first_name : set_value('last_name')) ?>">
                                                        <?php echo form_error('last_name','<div class="text-danger">','</div>')?>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">usuário</label>
                                                        <input type="text" class="form-control" name="username" value="<?php echo (isset($user) ? $user->username : set_value('username')) ?>">
                                                        <?php echo form_error('username','<div class="text-danger">','</div>')?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">E-mail</label>
                                                        <input type="email" class="form-control" name="email" value="<?php echo (isset($user) ? $user->email : set_value('email')) ?>">
                                                        <?php echo form_error('email','<div class="text-danger">','</div>')?>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="">Grupo de acesso</label>
                                                    <div class="form-group">
                                                        <select class="form-control select2" name="usergroup[]" multiple="multiple">
                                                            <?php foreach ($groups as $gp): ?>
                                                            <option value="<?php echo $gp->id ?>" <?php if (isset($user_groups)) echo (strpos($user_groups,$gp->id)!== false ? 'selected' : '' )?>><?php echo $gp->description ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <label for="">Ativo</label>
                                                    <select class="form-control" name="active">
                                                        <option value="0" <?php echo (!isset($user) ? '' : ($user->active==0 ? "selected" : '') ); ?>>Não</option>
                                                        <option value="1" <?php echo (!isset($user) ? '' : ($user->active==1 ? "selected" : '') ); ?>>Sim</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Senha</label>
                                                        <input type="password" class="form-control" name="password"  >
                                                        <?php echo form_error('password','<div class="text-danger">','</div>')?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Confirma senha</label>
                                                        <input type="password" class="form-control" name="confirmpassword"  >
                                                        <?php echo form_error('confirmpassword','<div class="text-danger">','</div>')?>
                                                    </div>
                                                </div>
                                                <?php if(isset($user)): ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="usuario_id" value="<?php echo $user->id  ?>">
                                                    </div>
                                                </div>
                                                <?php endif ?>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                            <a class="btn btn-info" href="<?php echo base_url($this->router->fetch_class()); ?>">Voltar</a>
                                          </form>
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
        
        

        