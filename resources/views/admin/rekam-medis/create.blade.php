<x-app-layout>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 mb-4">Diagnosa</h1>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Form Rekam Medis
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store.rekam-medis', ['reg' => $data->no_registrasi]) }}">
                            @csrf
    
                            <div class="mb-3">
                                <x-input-label for="name" :value="__('Nama')" />
                                <x-text-input id="name" name="" type="text" class="mt-1 block w-full" value="{{ $data->user->name }}" required disabled autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                    
                            <div class="mb-3">
                                <x-input-label for="umur" :value="__('Umur')" />
                                <x-text-input id="umur" name="" type="number" class="mt-1 block w-full" value="{{ $data->user->umur }}" required disabled autofocus autocomplete="umur" />
                                <x-input-error class="mt-2" :messages="$errors->get('umur')" />
                            </div>
                    
                            <div class="mb-3">
                                <x-input-label for="alamat" :value="__('Alamat')" />
                                <x-text-input id="alamat" name="" type="text" class="mt-1 block w-full" value="{{ $data->user->alamat }}" required disabled autofocus autocomplete="alamat" />
                                <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                            </div>

                            <div class="form-group mb-3">
                                <x-input-label for="gejala" :value="__('Gejala')" />
                                <textarea class="form-control mt-2" name="gejala" id="exampleTextarea1" rows="4"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <x-input-label for="alamat" :value="__('Diagnosis')" />
                                <textarea class="form-control mt-2" name="diagnosis" id="exampleTextarea1" rows="4"></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <x-input-label for="alamat" :value="__('Solusi')" />
                                <textarea class="form-control mt-2" name="solusi" id="exampleTextarea1" rows="4"></textarea>
                            </div>
                            <input type="hidden" name="id_pendaftaran" value="{{ $data->id }}">
                            <input type="hidden" name="id_pasien" value="{{ $data->user->id }}">
    
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>