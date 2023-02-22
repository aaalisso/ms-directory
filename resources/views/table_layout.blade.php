<section class="content-header">
    <div class="container-fluid">
        @yield('table_title')
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn-primary btn-sm" id="add_btn_record" name="add_btn_record" data-bs-toggle="modal" data-bs-target="#addRecord">
                        <i class="fa-solid fa-square-plus"></i>
                        <span>Nuevo Registro</span>
                    </button>
                </div>
                <div class="card-body table-responsive">
                    <div class="dataTables_wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="record_data" class="hover display stripe order-column compact">
                                    <thead class="bg-primary text-white">
                                        @yield('head_data')
                                    </thead>
                                    <tbody>
                                        @yield('row_data')
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>@vite(['resources/js/forms.js'])

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/plug-ins/1.13.2/i18n/es-ES.json"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#record_data').DataTable({
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ],
            pagingType: 'full_numbers',
            language: {
                "decimal": ",",
                "thousands": ".",
                "info": "Mostrando _START_ al _END_ de _TOTAL_",
                "infoEmpty": "Mostrando 0 de 0 - total 0",
                "infoPostFix": "",
                "infoFiltered": "(total registros: _MAX_)",
                "loadingRecords": "Cargando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "processing": "Procesando...",
                "search": "Buscar:",
                "searchPlaceholder": "Término de búsqueda",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                //only works for built-in buttons, not for custom buttons
                "buttons": {
                    "create": "Nuevo",
                    "edit": "Cambiar",
                    "remove": "Borrar",
                    "copy": "Copiar",
                    "csv": "fichero CSV",
                    "excel": "tabla Excel",
                    "pdf": "documento PDF",
                    "print": "Imprimir",
                    "colvis": "Visibilidad columnas",
                    "collection": "Colección",
                    "upload": "Seleccione fichero...."
                },
                "select": {
                    "rows": {
                        _: '%d filas seleccionadas',
                        0: 'clic fila para seleccionar',
                        1: 'una fila seleccionada'
                    }
                }
            }
        });
    });
</script>