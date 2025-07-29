<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pendaftar - {{ $event->title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h2 { text-align: center; margin-bottom: 0; }
        .subtitle { text-align: center; margin-top: 0; margin-bottom: 20px; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 6px 8px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Daftar Pendaftar Event</h2>
    <div class="subtitle">{{ $event->title }}<br>Tanggal: {{ $event->start_date->format('d M Y H:i') }}
        @if($event->end_date)
            - {{ $event->end_date->format('d M Y H:i') }}
        @endif
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Email</th>
                <th>Asal Kampus</th>
                <th>No. HP</th>
                <th>Catatan</th>
                <th>Waktu Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $i => $reg)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $reg->name }}</td>
                <td>{{ $reg->email }}</td>
                <td>{{ $reg->university }}</td>
                <td>{{ $reg->phone }}</td>
                <td>{{ $reg->notes }}</td>
                <td>{{ $reg->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
