<div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu">
                            <li class="app-sidebar__heading">Enlaces</li>
                            <li>
                                <a href="<?php echo $this->JustRoute("MainMenu");?>" class="mm-active">
                                    <i class="metismenu-icon pe-7s-rocket"></i>
                                    Inicio
                                </a>
                            </li>
                            <li class="app-sidebar__heading">Control</li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-note2"></i>
                                    Registros
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    
                                    
                                   
                                    <li>
                                        <a href="<?php echo $this->JustRoute("Productos");?>">
                                            <i class="metismenu-icon">
                                            </i>Productos
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo $this->JustRoute("Clientes");?>">
                                            <i class="metismenu-icon">
                                            </i>Clientes
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo $this->JustRoute("Empleados");?>">
                                            <i class="metismenu-icon">
                                            </i>Empleados
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo $this->JustRoute("Entrenadores");?>">
                                            <i class="metismenu-icon">
                                            </i>Entrenadores
                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo $this->JustRoute("Grupo");?>">
                                            <i class="metismenu-icon">
                                            </i>Grupos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->JustRoute("Inscripciones");?>">
                                            <i class="metismenu-icon">
                                            </i>Inscripciones
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->JustRoute("Maquinas");?>">
                                            <i class="metismenu-icon">
                                            </i>Maquinas
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->JustRoute("Eventos");?>">
                                            <i class="metismenu-icon">
                                            </i>Eventos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->JustRoute("Horarios");?>">
                                            <i class="metismenu-icon">
                                            </i>Horarios
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="metismenu-icon pe-7s-edit"></i>
                                    Configuracion
                                    <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                </a>
                                <ul>
                                    
                                    <li>
                                        <a href="<?php echo $this->JustRoute("Usuarios");?>">
                                            <i class="metismenu-icon">
                                                
                                            </i>Usuarios Administrativos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                          
                        </ul>
                    </div>
                </div>
            </div>