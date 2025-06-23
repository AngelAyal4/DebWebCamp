<?php
    foreach ($alertas as $key => $alerta) {
        if (is_array($alerta)) {
            foreach ($alerta as $error) {
                echo "<div class='alerta alerta__{$key}'>{$error}</div>";
            }
        } else {
            echo "<div class='alerta alerta__{$key}'>{$alerta}</div>";
        }
    }
?>