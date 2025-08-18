<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kích Hoạt Tài Khoản</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f7f7; color: #333; }
        .container { max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);}
        .btn { display: inline-block; padding: 12px 24px; background: #007bff; color: #fff; text-decoration: none; border-radius: 4px; font-weight: bold;}
        .btn:hover { background: #0056b3; }
        .footer { margin-top: 30px; font-size: 13px; color: #888; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Chào mừng bạn đến với D-Shop!</h2>
        <p>Cảm ơn bạn đã đăng ký tài khoản. Vui lòng nhấn vào nút bên dưới để kích hoạt tài khoản của bạn:</p>
        <p style="text-align:center; margin: 30px 0;">
            <a href="{{ url('./activate/'.$token) }}" class="btn">Kích Hoạt Tài Khoản</a>
        </p>
        <p>Nếu bạn không đăng ký tài khoản, vui lòng bỏ qua email này.</p>
        <div class="footer">
            &copy; {{ date('Y') }} D-Shop. Mọi quyền được bảo lưu.
        </div>
    </div>
</body>
</html>