<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Control de correspondencia</title>
</head>

<body
    style="margin:0; padding:20px; background-color:#f9f9f9; font-family:Segoe UI, Tahoma, Geneva, Verdana, sans-serif;">
    <table align="center" cellpadding="0" cellspacing="0" width="600"
        style="background-color:#ffffff; border-radius:10px; box-shadow:0 4px 12px rgba(0,0,0,0.1); overflow:hidden;">
        <tr style="background-color:#7b1f32;">
            <td style="padding:20px 30px;">
                <h1 style="color:#fff; font-size:20px; margin:0;">Control de correspondencia</h1>
                <p style="color:#c9a54b; font-size:14px; margin:5px 0 0;">Turno informativo</p>
            </td>
        </tr>
        <tr>
            <td style="padding:30px; color:#333333;">
                <p style="font-size:16px; line-height:1.6;">
                    Estimado(a) {{ $nameUser }}, este correo tiene como propósito informar algunos puntos
                    importantes relacionados con
                    la correspondencia:
                </p>

                <table width="100%" cellpadding="8" cellspacing="0" style="margin-top:20px; font-size:16px;">
                    <tr>
                        <td width="45%" style="font-weight:bold; color:#7b1f32;">No. Turno:</td>
                        <td style="color:#000000">{{ $mailBody->num_turno_sistema }}</td>
                    </tr>
                    <tr>
                        <td width="45%" style="font-weight:bold; color:#7b1f32;">No. Documento:</td>
                        <td style="color:#000000">{{ $mailBody->num_documento }}</td>
                    </tr>
                    <tr>
                        <td width="45%" style="font-weight:bold; color:#7b1f32;">Turnado a:</td>
                        <td style="color:#000000">{{ $mailBody->area_descripcion }}</td>
                    </tr>
                    <tr>
                        <td width="45%" style="font-weight:bold; color:#7b1f32;">Asunto:</td>
                        <td style="color:#000000">{{ $mailBody->asunto }}</td>
                    </tr>
                </table>

                <p style="font-size:16px; line-height:1.6; margin-top:30px;">
                    Saludos cordiales,
                </p>
            </td>
        </tr>
        <tr>
            <td style="padding:20px; background-color:#f2f2f2; text-align:center;">
                <p style="font-size:13px; color:#777777;">
                    Este es un correo de notificación automática. Por favor, no responda a este mensaje.
                </p>
            </td>
        </tr>
    </table>
    <br><br>
</body>

</html>
