<!-- TEMPLATE APP-->
<?php include(resource_path('views/config.php')); ?>
<x-template-app.app-layout>
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- token html-->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Control de correspondencia</h3>
                            <h5 class="font-weight-normal mb-0">Circulares Externas</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card custom-card">
                    <div class="card-body">

                        <div>
                            <x-template-tittle.tittle-caption tittle="Cloud" route="{{ route('external.list') }}" />

                            <x-template-form.template-form-input-hidden name="id" value="{{  $item->id }}" />

                            <x-template-form.template-form-input-hidden name="id_cat_salida"
                                value="{{  config('custom_config.CONFIG_CLOUD_SALIDA') }}" />

                            <x-template-form.template-form-input-hidden name="id_cat_entrada"
                                value="{{  config('custom_config.CONFIG_CLOUD_ENTRADA') }}" />

                            <x-template-form.template-form-input-hidden name="id_cat_tipo_oficio"
                                value="{{  config('custom_config.CLOUD_ALFRESCO_CIRCULAR_EXTERNO') }}" />


                            <x-template-tittle.tittle-caption-secon tittle="Doc. seleccionado" />
                            <div class="contenedor">
                                <div class="item">
                                    <label class="etiqueta">No. Turno:</label>
                                    <label class="valor">{{ $item->num_turno_sistema }}</label>
                                </div>
                                <div class="item">
                                    <label class="etiqueta">No. Documento:</label>
                                    <label class="valor">{{ $item->no_documento }}</label>
                                </div>
                                <div class="item">
                                    <label class="etiqueta">Fecha captura:</label>
                                    <label class="valor">{{ $item->fecha_captura }}</label>
                                </div>
                            </div>
                        </div>

                        <!-- modal deelete -->
                        <x-template-form.template-form-delete tittleModal="modalBackdrop" cancelModal="cancelBtn"
                            confirmButton="confirmBtn" />


                        <!-- Contenedor principal con flexbox -->
                        <div class="main-container">
                            <!-- Lado izquierdo -->
                            <div class="left-side">
                                <br>
                                <p class="card-description"
                                    style="font-size: 1rem; font-weight: bold; color: #BC955C; font-style: italic;">
                                    Documentos de Entrada
                                </p>

                                <div>
                                    <div style="display: flex; align-items: center;">
                                        <x-template-tittle.tittle-caption-secon tittle="Oficios (Max 1)" />
                                        <label for="file_oficio_entrada" id="label_oficio_entrada"
                                            style="background-color: white; color: red; font-weight: normal; font-size: 1rem; padding: 5px 15px; cursor: pointer; display: flex; align-items: center; text-decoration: none;">
                                            <i class="fa fa-arrow-up" id="icon_oficio_entrada"
                                                style="margin-right: 5px;"></i>
                                            Cargar
                                        </label>
                                        <input type="file" id="file_oficio_entrada" style="display: none;">
                                    </div>

                                    <div id="container_oficio_entrada_vacio" class="rectangulo">
                                        Sin contenido
                                    </div>
                                    <div id="container_oficio_entrada"></div>
                                </div>

                                <div>
                                    <div style="display: flex; align-items: center;">
                                        <x-template-tittle.tittle-caption-secon tittle="Anexos (Max 3)" />
                                        <label for="file_anexo_entrada" id="label_anexo_entrada"
                                            style="background-color: white; color: red; font-weight: normal; font-size: 1rem; padding: 5px 15px; cursor: pointer; display: flex; align-items: center; text-decoration: none;">
                                            <i class="fa fa-arrow-up" id="icon_anexo_entrada"
                                                style="margin-right: 5px;"></i>
                                            Cargar
                                        </label>
                                        <input type="file" id="file_anexo_entrada" style="display: none;">
                                    </div>
                                    <div id="container_anexo_entrada_vacio" class="rectangulo">
                                        Sin contenido
                                    </div>
                                    <div id="container_anexo_entrada"></div>
                                </div>
                            </div>

                            <!-- Lado derecho -->
                            <div class="right-side">
                                <br>
                                <p class="card-description"
                                    style="font-size: 1rem; font-weight: bold; color: #BC955C; font-style: italic;">
                                    Documentos de Salida
                                </p>

                                <div>
                                    <div>
                                        <div style="display: flex; align-items: center;">
                                            <x-template-tittle.tittle-caption-secon tittle="Oficios (Max 1)" />
                                            <label for="file_oficio_salida" id="label_oficio_salida"
                                                style="background-color: white; color: red; font-weight: normal; font-size: 1rem; padding: 5px 15px; cursor: pointer; display: flex; align-items: center; text-decoration: none;">
                                                <i class="fa fa-arrow-up" id="icon_oficio_salida"
                                                    style="margin-right: 5px;"></i>
                                                Cargar
                                            </label>
                                            <input type="file" id="file_oficio_salida" style="display: none;">
                                        </div>
                                        <div id="container_oficio_salida_vacio" class="rectangulo">
                                            Sin contenido
                                        </div>
                                        <div id="container_oficio_salida"></div>
                                    </div>
                                </div>

                                <div>
                                    <div style="display: flex; align-items: center;">
                                        <x-template-tittle.tittle-caption-secon tittle="Anexos (Max 3)" />
                                        <label for="file_anexo_salida" id="label_anexo_salida"
                                            style="background-color: white; color: red; font-weight: normal; font-size: 1rem; padding: 5px 15px; cursor: pointer; display: flex; align-items: center; text-decoration: none;">
                                            <i class="fa fa-arrow-up" id="icon_anexo_salida"
                                                style="margin-right: 5px;"></i>
                                            Cargar
                                        </label>
                                        <input type="file" id="file_anexo_salida" style="display: none;">
                                    </div>
                                    <div id="container_anexo_salida_vacio" class="rectangulo">
                                        Sin contenido
                                    </div>
                                    <div id="container_anexo_salida"></div>
                                </div>
                            </div>
                            </di>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CODE SCRIPT-->
        <script src="{{ asset('assets/js/app/letter/cloud/cloud.js') }}"></script>
        <script src="{{ asset('assets/js/app/letter/external/cloud.js') }}"></script>

</x-template-app.app-layout>