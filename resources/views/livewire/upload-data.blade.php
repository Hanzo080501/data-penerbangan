<div>

    <div class="container py-8 mx-auto">
        {{-- <h1 class="mb-6 text-2xl font-bold text-center">Upload Data</h1> --}}

        <!-- Form -->
        <form id="uploadForm" action="{{ route('upload.data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="py-2 mb-4 space-y-2">
                <label for="serialNumber" class="block">Serial Number</label>
                <input type="text" name="serialNumber" id="serialNumber"
                    class="w-full px-4 py-2 mb-4 border dark:bg-gray-800 rounded-xl">
                @error('serialNumber')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 space-y-2">
                <label for="registration" class="block">Registration</label>
                <input type="text" name="registration" id="registration"
                    class="w-full px-4 py-2 dark:bg-gray-800 rounded-xl">
                @error('registration')
                    <span style="color: red">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input untuk memilih file Excel -->
            <div class="mb-4 space-y-2">
                <label for="excelFile" class="block">Pilih File Excel</label>
                <input type="file" name="excelFile" id="excelFile" class="w-full px-4 py-2 border rounded-xl"
                    accept=".xlsx,.xls">
            </div>

            <!-- Handsontable -->
            <div id="hot"
                class="mt-6 z-[-10] overflow-x-auto bg-gray-100 dark:bg-gray-800 rounded-lg shadow-inner"
                style="height: 500px;"></div>

            <!-- Input tersembunyi untuk data Handsontable -->
            <input type="hidden" id="tableData" name="tableData">

            <x-filament::button type="submit" color="primary" class="mt-6">
                Save Data
            </x-filament::button>
        </form>
    </div>

    <!-- Notification -->
    @if (session()->has('message'))
        <div class="mt-4 font-medium text-center text-green-600">
            {{ session('message') }}
        </div>
    @endif

    <!-- Include Handsontable -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css">
    <script src="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/hyperformula/dist/hyperformula.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
    <script src="{{ asset('js/handsontable.js') }}"></script>
</div>
