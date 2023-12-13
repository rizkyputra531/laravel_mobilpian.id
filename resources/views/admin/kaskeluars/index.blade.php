<x-app-layout>
    <x-slot name="title">Admin</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Kas Keluar') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
                },

                columns: [
                    //{ className: 'dt-center', targets: '_all' },
                    {
                        data: 'id',
                        name: 'id',
                    },
                    // {
                    //   data: 'thumbnail',
                    //   name: 'thumbnail',
                    //   orderable: false,
                    //   searchable: false,
                    //   width: '20%',
                    // },
                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'jenis_pengeluaran',
                        name: 'jenis_pengeluaran'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'

                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'

                    },
                    {
                        data: 'quantity',
                        name: 'quantity'

                    },
                    {
                        data: 'harga',
                        name: 'harga',
                        render: $.fn.dataTable.render.number('.', ',', 0, 'Rp '),

                    },
                    {
                        data: 'total',
                        name: 'total',
                        render: $.fn.dataTable.render.number('.', ',', 0, 'Rp '),

                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '15%'
                    },
                ],
            });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 gap-6 px-3 mt-4-mx-3">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="w-full">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="grid-last-name">
                                Cetak Laporan
                            </label>
                            <div class="grid grid-cols-2 gap-6 px-3 mt-4 mb-5 -mx-3">
                                <div class="w-full">
                                    <select name="#"
                                        class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        required>
                                        <option value="">Tanggal Awal</option>
                                        <option value="Rutin"> Rutin</option>
                                        <option value="Sosial"> Sosial</option>
                                        <option value="Asuransi"> Asuransi</option>
                                        <option value="Operasional"> Operasional</option>
                                        <option value="Klaim Garansi"> Klaim Garansi</option>
                                        <option value="Cicilan Utang">Cicilan Utang</option>

                                    </select>
                                </div>
                                <div class="w-full">
                                    <select name="#"
                                        class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                                        required>
                                        <option value="">Tanggal Akhir</option>
                                        <option value="Rutin"> Rutin</option>
                                        <option value="Sosial"> Sosial</option>
                                        <option value="Asuransi"> Asuransi</option>
                                        <option value="Operasional"> Operasional</option>
                                        <option value="Klaim Garansi"> Klaim Garansi</option>
                                        <option value="Cicilan Utang">Cicilan Utang</option>

                                    </select>
                                </div>
                            </div>

                            <div class="flex flex-wrap mb-2 -mx-3">
                                <div class="w-full px-3 text-right">
                                    <button type="submit"
                                        class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                                        Download Pdf
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="w-full">
                            <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                                for="grid-last-name">
                                Total Kas Keluar
                            </label>
                            <div class="w-full mb-10">
                                <label class="p-10 font-bold ps-10" style="font-size:50px">Rp. {{ number_format($kas_keluar) }}</label>
                            </div>

                            <div class="flex flex-wrap mb-2 -mx-3 overflow-hidden">
                                {{-- <div class="w-full px-3 text-left">
                                    <button type="submit"
                                        class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                                        Download Pdf
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{-- <div class="mb-10">
        <a href="{{ route('admin.kaskeluars.create') }}"
           class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
          + Add Pengeluaran
        </a>
      </div> --}}
            <div class="overflow-hidden shadow sm:rounded-md">

                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="mt-10 mb-10">
                        <a href="{{ route('admin.kaskeluars.create') }}"
                            class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                            + Add Pengeluaran
                        </a>
                        <span class="px-4" style="color:darkgray"><i>*fitur ini digunakan apabila ingin menambahkan
                                kas keluar.</i></span>
                    </div>
                    <table id="dataTable" class="table border cell-border compact stripe">
                        <thead>
                            <tr>
                                <th style="max-width: 1%">ID</th>
                                {{-- <th style="max-width: 20%">Thumbnail</th> --}}
                                <th>Nama</th>
                                <th>Jenis Pengeluaran</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>Quantity</th>
                                <th>Harga</th>
                                <th>Total</th>

                                <th style="max-width: 1%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center"></tbody>
                        <tfoot>
                            <th colspan="7">Total</th>
                            <th>Rp. {{ number_format($kas_keluar) }}</th>
                            <th></th>
                            
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
