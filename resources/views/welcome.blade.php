<x-layout>

    <div class="container-fluid p-5 bg-info">
        <div class="row">
            <div class="col-12 text-center text-white">
                <h1 class="display-1">
                    I miei articoli
                </h1>
            </div>
        </div>
    </div>

    @if (session('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif

</x-layout>