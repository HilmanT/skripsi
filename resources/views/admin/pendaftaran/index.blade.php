<x-app-layout>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 mb-4">Dashboard</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Pendaftaran
                    </div>
                    <div class="card-body">
                        {{-- <a href="{{ route('admin.create.pendaftaran') }}" class="btn btn-primary mb-4">Daftar</a> --}}
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
                                @foreach ($pendaftaran as $data)
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
                                            {{-- <a href="{{ route('create.pendaftaran') }}" style="color: orange"><i class="fas fa-pencil"></i></a> --}}
                                            @if ($data->status == true)
                                                <a href="{{ route('invoice', ['id' => $data->id]) }}" style="color: blue"><i
                                                        class="fas fa-edit"></i></a>
                                            @else
                                                <form method="post"
                                                    action="{{ route('admin.delete.pendaftaran', $data->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" style="color: red"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
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
