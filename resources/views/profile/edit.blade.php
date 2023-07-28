<x-app-layout>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4 mb-4">Profil</h1>

                <div class="card mb-4 p-4">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="card mb-4 p-4">
                    @include('profile.partials.update-password-form')
                </div>

                <div class="card mb-4 p-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
