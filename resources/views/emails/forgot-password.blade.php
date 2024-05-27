<!DOCTYPE html>
<html>
<head>
    <title>Recuperação de Senha</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f0f0f0; font-family: Arial, sans-serif;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; margin: 0 auto;">
        <tr>
            <td bgcolor="#ffffff" style="padding: 40px 30px 20px; border-radius: 5px; text-align: center;">
                <h2 style="font-size: 24px;">Recuperação de Senha</h2>
                <p style="font-size: 16px;">Use o código abaixo para recuperar sua senha:</p>
                <div style="display: inline-flex; align-items: center; justify-content: center;">
                    @foreach (str_split($token) as $numero)
                        <span style="display: inline-block; font-size: 18px; font-weight: bold; color: #333; width: 30px; height: 30px; background-color: #f5f5f5; border: 1px solid #ddd; border-radius: 5px; margin: 0 5px; text-align: center; line-height: 30px;">{{ $numero }}</span>
                    @endforeach
                </div>
                <p style="font-family: Arial, sans-serif; font-size: 14px; color: #666;">Copie o código acima e cole no aplicativo para completar o processo de recuperação de senha.</p>
            </td>
        </tr>
    </table>
</body>
</html>