<x-app-layout>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 mb-4">Daftar</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Form Pendaftaraan
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('store.pendaftaran') }}">
                            @csrf
    
                            <div class="mb-3">
                                <x-input-label for="name" :value="__('Nama')" />
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                    
                            <div class="mb-3">
                                <x-input-label for="umur" :value="__('Umur')" />
                                <x-text-input id="umur" name="umur" type="number" class="mt-1 block w-full" :value="old('umur', $user->umur)" required autofocus autocomplete="umur" />
                                <x-input-error class="mt-2" :messages="$errors->get('umur')" />
                            </div>
                    
                            <div class="mb-3">
                                <x-input-label for="jekel" :value="__('Jenis Kelamin')" />
                                <select class="form-select mt-1" name="jekel" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('jekel')" />
                            </div>
                    
                            <div class="mb-3">
                                <x-input-label for="alamat" :value="__('Alamat')" />
                                <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat', $user->alamat)" required autofocus autocomplete="alamat" />
                                <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                            </div>
    
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                        </form>
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