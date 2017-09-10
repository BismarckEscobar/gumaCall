<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
      <header id="MenuFondo" class="demo-drawer-header">
          <div  class="col l10 center">
              <img src="<?PHP echo base_url();?>assets/img/logo-principal.png" width="75%" >
          </div>
          <?php

            if($this->session->userdata('RolUser')==1){
                echo '
                <div class="col l10 center Cont_hrs_trabajo">
                  <p>
                  <div id="ttCall">00:00:00</div>
                  </p>
              </div>
                ';

            }

          ?>

      </header>
       <div id="menu">
           <ul class="nav menu demo-navigation mdl-navigation__link" >
            <?php
              switch ($this->session->userdata('RolUser')) {
                case '0':
                    $menu = '<li href="campaniasVA"><a href="campaniasVA"><i class="material-icons">shopping_cart</i> Campañas</a></li>
                           <li href="Monitoreo"><a href="Monitoreo"><i class="material-icons">desktop_windows</i> Monitoreo</a></li>
                           <li href=""><a href="#"><i class="material-icons">pie_chart</i> Reportes</a></li>
                           <li href="usuarios"><a href="usuarios"><i class="material-icons">group</i> Usuarios</a></li>
                           <li href="#"><a href="#"><i class="material-icons">group</i> Clientes</a></li>
                           <li href="grupos"><a href="grupos"><i class="material-icons">group_work</i> Grupos</a> </li>                         
                           <li href="#"><a href="#"><i class="material-icons">info</i> acerca de</a></li>
                           <li href="salir"><a href="salir"><i class="material-icons">exit_to_app</i> CERRAR SESIÓN</a></li>';
                break;
                case '1':
                  $menu = '
                           <a href="../campanias"><li href="miscampanas"><i class="material-icons">insert_chart</i> Mis Campañas</li></a>
                           <a href="#"><li href="#"><i class="material-icons">insert_chart</i> acerca de</li></a>
                           <a href="#" onclick="cOut()"><li href="#"><i class="material-icons">exit_to_app</i> CERRAR SESIÓN</li></a>';
                break;
                default:
                  $menu = '<a href="#"> <i class="material-icons">exit_to_app</i> cerrar sesión</a>';
                  break;
              }
              echo $menu;
            ?>
          </ul>
       </div>
    </div>
