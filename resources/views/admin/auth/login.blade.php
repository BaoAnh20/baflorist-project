<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập quản trị | BA Florist</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --forest: #092711;
            --green: #28583b;
            --orange: #f59e0b;
            --text: #292d2a;
            --muted: #929790;
        }

        *, *::before, *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            min-height: 100dvh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px;
            font-family: 'Inter', sans-serif;
            background: var(--forest);
            overflow-x: hidden;
        }

        /* Khung chính */
        .login-main-card {
            width: 100%;
            max-width: 1200px;
            min-height: 740px;
            padding: 18px;
            background: #fff;
            border: none;
            border-radius: 54px;
            box-shadow: 0 30px 90px rgba(0, 0, 0, .18);
            animation: cardAppear .8s ease both;
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-row {
            min-height: 704px;
        }

        /* Khu vực form */
        .login-form-side {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 55px 50px;
            background: #fff;
        }

        .login-content {
            width: 100%;
            max-width: 390px;
        }

        .brand-label {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 28px;
            color: var(--green);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .brand-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #8ba98b;
            box-shadow: 0 0 0 5px #edf4ed;
        }

        .welcome-title {
            margin-bottom: 13px;
            color: var(--text);
            font-size: clamp(28px, 3vw, 36px);
            font-weight: 800;
            letter-spacing: -1.5px;
            line-height: 1.3;
        }

        .welcome-description {
            margin-bottom: 34px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.8;
        }

        .form-label {
            margin-bottom: 9px;
            color: #414841;
            font-size: 12px;
            font-weight: 600;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap > i {
            position: absolute;
            top: 50%;
            left: 17px;
            z-index: 2;
            color: #a0a69f;
            font-size: 14px;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .form-control {
            min-height: 52px;
            padding: 13px 45px 13px 45px;
            border: 1px solid #e5e8e3;
            border-radius: 15px;
            background: #fafbf9;
            color: var(--text);
            font-size: 13px;
            transition: border-color .25s ease, box-shadow .25s ease, background .25s ease;
        }

        .form-control::placeholder {
            color: #b3b7b1;
        }

        .form-control:focus {
            border-color: #70947a;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(63, 116, 75, .09);
        }

        .password-toggle {
            position: absolute;
            top: 50%;
            right: 17px;
            padding: 0;
            border: none;
            background: transparent;
            color: #929a91;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .form-check-input {
            border-color: #d5dcd4;
            cursor: pointer;
        }

        .form-check-input:checked {
            border-color: var(--green);
            background-color: var(--green);
        }

        .form-check-label,
        .forgot-link {
            color: #81877f;
            font-size: 11px;
        }

        .forgot-link {
            font-weight: 500;
            text-decoration: none;
        }

        .forgot-link:hover,
        .back-link:hover {
            color: var(--green);
        }

        .btn-login {
            min-height: 53px;
            border: none;
            border-radius: 15px;
            background: linear-gradient(110deg, #f9a21b, #f28a0c);
            box-shadow: 0 8px 18px rgba(242, 138, 12, .18);
            color: #fff;
            font-size: 13px;
            font-weight: 700;
            transition: transform .25s ease, box-shadow .25s ease, filter .25s ease;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 24px rgba(242, 138, 12, .28);
            filter: brightness(1.03);
            color: #fff;
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 27px;
            color: #969b94;
            font-size: 11px;
            text-decoration: none;
            transition: color .2s ease;
        }

        /* Khung ảnh nghệ thuật bên phải */
        .login-image-side {
            min-height: 704px;
            padding: 0;
        }

        .animated-image-container {
            position: relative;
            height: 100%;
            min-height: 704px;
            overflow: hidden;
            isolation: isolate;
            border-radius: 42px;
            background: #d6b64c;
        }

        /* Ảnh nền chuyển động */
        .animated-bg {
            position: absolute;
            inset: -4%;
            z-index: -3;
            background-image: url('{{ asset('images/ad.jpg') }}');
            background-position: center;
            background-size: cover;
            will-change: transform;
            animation: landscapeMotion 22s ease-in-out infinite alternate;
            transition: filter .7s ease;
        }

        @keyframes landscapeMotion {
            0% { transform: scale(1) translate3d(0, 0, 0); }
            50% { transform: scale(1.09) translate3d(-1%, 1%, 0); }
            100% { transform: scale(1.15) translate3d(1%, -1%, 0); }
        }

        /* Lớp màu tạo chiều sâu */
        .image-overlay {
            position: absolute;
            inset: 0;
            z-index: -2;
            background: linear-gradient(
                180deg,
                rgba(255, 207, 77, .05) 0%,
                rgba(20, 54, 25, .02) 42%,
                rgba(5, 32, 15, .65) 100%
            );
            pointer-events: none;
        }

        /* Ánh sáng move trên ảnh */
        .light-effect {
            position: absolute;
            inset: -50%;
            z-index: -1;
            background: linear-gradient(
                115deg,
                transparent 35%,
                rgba(255, 255, 255, .12) 47%,
                transparent 58%
            );
            transform: translateX(-70%);
            animation: lightSweep 9s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes lightSweep {
            0%, 20% { transform: translateX(-70%); }
            75%, 100% { transform: translateX(70%); }
        }

        /* Nội dung nổi trên ảnh */
        .image-content {
            position: absolute;
            right: 30px;
            bottom: 35px;
            left: 35px;
            color: white;
            animation: textAppear 1.2s ease .3s both;
        }

        @keyframes textAppear {
            from {
                opacity: 0;
                transform: translateY(15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .image-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 17px;
            padding: 9px 13px;
            border: 1px solid rgba(255, 255, 255, .28);
            border-radius: 30px;
            background: rgba(255, 255, 255, .14);
            backdrop-filter: blur(10px);
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .7px;
        }

        .image-tag i {
            color: #ffce62;
        }

        .image-title {
            max-width: 410px;
            margin-bottom: 12px;
            font-size: clamp(27px, 3vw, 39px);
            font-weight: 800;
            letter-spacing: -1.2px;
            line-height: 1.22;
            text-shadow: 0 3px 18px rgba(0, 0, 0, .15);
        }

        .image-description {
            max-width: 340px;
            margin: 0;
            color: rgba(255, 255, 255, .85);
            font-size: 12px;
            line-height: 1.8;
        }

        /* Hover ảnh */
        .animated-image-container:hover .animated-bg {
            animation-play-state: paused;
            transform: scale(1.18);
            filter: saturate(1.12) brightness(1.06);
        }

        .animated-image-container:hover .image-overlay {
            background: linear-gradient(
                180deg,
                rgba(255, 207, 77, .02) 0%,
                rgba(5, 32, 15, .72) 100%
            );
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            body { padding: 22px; }
            .login-main-card {
                max-width: 570px;
                min-height: auto;
                border-radius: 35px;
                padding: 12px;
            }
            .login-row { min-height: auto; }
            .login-form-side { padding: 55px 30px; }
            .login-image-side { display: none; }
        }

        @media (max-width: 480px) {
            body { padding: 14px; }
            .login-main-card { border-radius: 27px; padding: 8px; }
            .login-form-side { padding: 40px 20px; }
            .welcome-title { font-size: 29px; }
            .welcome-description { margin-bottom: 27px; }
        }

        /* Giảm chuyển động */
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>
<div class="container-fluid d-flex justify-content-center align-items-center p-0">
    <main class="login-main-card card">
        <div class="row g-0 login-row">

            <!-- FORM ĐĂNG NHẬP -->
            <section class="col-lg-6 login-form-side">
                <div class="login-content">

                    <div class="brand-label">
                        <span class="brand-dot"></span>
                        BA FLORIST ADMIN
                    </div>

                    <h1 class="welcome-title">
                        Welcome back
                    </h1>

                    <p class="welcome-description">
                        Đăng nhập để quản lý cửa hàng.
                    </p>

                    <form method="POST" action="#" autocomplete="on">
                        @csrf

                        <div class="mb-4">
                            <label for="email" class="form-label">
                                Nhập Email
                            </label>

                            <div class="input-wrap">
                                <i class="fa-regular fa-envelope"></i>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    autocomplete="username"
                                    required
                                >
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Mật khẩu
                            </label>

                            <div class="input-wrap">
                                <i class="fa-solid fa-lock"></i>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    name="password"
                                    placeholder="Nhập mật khẩu của quản trị viên"
                                    autocomplete="current-password"
                                    required
                                >

                                <button
                                    type="button"
                                    class="password-toggle"
                                    id="togglePassword"
                                    aria-label="Hiện mật khẩu"
                                    aria-pressed="false"
                                >
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                    id="remember"
                                >
                                <label class="form-check-label" for="remember">
                                    Ghi nhớ đăng nhập
                                </label>
                            </div>

                            <a href="#" class="forgot-link">
                                Quên mật khẩu?
                            </a>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-login">
                                Đăng nhập
                                <i class="fa-solid fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </form>

                    <div class="text-center">
                        <a href="{{ url('/') }}" class="back-link">
                            <i class="fa-solid fa-arrow-left"></i>
                            Quay lại cửa hàng
                        </a>
                    </div>

                </div>
            </section>

            <!-- ẢNH -->
            <section class="col-lg-6 login-image-side">
                <div class="animated-image-container">
                    <div class="animated-bg"></div>
                    <div class="image-overlay"></div>
                    <div class="light-effect"></div>

                    <div class="image-content">
                        <div class="image-tag">
                            <i class="fa-solid fa-leaf"></i>
                            BA Florist
                        </div>

                        <h2 class="image-title">
                            “Beauty Always Blooms”
                        </h2>

                        <p class="image-description">
                            Mang vẻ đẹp của những đóa hoa tươi
                            đến gần hơn với mọi khoảnh khắc đặc biệt.
                        </p>
                    </div>
                </div>
            </section>

        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Hiện / ẩn mật khẩu
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    togglePassword.addEventListener('click', function () {
        const isPassword = passwordInput.type === 'password';

        passwordInput.type = isPassword ? 'text' : 'password';

        this.innerHTML = isPassword
            ? '<i class="fa-regular fa-eye-slash"></i>'
            : '<i class="fa-regular fa-eye"></i>';

        this.setAttribute('aria-pressed', String(isPassword));
        this.setAttribute(
            'aria-label',
            isPassword ? 'Ẩn mật khẩu' : 'Hiện mật khẩu'
        );
    });
</script>
</body>
</html>