<x-app-layout>

    <div class="min-h-screen bg-[#fef8ec] py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 rounded-3xl border border-[#feaf52] bg-[#fdf1cb] px-5 py-4 text-sm font-medium text-[#4a3824] shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 rounded-3xl border border-red-200 bg-[#fde8e2] px-5 py-4 text-sm font-medium text-[#8b1f11] shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-hidden rounded-[32px] border border-[#feaf52] bg-gradient-to-b from-[#fdf1cb] to-[#fef8ec] shadow-[0_25px_70px_rgba(253,89,62,0.12)]">
                <div class="border-b border-[#fe914e]/30 bg-gradient-to-r from-[#fd593e] via-[#fe914e] to-[#feaf52] px-6 py-6 text-white">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm uppercase tracking-[0.35em] text-white/90">Daftar Pengguna</p>
                            <h3 class="text-2xl font-semibold">Semua akun terdaftar</h3>
                        </div>
                        <a href="{{ route('users.create') }}" class="inline-flex items-center justify-center rounded-full bg-[#fe941e] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#fd593e]">
                            Tambah User
                        </a>
                    </div>
                </div>

                <div class="p-6">
                    <div class="overflow-x-auto rounded-3xl border border-[#feaf52] bg-white shadow-sm">
                        <table class="min-w-full divide-y divide-[#feaf52]/30">
                            <thead class="bg-[#fe941e] text-white">
                                <tr>
                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider">No</th>
                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider">Nama</th>
                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider">Role</th>
                                    <th class="px-5 py-4 text-left text-xs font-semibold uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-[#fef8ec] text-sm text-slate-700">
                                @forelse($users as $key => $user)
                                    <tr class="border-b border-[#feaf52]/30 hover:bg-[#fdf1cb]">
                                        <td class="px-5 py-4 font-medium">{{ $users->firstItem() + $key }}</td>
                                        <td class="px-5 py-4">{{ $user->name }}</td>
                                        <td class="px-5 py-4">{{ $user->email }}</td>
                                        <td class="px-5 py-4">{{ ucfirst($user->role) }}</td>
                                        <td class="px-5 py-4 space-x-2">
                                            <a href="{{ route('users.edit', $user->id) }}" class="inline-flex rounded-full bg-[#fe914e] px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-[#fd593e]">Edit</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex rounded-full bg-[#fd593e] px-3 py-1.5 text-xs font-semibold text-white transition hover:bg-[#c33f2f]">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-5 py-8 text-center text-sm text-slate-600">
                                            Belum ada data user.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
