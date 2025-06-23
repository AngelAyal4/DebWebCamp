<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Recupera tu Password</p>

        <?php 
        require_once __DIR__ . '/../templates/alertas.php';
        ?>

    <form method="POST" action="/olvide" class="formulario">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Ingresa tu Email de recuperacion</label>
            <input 
                type="email"
                class="formulario__input"
                placeholder="Tu Email"
                id="email"
                name="email"
            >
        </div>

        <div class="formulario__campo">
            <input
                type="submit"
                class="formulario__submit"
                value="Enviar Instrucciones"
            >
        </div>

        <div class="acciones">
            <a href="/registro" class="acciones__enlace">¿Aún no tienes cuenta? Regístrate</a>
            <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Inicia Sesion</a>
        </div>
    </form>

</main>