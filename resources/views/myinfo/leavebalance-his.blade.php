@extends('layouts.header-sidebar')

@section('content1')
<h1>Riwayat Saldo Cuti Bulan Sebelumnya</h1>

    @if(count($saldoCutiUpdates) > 0)
        <ul>
            @foreach($saldoCutiUpdates as $update)
                <li>
                    Nama: {{ $update->name }}<br>
                    Saldo Cuti: {{ $update->saldo_cuti }}<br>
                    Diperbarui pada: {{ $update->created_at }}<br>
                </li>
            @endforeach
        </ul>
    @else
        <p>Tidak ada data riwayat saldo cuti pada bulan sebelumnya.</p>
    @endif
@endsection
