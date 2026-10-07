<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rencana Liburan</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f8fc;
            color: #1e293b;
        }

        .navbar {
            background: #ffffff;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e7eb;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
            color: #087ea4;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .welcome {
            color: #64748b;
            font-size: 14px;
        }

        .logout-btn {
            border: none;
            background: #ef4444;
            color: white;
            padding: 9px 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        .container {
            width: 86%;
            max-width: 1200px;
            margin: 45px auto;
        }

        .hero {
            background: linear-gradient(135deg, #087ea4, #0ea5a8);
            color: white;
            padding: 40px;
            border-radius: 22px;
            margin-bottom: 35px;
        }

        .hero h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .hero p {
            opacity: 0.9;
            margin-bottom: 25px;
        }

        .add-btn {
            display: inline-block;
            background: white;
            color: #087ea4;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: bold;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-header h2 {
            font-size: 24px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 13px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .destination-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.07);
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .card-image {
            width: 100%;
            height: 190px;
            object-fit: cover;
            background: #dbeafe;
        }

        .no-image {
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #dbeafe, #ccfbf1);
            font-size: 45px;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            font-size: 20px;
            margin-bottom: 14px;
        }

        .info {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            margin-top: 8px;
        }

        .status-belum {
            background: #fef3c7;
            color: #92400e;
        }

        .status-tercapai {
            background: #dcfce7;
            color: #166534;
        }

        .actions {
            display: flex;
            gap: 8px;
            margin-top: 18px;
        }

        .action-btn {
            flex: 1;
            text-align: center;
            padding: 9px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .detail {
            background: #e0f2fe;
            color: #0369a1;
        }

        .edit {
            background: #fef3c7;
            color: #92400e;
        }

        .empty {
            background: white;
            padding: 50px 20px;
            border-radius: 18px;
            text-align: center;
            color: #64748b;
        }

        @media (max-width: 900px) {
            .destination-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 15px 5%;
            }

            .welcome {
                display: none;
            }

            .container {
                width: 90%;
                margin: 25px auto;
            }

            .hero {
                padding: 28px;
            }

            .hero h1 {
                font-size: 26px;
            }

            .destination-grid {
                grid-template-columns: 1fr;
            }

            .section-header {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">✈ RENCANA LIBURAN</div>

        <div class="nav-right">
            <span class="welcome">
                Halo, {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <main class="container">

        <section class="hero">
            <h1>Rencanakan Liburanmu 🌴</h1>
            <p>
                Atur destinasi, budget, jadwal, dan aktivitas liburanmu
                dalam satu tempat.
            </p>

            <a href="{{ route('destinations.create') }}" class="add-btn">
                + Tambah Destinasi
            </a>
        </section>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <div class="section-header">
            <h2>Destinasi Saya</h2>
        </div>

        @if($destinations->count() > 0)

            <div class="destination-grid">

                @foreach($destinations as $destination)

                    <div class="card">

                        @if($destination->photo)
                            <img
                                src="{{ asset('storage/' . $destination->photo) }}"
                                class="card-image"
                                alt="{{ $destination->title }}"
                            >
                        @else
                            <div class="no-image">
                                🏝️
                            </div>
                        @endif

                        <div class="card-content">

                            <h3>
                                {{ $destination->title }}
                            </h3>

                            <div class="info">
                                📅
                                {{ $destination->departure_date->format('d M Y') }}
                            </div>

                            <div class="info">
                                💰
                                Rp {{ number_format($destination->budget, 0, ',', '.') }}
                            </div>

                            <div class="info">
                                🕐
                                {{ $destination->duration }} hari
                            </div>

                            @if($destination->status === 'tercapai')
                                <span class="status status-tercapai">
                                    ✓ Tercapai
                                </span>
                            @else
                                <span class="status status-belum">
                                    • Belum Tercapai
                                </span>
                            @endif

                            <div class="actions">

                                <a
                                    href="{{ route('destinations.show', $destination) }}"
                                    class="action-btn detail"
                                >
                                    Detail
                                </a>

                                <a
                                    href="{{ route('destinations.edit', $destination) }}"
                                    class="action-btn edit"
                                >
                                    Edit
                                </a>

                            </div>

                        </div>
                    </div>

                @endforeach

            </div>

        @else

            <div class="empty">
                <h3>Belum ada destinasi</h3>
                <p style="margin-top: 8px;">
                    Yuk mulai buat rencana liburan pertamamu!
                </p>
            </div>

        @endif

    </main>

</body>
</html>