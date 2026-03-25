@extends('layouts.app')

@section('title', 'Editar Ingreso')
@section('subtitle', 'Modificar ingreso existente')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">✏️ Editar Ingreso</div>
        <a href="{{ route('ingresos.index') }}" class="btn btn-secondary">← Cancelar</a>
    </div>
    <div class="card-body">
        <form action="{{ route('ingresos.update', $ingreso) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label class="form-label">N° Boleta</label>
                <input type="text" 
                       class="form-control" 
                       value="{{ $ingreso->boleta_numero }}"
                       readonly>
            </div>
            
            <div class="form-group">
                <label class="form-label">Código Presupuestal *</label>
                <select class="form-select @error('codigo_presupuestal') is-invalid @enderror" 
                        name="codigo_presupuestal" 
                        required>
                    <option value="IMP-001" {{ old('codigo_presupuestal', $ingreso->codigo_presupuestal) == 'IMP-001' ? 'selected' : '' }}>IMP-001 - Impuesto Predial</option>
                    <option value="IMP-002" {{ old('codigo_presupuestal', $ingreso->codigo_presupuestal) == 'IMP-002' ? 'selected' : '' }}>IMP-002 - Arbitrios</option>
                    <option value="IMP-003" {{ old('codigo_presupuestal', $ingreso->codigo_presupuestal) == 'IMP-003' ? 'selected' : '' }}>IMP-003 - Alcabala</option>
                    <option value="TAS-001" {{ old('codigo_presupuestal', $ingreso->codigo_presupuestal) == 'TAS-001' ? 'selected' : '' }}>TAS-001 - Licencias</option>
                    <option value="MUL-001" {{ old('codigo_presupuestal', $ingreso->codigo_presupuestal) == 'MUL-001' ? 'selected' : '' }}>MUL-001 - Multas</option>
                </select>
                @error('codigo_presupuestal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Contribuyente *</label>
                <input type="text" 
                       class="form-control @error('contribuyente') is-invalid @enderror" 
                       name="contribuyente" 
                       value="{{ old('contribuyente', $ingreso->contribuyente) }}"
                       required>
                @error('contribuyente')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Motivo *</label>
                <input type="text" 
                       class="form-control @error('motivo') is-invalid @enderror" 
                       name="motivo" 
                       value="{{ old('motivo', $ingreso->motivo) }}"
                       required>
                @error('motivo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Total S/. *</label>
                <div class="input-group">
                    <span class="input-group-text">S/</span>
                    <input type="number" 
                           step="0.01" 
                           class="form-control @error('total') is-invalid @enderror" 
                           name="total" 
                           value="{{ old('total', $ingreso->total) }}"
                           required>
                </div>
                @error('total')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label class="form-label">Fecha *</label>
                <input type="date" 
                       class="form-control @error('fecha') is-invalid @enderror" 
                       name="fecha" 
                       value="{{ old('fecha', $ingreso->fecha->format('Y-m-d')) }}"
                       required>
                @error('fecha')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div style="display: flex; justify-content: flex-end; gap: 12px; margin-top: 24px;">
                <a href="{{ route('ingresos.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-warning">🔄 Actualizar Ingreso</button>
            </div>
        </form>
    </div>
</div>
@endsection