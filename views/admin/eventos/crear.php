<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a href="/admin/eventos" class="dashboard__boton">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver 
    </a>
</div>

<div class="dashboard__contenedor dashboard__formulario">

    <?php 
        @include_once __DIR__ . '/../../templates/alertas.php';
    ?>

    <form  method="POST" action="/admin/eventos/crear" class="formulario">
        <?php include_once __DIR__ . '/formulario.php'; ?>

        <input type="submit" class="formulario__submit formulario__submit--registrar" value="Registrar Evento">
    </form>

</div>