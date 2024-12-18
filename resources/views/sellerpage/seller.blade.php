<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Sidebar + Content Layout -->
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-600 text-white">
      <div class="p-6 text-center">
        <h1 class="text-2xl font-bold">Seller Dashboard</h1>
      </div>
      <nav class="mt-6">
        <ul>
          <li><a href="#dashboard" class="block py-2.5 px-4 hover:bg-blue-500">Dashboard</a></li>
          <li><a href="#add-books" class="block py-2.5 px-4 hover:bg-blue-500">Add Books</a></li>
          <li><a href="#orders" class="block py-2.5 px-4 hover:bg-blue-500">Orders</a></li>
          <li><a href="#profile" class="block py-2.5 px-4 hover:bg-blue-500">Profile</a></li>
        </ul>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
      <section id="dashboard">
        <h2 class="text-3xl font-bold mb-6">Dashboard</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold">Total Sales</h3>
            <p class="text-blue-600 text-2xl mt-2">$2,450</p>
          </div>
          <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold">Books Sold</h3>
            <p class="text-blue-600 text-2xl mt-2">120</p>
          </div>
          <div class="p-6 bg-white rounded-lg shadow">
            <h3 class="text-lg font-semibold">Pending Orders</h3>
            <p class="text-blue-600 text-2xl mt-2">8</p>
          </div>
        </div>
      </section>
    </main>
  </div>

</body>
</html>
