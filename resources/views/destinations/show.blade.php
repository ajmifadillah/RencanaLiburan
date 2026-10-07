<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $destination->title }} - Rencana Liburan</title>

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
            min-height: 100vh;
        }

        .navbar {
            background: #ffffff;
            padding: 18px 7%;
            border-bottom: 1px solid #e5e7eb;
        }

        .logo {
            font-size: 21px;
            font-weight: bold;
            color: #087ea4;
            text-decoration: none;
        }

        .container {
            width: 90%;
            max-width: 1050px;
            margin: 40px auto;
        }

        .back {
            display: inline-block;
            color: #64748b;
            text-decoration: none;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .detail-card {
            background: white;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
        }

        .destination-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
            display: block;
        }

        .no-image {
            height: 350px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #dbeafe, #ccfbf1);
            font-size: 80px;
        }

        .content {
            padding: 35px;
        }

        .title-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 28px;
        }

        .title-row h1 {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #64748b;
            font-size: 14px;
        }

        .status {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status-belum {
            background: #fef3c7;
            color: #92400e;
        }

        .status-tercapai {
            background: #dcfce7;
            color: #166534;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .info-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 18px;
        }

        .info-label {
            color: #64748b;
            font-size: 12px;
            margin-bottom: 7px;
        }

        .info-value {
            font-size: 16px;
            font-weight: bold;
        }

        .plan-box {
            background: linear-gradient(135deg, #e0f7fa, #ecfeff);
            border-radius: 16px;
            padding: 25px;
            margin-top: 10px;
        }

        .plan-box h2 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .plan-box p {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .plan-btn {
            display: inline-block;
            background: #087ea4;
            color: white;
            text-decoration: none;
            padding: 11px 18px;
            border-radius: 9px;
            font-size: 14px;
            font-weight: bold;
        }

        .plan-btn:hover {
            background: #066b8b;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 9px;
            text-decoration: none;
            border: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .edit {
            background: #fef3c7;
            color: #92400e;
        }

        .delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .back-home {
            background: #f1f5f9;
            color: #475569;
        }

        @media (max-width: 700px) {
            .container {
                margin: 25px auto;
            }

            .destination-image,
            .no-image {
                height: 240px;
            }

            .content {
                padding: 25px 20px;
            }

            .title-row {
                flex-direction: column;
            }

            .title-row h1 {
                font-size: 26px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="{{ route('home') }}" class="logo">
            ✈ RENCANA LIBURAN
        </a>
    </nav>

    <main class="container">

       

        <div class="detail-card">

            @if($destination->photo)

                <img
                    src="{{ asset('storage/' . $destination->photo) }}"
                    alt="{{ $destination->title }}"
                    class="destination-image"
                >

            @else

                <div class="no-image">
                    🏝️
                </div>

            @endif

            <div class="content">

                <div class="title-row">

                    <div>
                        <h1>{{ $destination->title }}</h1>

                        <p class="subtitle">
                            Detail destinasi liburan
                        </p>
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

                </div>

                <div class="info-grid">

                    <div class="info-box">
                        <div class="info-label">
                            📅 Tanggal Keberangkatan
                        </div>

                        <div class="info-value">
                            {{ $destination->departure_date->format('d M Y') }}
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="info-label">
                            💰 Budget
                        </div>

                        <div class="info-value">
                            Rp {{ number_format($destination->budget, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="info-box">
                        <div class="info-label">
                            🕐 Durasi
                        </div>

                        <div class="info-value">
                            {{ $destination->duration }} Hari
                        </div>
                    </div>

                </div>

                <div class="plan-box">

                    <h2>🗓️ Rencana Liburan</h2>

                    <p>
                        Atur aktivitas, lokasi, dan jadwal perjalanan
                        untuk setiap hari di destinasi ini.
                    </p>

                    <a
                        href="{{ route('travel-plans.index', $destination) }}"
                        class="plan-btn"
                    >
                        Kelola Rencana Liburan →
                    </a>

                </div>

                <div class="actions">

                    <a
                        href="{{ route('destinations.edit', $destination) }}"
                        class="btn edit"
                    >
                        ✏️ Edit Destinasi
                    </a>

                    <form
                        action="{{ route('destinations.destroy', $destination) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus destinasi ini?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn delete">
                            🗑️ Hapus
                        </button>
                    </form>

                    <a
                        href="{{ route('home') }}"
                        class="btn back-home"
                    >
                        Kembali
                    </a>

                </div>

            </div>

        </div>

    </main>

</body>
</html>