<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Destinasi - Rencana Liburan</title>

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
            max-width: 850px;
            margin: 45px auto;
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
        select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #dbe2ea;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            background: white;
        }

        input:focus,
        select:focus {
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

        <a href="{{ route('home') }}" class="back">
            ← Kembali ke Home
        </a>

        <div class="card">

            <div class="title">
                <h1>Tambah Destinasi 🌴</h1>
                <p>
                    Tambahkan destinasi yang ingin kamu masukkan
                    ke dalam rencana liburan.
                </p>
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
                    <strong>Data belum bisa disimpan.</strong>
                    <ul style="margin: 8px 0 0 18px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('destinations.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="form-grid">

                    <div class="form-group full">
                        <label for="photo">
                            Foto Destinasi
                        </label>

                        <input
                            type="file"
                            id="photo"
                            name="photo"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <span class="hint">
                            Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                        </span>

                        @error('photo')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full">
                        <label for="title">
                            Nama Destinasi
                        </label>

                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Contoh: Gunung Papandayan"
                            required
                        >

                        @error('title')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="departure_date">
                            Tanggal Keberangkatan
                        </label>

                        <input
                            type="date"
                            id="departure_date"
                            name="departure_date"
                            value="{{ old('departure_date') }}"
                            required
                        >

                        @error('departure_date')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="duration">
                            Durasi Liburan
                        </label>

                        <input
                            type="number"
                            id="duration"
                            name="duration"
                            min="1"
                            value="{{ old('duration') }}"
                            placeholder="Contoh: 3"
                            required
                        >

                        <span class="hint">
                            Masukkan jumlah hari.
                        </span>

                        @error('duration')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="budget">
                            Budget
                        </label>

                        <input
                            type="number"
                            id="budget"
                            name="budget"
                            min="0"
                            value="{{ old('budget') }}"
                            placeholder="Contoh: 1500000"
                            required
                        >

                        @error('budget')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">
                            Status
                        </label>

                        <select
                            id="status"
                            name="status"
                            required
                        >
                            <option value="">Pilih Status</option>

                            <option
                                value="belum"
                                {{ old('status') == 'belum' ? 'selected' : '' }}
                            >
                                Belum Tercapai
                            </option>

                            <option
                                value="tercapai"
                                {{ old('status') == 'tercapai' ? 'selected' : '' }}
                            >
                                Tercapai
                            </option>
                        </select>

                        @error('status')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="form-actions">

                    <a
                        href="{{ route('home') }}"
                        class="btn cancel"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn save"
                    >
                        + Simpan Destinasi
                    </button>

                </div>

            </form>

        </div>

    </main>

</body>
</html>