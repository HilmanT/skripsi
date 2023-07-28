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
                                    <th>Status</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($antrian as $data)
                                    <tr>
                                        <td>{{ date('d F Y', strtotime($data->created_at)) }}</td>
                                        <td>{{ $data->no_registrasi }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        @if ($data->status == true)
                                            <td><span class="badge text-bg-success">Selesai</span></td>
                                        @else
                                            <td><span class="badge text-bg-warning">Menunggu</span></td>
                                        @endif
                                        <td>{{ $data->user->jekel }}</td>
                                        <td>
                                            @if ($data->status == false)
                                                <a href="{{ route('create.rekam-medis', ['reg' => $data->no_registrasi]) }}" style="color: blue"><i class="fas fa-edit"></i></a>
                                            @else
                                                <a href="{{ route('invoice', ['id' => $data->id]) }}" style="color: blue"><i class="fas fa-edit"></i></a>
                                            @endif
                                            {{-- <form method="post"
                                                action="{{ route('delete.pendaftaran', $data->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" style="color: red"><i class="fas fa-trash"></i></button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</x-app-layout>
