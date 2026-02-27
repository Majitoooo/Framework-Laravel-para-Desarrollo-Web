<h2>Resultados Estudiantes</h2>

<h3>Promedios por carrera</h3>
<ul>
<?php foreach($totales as $c=>$s): ?>
    <li><?= $c ?> → <?= $s/$contador[$c] ?></li>
<?php endforeach; ?>
</ul>

<p><b>Carrera más difícil:</b> <?= $carrera ?> (<?= $promedio ?>)</p>

<h3>Estudiantes sobre promedio</h3>
<ul>
<?php foreach($sobresalientes as $n): ?>
    <li><?= $n ?></li>
<?php endforeach; ?>
</ul>

<hr>

<h2>Resultados Envíos</h2>

<p><b>Costo total entregados:</b> <?= $totalEnvios ?></p>
<p><b>Ciudad con más peso recibido:</b> <?= $ciudadMayor ?> (<?= $pesoMayor ?> kg)</p>
<p><b>Transportista con más entregas:</b> <?= $mejorTransportista ?> (<?= $cantidad ?> entregas)</p>

<hr>

<h1>Calculadora Matemática</h1>

<hr>
<h2>Interés Compuesto</h2>

<form method="POST">
    Capital:
    <input type="number" name="capital" step="any" required><br><br>

    Tasa (ej: 0.05):
    <input type="number" name="tasa" step="any" required><br><br>

    Tiempo:
    <input type="number" name="tiempo" step="any" required><br><br>

    <button name="calcularInteres">Calcular</button>
</form>

<?php if(isset($interesResultado) && $interesResultado !== null): ?>
    <h3>Resultado: <?= number_format($interesResultado,2) ?></h3>
<?php endif; ?>

<hr>

<h2>Conversor de Velocidad</h2>

<form method="POST">

Valor:
<input type="number" step="any" name="valor" required><br><br>

De:
<select name="origen">
<option value="kmh">Km/h</option>
<option value="mph">Millas/h</option>
<option value="ms">m/s</option>
</select>

A:
<select name="destino">
<option value="kmh">Km/h</option>
<option value="mph">Millas/h</option>
<option value="ms">m/s</option>
</select>

<br><br>
<button name="convertirVelocidad">Convertir</button>

</form>

<?php if(isset($velocidadResultado) && $velocidadResultado !== null): ?>
    <h3>Resultado: <?= number_format($velocidadResultado,2) ?></h3>
<?php endif; ?>

<hr>
<h2>Enviar Correo</h2>

<form method="POST">

Destino:
<input type="email" name="destino" required><br><br>

Asunto:
<input type="text" name="asunto" required><br><br>

Mensaje:
<textarea name="mensaje" required></textarea><br><br>

<button name="enviarCorreo">Enviar</button>

</form>

<?php if(isset($correoResultado)): ?>
    <h3>
        <?= $correoResultado ? "Correo enviado correctamente" : "Error enviando correo" ?>
    </h3>
<?php endif; ?>