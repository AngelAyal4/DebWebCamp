<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información del Evento</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre del Evento</label>
        <input
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre del Evento"
            value="<?php echo $evento->nombre; ?>"
            
        >
    </div>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Descripción del Evento</label>
        <textarea
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            placeholder="Descripción del Evento"
            rows = "8"
        > <?php echo $evento->descripcion; ?> </textarea>
    </div>

    <div class="formulario__campo">
        <label for="caegoria" class="formulario__label">Categoría o Tipo de Evento</label>
        <select 
            class="formulario__select"
            name="categoria_id" 
            id="categoria"
            >
            <option value="">- Seleccionar -</option>
        
            <?php foreach($categorias as $categoria) { ?>
                <option <?php echo ($evento->categoria_id == $categoria->id) ? 'selected' : ''; ?> value="<?php echo $categoria->id; ?>">
                    <?php echo $categoria->nombre; ?>
                </option>
            <?php } ?>
    
        </select>
    </div>

    <div class="formulario__campo">
        <label for="caegoria" class="formulario__label">Categoría o Tipo de Evento</label>

        <div class="formulario__radio">
            <?php foreach($dias as $dia) { ?>
                <div>
                    <label for="<?php echo strtolower($dia->nombre); ?>"><?php echo $dia->nombre; ?></label>
                    <input
                        type="radio"
                        id="<?php echo strtolower($dia->nombre); ?>"
                        name="dia_id"
                        value="<?php echo $dia->id; ?>"
                    />
                </div>
            <?php } ?>
        </div>
    </div>

    <div id="horas" class="formulario__campo">
        <label class="formulario__label">Seleccionar Hora</label>

        <ul id="horas" class="horas">
            <?php foreach($horas as $hora) { ?>
                <li data-hora-id="<?php echo $hora->id; ?>" class="horas__hora horas__hora--deshabilitada"><?php echo $hora->hora; ?></li>
            <?php } ?>
        </ul>

        <input type="hidden" name="hora_id" value="<?php echo $evento->hora_id; ?>">
    </div>

</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente</label>
        <input
            type="text"
            class="formulario__input"
            id="ponentes"
            placeholder="Buscar Ponente"
        >
        <!--<ul id="listado-ponentes" class="listado-ponentes"></ul>-->

        <input type="hidden" name="ponente_id" value="<?php echo $evento->ponente_id; ?>">
    </div>

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles</label>
        <input
            type="number"
            min="1"
            class="formulario__input"
            id="disponibles"
            name="disponibles"
            placeholder="Ej. 20"
            value="<?php echo $evento->disponibles; ?>"
        >
    </div>

</fieldset>