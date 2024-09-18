<div class="app-sidebar colored">
                    <div class="sidebar-header">
                        <a class="header-brand" href="index.html">
                            <span class="text">Many Teste</span>
                        </a>
                        <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
                        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
                    </div>
                    
                    <div class="sidebar-content">
                        <div class="nav-container">
                            <nav id="main-menu-navigation" class="navigation-main">
                                <div class="nav-lavel">Home</div>
                                <div class="nav-item active">
                                    <a href="<?php echo base_url('/') ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-edit"></i><span>Manutenção</span></a>
                                    <div class="submenu-content">
                                        <a href="<?php echo base_url('produto') ?>" class="menu-item">Produtos</a>
                                    </div>
                                </div>
                                <div class="nav-item has-sub">
                                    <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Administração</span></a>
                                    <div class="submenu-content">
                                        <a href="<?php echo base_url('usuarios') ?>" class="menu-item">Usuarios</a>
                                    </div>
                                </div>
                               
                            </nav>
                        </div>
                    </div>
                </div>