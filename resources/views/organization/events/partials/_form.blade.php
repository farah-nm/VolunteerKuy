<div class="mb-4">
    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul Event</label>
    <input type="text" id="title" name="title" value="{{ $event->title ?? old('title') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('title')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
    <textarea id="description" name="description" rows="4" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $event->description ?? old('description') }}</textarea>
    @error('description')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="requirements" class="block text-gray-700 text-sm font-bold mb-2">Persyaratan (Opsional)</label>
    <textarea id="requirements" name="requirements" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $event->requirements ?? old('requirements') }}</textarea>
    @error('requirements')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="location_address" class="block text-gray-700 text-sm font-bold mb-2">Alamat Lokasi</label>
    <input type="text" id="location_address" name="location_address" value="{{ $event->location_address ?? old('location_address') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('location_address')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="location_city" class="block text-gray-700 text-sm font-bold mb-2">Kota</label>
    <input type="text" id="location_city" name="location_city" value="{{ $event->location_city ?? old('location_city') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('location_city')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="location_province" class="block text-gray-700 text-sm font-bold mb-2">Provinsi</label>
    <input type="text" id="location_province" name="location_province" value="{{ $event->location_province ?? old('location_province') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('location_province')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Mulai</label>
    <input type="datetime-local" id="start_date" name="start_date" value="{{ isset($event) ? \Carbon\Carbon::parse($event->start_date)->format('Y-m-d\TH:i') : old('start_date') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('start_date')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">Tanggal Berakhir</label>
    <input type="datetime-local" id="end_date" name="end_date" value="{{ isset($event) ? \Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') : old('end_date') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('end_date')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="registration_deadline" class="block text-gray-700 text-sm font-bold mb-2">Deadline Pendaftaran</label>
    <input type="datetime-local" id="registration_deadline" name="registration_deadline" value="{{ isset($event) ? \Carbon\Carbon::parse($event->registration_deadline)->format('Y-m-d\TH:i') : old('registration_deadline') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('registration_deadline')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="contact_email" class="block text-gray-700 text-sm font-bold mb-2">Email Kontak</label>
    <input type="email" id="contact_email" name="contact_email" value="{{ $event->contact_email ?? old('contact_email') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('contact_email')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="contact_phone" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telepon Kontak (Opsional)</label>
    <input type="tel" id="contact_phone" name="contact_phone" value="{{ $event->contact_phone ?? old('contact_phone') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('contact_phone')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
<div class="mb-4">
    <label for="banner_image" class="block text-gray-700 text-sm font-bold mb-2">Gambar Banner (Opsional)</label>
    <input type="file" id="banner_image" name="banner_image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('banner_image')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
    @if (isset($event) && $event->banner_image_path)
        <img src="{{ $event->banner_image_path }}" alt="Current Banner" class="mt-2 rounded-md" style="max-width: 200px;">
    @endif
</div>
<div class="mb-4">
    <label for="slots_available" class="block text-gray-700 text-sm font-bold mb-2">Jumlah Slot Tersedia (Opsional)</label>
    <input type="number" id="slots_available" name="slots_available" value="{{ $event->slots_available ?? old('slots_available') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    @error('slots_available')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
    @enderror
</div>
