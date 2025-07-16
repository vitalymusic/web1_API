<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/css/admin.css">
    <title><?=$title?></title>
  </head>
  <body>
        <body class="bg-gray-100 text-gray-800">

  <!-- Sidebar -->
  <div class="flex h-screen">
    <div id="sidebar" class="bg-white w-64 p-4 shadow-md hidden md:block">
      <h2 class="text-xl font-bold mb-6">Admin Panel</h2>
      <nav class="space-y-2">
        <a href="<?=base_url('/admin')?>" class="block px-4 py-2 rounded hover:bg-gray-200 <?= ($title=="Galvenā")? "nav_active":""?>">Dashboard</a>
        <a href="<?=base_url('/admin/users')?>" class="block px-4 py-2 rounded hover:bg-gray-200 <?= $title=="Lietotāji"? "nav_active":""?>">Users</a>
        <a href="<?=base_url('/admin/posts')?>" class="block px-4 py-2 rounded hover:bg-gray-200 <?=$title=="Raksti"? "nav_active":""?>">Posts</a>
        <a href="<?=base_url('/admin/gallery')?>" class="block px-4 py-2 rounded hover:bg-gray-200 <?=$title=="Galerija"? "nav_active":""?>" >Gallery</a>
        <a href="<?=base_url('/admin/logout')?>" class="block px-4 py-2 rounded hover:bg-gray-200">Exit</a>
      </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Top Navbar -->
      <header class="bg-white p-4 shadow-md flex justify-between items-center">
        <button id="toggleSidebar" class="md:hidden text-gray-600">
          ☰
        </button>
        <h1 class="text-lg font-semibold"><?=$title?></h1>
        <div class="text-sm">Welcome, Admin</div>
      </header>

      <!-- Page Content -->
      <main class="flex-1 p-6">
           <?= $this->renderSection('content') ?>
      </main>
    </div>
  </div>

  <script src="<?=base_url()?>assets/js/admin.js"></script>

  <script>
    $(document).ready(function () {
        $('#toggleSidebar').on('click', function () {
            $('#sidebar').toggleClass('hidden');
        });
        });
  </script>
  </body>
</html>