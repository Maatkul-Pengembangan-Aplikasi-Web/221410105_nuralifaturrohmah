<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program Studi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="ml-auto d-flex">
                            <a href="{{ route('prodi.create') }}" class="btn btn-primary mr-2">Tambah Program Studi</a>
                            <form action="" method="GET" class="d-flex">
                                <input type="text" name="search" class="form-control" placeholder="Pencarian">
                                <button class="btn btn-primary ml-2" type="submit">
                                    <i class="bi bi-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    @if ($prodis->isEmpty())
                        <p class="text-center">Tidak ada program studi yang ditemukan.</p>
                    @else
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Prodi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($prodis as $prodi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $prodi->nama }}</td>
                                        <td>
                                            <a href="{{ route('prodi.edit', $prodi->id) }}" class="btn btn-secondary">Edit</a>
                                            <form action="{{ route('prodi.delete', $prodi->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
