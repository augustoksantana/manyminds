<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url(<?php echo base_url('public/img/auth/login-bg.jpg')?>)">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <?php if($message=$this->session->flashdata('error')): ?>
                        <div class="row mb-15">
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
                <div class="authentication-form mx-auto">
                    <h4>Many Teste</h4>
                    <p>Controle de Vendas</p>
                    <form method="POST" action="login/auth">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Digite seu email" name="email" required="" value="">
                            <i class="ik ik-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Digite sua senha" name="password" required="" value="">
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="row">
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

