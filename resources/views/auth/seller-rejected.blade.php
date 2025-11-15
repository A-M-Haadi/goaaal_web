<x-guest-layout>
    <div class="mb-4 text-center text-gray-600">
        <h2 class="font-bold text-lg text-red-600">Persetujuan Akun Ditolak</h2>
        <p class="mt-2">Mohon maaf, pengajuan akun Seller Anda telah ditolak oleh Admin.</p>
        <p class="mt-4">Anda dapat menghapus akun Anda secara permanen dari sistem kami.</p>
    </div>

    <form method="POST" action="{{ route('seller.delete') }}">
        @csrf
        @method('DELETE')
        <x-danger-button class="w-full justify-center">
            {{ __('Hapus Akun Saya') }}
        </x-danger-button>
    </form>
</x-guest-layout>