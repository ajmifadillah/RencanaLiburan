<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Rencana Liburan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            min-height: 100vh;
            background:
                linear-gradient(135deg, rgba(20, 55, 90, 0.92), rgba(42, 116, 145, 0.88)),
                linear-gradient(135deg, #16324f, #2a7491);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
            color: #243447;
        }

        .login-container {
            width: 100%;
            max-width: 950px;
            min-height: 570px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: #ffffff;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.22);
        }

        /* =========================
           BAGIAN KIRI
        ========================= */

        .login-info {
            position: relative;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: white;
            overflow: hidden;
            background:
                linear-gradient(
                    rgba(16, 54, 78, 0.78),
                    rgba(25, 102, 126, 0.82)
                ),
                linear-gradient(135deg, #17445d, #2d8297);
        }

        .login-info::before {
            content: "";
            position: absolute;
            width: 280px;
            height: 280px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.08);
            top: -100px;
            right: -100px;
        }

        .login-info::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.06);
            bottom: -90px;
            left: -80px;
        }

        .info-content {
            position: relative;
            z-index: 2;
        }

        .logo {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 27px;
            margin-bottom: 25px;
            backdrop-filter: blur(5px);
        }

        .brand {
            font-size: 17px;
            font-weight: 600;
            letter-spacing: 0.3px;
            margin-bottom: 60px;
        }

        .login-info h1 {
            font-size: 38px;
            line-height: 1.2;
            margin-bottom: 18px;
            font-weight: 700;
        }

        .login-info p {
            font-size: 15px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.86);
            max-width: 350px;
        }

        .travel-features {
            position: relative;
            z-index: 2;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .feature {
            padding: 9px 13px;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.16);
            font-size: 12px;
            color: rgba(255, 255, 255, 0.9);
        }

        /* =========================
           BAGIAN KANAN
        ========================= */

        .login-form-section {
            padding: 55px 55px 45px;
            display: flex;
            align-items: center;
        }

        .form-wrapper {
            width: 100%;
        }

        .form-header {
            margin-bottom: 32px;
        }

        .form-header h2 {
            font-size: 29px;
            color: #243447;
            margin-bottom: 9px;
        }

        .form-header p {
            color: #7c8997;
            font-size: 14px;
            line-height: 1.6;
        }

        /* ALERT */

        .alert {
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #eaf8f1;
            color: #21875b;
            border: 1px solid #ccebdc;
        }

        /* FORM */

        .form-group {
            margin-bottom: 21px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
            color: #34495e;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 17px;
            color: #91a0ae;
            pointer-events: none;
        }

        .form-control {
            width: 100%;
            height: 48px;
            border: 1px solid #dce3e8;
            border-radius: 11px;
            padding: 0 15px 0 45px;
            font-size: 14px;
            color: #34495e;
            background: #fafcfd;
            outline: none;
            transition: 0.25s ease;
        }

        .form-control:hover {
            border-color: #b9c7d1;
        }

        .form-control:focus {
            background: #ffffff;
            border-color: #2d8297;
            box-shadow: 0 0 0 4px rgba(45, 130, 151, 0.10);
        }

        .form-control::placeholder {
            color: #aab5be;
        }

        .error-message {
            color: #d94c4c;
            font-size: 12px;
            margin-top: 6px;
        }

        /* BUTTON */

        .btn-login {
            width: 100%;
            height: 49px;
            border: none;
            border-radius: 11px;
            background: linear-gradient(135deg, #22677d, #2d8297);
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.25s ease;
            box-shadow: 0 7px 18px rgba(45, 130, 151, 0.20);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 23px rgba(45, 130, 151, 0.28);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        /* REGISTER */

        .register-link {
            text-align: center;
            margin-top: 25px;
            color: #8a97a3;
            font-size: 13px;
        }

        .register-link a {
            color: #22677d;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .footer-text {
            text-align: center;
            margin-top: 30px;
            color: #a3adb5;
            font-size: 11px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 800px) {
            .login-container {
                max-width: 520px;
                grid-template-columns: 1fr;
            }

            .login-info {
                min-height: 300px;
                padding: 35px;
            }

            .brand {
                margin-bottom: 35px;
            }

            .login-info h1 {
                font-size: 30px;
            }

            .login-form-section {
                padding: 40px 35px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 15px;
            }

            .login-container {
                border-radius: 18px;
            }

            .login-info {
                padding: 30px 25px;
                min-height: 280px;
            }

            .login-info h1 {
                font-size: 26px;
            }

            .login-info p {
                font-size: 13px;
            }

            .brand {
                margin-bottom: 28px;
            }

            .login-form-section {
                padding: 32px 25px;
            }

            .form-header h2 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

       
        <div class="login-info">

            <div class="info-content">

                <div class="logo">
                    ✈
                </div>

                <div class="brand">
                    RENCANA LIBURAN
                </div>

                <h1>
                    Mulai perjalananmu.
                </h1>

                <p>
                    Atur destinasi, susun rencana perjalanan,
                    dan simpan semua persiapan liburanmu dalam
                    satu tempat.
                </p>

            </div>

            <div class="travel-features">
                <div class="feature">✈ Destinasi</div>
                <div class="feature">📅 Jadwal</div>
                <div class="feature">📍 Perjalanan</div>
            </div>

        </div>


        

        <div class="login-form-section">

            <div class="form-wrapper">

                <div class="form-header">

                    <h2>
                        Selamat Datang 👋
                    </h2>

                    <p>
                        Masuk ke akunmu untuk melanjutkan
                        rencana perjalanan.
                    </p>

                </div>


                <!-- PESAN SUCCESS -->

                @if (session('success'))

                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                @endif


                

                <form action="{{ route('login') }}" method="POST">

                    @csrf


                    

                    <div class="form-group">

                        <label class="form-label">
                            Email
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                ✉
                            </span>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="Masukkan email kamu"
                                required
                                autocomplete="email"
                            >

                        </div>

                        @error('email')

                            <div class="error-message">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- PASSWORD -->

                    <div class="form-group">

                        <label class="form-label">
                            Password
                        </label>

                        <div class="input-wrapper">

                            <span class="input-icon">
                                🔒
                            </span>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan password"
                                required
                                autocomplete="current-password"
                            >

                        </div>

                        @error('password')

                            <div class="error-message">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- BUTTON -->

                    <button type="submit" class="btn-login">
                        Masuk ke Akun
                    </button>

                </form>


                <!-- REGISTER -->

                <div class="register-link">

                    Belum punya akun?

                    <a href="{{ route('register') }}">
                        Daftar Sekarang
                    </a>

                </div>


                <div class="footer-text">
                    © {{ date('Y') }} Rencana Liburan
                </div>

            </div>

        </div>

    </div>

</body>

</html>