<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet" />
    <title>GES_SIS</title>
</head>

<body>
    <h1 class="title">XL Gestión Sistemas</h1>
    <main class="contenedor">
        <nav class="menu">
            <ul>
                <li>
                    Stock
                    <ul>
                        <li><a href="stock_info.php">Info</a></li>
                        <li>Movimientos
                            <ul>
                                <li>Nuevo</li>
                            </ul>
                        </li>
                        <li><a href="stock_info.php">ABM</a></li>
                    </ul>
                </li>
                <li>
                    Contraseñas
                    <ul>
                        <li>Mostrar</li>
                        <li>ABM</li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="pagina">
            <form action="" method="post">

                <div class="movimientos">
                    <h2 class="movimientos--title">Nuevo Movimiento</h2>
                    <div class="movimientos--item">
                        <div class="item--col">
                            <label for="">SN:</label>
                            <input type="text" name="sn">
                        </div>
                        <div class="item--col">
                            <label for="">Nombre:</label>
                            <input type="text" name="nombre">
                        </div>
                    </div>
                    <div class="movimientos--item">
<<<<<<< HEAD
                        <div class="item--col">
                            <label for="">Destino:</label>
                            <input type="text" name="descripcion">
                        </div>

                        <div class="item--col">
                            <label for="">Sector:</label>
                            <input type="text" name="descripcion">
                        </div>
                    </div>
                    <div class="movimientos--item">
                        <div class="item--col">
                            <label for="">Destino:</label>
                            <select id="tipo" name="tipo">
                                <option selected disabled>Seleccionar</option>
                                <?php
                                include_once './array_tipos.php';
                                dibujarSelect();
                                ?>
                            </select>
                        </div>
=======
                        <div class="">
                            <label for="">Destino:</label>
                            <input type="text" name="descripcion">
                        </div>
                        <div class="">
                            <label for="">Sector:</label>
                            <input type="text" name="descripcion">
                        </div>
                    </div>
                    <div class="movimientos--item">
                        <div class="">
                            <label for="">Operación:</label>
                            <select id="tipo" name="tipo">
                                <option disabled selected>----seleccionar----</option>
                                <option value="despachado">Despachado</option>
                                <option value="reservado">Reservado</option>
                                <option value="prestado">Prestado</option>
                            </select>
                        </div>
                        <div class="">
                        <label for="">Fecha:</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio">
                        </div>
                        <div class="">
                        <label for="">Fecha Fin:</label>
                        <input type="date" name="fecha_fin" id="fecha_fin">
                        </div>
                    </div>
                    <div class="movimientos--item">
                        <button type="submit" name="submit" value="alta">Guardar</button>
>>>>>>> e6b428d6323d4b1822c5ba0d5e966f92e9353de6
                    </div>
                    <div class="movimientos--item">
                            <div class="item--col">
                                <button type="submit" name="submit" value="alta">Guardar</button>
                            </div>
                        </div>
                </div>

        </div>
        </form>
        </div>
    </main>
</body>

</html>