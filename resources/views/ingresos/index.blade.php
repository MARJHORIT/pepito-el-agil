<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Clasificado Económico de Ingresos - Año Fiscal 2026</title>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  :root {
    --bg: #0a0f1e;
    --surface: #111827;
    --surface2: #1a2235;
    --border: #1e3a5f;
    --accent: #00b4d8;
    --accent2: #0077b6;
    --gold: #f4a261;
    --green: #06d6a0;
    --red: #ef476f;
    --text: #e2e8f0;
    --text2: #94a3b8;
    --text3: #475569;
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: 'Sora', sans-serif;
    background: var(--bg);
    color: var(--text);
    min-height: 100vh;
    overflow-x: hidden;
  }

  body::before {
    content: '';
    position: fixed;
    inset: 0;
    background-image:
      linear-gradient(rgba(0,180,216,0.03) 1px, transparent 1px),
      linear-gradient(90deg, rgba(0,180,216,0.03) 1px, transparent 1px);
    background-size: 40px 40px;
    pointer-events: none;
    z-index: 0;
  }

  .sidebar {
    position: fixed;
    left: 0; top: 0; bottom: 0;
    width: 240px;
    background: var(--surface);
    border-right: 1px solid var(--border);
    display: flex;
    flex-direction: column;
    z-index: 100;
    padding: 0;
  }

  .sidebar-logo {
    padding: 24px 20px;
    border-bottom: 1px solid var(--border);
  }

  .logo-badge {
    display: inline-block;
    background: linear-gradient(135deg, var(--accent2), var(--accent));
    color: white;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2px;
    padding: 4px 10px;
    border-radius: 4px;
    margin-bottom: 8px;
    text-transform: uppercase;
  }

  .sidebar-logo h2 { font-size: 13px; font-weight: 600; color: var(--text); line-height: 1.4; }
  .sidebar-logo span { font-size: 11px; color: var(--text2); font-weight: 300; }

  .nav-section {
    padding: 16px 12px 8px;
    font-size: 10px;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--text3);
    font-weight: 600;
  }

  .nav-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 0;
    transition: all 0.2s;
    font-size: 13px;
    color: var(--text2);
    border-left: 3px solid transparent;
    margin: 1px 0;
    text-decoration: none;
  }

  .nav-item:hover { background: var(--surface2); color: var(--text); border-left-color: var(--accent); }
  .nav-item.active { background: rgba(0,180,216,0.1); color: var(--accent); border-left-color: var(--accent); font-weight: 600; }
  .nav-icon { font-size: 16px; width: 20px; text-align: center; }

  .sidebar-bottom { margin-top: auto; padding: 16px; border-top: 1px solid var(--border); }

  .year-badge {
    background: linear-gradient(135deg, var(--accent2), var(--accent));
    border-radius: 8px;
    padding: 12px;
    text-align: center;
  }

  .year-badge .year-label { font-size: 10px; letter-spacing: 2px; opacity: 0.8; }
  .year-badge .year-num { font-size: 22px; font-weight: 700; font-family: 'JetBrains Mono'; }

  .main { margin-left: 240px; padding: 28px 32px; position: relative; z-index: 1; }

  .topbar { display: flex; align-items: center; justify-content: space-between; margin-bottom: 28px; }
  .page-title h1 { font-size: 22px; font-weight: 700; color: var(--text); }
  .page-title p { font-size: 13px; color: var(--text2); margin-top: 2px; }
  .topbar-right { display: flex; gap: 10px; align-items: center; }

  .btn {
    padding: 9px 18px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
    border: none;
    font-family: 'Sora', sans-serif;
    text-decoration: none;
  }

  .btn-primary { background: linear-gradient(135deg, var(--accent2), var(--accent)); color: white; }
  .btn-primary:hover { opacity: 0.9; transform: translateY(-1px); }
  .btn-ghost { background: var(--surface2); color: var(--text2); border: 1px solid var(--border); }
  .btn-ghost:hover { color: var(--text); border-color: var(--accent); }

  .kpi-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 24px; }

  .kpi-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: 12px;
    padding: 20px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s;
    animation: fadeUp 0.5s ease forwards;
    opacity: 0;
  }

  .kpi-card:hover { border-color: var(--accent); transform: translateY(-2px); box-shadow: 0 8px 30px rgba(0,180,216,0.1); }
  .kpi-card:nth-child(1) { animation-delay: 0.1s; }
  .kpi-card:nth-child(2) { animation-delay: 0.2s; }
  .kpi-card:nth-child(3) { animation-delay: 0.3s; }
  .kpi-card:nth-child(4) { animation-delay: 0.4s; }

  @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

  .kpi-card::before { content: ''; position: absolute; top: 0; right: 0; width: 60px; height: 60px; border-radius: 0 12px 0 60px; opacity: 0.15; }
  .kpi-card.blue::before { background: var(--accent); }
  .kpi-card.gold::before { background: var(--gold); }
  .kpi-card.green::before { background: var(--green); }
  .kpi-card.red::before { background: var(--red); }

  .kpi-label { font-size: 11px; letter-spacing: 1px; text-transform: uppercase; color: var(--text3); font-weight: 600; margin-bottom: 8px; }
  .kpi-value { font-size: 26px; font-weight: 700; font-family: 'JetBrains Mono'; color: var(--text); margin-bottom: 4px; }
  .kpi-value.blue { color: var(--accent); }
  .kpi-value.gold { color: var(--gold); }
  .kpi-value.green { color: var(--green); }
  .kpi-sub { font-size: 12px; color: var(--text2); }

  .card { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; overflow: hidden; }
  .card-header { display: flex; align-items: center; justify-content: space-between; padding: 16px 20px; border-bottom: 1px solid var(--border); }
  .card-title { font-size: 14px; font-weight: 600; color: var(--text); }
  .card-subtitle { font-size: 12px; color: var(--text2); margin-top: 2px; }

  .table-section { margin-bottom: 24px; }

  .table-filters { display: flex; gap: 10px; padding: 16px 20px; border-bottom: 1px solid var(--border); flex-wrap: wrap; }

  .search-box {
    display: flex; align-items: center; gap: 8px;
    background: var(--surface2); border: 1px solid var(--border);
    border-radius: 8px; padding: 8px 14px; flex: 1; min-width: 200px;
    transition: border-color 0.2s;
  }

  .search-box:focus-within { border-color: var(--accent); }
  .search-box input { background: none; border: none; outline: none; color: var(--text); font-size: 13px; font-family: 'Sora', sans-serif; width: 100%; }
  .search-box input::placeholder { color: var(--text3); }

  .filter-select {
    background: var(--surface2); border: 1px solid var(--border); border-radius: 8px;
    padding: 8px 14px; color: var(--text2); font-size: 13px; font-family: 'Sora', sans-serif;
    outline: none; cursor: pointer; transition: border-color 0.2s;
  }
  .filter-select:focus { border-color: var(--accent); }

  .table-wrap { overflow-x: auto; }

  table { width: 100%; border-collapse: collapse; font-size: 13px; }

  thead th {
    background: var(--surface2); color: var(--text3); font-size: 11px;
    letter-spacing: 1px; text-transform: uppercase; font-weight: 600;
    padding: 12px 16px; text-align: left; border-bottom: 1px solid var(--border); white-space: nowrap;
  }

  tbody tr { border-bottom: 1px solid rgba(30,58,95,0.4); transition: background 0.15s; }
  tbody tr:hover { background: rgba(0,180,216,0.04); }
  tbody td { padding: 12px 16px; color: var(--text2); vertical-align: middle; }

  .td-date { font-family: 'JetBrains Mono'; font-size: 12px; color: var(--text3); }
  .td-boleta { font-family: 'JetBrains Mono'; font-size: 12px; color: var(--accent); font-weight: 500; }
  .td-codigo { font-size: 11px; color: var(--text3); max-width: 200px; line-height: 1.4; }
  .td-codigo strong { display: block; color: var(--gold); font-size: 10px; font-family: 'JetBrains Mono'; }
  .td-nombre { font-weight: 500; color: var(--text); font-size: 12px; }
  .td-monto { font-family: 'JetBrains Mono'; font-weight: 600; color: var(--green); text-align: right; }

  .tag { display: inline-block; padding: 3px 8px; border-radius: 4px; font-size: 10px; font-weight: 600; letter-spacing: 0.5px; }
  .tag-pago { background: rgba(6,214,160,0.15); color: var(--green); }
  .tag-orden { background: rgba(0,180,216,0.15); color: var(--accent); }
  .tag-recibo { background: rgba(244,162,97,0.15); color: var(--gold); }

  .form-panel { background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 24px; margin-bottom: 24px; display: none; animation: fadeUp 0.3s ease; }
  .form-panel.show { display: block; }
  .form-title { font-size: 15px; font-weight: 600; margin-bottom: 20px; display: flex; align-items: center; gap: 8px; }

  .form-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 20px; }
  .form-group { display: flex; flex-direction: column; gap: 6px; }
  .form-group.full { grid-column: 1 / -1; }
  .form-group.half { grid-column: span 2; }

  label { font-size: 11px; letter-spacing: 1px; text-transform: uppercase; color: var(--text3); font-weight: 600; }

  input, select, textarea {
    background: var(--surface2); border: 1px solid var(--border); border-radius: 8px;
    padding: 10px 14px; color: var(--text); font-size: 13px; font-family: 'Sora', sans-serif;
    outline: none; transition: border-color 0.2s, box-shadow 0.2s;
  }
  input:focus, select:focus, textarea:focus { border-color: var(--accent); box-shadow: 0 0 0 3px rgba(0,180,216,0.1); }
  select option { background: var(--surface2); }

  .form-actions { display: flex; gap: 10px; justify-content: flex-end; }

  .pagination { display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; border-top: 1px solid var(--border); }
  .pagination-info { font-size: 12px; color: var(--text3); }
  .pagination-btns { display: flex; gap: 4px; }

  .pg-btn { width: 32px; height: 32px; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 13px; cursor: pointer; transition: all 0.2s; background: var(--surface2); border: 1px solid var(--border); color: var(--text2); }
  .pg-btn:hover, .pg-btn.active { background: var(--accent); border-color: var(--accent); color: white; }

  .tabs { display: flex; gap: 0; border-bottom: 1px solid var(--border); }
  .tab { padding: 14px 24px; font-size: 13px; font-weight: 500; cursor: pointer; color: var(--text3); border-bottom: 2px solid transparent; transition: all 0.2s; margin-bottom: -1px; }
  .tab:hover { color: var(--text); }
  .tab.active { color: var(--accent); border-bottom-color: var(--accent); }

  .notif { position: fixed; top: 20px; right: 20px; background: var(--green); color: #0a0f1e; padding: 12px 20px; border-radius: 8px; font-size: 13px; font-weight: 600; z-index: 999; transform: translateX(200px); opacity: 0; transition: all 0.3s; }
  .notif.show { transform: translateX(0); opacity: 1; }

  .pulse { display: inline-block; width: 8px; height: 8px; background: var(--green); border-radius: 50%; animation: pulse 2s infinite; margin-right: 6px; }
  @keyframes pulse { 0%, 100% { opacity: 1; transform: scale(1); } 50% { opacity: 0.5; transform: scale(1.4); } }

  .alert-empty { padding: 40px; text-align: center; color: var(--text3); font-size: 14px; }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-badge">MDH</div>
    <h2>Municipalidad<br>Distrital</h2>
    <span>Gestión Tributaria</span>
  </div>

  <div class="nav-section">Principal</div>
  <a href="/ingresos" class="nav-item active">
    <span class="nav-icon">📋</span> Registro de Ingresos
  </a>

  <div class="nav-section">Gestión</div>
  <a href="#" class="nav-item" onclick="toggleForm(); return false;">
    <span class="nav-icon">➕</span> Nuevo Ingreso
  </a>
  <a href="#" class="nav-item">
    <span class="nav-icon">⬇️</span> Exportar Excel
  </a>
  <a href="#" class="nav-item">
    <span class="nav-icon">🖨️</span> Imprimir Reporte
  </a>

  <div class="sidebar-bottom">
    <div class="year-badge">
      <div class="year-label">AÑO FISCAL</div>
      <div class="year-num">2026</div>
    </div>
  </div>
</aside>

<!-- MAIN -->
<main class="main">

  <!-- TOPBAR -->
  <div class="topbar">
    <div class="page-title">
      <h1>Clasificado Económico de Ingresos</h1>
      <p><span class="pulse"></span>Sistema activo · Año Fiscal 2026</p>
    </div>
    <div class="topbar-right">
      <button class="btn btn-ghost" onclick="toggleForm()">➕ Nuevo Registro</button>
      <button class="btn btn-primary">⬇️ Exportar</button>
    </div>
  </div>

  <!-- KPI CARDS -->
  <div class="kpi-grid">
    <div class="kpi-card blue">
      <div class="kpi-label">Total Recaudado</div>
      <div class="kpi-value blue">S/ {{ number_format($ingresos->sum('total'), 2) }}</div>
      <div class="kpi-sub">Todos los registros</div>
    </div>
    <div class="kpi-card gold">
      <div class="kpi-label">Total Boletas</div>
      <div class="kpi-value gold">{{ $ingresos->count() }}</div>
      <div class="kpi-sub">Registros totales</div>
    </div>
    <div class="kpi-card green">
      <div class="kpi-label">Mayor Ingreso</div>
      <div class="kpi-value green">S/ {{ number_format($ingresos->max('total'), 2) }}</div>
      <div class="kpi-sub">Monto más alto</div>
    </div>
    <div class="kpi-card red">
      <div class="kpi-label">Categorías</div>
      <div class="kpi-value" style="color:var(--red)">{{ $ingresos->unique('categoria')->count() }}</div>
      <div class="kpi-sub">Códigos activos</div>
    </div>
  </div>

  <!-- FORM PANEL -->
  <div class="form-panel" id="formPanel">
    <div class="form-title">➕ Registrar Nuevo Ingreso</div>
    <form action="/ingresos" method="POST">
      @csrf
      <div class="form-grid">
        <div class="form-group">
          <label>Fecha</label>
          <input type="date" name="fecha" value="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
          <label>N° de Boleta</label>
          <input type="number" name="boleta_numero" placeholder="Ej: 7432" style="font-family:'JetBrains Mono'" required>
        </div>
        <div class="form-group">
          <label>Cantidad</label>
          <input type="number" name="cantidad" value="1" min="1" required>
        </div>
        <div class="form-group full">
          <label>Código Presupuestal</label>
          <select name="codigo_presupuestal" required>
            <option value="">-- Seleccionar --</option>
            @foreach(\App\Models\Ingreso::getCodigosPresupuestales() as $codigo => $desc)
              <option value="{{ $codigo }}">{{ $codigo }} — {{ $desc }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group half">
          <label>Nombre del Contribuyente</label>
          <input type="text" name="contribuyente" placeholder="Apellidos y nombres" required>
        </div>
        <div class="form-group">
          <label>Total (S/.)</label>
          <input type="number" name="total" step="0.01" placeholder="0.00" style="font-family:'JetBrains Mono'" required>
        </div>
        <div class="form-group half">
          <label>Motivo de Pago</label>
          <input type="text" name="motivo" placeholder="Ej: Partida de Nacimiento" required>
        </div>
        <div class="form-group">
          <label>Serie / N° Documento</label>
          <input type="text" name="serie_documento" placeholder="Ej: N° 3791">
        </div>
      </div>
      <div class="form-actions">
        <button type="button" class="btn btn-ghost" onclick="toggleForm()">Cancelar</button>
        <button type="submit" class="btn btn-primary">✓ Guardar Registro</button>
      </div>
    </form>
  </div>

  <!-- TABLE -->
  <div class="card table-section">
    <div class="tabs">
      <div class="tab active">Todos los Registros</div>
    </div>
    <div class="table-filters">
      <div class="search-box">
        <span>🔍</span>
        <input type="text" id="searchInput" placeholder="Buscar por nombre, boleta o motivo..." onkeyup="filterTable()">
      </div>
    </div>
    <div class="table-wrap">
      <table id="ingresosTable">
        <thead>
          <tr>
            <th>Fecha</th>
            <th>N° Boleta</th>
            <th>Código / Descripción</th>
            <th>Contribuyente</th>
            <th>Motivo</th>
            <th>Serie</th>
            <th>Cant.</th>
            <th style="text-align:right">Total S/.</th>
          </tr>
        </thead>
        <tbody>
          @forelse($ingresos as $ingreso)
          <tr>
            <td class="td-date">{{ \Carbon\Carbon::parse($ingreso->fecha)->format('d/m/Y') }}</td>
            <td class="td-boleta">#{{ $ingreso->boleta_numero }}</td>
            <td class="td-codigo">
              <strong>{{ $ingreso->codigo_presupuestal }}</strong>
              {{ $ingreso->descripcion_codigo ?? \App\Models\Ingreso::getCodigosPresupuestales()[$ingreso->codigo_presupuestal] ?? '' }}
            </td>
            <td class="td-nombre">{{ strtoupper($ingreso->contribuyente) }}</td>
            <td style="font-size:12px">{{ $ingreso->motivo }}</td>
            <td><span class="tag tag-pago">{{ $ingreso->serie_documento ?? '—' }}</span></td>
            <td style="text-align:center;font-family:'JetBrains Mono'">{{ $ingreso->cantidad }}</td>
            <td class="td-monto">S/ {{ number_format($ingreso->total, 2) }}</td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="alert-empty">📭 No hay ingresos registrados aún. ¡Agrega el primero!</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="pagination">
      <div class="pagination-info">Mostrando {{ $ingresos->count() }} registros</div>
    </div>
  </div>

</main>

<!-- NOTIFICATION -->
<div class="notif" id="notif">✓ Registro guardado correctamente</div>

<script>
  function toggleForm() {
    document.getElementById('formPanel').classList.toggle('show');
  }

  function filterTable() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const rows = document.querySelectorAll('#ingresosTable tbody tr');
    rows.forEach(row => {
      row.style.display = row.textContent.toLowerCase().includes(input) ? '' : 'none';
    });
  }

  @if(session('success'))
    const n = document.getElementById('notif');
    n.classList.add('show');
    setTimeout(() => n.classList.remove('show'), 3000);
  @endif
</script>
</body>
</html>