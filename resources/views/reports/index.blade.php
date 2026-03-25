@extends('layouts.app')

@section('title', 'Reportes de Ingresos')
@section('subtitle', 'Resumen fiscal · Año ' . date('Y'))

@section('content')
<div class="kpi-grid">
    <div class="kpi-card blue">
        <div class="kpi-label">Total Recaudado</div>
        <div class="kpi-value blue">S/ {{ number_format($total, 2) }}</div>
        <div class="kpi-sub">Todos los registros</div>
    </div>
    <div class="kpi-card gold">
        <div class="kpi-label">Total Boletas</div>
        <div class="kpi-value gold">{{ $ingresos->total() }}</div>
        <div class="kpi-sub">Registros totales</div>
    </div>
    <div class="kpi-card green">
        <div class="kpi-label">Mayor Ingreso</div>
        <div class="kpi-value green">S/ {{ number_format($ingresos->max('total') ?? 0, 2) }}</div>
        <div class="kpi-sub">Monto más alto</div>
    </div>
    <div class="kpi-card red">
        <div class="kpi-label">Categorías</div>
        <div class="kpi-value" style="color: var(--red)">{{ $codigosPresupuestales->count() }}</div>
        <div class="kpi-sub">Códigos activos</div>
    </div>
</div>

<div class="content-grid">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Todos los Registros</div>
            <span style="font-size:12px;color:var(--text3)">{{ $ingresos->total() }} registros</span>
        </div>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>N° Boleta</th>
                        <th>Código</th>
                        <th>Contribuyente</th>
                        <th>Motivo</th>
                        <th style="text-align:right">Total S/.</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ingresos as $ingreso)
                    <tr>
                        <td class="td-date">{{ $ingreso->fecha->format('d/m/Y') }}</td>
                        <td class="td-boleta">#{{ $ingreso->boleta_numero }}</td>
                        <td style="font-size:11px;color:var(--gold);font-family:'JetBrains Mono'">{{ $ingreso->codigo_presupuestal }}</td>
                        <td style="font-size:12px;font-weight:500;color:var(--text)">{{ $ingreso->contribuyente }}</td>
                        <td style="font-size:12px">{{ $ingreso->motivo }}</td>
                        <td class="td-monto">S/ {{ number_format($ingreso->total, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">📭 No hay registros aún.</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <div class="pagination-info">Total: S/ {{ number_format($total, 2) }}</div>
            <div class="pagination-info">{{ $ingresos->total() }} registros</div>
        </div>
        <div style="padding: 16px;">
            {{ $ingresos->appends(request()->query())->links('pagination::simple-bootstrap-4') }}
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-title">Top Categorías</div>
        </div>
        <div class="card-body" style="padding: 0;">
            @php
                $colores = ['var(--accent)','var(--gold)','var(--green)','#a78bfa','var(--red)','#fb7185'];
                $categorias = $ingresos->groupBy('codigo_presupuestal')->map(fn($g) => $g->sum('total'))->sortDesc()->take(6);
                $maxCat = $categorias->max() ?: 1;
                $i = 0;
            @endphp
            @forelse($categorias as $codigo => $monto)
            <div style="display:flex;align-items:center;padding:12px 20px;border-bottom:1px solid rgba(30,58,95,0.5);gap:12px">
                <div style="width:8px;height:8px;border-radius:50%;background:{{ $colores[$i % 6] }}"></div>
                <div style="flex:1;font-size:12px;color:var(--text2)">{{ $codigo }}</div>
                <div style="width:80px;height:4px;background:var(--surface2);border-radius:2px;overflow:hidden">
                    <div style="height:100%;width:{{ ($monto/$maxCat)*100 }}%;background:{{ $colores[$i % 6] }}"></div>
                </div>
                <div style="font-size:13px;font-weight:600;font-family:'JetBrains Mono';color:var(--text)">S/{{ number_format($monto,0) }}</div>
            </div>
            @php $i++; @endphp
            @empty
            <div class="empty-state" style="padding:30px">Sin datos aún</div>
            @endforelse
        </div>
    </div>
</div>
@endsection