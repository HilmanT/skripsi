<x-app-layout>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 mb-4">Dashboard</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Riwayat Pendaftaran
                    </div>
                    <div class="card-body">
                        <a href="{{ route('create.pendaftaran') }}" class="btn btn-primary mb-4">Daftar</a>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @forelse ($pendaftaran as $data)
                                    <tr>
                                        <th>{{ date('d F Y', strtotime($data->created_at)) }}</th>
                                        <th>{{ $data->no_registrasi }}</th>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->user->umur }}</td>
                                        <td>{{ $data->user->jekel }}</td>
                                        <td>{{ $data->user->alamat }}</td>
                                        <td>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan='6' style="text-align: center; font-weight: bold;">Belum ada data
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
