
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
                                                <a href="<?php echo base_url($this->router->fetch_class())?>">Manutenção de produtos</a>
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
                                    <div class="card-body">
                                        <form class="forms-sample" name="form_core" method="POST">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Descrição</label>
                                                        <input type="text" class="form-control" name="name" value="<?php echo (isset($product) ? $product->name : set_value('name')) ?>" <?php echo (isset($product) ? $product->active == 1 ? '' : 'readonly' : ''); ?>>
                                                        <?php echo form_error('name','<div class="text-danger">','</div>')?>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Preço</label>
                                                        <input  type="number" min="0.00" max="10000.00" step="0.01" name="price" class="form-control form-control-sm" id="price" placeholder="Valor" value="<?php echo (isset($product) ? $product->price : set_value('preice')) ?>" <?php echo (isset($product) ? $product->active == 1 ? '' : 'readonly' : ''); ?>>
                                                        <?php echo form_error('price','<div class="text-danger">','</div>')?>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Estoque</label>
                                                        <input type="number" class="form-control" name="stock" value="<?php echo (isset($product) ? $product->stock : set_value('stock')) ?>" <?php echo (isset($product) ? $product->active == 1 ? '' : 'readonly' : ''); ?>>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label for="">Ativo</label>
                                                    <select class="form-control" name="active">
                                                        <option value="0" <?php echo (!isset($product) ? '' : ($product->active==0 ? "selected" : '') ); ?>>Não</option>
                                                        <option value="1" <?php echo (!isset($product) ? '' : ($product->active==1 ? "selected" : '') ); ?>>Sim</option>
                                                    </select>
                                                </div>
                                                <?php if(isset($product)): ?>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="hidden" class="form-control" name="product_id" value="<?php echo $product->id  ?>">
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
