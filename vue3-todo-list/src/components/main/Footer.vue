<template>
    <footer class="bg-gray-800 text-white py-8">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <div>
            <h3 class="text-lg font-semibold mb-4">About Us</h3>
            <p class="text-sm text-gray-400">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur fringilla tortor at lorem tristique efficitur.
            </p>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-4">Contact</h3>
            <p class="text-sm text-gray-400">
              123 Example Street<br>
              City, State 12345<br>
              info@example.com
            </p>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
            <div class="flex space-x-4">
              <a href="#" class="text-gray-400 hover:text-white">
                <i class="fab fa-facebook"></i>
              </a>
              <a href="#" class="text-gray-400 hover:text-white">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="text-gray-400 hover:text-white">
                <i class="fab fa-instagram"></i>
              </a>
            </div>
          </div>
          <div>
            <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
            <p class="text-sm text-gray-400">
              Sign up for our newsletter to receive updates and news.
            </p>
            <form class="mt-4">
              <div class="flex items-center">
                <input type="email" class="bg-gray-800 text-white py-2 px-4 rounded-l focus:outline-none" placeholder="Enter your email">
                <button class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-r focus:outline-none">
                  Subscribe
                </button>
              </div>
            </form>
          </div>
        </div>
        <hr class="border-t border-gray-700 my-8">
        <p class="text-sm text-center text-gray-400">
          &copy; 2023 Your Todo List App. All rights reserved.
        </p>
      </div>
    </footer>
  </template>
  