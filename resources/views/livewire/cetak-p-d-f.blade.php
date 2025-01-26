<div
    style="font-family: Arial, sans-serif; font-size: 12px; line-height: 1.6; margin: 0; padding: 0; box-sizing: border-box;">
    <div style="width: 100%; max-width: 800px; margin: 0 auto; padding: 20px; border: 1px solid #ddd;">
        <!-- Logo and Title Section -->
        <div style="display: flex; align-items: center; margin-bottom: 20px;">
            <div style="flex: 1;">
                <img src={{ asset('images/Logo.png') }} alt="Sriwijaya Air Logo"
                    style="height: 60px; object-fit: contain;">
            </div>
            <div style="text-align: right;">
                <p style="margin: 0; font-size: 14px; font-weight: bold;">Sriwijaya Air</p>
                <p style="margin: 0; font-size: 12px; color: #555;">Your Flying Partner</p>
            </div>
        </div>

        <!-- Report Title -->
        <h1
            style="text-align: center; font-size: 18px; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1px;">
            Aircraft Utilization Report
        </h1>

        <!-- Table Section -->
        <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px; font-size: 12px;">
            <thead>
                <tr class="dark:bg-gray-600">
                    <th style="text-align: left; padding: 10px; border: 1px solid #ddd;">No</th>
                    <th style="text-align: left; padding: 10px; border: 1px solid #ddd;">A/C Serial Number</th>
                    <th style="text-align: left; padding: 10px; border: 1px solid #ddd;">Aircraft Registration</th>
                    <th style="text-align: left; padding: 10px; border: 1px solid #ddd;">Flight Hours</th>
                    <th style="text-align: left; padding: 10px; border: 1px solid #ddd;">Flight Cycles</th>
                    <th style="text-align: left; padding: 10px; border: 1px solid #ddd;">Time Since New</th>
                    <th style="text-align: left; padding: 10px; border: 1px solid #ddd;">Cycle Since New</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $flight)
                    <tr>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $loop->iteration }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $flight->serial_number }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $flight->registration }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $flight->flight_hours }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $flight->flight_cycles }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $flight->time_since_new }}</td>
                        <td style="padding: 10px; border: 1px solid #ddd;">{{ $flight->cycle_since_new }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
