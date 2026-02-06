<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo mensaje de contacto - Hotel Daphne Breeze</title>
</head>
<body style="font-family: 'Montserrat', Arial, sans-serif; line-height: 1.6; color: #4A311E; background-color: #D5D5D5; padding: 20px; margin: 0;">
    <div style="max-width: 600px; margin: 0 auto; background-color: rgba(255, 255, 255, 0.6); border: 1px solid rgba(74, 49, 30, 0.1); border-radius: 12px; padding: 24px 32px;">
        <div style="text-align: center; margin-bottom: 32px;">
            <h1 style="color: #4A311E; font-size: 24px; font-weight: bold; margin: 0 0 4px 0;">Contacto</h1>
            <p style="color: rgba(74, 49, 30, 0.7); font-size: 14px; margin: 0; font-style: italic;">Nuevo mensaje de contacto</p>
        </div>

        <div style="margin-bottom: 24px;">
            <div style="margin-bottom: 20px;">
                <p style="margin: 0 0 6px 0; font-size: 14px; color: rgba(74, 49, 30, 0.9); font-weight: 500;">Nombre</p>
                <p style="margin: 0; color: #4A311E; font-size: 16px; font-weight: 400;">{{ $name }}</p>
            </div>

            <div style="margin-bottom: 20px;">
                <p style="margin: 0 0 6px 0; font-size: 14px; color: rgba(74, 49, 30, 0.9); font-weight: 500;">Correo electrónico</p>
                <p style="margin: 0;"><a href="mailto:{{ $email }}" style="color: #D08E36; text-decoration: none; font-size: 16px; font-weight: 400;">{{ $email }}</a></p>
            </div>

            <div style="margin-bottom: 20px;">
                <p style="margin: 0 0 6px 0; font-size: 14px; color: rgba(74, 49, 30, 0.9); font-weight: 500;">Asunto</p>
                <p style="margin: 0; color: #4A311E; font-size: 16px; font-weight: 400;">{{ $contactSubject }}</p>
            </div>
        </div>

        <div style="margin-bottom: 20px;">
            <p style="margin: 0 0 6px 0; font-size: 14px; color: rgba(74, 49, 30, 0.9); font-weight: 500;">Mensaje</p>
            <p style="margin: 0; color: #4A311E; font-size: 16px; font-weight: 400; line-height: 1.7; white-space: pre-wrap;">{{ $contactMessage }}</p>
        </div>

        <div style="margin-top: 32px; padding-top: 20px; border-top: 1px solid rgba(74, 49, 30, 0.1); text-align: center;">
            <p style="margin: 0; font-size: 12px; color: rgba(74, 49, 30, 0.6);">
                Este mensaje fue enviado desde el formulario de contacto del sitio web.
            </p>
        </div>
    </div>
</body>
</html>
