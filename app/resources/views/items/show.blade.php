<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Item - Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1><i class="fas fa-eye"></i> Detalles del Item</h1>
                    <div>
                        <a href="{{ route('items.edit', $item) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('items.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver al Inventario
                        </a>
                    </div>
                </div>

                <div class="row">
                    <!-- Información Principal -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-info-circle"></i> Información Principal</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Elemento:</strong></div>
                                    <div class="col-sm-8">{{ $item->elementos }}</div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Estado:</strong></div>
                                    <div class="col-sm-8">
                                        @if($item->estado == 'Nuevo')
                                            <span class="badge bg-success">Nuevo</span>
                                        @elseif($item->estado == 'Bueno')
                                            <span class="badge bg-primary">Bueno</span>
                                        @elseif($item->estado == 'Roto')
                                            <span class="badge bg-danger">Roto</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $item->estado ?? 'N/A' }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>En Uso:</strong></div>
                                    <div class="col-sm-8">
                                        @if($item->uso == 'Sí')
                                            <span class="badge bg-success">Sí</span>
                                        @elseif($item->uso == 'No')
                                            <span class="badge bg-warning">No</span>
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Ubicación:</strong></div>
                                    <div class="col-sm-8">{{ $item->ubicacion ?? 'N/A' }}</div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Destino:</strong></div>
                                    <div class="col-sm-8">{{ $item->destino ?? 'N/A' }}</div>
                                </div>

                                @if($item->observaciones)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Observaciones:</strong></div>
                                    <div class="col-sm-8">{{ $item->observaciones }}</div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Información Adicional -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-cogs"></i> Información Adicional</h5>
                            </div>
                            <div class="card-body">
                                @if($item->observaciones_detalle)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Observaciones Detalladas:</strong></div>
                                    <div class="col-sm-8">{{ $item->observaciones_detalle }}</div>
                                </div>
                                @endif

                                @if($item->movimiento)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Movimiento:</strong></div>
                                    <div class="col-sm-8">{{ $item->movimiento }}</div>
                                </div>
                                @endif

                                @if($item->fecha)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Fecha:</strong></div>
                                    <div class="col-sm-8">{{ $item->fecha->format('d/m/Y') }}</div>
                                </div>
                                @endif

                                @if($item->operador)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Operador:</strong></div>
                                    <div class="col-sm-8">{{ $item->operador }}</div>
                                </div>
                                @endif

                                @if($item->operador_carga)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Operador Carga:</strong></div>
                                    <div class="col-sm-8">{{ $item->operador_carga }}</div>
                                </div>
                                @endif

                                @if($item->fecha_actualizacion_inventario)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Fecha Actualización:</strong></div>
                                    <div class="col-sm-8">{{ $item->fecha_actualizacion_inventario->format('d/m/Y') }}</div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- Información RUBA -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-tags"></i> Clasificación RUBA</h5>
                            </div>
                            <div class="card-body">
                                @if($item->clasificacion_ruba)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Clasificación RUBA:</strong></div>
                                    <div class="col-sm-8">{{ $item->clasificacion_ruba }}</div>
                                </div>
                                @endif

                                @if($item->carga_ruba)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Carga RUBA:</strong></div>
                                    <div class="col-sm-8">{{ $item->carga_ruba }}</div>
                                </div>
                                @endif

                                @if($item->estado_general)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Estado General:</strong></div>
                                    <div class="col-sm-8">{{ $item->estado_general }}</div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Información de Ubicación -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-map-marker-alt"></i> Información de Ubicación</h5>
                            </div>
                            <div class="card-body">
                                @if($item->ubicacion_original)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Ubicación Original:</strong></div>
                                    <div class="col-sm-8">{{ $item->ubicacion_original }}</div>
                                </div>
                                @endif

                                @if($item->destino_original)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Destino Original:</strong></div>
                                    <div class="col-sm-8">{{ $item->destino_original }}</div>
                                </div>
                                @endif

                                @if($item->nueva_ubicacion)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Nueva Ubicación:</strong></div>
                                    <div class="col-sm-8">{{ $item->nueva_ubicacion }}</div>
                                </div>
                                @endif

                                @if($item->destino_final)
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Destino Final:</strong></div>
                                    <div class="col-sm-8">{{ $item->destino_final }}</div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Información del Sistema -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-database"></i> Información del Sistema</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Creado:</strong></div>
                                    <div class="col-sm-8">{{ $item->created_at->format('d/m/Y H:i:s') }}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <div class="col-sm-4"><strong>Última Actualización:</strong></div>
                                    <div class="col-sm-8">{{ $item->updated_at->format('d/m/Y H:i:s') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 