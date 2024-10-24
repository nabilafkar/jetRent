@extends('landing_page.layout.layout')



@section('content')
    <div class="container mt-44">
        @if (session('success'))
            <div class="alert alert-success mt-50">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-lightGrey rounded-xl p-14 text-white">
            <div class="flex rounded-xl mb-6 justify-between items-center">
                <h1 class="font-bold text-3xl mb-5 text-white">Edit Profile</h1>

            </div>
            <form enctype="multipart/form-data" action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-14">
                    <div class="">
                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm font-medium text-white">Nama</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Isikan Nama Anda.." value="{{ old('name', $user->name) }}" required />
                            @error('name')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block mb-2 text-sm font-medium text-white">Email</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Isikan Email Anda.." value="{{ old('email', $user->email) }}" required />
                            @error('email')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block mb-2 text-sm font-medium text-white">Telepon</label>
                            <input type="text" id="phone" name="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Isikan Nomor Telepon Anda.." value="{{ old('phone', $user->phone) }}" />
                            @error('phone')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block mb-2 text-sm font-medium text-white">Alamat</label>
                            <textarea id="address" name="address" rows="4"
                                class="block p-2.5 w-full text-md text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Isikan Alamat Anda...">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit"
                            class="text-white bg-shotlanceTosca hover:bg-hoverTosca focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center">
                            Simpan Perubahan
                        </button>
                    </div>
                    <div class="">
                        <div x-data="{ image: '' }">
                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-white" for="photo">Foto Profil</label>
                                <input x-on:change="image = URL.createObjectURL($event.target.files[0])" name="photo"
                                    class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                                    id="photo" type="file" accept="image/*">
                                <img x-show="image" :src="image" class="w-auto h-[500px] mb-3"
                                    alt="Preview Image">
                                <img x-show="!image"
                                    src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/default-profile.jpg') }}"
                                    class="w-auto h-[500px] mb-3" alt="Current Profile Photo">
                                @error('photo')
                                    <span class="text-red-500 text-xs">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
