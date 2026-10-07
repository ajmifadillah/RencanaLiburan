<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rencana Liburan - {{ $destination->title }}</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f8fc;
            color: #172554;
            min-height: 100vh;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            background: linear-gradient(135deg, #2563eb, #0891b2);
            color: white;
            padding: 17px 7%;
        }

        .navbar-content {
            max-width: 1100px;
            margin: auto;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: .3px;
        }

        .brand span {
            margin-right: 7px;
        }

        .logout-form {
            margin: 0;
        }

        .logout-button {
            border: none;
            background: rgba(255,255,255,.15);
            color: white;
            padding: 9px 16px;
            border-radius: 9px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .logout-button:hover {
            background: rgba(255,255,255,.25);
        }

        /* ================= CONTAINER ================= */

        .container {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
        }

        /* ================= BACK BUTTON ================= */

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            margin-bottom: 22px;
            padding: 11px 18px;

            background: white;
            color: #2563eb;

            border: 1px solid #bfdbfe;
            border-radius: 10px;

            text-decoration: none;
            font-size: 14px;
            font-weight: bold;

            transition: .2s ease;
        }

        .back-button:hover {
            background: #eff6ff;
            transform: translateX(-2px);
        }

        /* ================= HEADER ================= */

        .page-header {
            background: linear-gradient(135deg, #1686a8, #10a7a5);
            color: white;

            padding: 48px;
            border-radius: 28px;

            margin-bottom: 45px;

            box-shadow: 0 10px 30px rgba(15, 118, 110, .15);
        }

        .page-header h1 {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .page-header p {
            font-size: 19px;
            margin-bottom: 32px;
        }

        .add-button {
            display: inline-block;

            background: white;
            color: #087fa4;

            padding: 15px 27px;
            border-radius: 12px;

            text-decoration: none;
            font-weight: bold;
            font-size: 16px;

            transition: .2s ease;
        }

        .add-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(0,0,0,.12);
        }

        /* ================= ALERT ================= */

        .alert {
            background: #dcfce7;
            color: #166534;

            border: 1px solid #bbf7d0;

            padding: 14px 18px;
            border-radius: 10px;

            margin-bottom: 25px;
        }

        /* ================= DAY CARD ================= */

        .day-card {
            background: white;

            border-radius: 26px;

            padding: 35px;

            margin-bottom: 38px;

            box-shadow: 0 8px 28px rgba(15, 23, 42, .07);
        }

        .day-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 30px;
        }

        .day-title {
            font-size: 30px;
            font-weight: bold;
        }

        .activity-count {
            background: #e0f2fe;
            color: #0369a1;

            padding: 10px 17px;

            border-radius: 30px;

            font-size: 14px;
            font-weight: bold;
        }

        /* ================= TIMELINE ================= */

        .timeline {
            position: relative;
            padding-left: 50px;
        }

        .timeline::before {
            content: "";

            position: absolute;

            left: 11px;
            top: 14px;
            bottom: 14px;

            width: 3px;

            background: #dbeafe;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 22px;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-dot {
            position: absolute;

            left: -50px;
            top: 10px;

            width: 17px;
            height: 17px;

            border-radius: 50%;

            background: #0d91b2;

            border: 4px solid #dff6fb;

            z-index: 2;
        }

        /* ================= ACTIVITY ================= */

        .activity-card {
            background: #f8fafc;

            border: 1px solid #dbe5ef;

            border-radius: 20px;

            padding: 27px;

            display: grid;

            grid-template-columns: 90px 1fr auto;

            gap: 15px;

            align-items: start;
        }

        .activity-time {
            color: #087fa4;

            font-size: 20px;
            font-weight: bold;

            padding-top: 2px;
        }

        .activity-content h3 {
            font-size: 20px;
            color: #172554;

            margin-bottom: 10px;
        }

        .location {
            color: #64748b;

            font-size: 16px;

            margin-bottom: 12px;
        }

        .description {
            color: #53657d;

            font-size: 16px;

            line-height: 1.5;
        }

        /* ================= ACTION ================= */

        .actions {
            display: flex;
            gap: 10px;
        }

        .edit-button,
        .delete-button {
            border: none;

            padding: 11px 17px;

            border-radius: 10px;

            font-weight: bold;
            font-size: 14px;

            cursor: pointer;

            text-decoration: none;
        }

        .edit-button {
            background: #fef3c7;
            color: #a16207;
        }

        .edit-button:hover {
            background: #fde68a;
        }

        .delete-button {
            background: #fee2e2;
            color: #dc2626;
        }

        .delete-button:hover {
            background: #fecaca;
        }

        .delete-form {
            margin: 0;
        }

        /* ================= EMPTY ================= */

        .empty {
            background: white;

            border-radius: 22px;

            padding: 55px 30px;

            text-align: center;

            box-shadow: 0 8px 28px rgba(15, 23, 42, .06);
        }

        .empty-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .empty h2 {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .empty p {
            color: #64748b;
            margin-bottom: 22px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 768px) {

            .navbar {
                padding: 16px 20px;
            }

            .navbar-content {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }

            .brand {
                font-size: 19px;
            }

            .container {
                margin-top: 25px;
            }

            .page-header {
                padding: 30px 25px;
                border-radius: 20px;
            }

            .page-header h1 {
                font-size: 31px;
            }

            .page-header p {
                font-size: 16px;
            }

            .day-card {
                padding: 24px 20px;
                border-radius: 20px;
            }

            .day-header {
                align-items: flex-start;
                gap: 15px;
            }

            .day-title {
                font-size: 25px;
            }

            .activity-count {
                font-size: 12px;
                white-space: nowrap;
            }

            .timeline {
                padding-left: 35px;
            }

            .timeline::before {
                left: 8px;
            }

            .timeline-dot {
                left: -35px;
            }

            .activity-card {
                grid-template-columns: 1fr;
                gap: 12px;

                padding: 20px;
            }

            .activity-time {
                font-size: 18px;
            }

            .actions {
                width: 100%;
            }

            .edit-button,
            .delete-button {
                flex: 1;
                text-align: center;
            }
        }

        @media (max-width: 480px) {

            .back-button {
                width: 100%;
                justify-content: center;
            }

            .page-header {
                padding: 25px 20px;
            }

            .page-header h1 {
                font-size: 27px;
            }

            .add-button {
                width: 100%;
                text-align: center;
            }

            .day-header {
                flex-direction: column;
            }

            .activity-content h3 {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <nav class="navbar">

        <div class="navbar-content">

            <div class="brand">
                <span>✈</span>
                RENCANA LIBURAN
            </div>

            <form action="{{ route('logout') }}"
                  method="POST"
                  class="logout-form">

                @csrf

                <button type="submit" class="logout-button">
                    Logout
                </button>

            </form>

        </div>

    </nav>


    <!-- ================= CONTENT ================= -->

    <div class="container">


        <!-- TOMBOL KEMBALI -->

        <a href="{{ route('destinations.show', $destination) }}"
           class="back-button">

            ← Kembali ke Detail Destinasi

        </a>


        <!-- ================= HEADER ================= -->

        <div class="page-header">

            <h1>
                📅 Rencana Liburan
            </h1>

            <p>
                {{ $destination->title }}
                ·
                {{ $destination->duration }} hari
            </p>

            <a href="{{ route('travel-plans.create', $destination) }}"
               class="add-button">

                + Tambah Jadwal

            </a>

        </div>


        <!-- ================= SUCCESS MESSAGE ================= -->

        @if(session('success'))

            <div class="alert">
                {{ session('success') }}
            </div>

        @endif


        <!-- ================= RENCANA ================= -->

        @php
            $groupedPlans = $travelPlans->groupBy('day');
        @endphp


        @if($travelPlans->count() > 0)

            @foreach($groupedPlans as $day => $plans)

                <div class="day-card">

                    <div class="day-header">

                        <div class="day-title">
                            Hari {{ $day }}
                        </div>

                        <div class="activity-count">
                            {{ $plans->count() }} Aktivitas
                        </div>

                    </div>


                    <div class="timeline">

                        @foreach($plans as $plan)

                            <div class="timeline-item">

                                <div class="timeline-dot"></div>


                                <div class="activity-card">

                                    <!-- WAKTU -->

                                    <div class="activity-time">

                                        {{ $plan->time->format('H:i') }}

                                    </div>


                                    <!-- ISI -->

                                    <div class="activity-content">

                                        <h3>
                                            {{ $plan->activity }}
                                        </h3>


                                        @if($plan->location)

                                            <div class="location">
                                                📍 {{ $plan->location }}
                                            </div>

                                        @endif


                                        @if($plan->description)

                                            <div class="description">
                                                {{ $plan->description }}
                                            </div>

                                        @endif

                                    </div>


                                    <!-- AKSI -->

                                    <div class="actions">

                                        <a href="{{ route('travel-plans.edit', $plan) }}"
                                           class="edit-button">

                                            Edit

                                        </a>


                                        <form action="{{ route('travel-plans.destroy', $plan) }}"
                                              method="POST"
                                              class="delete-form"
                                              onsubmit="return confirm('Yakin ingin menghapus rencana ini?')">

                                            @csrf

                                            @method('DELETE')

                                            <button type="submit"
                                                    class="delete-button">

                                                Hapus

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endforeach


        @else

            <!-- ================= KOSONG ================= -->

            <div class="empty">

                <div class="empty-icon">
                    🗓️
                </div>

                <h2>
                    Belum Ada Rencana
                </h2>

                <p>
                    Belum ada jadwal perjalanan untuk destinasi ini.
                </p>

                <a href="{{ route('travel-plans.create', $destination) }}"
                   class="add-button">

                    + Tambah Jadwal

                </a>

            </div>

        @endif


    </div>

</body>
</html>