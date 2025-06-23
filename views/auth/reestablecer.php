<main class="auth">
    

    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    

    <?php if($token_valido) { ?>

    <p class="auth__texto">
        Reestablece tu password en DevWebCamp.
    </p>

    <form method='POST' class="formulario">
        <div class="formulario__campo">
                <label for="password" class="formulario__label">Password</label>
                <input
                    type="password"
                    class="formulario__input"
                    placeholder="Tu Password"
                    id="password"
                    name="password"
                >
            </div>

            <div class="formulario__campo">
                <label for="password2" class="formulario__label">Repetir Password</label>
                <input
                    type="password"
                    class="formulario__input"
                    placeholder="Repite Tu Password"
                    id="password2"
                    name="password2"
                >
            </div>

            <div class="formulario__campo">
                <input
                    type="submit"
                    class="formulario__submit"
                    value="Reestablecer Password"
                >
            </div>
    </form>
    <?php } else { ?>
    <p class="auth__texto">
        Token no válido o ha expirado. Por favor, solicita un nuevo enlace de reestablecimiento de contraseña. Haciendo click <a href="/olvide">aquí</a>.
    </p>
    <?php } ?>
</main>