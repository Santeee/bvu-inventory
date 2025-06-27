<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - Items</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1><i class="fas fa-boxes"></i> Inventario de Items</h1>
                    <a href="{{ route('items.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nuevo Item
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Search Form -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('items.search') }}" method="GET" class="row g-3">
                            <div class="col-md-8">
                                <input type="text" name="query" class="form-control" placeholder="Buscar por elemento, ubicación, destino o estado..." value="{{ $query ?? '' }}">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    <i class="fas fa-search"></i> Buscar
                                </button>
                                @if(isset($query))
                                    <a href="{{ route('items.index') }}" class="btn btn-outline-secondary">
                                        <i class="fas fa-times"></i> Limpiar
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Items Table -->
                <div class="card">
                    <div class="card-body">
                        @if($items->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Elemento</th>
                                            <th>Estado</th>
                                            <th>Uso</th>
                                            <th>Ubicación</th>
                                            <th>Destino</th>
                                            <th>Operador</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $item)
                                            <tr>
                                                <td>
                                                    <strong>{{ $item->elementos }}</strong>
                                                    @if($item->observaciones)
                                                        <br><small class="text-muted">{{ Str::limit($item->observaciones, 50) }}</small>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($item->estado == 'Nuevo')
                                                        <span class="badge bg-success">Nuevo</span>
                                                    @elseif($item->estado == 'Bueno')
                                                        <span class="badge bg-primary">Bueno</span>
                                                    @elseif($item->estado == 'Roto')
                                                        <span class="badge bg-danger">Roto</span>
                                                    @else
                                                        <span class="badge bg-secondary">{{ $item->estado }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($item->uso == 'Sí')
                                                        <span class="badge bg-success">En Uso</span>
                                                    @else
                                                        <span class="badge bg-warning">No Usado</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->ubicacion ?? 'N/A' }}</td>
                                                <td>{{ $item->destino ?? 'N/A' }}</td>
                                                <td>{{ $item->operador ?? 'N/A' }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('items.show', $item) }}" class="btn btn-sm btn-outline-info" title="Ver">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('items.edit', $item) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('items.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de que desea eliminar este item?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="d-flex justify-content-center">
                                {{ $items->links() }}
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                                <h4 class="text-muted">No se encontraron items</h4>
                                <p class="text-muted">No hay items en el inventario o no coinciden con tu búsqueda.</p>
                                <a href="{{ route('items.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Agregar Primer Item
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 