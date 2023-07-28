<x-app-layout>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 mb-4">Dashboard</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Antrian Pasien
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>Gejala</th>
                                    <th>Diagnosis</th>
                                    <th>Solusi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>Gejala</th>
                                    <th>Diagnosis</th>
                                    <th>Solusi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($rekamMedis as $data)
                                    <tr>
                                        <td>{{ date('d F Y', strtotime($data->created_at)) }}</td>
                                        <td>{{ $data->pendaftaran->no_registrasi }}</td>
                                        <td>{{ $data->pasien->name }}</td>
                                        <td>{{ $data->gejala }}</td>
                                        <td>{{ $data->diagnosis }}</td>
                                        <td>{{ $data->solusi }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
