<?php
include_once "Cliente.php";

//CREATE
// $cliente = new Cliente();
// $cliente->correo= "crisostofrancisco@gmail.com";
// $cliente->nombre= "Francisco Crisosto";
// $cliente->edad= 21;
// $cliente->create();


//UPDATE
// $cliente = Cliente::getByEmail("crisostofrancisco@gmail.com");
// //var_dump($cliente);
// $cliente->nombre = "Francisco Crisosto";
// $cliente->edad = 24;
// $cliente->update();

//DELETE
// $cliente = Cliente::getByEmail("crisostofrancisco@gmail.com");
// $cliente->delete();

//READ
$clientes = Cliente::all();
//var_dump($clientes);

?>
<table>
    <thead>
        <tr>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Edad</th>
        </tr>
    </thead>
    <tbody>
        <?php   foreach ($clientes as $cliente)  {  ?>
        <tr>
            <td><?php echo $cliente->correo;?></td>
            <td><?php echo $cliente->nombre;?></td>
            <td><?php echo $cliente->edad;?></td>
        </tr>
        <?php   }   ?>
    </tbody>
</table>