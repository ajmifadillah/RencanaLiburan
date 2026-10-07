<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Jadwal - {{ $destination->title }}</title>

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
            background: white;
            padding: 18px 7%;
            border-bottom: 1px solid #e5e7eb;
        }

        .logo {
            color: #087ea4;
            text-decoration: none;
            font-size: 21px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            max-width: 850px;
            margin: 40px auto;
        }

        .back {
            display: inline-block;
            color: #64748b;
            text-decoration: none;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.07);
        }

        .title {
            margin-bottom: 28px;
        }

        .title h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .title p {
            color: #64748b;
            font-size: 14px;
        }

        .destination-info {
            background: #e0f7fa;
            color: #075985;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full {
            grid-column: span 2;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dbe2ea;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            background: white;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #087ea4;
            box-shadow: 0 0 0 3px rgba(8, 126, 164, 0.1);
        }

        .hint {
            margin-top: 6px;
            font-size: 12px;
            color: #94a3b8;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            border: none;
            padding: 11px 20px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .cancel {
            background: #f1f5f9;
            color: #475569;
        }

        .save {
            background: #087ea4;
            color: white;
        }

        .save:hover {
            background: #066b8b;
        }

        @media (max-width: 650px) {
            .container {
                margin: 25px auto;
            }

            .card {
                padding: 25px 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: span 1;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
                text-align: center;
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

        <a
            href="{{ route('travel-plans.index', $destination) }}"
            class="back"
        >
            ← Kembali ke Rencana Liburan
        </a>

        <div class="card">

            <div class="title">
                <h1>Tambah Jadwal 🗓️</h1>

                <p>
                    Tambahkan aktivitas untuk perjalananmu.
                </p>
            </div>

            <div class="destination-info">
                📍 Destinasi:
                <strong>{{ $destination->title }}</strong>
                &nbsp; · &nbsp;
                {{ $destination->duration }} hari
            </div>

            @if($errors->any())
                <div style="
                    background: #fee2e2;
                    color: #991b1b;
                    padding: 14px 18px;
                    border-radius: 10px;
                    margin-bottom: 22px;
                    font-size: 14px;
                ">
                    <strong>Jadwal belum bisa disimpan.</strong>

                    <ul style="margin: 8px 0 0 18px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('travel-plans.store', $destination) }}"
                method="POST"
            >

                @csrf

                <div class="form-grid">

                    <div class="form-group">
                        <label for="day">
                            Hari Ke-
                        </label>

                        <select
                            id="day"
                            name="day"
                            required
                        >
                            <option value="">
                                Pilih Hari
                            </option>

                            @for($i = 1; $i <= $destination->duration; $i++)

                                <option
                                    value="{{ $i }}"
                                    {{ old('day') == $i ? 'selected' : '' }}
                                >
                                    Hari {{ $i }}
                                </option>

                            @endfor

                        </select>

                        <span class="hint">
                            Pilih hari sesuai durasi liburan.
                        </span>

                        @error('day')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="time">
                            Waktu
                        </label>

                        <input
                            type="time"
                            id="time"
                            name="time"
                            value="{{ old('time') }}"
                            required
                        >

                        @error('time')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label for="activity">
                            Aktivitas
                        </label>

                        <input
                            type="text"
                            id="activity"
                            name="activity"
                            value="{{ old('activity') }}"
                            placeholder="Contoh: Berangkat menggunakan kereta"
                            required
                        >

                        @error('activity')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label for="location">
                            Lokasi
                        </label>

                        <input
                            type="text"
                            id="location"
                            name="location"
                            value="{{ old('location') }}"
                            placeholder="Contoh: Stasiun Bandung"
                        >

                        <span class="hint">
                            Lokasi tempat aktivitas dilakukan.
                        </span>

                        @error('location')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label for="description">
                            Deskripsi
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            placeholder="Tambahkan catatan atau detail aktivitas..."
                        >{{ old('description') }}</textarea>

                        @error('description')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="form-actions">

                    <a
                        href="{{ route('travel-plans.index', $destination) }}"
                        class="btn cancel"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn save"
                    >
                        + Simpan Jadwal
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>