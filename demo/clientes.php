<?php
    //ini_set('display_errors', 1);
    //error_reporting(E_ALL);    

    require_once('server/Database.php');
    $db = new Database();

    $db->query("SELECT * FROM cliente");
    $clientes = $db->resultSet();
    //die(json_encode($db->resultSet()));
?>
<!DOCTYPE html>
<html lang="es-GT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda AGUILA</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/iconly/bold.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            Tienda AGUILA
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="clientes.php" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Clientes</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="proveedores.php" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Proveedores</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="productos.php" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Productos</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="facturacion.php" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Facturacion</span>
                            </a>
                        </li>
                    </ul>
                        <!--li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Components</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="component-alert.html">Alert</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-badge.html">Badge</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-breadcrumb.html">Breadcrumb</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-button.html">Button</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-card.html">Card</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-carousel.html">Carousel</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-dropdown.html">Dropdown</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-list-group.html">List Group</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-modal.html">Modal</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-navs.html">Navs</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-pagination.html">Pagination</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-progress.html">Progress</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-spinner.html">Spinner</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="component-tooltip.html">Tooltip</a>
                                </li>
                            </ul>
                        </li-->
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Clientes</h3>
                            <p class="text-subtitle text-muted">Listado de todos los clientes</p>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Clientes
                            <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#aggcliente">Agregar</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($clientes AS $item){ ?>
                                    <tr>
                                        <td><?php echo $item['codigo_cliente']; ?></td>
                                        <td><?php echo $item['nombre_cliente']; ?></td>
                                        <td><?php echo $item['apellido_cliente']; ?></td>
                                        <td><?php echo $item['telefono_cliente']; ?></td>
                                        <td><?php echo $item['direccion_cliente']; ?></td>
                                        <td>
                                            <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#item<?php echo $item['codigo_cliente'];?>">Editar</a>
                                            <a href="javascript:void(0)" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#item<?php echo $item['codigo_cliente'];?>-elim">Eliminar</a>
                                        </td>
                                        <!--Basic Modal -->
                                        <div class="modal fade text-left" id="item<?php echo $item['codigo_cliente'];?>" tabindex="-1" role="dialog"
                                        aria-labelledby="item<?php echo $item['codigo_cliente'];?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable w-100" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="item<?php echo $item['codigo_cliente'];?>">Editar Registro</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <form action="" method="post" id="frm-item-<?php echo $item['codigo_cliente'];?>"></form>
                                                    <div class="modal-body">
                                                        
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="codigo">Codigo</label>
                                                                    <input type="number" class="form-control" id="codigo"
                                                                        placeholder="001" value="<?php echo $item['codigo_cliente']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nombre">Nombre</label>
                                                                    <input type="text" class="form-control" id="nombre"
                                                                        placeholder="Ej. Daniel" value="<?php echo $item['nombre_cliente']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="apellido">Apellido</label>
                                                                    <input type="text" class="form-control" id="apellido"
                                                                        placeholder="Ej. Quiñonez" value="<?php echo $item['apellido_cliente']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="telefono">Telefono</label>
                                                                    <input type="tel" class="form-control" id="telefono"
                                                                        placeholder="Ej. 12345678" value="<?php echo $item['telefono_cliente']; ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="direccion">Direccion</label>
                                                                    <input type="text" class="form-control" id="direccion"
                                                                        placeholder="Ej. 4-15 Col. Santa Marta" value="<?php echo $item['direccion_cliente']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Cancelar</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ml-1"
                                                            data-bs-dismiss="modal" id="guardar">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Guardar</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                        <!--Basic Modal -->
                                        <div class="modal fade text-left" id="item<?php echo $item['codigo_cliente'];?>-elim" tabindex="-1" role="dialog"
                                        aria-labelledby="item<?php echo $item['codigo_cliente'];?>-elim" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable w-100" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="item<?php echo $item['codigo_cliente'];?>-elim">Eliminar Registro</h5>
                                                        <button type="button" class="close rounded-pill"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                        
                                                    <div class="modal-body">
                                                        Esta seguro de eliminar este registro?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn" data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Cancelar</span>
                                                        </button>
                                                        <button type="submit" class="btn btn-danger ml-1"
                                                            data-bs-dismiss="modal" id="guardar">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Si</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <!--Basic Modal -->
                <div class="modal fade text-left" id="aggcliente" tabindex="-1" role="aggcliente"
                aria-labelledby="aggcliente" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable w-100" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="aggcliente">Agregar Registro</h5>
                            <button type="button" class="close rounded-pill"
                                data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form action="index.html" method="post" id="frm-clientes"></form>
                            <div class="modal-body">
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="codigo">Codigo</label>
                                            <input type="number" class="form-control" id="codigo"
                                                placeholder="001">
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="nombre"
                                                placeholder="Ej. Daniel">
                                        </div>
                                        <div class="form-group">
                                            <label for="apellido">Apellido</label>
                                            <input type="text" class="form-control" id="apellido"
                                                placeholder="Ej. Quiñonez">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Telefono</label>
                                            <input type="tel" class="form-control" id="telefono"
                                                placeholder="Ej. 12345678">
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Direccion</label>
                                            <input type="text" class="form-control" id="direccion"
                                                placeholder="Ej. 4-15 Col. Santa Marta">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn" data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Cancelar</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Guardar</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Daniel</p>
                    </div>
                    <div class="float-end">
                        <p> by <a
                                href="http://ahmadsaugi.com">Daniel Quiñonez</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>
</body>

</html>