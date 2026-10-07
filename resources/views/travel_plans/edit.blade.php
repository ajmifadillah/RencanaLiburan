<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rencana - Rencana Liburan</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f8fc;
            color: #1f2937;
            min-height: 100vh;
        }

        .navbar {
            background: linear-gradient(135deg, #2563eb, #0891b2);
            padding: 18px 7%;
            color: white;
        }

        .navbar-content {
            max-width: 1100px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 21px;
            font-weight: bold;
        }

        .back-link {
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }

        .container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 30px;
            color: #111827;
            margin-bottom: 8px;
        }

        .header p {
            color: #6b7280;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(15, 23, 42, 0.08);
        }

        .destination-info {
            background: #eff6ff;
            border: 1px solid #dbeafe;
            padding: 15px 18px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .destination-info small {
            color: #64748b;
            display: block;
            margin-bottom: 4px;
        }

        .destination-info strong {
            color: #1d4ed8;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #374151;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 10px;
            font-size: 15px;
            outline: none;
            background: white;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #2563eb;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .error-box ul {
            padding-left: 20px;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 10px;
        }

        .btn {
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 16px 20px;
            }

            .brand {
                font-size: 18px;
            }

            .container {
                margin: 25px auto;
            }

            .header h1 {
                font-size: 25px;
            }

            .card {
                padding: 20px;
                border-radius: 14px;
            }

            .row {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="navbar-content">
            <div class="brand">✈ RENCANA LIBURAN</div>

            <a href="{{ route('travel-plans.index', $travelPlan->destination_id) }}"
               class="back-link">
                ← Kembali
            </a>
        </div>
    </div>

    <div class="container">

        <div class="header">
            <h1>Edit Rencana Liburan</h1>
            <p>Perbarui jadwal kegiatan perjalanan kamu.</p>
        </div>

        <div class="card">

            <div class="destination-info">
                <small>Destinasi</small>
                <strong>{{ $travelPlan->destination->title }}</strong>
            </div>

            @if ($errors->any())
                <div class="error-box">
                    <strong>Terjadi kesalahan:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('travel-plans.update', $travelPlan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">

                    <div class="form-group">
                        <label for="day">Hari</label>

                        <select name="day" id="day" required>
                            @for ($i = 1; $i <= $travelPlan->destination->duration; $i++)
                                <option value="{{ $i }}"
                                    {{ old('day', $travelPlan->day) == $i ? 'selected' : '' }}>
                                    Hari {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="time">Waktu</label>

                        <input
                            type="time"
                            name="time"
                            id="time"
                            value="{{ old('time', \Carbon\Carbon::parse($travelPlan->time)->format('H:i')) }}"
                            required
                        >
                    </div>

                </div>

                <div class="form-group">
                    <label for="activity">Kegiatan</label>

                    <input
                        type="text"
                        name="activity"
                        id="activity"
                        value="{{ old('activity', $travelPlan->activity) }}"
                        placeholder="Contoh: Berangkat menuju lokasi"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="location">Lokasi</label>

                    <input
                        type="text"
                        name="location"
                        id="location"
                        value="{{ old('location', $travelPlan->location) }}"
                        placeholder="Contoh: Stasiun Bandung"
                    >
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>

                    <textarea
                        name="description"
                        id="description"
                        placeholder="Tambahkan keterangan kegiatan..."
                    >{{ old('description', $travelPlan->description) }}</textarea>
                </div>

                <div class="buttons">

                    <a href="{{ route('travel-plans.index', $travelPlan->destination_id) }}"
                       class="btn btn-secondary">
                        Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>
    </div>

</body>
</html>