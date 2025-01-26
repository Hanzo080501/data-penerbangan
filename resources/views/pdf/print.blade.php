<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aircraft Utilization Report</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            width: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }


        /* Logo and Title Section */
        .logo-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            justify-content: center;
        }

        .logo-section img {
            max-width: 100%;
            height: auto;
            width: 160px;
            margin: 0% 0% 0% 40%;
        }

        .logo-text {
            text-align: right;
            flex: 1;
        }

        .logo-text p {
            margin: 0;
        }

        .logo-text .brand-name {
            font-size: 14px;
            font-weight: bold;
        }

        .logo-text .brand-slogan {
            font-size: 12px;
            color: #555;
        }


        h1 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 12px;
            text-align: center;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        thead {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="logo-section">
            <div class="logo">
                <img src="{{ public_path('images/Logo.png') }}" alt="Sriwijaya Air Logo">
            </div>
            <div class="logo-text">
                <p class="brand-name">Sriwijaya Air</p>
                <p class="brand-slogan">Your Flying Partner</p>
            </div>
        </div>

        <h1>Aircraft Utilization Report</h1>
        <p style="text-align: left;  font-size: 12px;
            color: #555;">Printed on: {{ date('d M Y') }}</p>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>A/C Serial Number</th>
                    <th>Aircraft Registration</th>
                    <th>Flight Hours</th>
                    <th>Flight Cycles</th>
                    <th>Time Since New</th>
                    <th>Cycle Since New</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $flight)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $flight->serial_number }}</td>
                        <td>{{ $flight->registration }}</td>
                        <td>{{ $flight->flight_hours }}</td>
                        <td>{{ $flight->flight_cycles }}</td>
                        <td>{{ $flight->time_since_new }}</td>
                        <td>{{ $flight->cycle_since_new }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
