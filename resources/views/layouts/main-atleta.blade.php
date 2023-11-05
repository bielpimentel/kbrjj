<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Patua+One&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <style>
      body {
        font-family: "Roboto", sans-serif;
      }
      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      [data-calendar] {
        font-family: "Patua One", serif;
      }
      #logo {
        text-transform: uppercase;
        font-weight: bold;
        margin-left: 5px;
      }
      .debug {
        outline: 1px solid red;
      }
    </style>
    <title>Campeonato de Jiu Jitsu</title>
  </head>
  <body>
    <header>
      <nav class="bg-white border-gray-200">
        <div
          class="max-w-screen-xl flex flex-wrap lg:flex-nowrap items-center gap-12 mx-auto p-4"
        >
          <div class="flex items-center gap-8 w-full">
            <a href="/" class="flex items-center">
              <img src="../imgs/logo.svg" alt="Logo" />
              <p id="logo" class="text-2xl whitespace-nowrap">OSU BJJ</p>
            </a>
            <p class="font-bold whitespace-nowrap" id="logo">Área do atleta</p>
          </div>

          <button
            data-collapse-toggle="navbar-default"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-default"
            aria-expanded="false"
          >
            <span class="sr-only">Abrir menu principal</span>
            <svg
              class="w-5 h-5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 17 14"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15"
              />
            </svg>
          </button>
          <div class="hidden w-full md:block" id="navbar-default">
            <ul
              class="flex flex-col lg:flex-row lg:items-center font-medium gap-4 w-full"
            >
              <li class="ml-auto">
                
                <form action="/logout" method="POST">
                  @csrf
                  <a
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    this.closest('form').submit();"
                    class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center"
                  >
                    Sair
                  </a>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <h1 class="text-blue-700 text-3xl text-center">
        Veja os seus certificados
      </h1>
      <p class="text-center text-gray-800">
        Aqui constam os certificados de todos os torneios que você já participou
      </p>
      <div class="mt-4 rounded-xl overflow-hidden max-w-4xl mx-auto">
        @yield('table')
      </div>
    </main>
    <footer
      class="bg-white rounded-lg shadow max-w-7xl m-4 md:mx-auto md:mt-4 outline outline-1 outline-gray-300"
    >
      <p class="text-sm text-gray-500 text-center py-2">
        © 2023 <a href="/" class="hover:underline">OSU BJJ</a>. Todos os
        direitos reservados.
      </p>
    </footer>
  </body>
</html>