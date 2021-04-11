<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>GrubFinder</title>
        @yield('google-map-stuff')

  </head>

  <body class="flex flex-col leading-relaxed tracking-wide gradient font-poppins">
    <!--Nav-->

    <nav id="header" class="top-0 z-30 w-full py-1 text-white lg:py-6">
      <!-- Grubfinder logo -->
      <div class="container flex flex-wrap items-center justify-between w-full px-2 py-2 mx-auto mt-0 lg:py-6">
        <div class="items-center pl-4">
          <a class="text-2xl font-bold text-black lg:text-4xl" href="{{ route('home') }}">
            <svg class="inline-block w-6 h-6 text-yellow-700 fill-current"
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 20 20"
            >
              <path d="M13 8V0L8.11 5.87 3 12h4v8L17 8h-4z" />
            </svg>
            Grubfinder
          </a>
        </div>

        <!-- Navbar -->
        <div class="block pr-4 lg:hidden">
          <button id="nav-toggle" class="flex items-center px-3 py-2 text-gray-500 border border-gray-600 rounded appearance-none hover:text-gray-800 hover:border-green-500 focus:outline-none">
            <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>

        <div class="z-20 hidden w-full p-4 mt-2 text-black lg:flex lg:items-center lg:w-auto lg:block lg:mt-0 lg:p-0" id="nav-content">
          <ul class="items-center justify-end flex-1 list-reset lg:flex">
            <li class="mr-3">
              <a class="inline-block py-2 text-black hover:text-gray-800 hover:underline" href="{{ route('register') }}">Apply for admin</a>
            </li>
            <li class="mr-3">
              <a class="inline-block px-4 py-2 text-black hover:text-gray-800 hover:underline" href="{{ route('add') }}">Suggestions</a>
            </li>
          </ul>
          <button id="navAction" class="px-8 py-4 mx-auto mt-4 font-extrabold text-gray-800 rounded shadow opacity-75 lg:mx-0 hover:underline lg:mt-0"><a href="{{ route('login') }}">Admin</a></button>
        </div>
        <!-- End of Navbar -->
      </div>
    </nav>
    <!-- End of nav -->

    <main>

        @yield('frontend')

    </main>

        <!--Footer-->
        <footer class="bg-white">
            <div class="container px-8 mx-auto mt-8">
              <div class="flex flex-col w-full py-6 md:flex-row">
                <div class="flex-1 mb-6">
                  <a
                    class="text-2xl font-bold text-orange-600 no-underline hover:no-underline lg:text-4xl"
                    href="#"
                  >
                    <svg
                      class="inline-block w-6 h-6 text-yellow-700 fill-current"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 20 20"
                    >
                      <path d="M13 8V0L8.11 5.87 3 12h4v8L17 8h-4z" />
                    </svg>
                    Grub Finder
                  </a>
                </div>

                <div class="flex-1">
                  <p class="font-extrabold text-gray-500 uppercase md:mb-6">Links</p>
                  <ul class="mb-6 list-reset">
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                      <a
                        href="#"
                        class="font-light text-gray-800 no-underline hover:underline hover:text-orange-500"
                        >FAQ</a
                      >
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                      <a
                        href="#"
                        class="font-light text-gray-800 no-underline hover:underline hover:text-orange-500"
                        >Help</a
                      >
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                      <a
                        href="#"
                        class="font-light text-gray-800 no-underline hover:underline hover:text-orange-500"
                        >Support</a
                      >
                    </li>
                  </ul>
                </div>
                <div class="flex-1">
                  <p class="font-extrabold text-gray-500 uppercase md:mb-6">Legal</p>
                  <ul class="mb-6 list-reset">
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                      <a
                        href="#"
                        class="font-light text-gray-800 no-underline hover:underline hover:text-orange-500"
                        >Terms</a
                      >
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                      <a
                        href="#"
                        class="font-light text-gray-800 no-underline hover:underline hover:text-orange-500"
                        >Privacy</a
                      >
                    </li>
                  </ul>
                </div>
                <div class="flex-1">
                  <p class="font-extrabold text-gray-500 uppercase md:mb-6">Social</p>
                  <ul class="mb-6 list-reset">
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                      <a
                        href="#"
                        class="font-light text-gray-800 no-underline hover:underline hover:text-orange-500"
                        >Facebook</a
                      >
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                      <a
                        href="#"
                        class="font-light text-gray-800 no-underline hover:underline hover:text-orange-500"
                        >Linkedin</a
                      >
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                      <a
                        href="#"
                        class="font-light text-gray-800 no-underline hover:underline hover:text-orange-500"
                        >Twitter</a
                      >
                    </li>
                  </ul>
                </div>
                <div class="flex-1">
                  <p class="font-extrabold text-gray-500 uppercase md:mb-6">
                    Company
                  </p>
                  <ul class="mb-6 list-reset">
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                      <a
                        href="#"
                        class="font-light text-gray-800 no-underline hover:underline hover:text-orange-500"
                        >Official Blog</a
                      >
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                      <a
                        href="#"
                        class="font-light text-gray-800 no-underline hover:underline hover:text-orange-500"
                        >About Us</a
                      >
                    </li>
                    <li class="inline-block mt-2 mr-2 md:block md:mr-0">
                      <a
                        href="#"
                        class="font-light text-gray-800 no-underline hover:underline hover:text-orange-500"
                        >Contact</a
                      >
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </footer>
            <script
                src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_API') }}&callback=initMap&libraries=&v=weekly"
                async
            ></script>

          <script>
            var navMenuDiv = document.getElementById("nav-content");
            var navMenu = document.getElementById("nav-toggle");

            document.onclick = check;
            function check(e) {
              var target = (e && e.target) || (event && event.srcElement);

              //Nav Menu
              if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                  // click on the link
                  if (navMenuDiv.classList.contains("hidden")) {
                    navMenuDiv.classList.remove("hidden");
                  } else {
                    navMenuDiv.classList.add("hidden");
                  }
                } else {
                  // click both outside link and outside menu, hide menu
                  navMenuDiv.classList.add("hidden");
                }
              }
            }
            function checkParent(t, elm) {
              while (t.parentNode) {
                if (t == elm) {
                  return true;
                }
                t = t.parentNode;
              }
              return false;
            }
          </script>
        </body>
      </html>


</body>
</html>
