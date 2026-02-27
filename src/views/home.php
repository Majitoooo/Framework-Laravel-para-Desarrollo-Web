<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema PHP MVC</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
  :root {
    --ink: #0f0f14;
    --surface: #f5f4f0;
    --card-bg: #ffffff;
    --accent: #e84b2e;
    --accent2: #2e6be8;
    --accent3: #18b96a;
    --muted: #7a7a8a;
    --border: #e2e2e8;
    --shadow: 0 2px 16px rgba(15,15,20,.07);
  }

  * { box-sizing: border-box; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--surface);
    color: var(--ink);
    min-height: 100vh;
  }

  /* ── NAV ── */
  .site-nav {
    background: var(--ink);
    padding: 0 2rem;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: sticky;
    top: 0;
    z-index: 100;
  }
  .site-nav .brand {
    font-family: 'Syne', sans-serif;
    font-weight: 800;
    font-size: 1.15rem;
    color: #fff;
    letter-spacing: -.02em;
    flex-shrink: 0;
  }
  .site-nav .brand span { color: var(--accent); }
  .nav-pills-custom { display: flex; gap: .35rem; flex-wrap: wrap; }
  .nav-pills-custom a {
    color: #aaa;
    font-size: .73rem;
    font-weight: 500;
    padding: .28rem .65rem;
    border-radius: 999px;
    text-decoration: none;
    transition: all .2s;
    letter-spacing: .03em;
    white-space: nowrap;
  }
  .nav-pills-custom a:hover { color: #fff; background: rgba(255,255,255,.1); }

  /* ── LAYOUT ── */
  .page-wrap { max-width: 1140px; margin: 0 auto; padding: 2.5rem 1.5rem 4rem; }

  /* ── SECTION HEADERS ── */
  .section-label {
    font-family: 'Syne', sans-serif;
    font-size: .68rem;
    font-weight: 700;
    letter-spacing: .15em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: .35rem;
  }
  .section-title {
    font-family: 'Syne', sans-serif;
    font-size: 1.55rem;
    font-weight: 800;
    margin-bottom: 1.25rem;
    line-height: 1.15;
    letter-spacing: -.03em;
  }

  /* ── PANEL ── */
  .panel {
    background: var(--card-bg);
    border-radius: 16px;
    border: 1px solid var(--border);
    box-shadow: var(--shadow);
    overflow: hidden;
  }
  .panel-header {
    padding: 1rem 1.4rem;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    gap: .65rem;
  }
  .panel-header .panel-icon {
    width: 32px; height: 32px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: .95rem;
    flex-shrink: 0;
  }
  .panel-header h5 {
    font-family: 'Syne', sans-serif;
    font-size: .93rem;
    font-weight: 700;
    margin: 0;
    letter-spacing: -.01em;
  }
  .panel-body { padding: 1.4rem; }

  /* ── STAT ROWS ── */
  .stat-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: .6rem 0;
    border-bottom: 1px solid var(--border);
    font-size: .89rem;
  }
  .stat-row:last-child { border-bottom: none; }
  .stat-badge {
    font-family: 'Syne', sans-serif;
    font-size: .8rem;
    font-weight: 700;
    padding: .22rem .65rem;
    border-radius: 999px;
    background: var(--ink);
    color: #fff;
  }

  /* ── HIGHLIGHT BOX ── */
  .highlight-box {
    background: linear-gradient(135deg, #fff5f3, #fff);
    border: 1.5px solid #f5cfc8;
    border-radius: 12px;
    padding: .9rem 1.1rem;
    margin-top: 1rem;
    display: flex;
    align-items: center;
    gap: .7rem;
  }
  .highlight-box .hi-icon { font-size: 1.3rem; }
  .highlight-box .hi-label { font-size: .7rem; color: var(--muted); font-weight: 500; text-transform: uppercase; letter-spacing: .08em; }
  .highlight-box .hi-val { font-family: 'Syne', sans-serif; font-weight: 800; font-size: .95rem; color: var(--accent); }

  /* ── STUDENT LIST ── */
  .student-item {
    display: flex;
    align-items: center;
    gap: .7rem;
    padding: .5rem 0;
    border-bottom: 1px solid var(--border);
    font-size: .87rem;
  }
  .student-item:last-child { border-bottom: none; }
  .student-avatar {
    width: 28px; height: 28px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2e6be8, #18b96a);
    color: #fff;
    font-size: .68rem;
    font-weight: 700;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }

  /* ── ENVÍO STATS ── */
  .envio-stat {
    display: flex;
    flex-direction: column;
    gap: .12rem;
    padding: 1rem;
    border-radius: 12px;
    background: var(--surface);
    border: 1px solid var(--border);
    height: 100%;
  }
  .envio-stat .es-icon { font-size: 1.3rem; margin-bottom: .2rem; }
  .envio-stat .es-label { font-size: .7rem; color: var(--muted); font-weight: 500; text-transform: uppercase; letter-spacing: .07em; }
  .envio-stat .es-val { font-family: 'Syne', sans-serif; font-size: 1.05rem; font-weight: 800; }
  .envio-stat .es-sub { font-size: .76rem; color: var(--muted); }

  /* ── FORMS ── */
  .form-label {
    font-size: .75rem;
    font-weight: 600;
    letter-spacing: .04em;
    text-transform: uppercase;
    color: var(--muted);
    margin-bottom: .28rem;
  }
  .form-control, .form-select {
    border: 1.5px solid var(--border);
    border-radius: 10px;
    font-size: .88rem;
    padding: .52rem .85rem;
    transition: border-color .2s, box-shadow .2s;
    background: var(--surface);
  }
  .form-control:focus, .form-select:focus {
    border-color: var(--ink);
    box-shadow: 0 0 0 3px rgba(15,15,20,.08);
    background: #fff;
    outline: none;
  }
  textarea.form-control { resize: vertical; min-height: 100px; }
  input[type="file"].form-control { padding: .38rem .85rem; cursor: pointer; }

  /* ── BUTTONS ── */
  .btn-ink {
    background: var(--ink);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-family: 'Syne', sans-serif;
    font-size: .83rem;
    font-weight: 700;
    padding: .58rem 1.1rem;
    letter-spacing: .03em;
    transition: opacity .18s, transform .14s;
    width: 100%;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: .35rem;
  }
  .btn-ink:hover { opacity: .84; transform: translateY(-1px); color: #fff; }
  .btn-ink:active { transform: translateY(0); }
  .btn-ink.green { background: var(--accent3); }
  .btn-ink.blue  { background: var(--accent2); }
  .btn-ink.red   { background: var(--accent);  }

  /* ── RESULT BLOCKS ── */
  .result-block {
    padding: .78rem 1rem;
    border-radius: 10px;
    font-family: 'Syne', sans-serif;
    font-weight: 700;
    font-size: .92rem;
    text-align: center;
    margin-top: .9rem;
  }
  .result-green { background: #e8faf3; color: var(--accent3); border: 1.5px solid #b3ecd3; }
  .result-blue  { background: #eef3fe; color: var(--accent2); border: 1.5px solid #bdd0fc; }
  .result-dark  { background: #f2f2f5; color: var(--ink);     border: 1.5px solid var(--border); }
  .result-red   { background: #fef0ee; color: var(--accent);  border: 1.5px solid #f5cfc8; }

  /* ── IMAGE PREVIEW ── */
  .img-preview {
    margin-top: .9rem;
    border-radius: 12px;
    overflow: hidden;
    border: 1.5px solid var(--border);
    background: var(--surface);
  }
  .img-preview img { width: 100%; max-height: 260px; object-fit: contain; padding: .5rem; display: block; }
  .img-preview-label {
    font-size: .7rem;
    color: var(--muted);
    padding: .38rem .8rem;
    border-top: 1px solid var(--border);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: .06em;
  }

  /* ── SPEED ROW ── */
  .speed-row { display: grid; grid-template-columns: 1fr auto 1fr; align-items: end; gap: .5rem; }
  .speed-arrow { font-size: 1.1rem; color: var(--muted); padding-bottom: .55rem; text-align: center; }

  /* ── SECTION ── */
  .section { margin-bottom: 2.75rem; }

  /* ── ANCHOR OFFSET (por el nav sticky) ── */
  [id] { scroll-margin-top: 76px; }

  @media (max-width: 576px) {
    .section-title { font-size: 1.2rem; }
    .nav-pills-custom { display: none; }
  }
</style>
</head>
<body>

<!-- ═══ NAV ═══ -->
<nav class="site-nav">
  <div class="brand">TALLER PHP<span>AVANZADO</span></div>
  <div class="nav-pills-custom">
    <a href="#estudiantes"><i class="bi bi-mortarboard me-1"></i>Estudiantes</a>
    <a href="#envios"><i class="bi bi-truck me-1"></i>Envíos</a>
    <a href="#calculadora"><i class="bi bi-calculator me-1"></i>Calculadora</a>
    <a href="#correo"><i class="bi bi-envelope me-1"></i>Correo</a>
    <a href="#imagen"><i class="bi bi-image me-1"></i>Imagen</a>
  </div>
</nav>

<div class="page-wrap">

  <!-- ══════════════════════════════
       MÓDULO 1 · ESTUDIANTES
  ═══════════════════════════════ -->
  <section class="section" id="estudiantes">
    <div class="section-label">Módulo 1</div>
    <div class="section-title">Resultados Estudiantes</div>
    <div class="row g-3">

      <div class="col-md-6">
        <div class="panel h-100">
          <div class="panel-header">
            <div class="panel-icon" style="background:#eef3fe"><i class="bi bi-bar-chart-fill" style="color:var(--accent2)"></i></div>
            <h5>Promedios por carrera</h5>
          </div>
          <div class="panel-body">
            <?php foreach($totales as $c => $s): ?>
            <div class="stat-row">
              <span><?= $c ?></span>
              <span class="stat-badge"><?= number_format($s / $contador[$c], 2) ?></span>
            </div>
            <?php endforeach; ?>
            <div class="highlight-box">
              <span class="hi-icon">🔥</span>
              <div>
                <div class="hi-label">Carrera más difícil</div>
                <div class="hi-val"><?= $carrera ?> — <?= number_format($promedio, 2) ?></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel h-100">
          <div class="panel-header">
            <div class="panel-icon" style="background:#e8faf3"><i class="bi bi-person-check-fill" style="color:var(--accent3)"></i></div>
            <h5>Estudiantes sobre promedio</h5>
          </div>
          <div class="panel-body">
            <?php foreach($sobresalientes as $n): ?>
            <div class="student-item">
              <div class="student-avatar"><?= strtoupper(substr($n, 0, 2)) ?></div>
              <span><?= $n ?></span>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ══════════════════════════════
       MÓDULO 2 · ENVÍOS
  ═══════════════════════════════ -->
  <section class="section" id="envios">
    <div class="section-label">Módulo 2</div>
    <div class="section-title">Resultados Envíos</div>
    <div class="panel">
      <div class="panel-body">
        <div class="row g-3">
          <div class="col-sm-4">
            <div class="envio-stat">
              <span class="es-icon">💰</span>
              <span class="es-label">Costo total entregados</span>
              <span class="es-val" style="color:var(--accent3)">$<?= number_format($totalEnvios) ?></span>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="envio-stat">
              <span class="es-icon">📦</span>
              <span class="es-label">Ciudad con más peso</span>
              <span class="es-val"><?= $ciudadMayor ?></span>
              <span class="es-sub"><?= $pesoMayor ?> kg recibidos</span>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="envio-stat">
              <span class="es-icon">🚚</span>
              <span class="es-label">Mejor transportista</span>
              <span class="es-val"><?= $mejorTransportista ?></span>
              <span class="es-sub"><?= $cantidad ?> entregas</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════════════════════════
       MÓDULO 3 · CALCULADORA
  ═══════════════════════════════ -->
  <section class="section" id="calculadora">
    <div class="section-label">Módulo 3</div>
    <div class="section-title">Calculadora Matemática</div>
    <div class="row g-3">

      <!-- Interés Compuesto -->
      <div class="col-md-6">
        <div class="panel h-100">
          <div class="panel-header">
            <div class="panel-icon" style="background:#e8faf3"><i class="bi bi-percent" style="color:var(--accent3)"></i></div>
            <h5>Interés Compuesto</h5>
          </div>
          <div class="panel-body">
            <!-- action apunta al ancla #calculadora para volver aquí tras el POST -->
            <form method="POST" action="?#calculadora">
              <input type="hidden" name="calcularInteres" value="1">
              <div class="mb-3">
                <label class="form-label">Capital inicial</label>
                <input type="number" name="capital" step="any" class="form-control" placeholder="10000"
                  value="<?= htmlspecialchars($_POST['capital'] ?? '') ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Tasa anual (ej: 0.05)</label>
                <input type="number" name="tasa" step="any" class="form-control" placeholder="0.05"
                  value="<?= htmlspecialchars($_POST['tasa'] ?? '') ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Tiempo (años)</label>
                <input type="number" name="tiempo" step="any" class="form-control" placeholder="5"
                  value="<?= htmlspecialchars($_POST['tiempo'] ?? '') ?>" required>
              </div>
              <button type="submit" class="btn-ink green">
                <i class="bi bi-calculator"></i> Calcular
              </button>
            </form>
            <?php if (isset($interesResultado) && $interesResultado !== null): ?>
            <div class="result-block result-green">
              <i class="bi bi-check-circle me-1"></i>Resultado: <?= number_format($interesResultado, 2) ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <!-- Conversor de Velocidad -->
      <div class="col-md-6">
        <div class="panel h-100">
          <div class="panel-header">
            <div class="panel-icon" style="background:#eef3fe"><i class="bi bi-speedometer2" style="color:var(--accent2)"></i></div>
            <h5>Conversor de Velocidad</h5>
          </div>
          <div class="panel-body">
            <form method="POST" action="?#calculadora">
              <input type="hidden" name="convertirVelocidad" value="1">
              <div class="mb-3">
                <label class="form-label">Valor a convertir</label>
                <input type="number" step="any" name="valor" class="form-control" placeholder="100"
                  value="<?= htmlspecialchars($_POST['valor'] ?? '') ?>" required>
              </div>
              <div class="speed-row mb-3">
                <div>
                  <label class="form-label">De</label>
                  <select name="origen" class="form-select">
                    <?php foreach (['kmh'=>'Km/h','mph'=>'Millas/h','ms'=>'m/s'] as $v=>$l): ?>
                    <option value="<?= $v ?>" <?= (($_POST['origen'] ?? '') === $v) ? 'selected' : '' ?>><?= $l ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="speed-arrow"><i class="bi bi-arrow-right"></i></div>
                <div>
                  <label class="form-label">A</label>
                  <select name="destino" class="form-select">
                    <?php foreach (['kmh'=>'Km/h','mph'=>'Millas/h','ms'=>'m/s'] as $v=>$l): ?>
                    <option value="<?= $v ?>" <?= (($_POST['destino'] ?? '') === $v) ? 'selected' : '' ?>><?= $l ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn-ink blue">
                <i class="bi bi-arrow-left-right"></i> Convertir
              </button>
            </form>
            <?php if (isset($velocidadResultado) && $velocidadResultado !== null): ?>
            <div class="result-block result-blue">
              <i class="bi bi-lightning-fill me-1"></i>Resultado: <?= number_format($velocidadResultado, 2) ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ══════════════════════════════
       MÓDULO 4 · CORREO
  ═══════════════════════════════ -->
  <section class="section" id="correo">
    <div class="section-label">Módulo 4</div>
    <div class="section-title">Enviar Correo</div>
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div class="panel">
          <div class="panel-header">
            <div class="panel-icon" style="background:#f5f4f0"><i class="bi bi-envelope-fill" style="color:var(--ink)"></i></div>
            <h5>Nuevo mensaje</h5>
          </div>
          <div class="panel-body">
            <form method="POST" action="?#correo">
              <input type="hidden" name="enviarCorreo" value="1">
              <div class="mb-3">
                <label class="form-label">Destinatario</label>
                <input type="email" name="destino" class="form-control" placeholder="correo@ejemplo.com"
                  value="<?= htmlspecialchars($_POST['destino'] ?? '') ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Asunto</label>
                <input type="text" name="asunto" class="form-control" placeholder="Escribe el asunto del correo..."
                  value="<?= htmlspecialchars($_POST['asunto'] ?? '') ?>" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Mensaje</label>
                <textarea name="mensaje" class="form-control" placeholder="Escribe el cuerpo del mensaje..." required><?= htmlspecialchars($_POST['mensaje'] ?? '') ?></textarea>
              </div>
              <button type="submit" class="btn-ink">
                <i class="bi bi-send"></i> Enviar correo
              </button>
            </form>
            <?php if (isset($correoEstado)): ?>
            <div class="result-block result-dark">
              <i class="bi bi-envelope-check me-1"></i><?= $correoEstado ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ══════════════════════════════
       MÓDULO 5 · IMAGEN
  ═══════════════════════════════ -->
  <section class="section" id="imagen">
    <div class="section-label">Módulo 5</div>
    <div class="section-title">Subir Imagen</div>
    <div class="row justify-content-center">
      <div class="col-md-7">
        <div class="panel">
          <div class="panel-header">
            <div class="panel-icon" style="background:#fff5f3"><i class="bi bi-image-fill" style="color:var(--accent)"></i></div>
            <h5>Cargar archivo de imagen</h5>
          </div>
          <div class="panel-body">
            <form method="POST" action="?#imagen" enctype="multipart/form-data">
              <input type="hidden" name="subirImagen" value="1">
              <div class="mb-3">
                <label class="form-label">Seleccionar imagen</label>
                <input type="file" name="imagen" id="inputImagen" class="form-control" accept="image/*" required>
              </div>
              <!-- Vista previa local (JS, antes de subir) -->
              <div class="img-preview" id="prevLocal" style="display:none">
                <img id="prevLocalImg" src="" alt="Vista previa">
                <div class="img-preview-label"><i class="bi bi-eye me-1"></i>Vista previa local</div>
              </div>
              <button type="submit" class="btn-ink red mt-3">
                <i class="bi bi-cloud-upload"></i> Subir imagen
              </button>
            </form>

            <?php if (isset($rutaImagen)): ?>
            <div class="result-block result-green">
              <i class="bi bi-check-circle me-1"></i>¡Imagen subida correctamente!
            </div>
            <div class="img-preview">
              <img src="<?= htmlspecialchars($rutaImagen) ?>" alt="Imagen subida">
              <div class="img-preview-label"><i class="bi bi-cloud-check me-1"></i>Guardada en el servidor</div>
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

</div><!-- /page-wrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
/* Vista previa local de imagen (solo JS, no requiere servidor) */
document.getElementById('inputImagen').addEventListener('change', function () {
  const file  = this.files[0];
  const wrap  = document.getElementById('prevLocal');
  const img   = document.getElementById('prevLocalImg');
  if (file && file.type.startsWith('image/')) {
    img.src = URL.createObjectURL(file);
    wrap.style.display = 'block';
  } else {
    wrap.style.display = 'none';
  }
});
</script>
</body>
</html>