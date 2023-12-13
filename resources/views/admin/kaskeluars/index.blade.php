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
            render : $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' ),

          },
          {
            data: 'total',
            name: 'total',
            render : $.fn.dataTable.render.number( '.', ',', 0, 'Rp ' ),

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
      <div class="mb-10">
        <a href="{{ route('admin.kaskeluars.create') }}"
           class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
          + Add Pengeluaran
        </a>
      </div>
      <div class="overflow-hidden shadow sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
          <table id="dataTable" class="border cell-border compact stripe">
            <thead >
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
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>