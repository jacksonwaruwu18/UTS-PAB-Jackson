<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manajemen Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-6xl mx-auto bg-white p-6 rounded shadow">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold">Manajemen Produk</h1>
      <a href="{{ route('produk.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Produk</a>
    </div>

    <!-- Flash message -->
    @if (session('success'))
      <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('success') }}
      </div>
    @endif

    <!-- Tabel Daftar Produk -->
    <div>
      <h2 class="text-xl font-semibold mb-2">Daftar Produk</h2>
      <div class="overflow-x-auto">
        <table class="w-full text-left border">
          <thead class="bg-gray-200">
            <tr>
              <th class="p-2">NAMA</th>
              <th class="p-2">HARGA</th>
              <th class="p-2">STOK</th>
              <th class="p-2">DESKRIPSI</th>
              <th class="p-2">KATEGORI</th>
              <th class="p-2">STATUS</th>
              <th class="p-2">AKSI</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($produks as $produk)
              <tr class="border-t">
                <td class="p-2">{{ $produk->nama }}</td>
                <td class="p-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td class="p-2">{{ $produk->stok }}</td>
                <td class="p-2">{{ $produk->deskripsi }}</td>
                <td class="p-2">{{ $produk->kategori }}</td>
                <td class="p-2">
                  @if ($produk->status)
                    <span class="text-green-600 font-semibold">Aktif</span>
                  @else
                    <span class="text-red-600 font-semibold">Tidak Aktif</span>
                  @endif
                </td>
                <td class="p-2 space-x-2">
                  <a href="{{ route('produk.edit', $produk->id) }}" class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">Edit</a>
                  <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 px-3 py-1 rounded text-white hover:bg-red-700">Hapus</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="p-2 text-center text-gray-500">Tidak ada produk.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination -->
    <div class="flex justify-between items-center mt-4 text-sm text-gray-600">
      <span>Menampilkan {{ $produks->firstItem() }} - {{ $produks->lastItem() }} dari {{ $produks->total() }} produk</span>
      <div>{{ $produks->links() }}</div>
    </div>
  </div>
</body>
</html>