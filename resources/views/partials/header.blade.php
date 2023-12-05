<header class="header" id="header">
    <nav class="nav container">
   <a href="/home" class="brand__name nav-link">TiketQ</a>
    </a>

      <div class="nav__menu" id="nav-menu">
        <ul class="nav__list">
          <li class="nav__item">
            <a href="/home" class="nav__link {{ request()->is('/') ? ' active-link' : '' }}"">
              <i class="bx bx-home-alt nav__icon"></i>
              <span class="nav__name">Home</span>
            </a>
          </li>

          <!-- <li class="nav__item">
            <a href="#about" class="nav__link">
              <i class="bx bx-user nav__icon"></i>
              <span class="nav__name">About</span>
            </a>
          </li> -->

          <li class="nav__item">
            <a href="#"" class="nav__link {{ request()->is('') ? ' active-link' : '' }}" onclick="scrollToSection('video-tour')">
              <i class="bx bx-book-alt nav__icon"></i>
              <span class="nav__name">Blog</span>
            </a>
          </li>

          <li class="nav__item">
            <a href="#" class="nav__link {{ request()->is('cari') ? ' active-link' : '' }} " onclick="scrollToSection('cari')">
              <i class="bx bx-briefcase-alt nav__icon"></i>
              <span class="nav__name">Tiket</span>
            </a>
          </li>

          <li class="nav__item">
            <a href="#" class="nav__link {{ request()->is('contact') ? ' active-link' : '' }}" onclick="scrollToSection('kontak-kami')">
              <i class="bx bx-message-square-detail nav__icon"></i>
              <span class="nav__name">Kontak Kami</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <style>
        .brand {
    display: flex;
    align-items: center;
}

.brand__name {
    font-size: 1.5rem; /* Sesuaikan ukuran font sesuai kebutuhan */
    margin-left: 10px; /* Sesuaikan jarak antara logo dan nama brand */
}

    </style>
    <!-- ... Bagian  HTML lainnya ... -->
    <script>
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            window.scrollTo({
                top: section.offsetTop,
                behavior: 'smooth'
            });
        }
    </script>
    
</body>
</html>


  </header>
 
