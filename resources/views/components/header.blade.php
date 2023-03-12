<header class="px-6 py-8">
    <nav class="bg-white">
        <div class="flex justify-end md:hidden">
            <div class="flex flex-col">
                <button type="button"
                    class="flex flex-col justify-center items-end w-10 h-10 p-2 rounded-md focus:outline-none focus:bg-gray-100 btn"
                    aria-label="Toggle menu">
                    <span class="block w-6 h-0.5 bg-gray-600 mb-1"></span>
                    <span class="block w-6 h-0.5 bg-gray-600 mb-1"></span>
                    <span class="block w-6 h-0.5 bg-gray-600 mb-1"></span>
                </button>
            </div>
        </div>
        <div class="hidden md:flex md:justify-between md:items-center menu">
            <div class="flex flex-col items-end md:flex-row md:items-center gap-4">
                <a href="/" class="text-sm mt-4 font-bold uppercase md:mt-0 nav__link">Home</a>
                <a href="/projects" class="text-sm font-bold uppercase nav__link">Projects</a>
                <a href="/about" class="text-sm font-bold uppercase nav__link">About</a>
            </div>
            <div class=" flex flex-col items-end gap-4 md:flex-row mt-4 md:mt-0">
                @auth
                    <span class="hidden md:block text-xs font-bold uppercase">{{ auth()->user()->name }}</span>
                    @if (auth()->user()->isAdmin())
                        <a href="/admin" class=" text-sm md:ml-3 md:text-xs font-bold uppercase nav__link">Admin</a>
                    @endif
                    <a href="/logout" class="text-sm md:ml-3 md:text-xs font-bold uppercase nav__link">Logout</a>
                @else
                    <a href="/login" class="text-sm md:ml-3 md:text-xs font-bold uppercase nav__link">Log In</a>
                @endauth
            </div>
        </div>

    </nav>
</header>

<script>
    const show = document.querySelector(".btn");
    const nav = document.querySelector(".menu");
    const links = document.querySelectorAll(".nav__link");

    show.addEventListener("click", () => {
        nav.classList.toggle("hidden");
    });

    links.forEach((link) => {
        link.addEventListener("click", () => {
            nav.classList.add("hidden");
        });
    });
</script>
