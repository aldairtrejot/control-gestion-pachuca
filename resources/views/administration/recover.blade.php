<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>SIRH</title>
    <link rel="stylesheet" href="assets/css/login/style.css" />
    <link rel="shortcut icon" href="assets/images/imss/favicon.png" />
    <link rel="stylesheet" href="assets/icons/fontawesome-free-6.6/css/all.min.css">
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="assets/images/imss/logo_imss.png" alt="logo"
                                    style="width: 300px; height: auto" />
                            </div>
                            <h4>Sistema Integral para Recursos Humanos</h4>
                            <h6 class="font-weight-light">Restablecer contraseña</h6>

                            <form class="pt-3" method="POST" action="{{ route('recover.password') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control form-control-lg"
                                        placeholder="Correo electrónico" value="{{ old('email') }}" autocomplete="username" />
                                    @error('email')
                                        <x-template-message-required>
                                            {{ $message }}
                                        </x-template-message-required>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="text" name="captcha" class="form-control form-control-lg"
                                        placeholder="Captcha" value="" autocomplete="current-password">
                                    @error('captcha')
                                        <x-template-message-required>
                                            {{ $message }}
                                        </x-template-message-required>
                                    @enderror
                                </div>

                                <div class="captcha-container">
                                    <img src="{{ captcha_src() }}" id="captcha-img">

                                    <button type="button" class="refresh-btn" title="Refresh"
                                        onclick="document.getElementById('captcha-img').src = '{{ captcha_src() }}?' + Math.random();">
                                        <i class="fas fa-sync-alt"></i> Refrescar
                                    </button>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" style="background-color: #6c757d"
                                        class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        Enviar
                                    </button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    <a href="{{ route('login') }}" class="text-primary">
                                        Regresar al inicio</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>