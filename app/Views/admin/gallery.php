<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
    <div class="bg-white p-8 rounded-xl shadow-md w-full">
    <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Upload File</h2>
    <form action="<?=base_url("/admin/gallery/upload")?>" method="POST" enctype="multipart/form-data" class="space-y-6">
      <div>
        <label for="file" class="block text-sm font-medium text-gray-700">Select a file</label>
        <input type="file" name="files[]" id="file"
               class="mt-2 block w-full text-sm text-gray-700
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-full file:border-0
                      file:text-sm file:font-semibold
                      file:bg-blue-50 file:text-blue-700
                      hover:file:bg-blue-100" multiple>
      </div>

      <div class="text-center">
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg w-full">
          Upload
        </button>
      </div>
    </form>
  </div>
  <!-- Failu ielāde -->

  <!-- Failu pārlūks -->


   <main class="p-6 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <!-- Folder -->
    <div class="bg-white p-4 rounded-lg shadow flex items-center space-x-4 hover:bg-gray-50 cursor-pointer">
      <div class="text-yellow-500 text-3xl">📁</div>
      <div>
        <p class="text-gray-800 font-medium">Documents</p>
        <p class="text-sm text-gray-500">4 files</p>
      </div>
    </div>

    <!-- File -->
    <div class="bg-white p-4 rounded-lg shadow flex items-center space-x-4 hover:bg-gray-50">
      <div class="text-blue-500 text-3xl">📄</div>
      <div>
        <p class="text-gray-800 font-medium">report.pdf</p>
        <p class="text-sm text-gray-500">450 KB</p>
      </div>
    </div>

    <!-- More Files -->
    <div class="bg-white p-4 rounded-lg shadow flex items-center space-x-4 hover:bg-gray-50">
      <div class="text-green-500 text-3xl">🖼️</div>
      <div>
        <p class="text-gray-800 font-medium">photo.png</p>
        <p class="text-sm text-gray-500">1.2 MB</p>
      </div>
    </div>

    <div class="bg-white p-4 rounded-lg shadow flex items-center space-x-4 hover:bg-gray-50">
      <div class="text-purple-500 text-3xl">🎵</div>
      <div>
        <p class="text-gray-800 font-medium">song.mp3</p>
        <p class="text-sm text-gray-500">3.4 MB</p>
      </div>
    </div>
  </main>
    
<?= $this->endSection() ?>

