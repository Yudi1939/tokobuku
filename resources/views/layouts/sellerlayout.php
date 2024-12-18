<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Front Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Navbar -->
  <header class="bg-blue-600 text-white">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold">BookSeller</h1>
      <nav class="flex space-x-6">
        <a href="#home" class="hover:underline">Home</a>
        <a href="#about" class="hover:underline">About</a>
        <a href="#contact" class="hover:underline">Contact</a>
        <a href="#dashboard" class="hover:underline">Dashboard</a>
      </nav>
    </div>
  </header>

  <!-- Hero Section -->
  <section id="home" class="bg-gray-50 py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl font-bold mb-6">Welcome to BookSeller!</h2>
      <p class="text-lg text-gray-700 mb-6">Easily manage your books, orders, and customers in one place.</p>
      <a href="#dashboard" class="bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700">Go to Dashboard</a>
    </div>
  </section>

  <!-- Features Section -->
  <section id="about" class="py-16">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold mb-6 text-center">Why Choose Us?</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-6 bg-white rounded-lg shadow text-center">
          <h3 class="text-xl font-semibold">Easy Management</h3>
          <p class="text-gray-700 mt-2">Keep track of your books and orders effortlessly.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow text-center">
          <h3 class="text-xl font-semibold">Customer Insights</h3>
          <p class="text-gray-700 mt-2">Get detailed reports on customer behavior.</p>
        </div>
        <div class="p-6 bg-white rounded-lg shadow text-center">
          <h3 class="text-xl font-semibold">24/7 Support</h3>
          <p class="text-gray-700 mt-2">We are here to help you anytime.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="bg-gray-50 py-16">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold mb-6 text-center">Contact Us</h2>
      <form class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">
        <div class="mb-4">
          <label for="name" class="block text-gray-700">Name</label>
          <input type="text" id="name" class="w-full border-gray-300 rounded-lg p-2">
        </div>
        <div class="mb-4">
          <label for="email" class="block text-gray-700">Email</label>
          <input type="email" id="email" class="w-full border-gray-300 rounded-lg p-2">
        </div>
        <div class="mb-4">
          <label for="message" class="block text-gray-700">Message</label>
          <textarea id="message" rows="4" class="w-full border-gray-300 rounded-lg p-2"></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700">Send Message</button>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-blue-600 text-white py-4 text-center">
    <p>&copy; 2024 BookSeller. All rights reserved.</p>
  </footer>

</body>
</html>
