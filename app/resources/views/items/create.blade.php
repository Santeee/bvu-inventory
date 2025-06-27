<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Nuevo Item - Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1><i class="fas fa-plus-circle"></i> Crear Nuevo Item</h1>
                    <a href="{{ route('items.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver al Inventario
                    </a>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h5><i class="fas fa-exclamation-triangle"></i> Errores de validación:</h5>
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('items.store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <!-- Información Principal -->
                                <div class="col-md-6">
                                    <h4 class="mb-3"><i class="fas fa-info-circle"></i> Información Principal</h4>
                                    
                                    <div class="mb-3">
                                        <label for="elementos" class="form-label">Elemento *</label>
                                        <input type="text" class="form-control @error('elementos') is-invalid @enderror" 
                                               id="elementos" name="elementos" value="{{ old('elementos') }}" required>
                                        @error('elementos')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado">
                                            <option value="">Seleccionar estado</option>
                                            <option value="Nuevo" {{ old('estado') == 'Nuevo' ? 'selected' : '' }}>Nuevo</option>
                                            <option value="Bueno" {{ old('estado') == 'Bueno' ? 'selected' : '' }}>Bueno</option>
                                            <option value="Roto" {{ old('estado') == 'Roto' ? 'selected' : '' }}>Roto</option>
                                        </select>
                                        @error('estado')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="uso" class="form-label">En Uso</label>
                                        <select class="form-select @error('uso') is-invalid @enderror" id="uso" name="uso">
                                            <option value="">Seleccionar</option>
                                            <option value="Sí" {{ old('uso') == 'Sí' ? 'selected' : '' }}>Sí</option>
                                            <option value="No" {{ old('uso') == 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('uso')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="ubicacion" class="form-label">Ubicación</label>
                                        <input type="text" class="form-control @error('ubicacion') is-invalid @enderror" 
                                               id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}">
                                        @error('ubicacion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="destino" class="form-label">Destino</label>
                                        <input type="text" class="form-control @error('destino') is-invalid @enderror" 
                                               id="destino" name="destino" value="{{ old('destino') }}">
                                        @error('destino')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Información Adicional -->
                                <div class="col-md-6">
                                    <h4 class="mb-3"><i class="fas fa-cogs"></i> Información Adicional</h4>
                                    
                                    <div class="mb-3">
                                        <label for="observaciones" class="form-label">Observaciones</label>
                                        <textarea class="form-control @error('observaciones') is-invalid @enderror" 
                                                  id="observaciones" name="observaciones" rows="3">{{ old('observaciones') }}</textarea>
                                        @error('observaciones')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="observaciones_detalle" class="form-label">Observaciones Detalladas</label>
                                        <textarea class="form-control @error('observaciones_detalle') is-invalid @enderror" 
                                                  id="observaciones_detalle" name="observaciones_detalle" rows="3">{{ old('observaciones_detalle') }}</textarea>
                                        @error('observaciones_detalle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="movimiento" class="form-label">Movimiento</label>
                                        <input type="text" class="form-control @error('movimiento') is-invalid @enderror" 
                                               id="movimiento" name="movimiento" value="{{ old('movimiento') }}">
                                        @error('movimiento')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="fecha" class="form-label">Fecha</label>
                                        <input type="date" class="form-control @error('fecha') is-invalid @enderror" 
                                               id="fecha" name="fecha" value="{{ old('fecha') }}">
                                        @error('fecha')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <!-- Información RUBA -->
                                <div class="col-md-6">
                                    <h4 class="mb-3"><i class="fas fa-tags"></i> Clasificación RUBA</h4>
                                    
                                    <div class="mb-3">
                                        <label for="clasificacion_ruba" class="form-label">Clasificación RUBA</label>
                                        <input type="text" class="form-control @error('clasificacion_ruba') is-invalid @enderror" 
                                               id="clasificacion_ruba" name="clasificacion_ruba" value="{{ old('clasificacion_ruba') }}">
                                        @error('clasificacion_ruba')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="carga_ruba" class="form-label">Carga RUBA</label>
                                        <input type="text" class="form-control @error('carga_ruba') is-invalid @enderror" 
                                               id="carga_ruba" name="carga_ruba" value="{{ old('carga_ruba') }}">
                                        @error('carga_ruba')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="estado_general" class="form-label">Estado General</label>
                                        <input type="text" class="form-control @error('estado_general') is-invalid @enderror" 
                                               id="estado_general" name="estado_general" value="{{ old('estado_general') }}">
                                        @error('estado_general')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Información de Ubicación y Operadores -->
                                <div class="col-md-6">
                                    <h4 class="mb-3"><i class="fas fa-map-marker-alt"></i> Ubicación y Operadores</h4>
                                    
                                    <div class="mb-3">
                                        <label for="ubicacion_original" class="form-label">Ubicación Original</label>
                                        <input type="text" class="form-control @error('ubicacion_original') is-invalid @enderror" 
                                               id="ubicacion_original" name="ubicacion_original" value="{{ old('ubicacion_original') }}">
                                        @error('ubicacion_original')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="destino_original" class="form-label">Destino Original</label>
                                        <input type="text" class="form-control @error('destino_original') is-invalid @enderror" 
                                               id="destino_original" name="destino_original" value="{{ old('destino_original') }}">
                                        @error('destino_original')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="nueva_ubicacion" class="form-label">Nueva Ubicación</label>
                                        <input type="text" class="form-control @error('nueva_ubicacion') is-invalid @enderror" 
                                               id="nueva_ubicacion" name="nueva_ubicacion" value="{{ old('nueva_ubicacion') }}">
                                        @error('nueva_ubicacion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="destino_final" class="form-label">Destino Final</label>
                                        <input type="text" class="form-control @error('destino_final') is-invalid @enderror" 
                                               id="destino_final" name="destino_final" value="{{ old('destino_final') }}">
                                        @error('destino_final')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="operador" class="form-label">Operador</label>
                                        <input type="text" class="form-control @error('operador') is-invalid @enderror" 
                                               id="operador" name="operador" value="{{ old('operador') }}">
                                        @error('operador')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="operador_carga" class="form-label">Operador Carga</label>
                                        <input type="text" class="form-control @error('operador_carga') is-invalid @enderror" 
                                               id="operador_carga" name="operador_carga" value="{{ old('operador_carga') }}">
                                        @error('operador_carga')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="fecha_actualizacion_inventario" class="form-label">Fecha Actualización Inventario</label>
                                        <input type="date" class="form-control @error('fecha_actualizacion_inventario') is-invalid @enderror" 
                                               id="fecha_actualizacion_inventario" name="fecha_actualizacion_inventario" value="{{ old('fecha_actualizacion_inventario') }}">
                                        @error('fecha_actualizacion_inventario')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <a href="{{ route('items.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Guardar Item
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 