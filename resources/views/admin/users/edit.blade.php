<x-app-layout>
    <x-slot name="title">Admin</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="#!" onclick="window.history.go(-1); return false;">
                ←
            </a>
            {!! __('User &raquo; Edit User') !!}
        </h2>
    </x-slot>

    <script>
        $(document).ready(function() {
            $('#default-checkbox').on('change', function() {
                $('#password').attr('type', $('#default-checkbox').prop('checked') == true ? "text" :
                    "password");
            });
        });
    </script>

    <div class="py-12">
        <div class="max-w-6xl mx-auto overflow-hidden bg-white shadow-xl sm:px-6 lg:px-8 sm:rounded-lg">

            @if ($errors->any())
                <div class="mb-5" role="alert">
                    <div class="px-4 py-2 font-bold text-white bg-red-500 rounded-t">
                        Ada kesalahan!
                    </div>
                    <div class="px-4 py-3 text-red-700 bg-red-100 border border-t-0 border-red-400 rounded-b">
                        <p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </p>
                    </div>
                </div>
            @endif
            <form class="w-full" action="{{ route('admin.users.update', $user->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-wrap px-3 mt-10 mb-6 -mx-3">
                    <div class="w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="grid-last-name">
                            Nama*
                        </label>
                        <input value="{{ old('name') ?? $user->name }}" name="name"
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" placeholder="Nama" required>
                        <div class="mt-2 text-sm text-gray-500">
                            Nama Pengguna. Contoh: User 1, User 2, User 3, dsb. Wajib diisi. Maksimal 255 karakter.
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
                    <div class="w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="grid-last-name">
                            Email*
                        </label>
                        <input value="{{ old('email') ?? $user->email }}" name="email"
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" placeholder="Email" required>
                        <div class="mt-2 text-sm text-gray-500">
                            Email, Contoh : user1@mail.com.
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
                    <div class="w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="grid-last-name">
                            Roles*
                        </label>
                        <select name="roles"
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            required>
                            <option value="{{ $user->roles }}" selected>Tidak Diubah ({{ $user->roles }})</option>
                            <option disabled>--------------------------------</option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="USER">USER</option>


                        </select>
                        <div class="mt-2 text-sm text-gray-500">
                            Roles Pengguna. Contoh: ADMIN
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
                    <div class="w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="grid-last-name">
                            Phone*
                        </label>
                        <input value="{{ old('phone') ?? $user->phone }}" name="phone"
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            id="grid-last-name" type="text" placeholder="Phone" required>
                        <div class="mt-2 text-sm text-gray-500">
                            Phone, Contoh : 0822 5151 2662 .
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap px-3 mt-4 mb-6 -mx-3">
                    <div class="w-full">
                        <label class="block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase"
                            for="grid-last-name">
                            Password*
                        </label>
                        <input value="{{ old('password') }}" name="password"
                            class="block w-full px-4 py-3 leading-tight text-gray-700 bg-gray-200 border border-gray-200 rounded appearance-none focus:outline-none focus:bg-white focus:border-gray-500"
                            id="password" type="password" placeholder="Password" required>
                            
                        <div class="flex items-center mt-2 mb-4">
                            <input id="default-checkbox" type="checkbox" value=""
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-checkbox"
                                class="ml-2 text-sm font-medium text-gray-500">Lihat Password</label>
                        </div>
                        {{-- <div class="mt-2 text-sm text-gray-500">
                            Password. Contoh : 123456 .
                        </div> --}}
                    </div>
                </div>





                <div class="flex flex-wrap mb-10 -mx-3">
                    <div class="w-full px-3 text-right">
                        <button type="submit"
                            class="px-4 py-2 font-bold text-white bg-green-500 rounded shadow-lg hover:bg-green-700">
                            Simpan Data
                        </button>
                    </div>
                </div>
            </form>
        </div>



    </div>
    </div>



</x-app-layout>
