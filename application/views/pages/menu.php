<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
    <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
      <header id="MenuFondo" class="demo-drawer-header">
          <div  class="col l10 center ">
              <img src="<?PHP echo base_url();?>assets/img/logo-principal.png" width="75%" >
          </div>
          <div class="col l10 center Cont_hrs_trabajo">
              <p>00:00:00</p>
          </div>
      </header>
       <div id="menu">
           <ul class="nav menu demo-navigation mdl-navigation__link" >
            <?php
              switch ($this->session->userdata('RolUser')) {
                case '0':
                  $menu = '<a href="Campania"><li href="Campania"><i class="material-icons">shopping_cart</i> campaña</li></a>
                           <a href="Main"><li href="#"><i class="material-icons">desktop_windows</i> Monitoreo</li></a>
                           <a href="#"><li href="#"><i class="material-icons">pie_chart</i> Reportes</li></a>
                           <a href="usuarios"><li href="usuarios"><i class="material-icons">group</i> Usuarios</li></a>
                           <a href="#"><li href="#"><i class="material-icons">group</i> Clientes</li></a>
                           <a href="grupos"><li href="grupos"><i class="material-icons">group_work</i> Grupos</li></a>
                           
                           
                           <a href="salir"><li href="salir"><i class="material-icons">exit_to_app</i> salir</li></a>';
                break;
                case '1':
                  $menu = '
                           <a href="campanias"><li href="miscampanas"><i class="material-icons">insert_chart</i> Mis Campañas</li></a>
                           <a href="cobros"><li href="cobros"><i class="material-icons">insert_chart</i> acerca de</li></a>
                           <a href="salir"><li href="salir"><i class="material-icons">exit_to_app</i> CERRAR SESIÓN</li></a>';
                break;
                default:
                  $menu = '<a href="salir"> <li href="salir"><i class="material-icons">exit_to_app</i> cerrar sesión</li></a>';
                  break;
              }
              echo $menu;
            ?>
          </ul>
       </div>
    </div>

