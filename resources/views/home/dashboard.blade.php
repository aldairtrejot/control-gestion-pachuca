<x-template-app.app-layout>
    <?php include(resource_path('views/config.php')); ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Control de correspondencia</h3>
                            <h6 class="font-weight-normal mb-0">¡HOLA {{ Auth::user()->name }}!</h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 grid-margin transparent">

                    <div class="row">
                        <!-- item menu users-->
                        @if($adminMatch)
                            <x-template-button-dash title="Usuarios del sistema" field="ADMINISTRACIÓN"
                                href="{{ route('user.list') }}" icon="fas fa-cogs" description="Administración" />
                        @endif
                        <!-- item menu users-->
                        @if($letterMatch)
                            <x-template-button-dash title="Control de correspondencia" field="CONTROL DE CORRESPONDENCIA"
                                href="{{ route('letter.list') }}" icon="fa fa-archive" description="Correspondencia" />
                        @endif

                    </div>
                </div>
            </div>
        </div>
</x-template-app.app-layout>