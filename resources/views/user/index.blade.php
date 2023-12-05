@extends('layouts.app')

@section('content')
<main>
      <!--=============== HOME ===============-->
      <section
        class="hero"
        id="home"
        style="
          background-repeat: no-repeat;
          background-size: cover;
          height: 100vh; 
          background-image: url('https://images.unsplash.com/photo-1605752660759-2db7b7de8fa9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8c2VuZ2dpZ2klMjBiZWFjaHxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');
        "
      >
        <div
          class="hero-content h-100 d-flex justify-content-center align-items-center flex-column"
        >
          <h1 class="text-center text-white display-4">
            Explore Seluruh Indonesia
          </h1>
          <a href="/pesan" class="btn btn-hero mt-5">Book Now</a>
        </div>
      </section>

      <!--=============== Why us ===============-->
      <section class="container why-us text-center" id="">
        <h2 class="section-title">Kenapa Memilih Kami</h2>
        <hr width="40" class="text-center" />
        <div class="row mt-5">
          <div class="col-lg-4 mb-3">
            <div class="card pt-4 pb-3 px-2">
              <div class="why-us-content">
                <i class="bx bx-money why-us-icon mb-4"></i>
                <h4 class="mb-3">Save Money</h4>
                <p>
                  Paket liburan yang terjangkau & berkualitas bagi semua jenis
                  wisatawan
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="card pt-4 pb-3 px-2">
              <div class="why-us-content">
                <i class="bx bxs-heart why-us-icon mb-4"></i>
                <h4 class="mb-3">Stay Safe</h4>
                <p>
                  Menjamin keamanan dan kenyamanan anda melalui standard
                  operasional yang professional.
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-3">
            <div class="card pt-4 pb-3 px-2">
              <div class="why-us-content">
                <i class="bx bx-timer why-us-icon mb-4"></i>
                <h4 class="mb-3">Save Time</h4>
                <p>
                  Anda tidak perlu bingung tentang pemilihan hotel, restaurant
                  semua kami yang atur.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

     
      

      <!-- Cars -->
      <section class="container text-center" id="cari">
        <h2 class="section-title">Cari Tiket</h2>
        <hr width="40" class="text-center">
        <div class="card mt-5 mx-auto" style="width: 24rem; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body">
                {{-- <div class="container"> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('cari.index') }}" method="GET">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="rute_awal" name="rute_awal" placeholder="Asal">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="rute_akhir" name="rute_akhir" placeholder="Tujuan">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="time" class="form-control" id="jamberangkat" name="jamberangkat">
                                </div>
                                    <button type="submit" class="btn btn-primary btn-block" style="background-color: #e9c836; border-color: #e9c836;">Cari Tiket</button>                  
                            </form>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    
				</form>
			</div>
		</div>
    
    @yield('konten')
    
    
      
      <!--=============== Video ===============-->
      <section class="container text-center" id="video-tour">
        <h2 class="section-title">Video Tour</h2>
        <hr width="40" class="text-center" />
        <div class="row mt-5">
          <div class="col-12">
            <iframe
              width="100%"
              height="500px"
              src="https://www.youtube.com/embed/lyGaTk4MLVM?controls=1"
            >
            </iframe>
          </div>
        </div>
      </section>

      <!--=============== Blog ===============-->
      <!--=============== Blog ===============-->
<section class="container blog text-center" id="kontak-kami">
    <h2 class="section-title">Our Blog</h2>
    <hr width="40" class="text-center" />

    <div class="row justify-content-center mt-5">
        <!-- Blog Post 1 -->
        <div class="col-lg-4 mb-4 blogpost">
            <a href="#">
                <div class="card-post">
                    <div class="card-post-img">
                        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8dHJhdmVsJTIwYmFsaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=600&q=60" alt="Blog Post 1">
                    </div>
                    <div class="card-post-data">
                        <span>Travel</span> <small>- Date</small>
                        <h5>Exploring Beautiful Places</h5>
                        <p>Discover the hidden gems and breathtaking landscapes around the world in our latest travel adventure.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Blog Post 2 -->
        <div class="col-lg-4 mb-4 blogpost">
            <a href="#">
                <div class="card-post">
                    <div class="card-post-img">
                        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8dHJhdmVsJTIwYmFsaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=600&q=60" alt="Blog Post 2">
                    </div>
                    <div class="card-post-data">
                        <span>Adventure</span> <small>- Date</small>
                        <h5>Adventurous Escapades</h5>
                        <p>Embark on thrilling adventures and dare to step out of your comfort zone with our adrenaline-pumping experiences.</p>
                    </div>
                </div>
            </a>
        </div>

        <!-- Blog Post 3 -->
        <div class="col-lg-4 mb-4 blogpost">
            <a href="#">
                <div class="card-post">
                    <div class="card-post-img">
                        <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8dHJhdmVsJTIwYmFsaXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=600&q=60" alt="Blog Post 3">
                    </div>
                    <div class="card-post-data">
                        <span>Nature</span> <small>- Date</small>
                        <h5>Embracing Nature's Wonders</h5>
                        <p>Connect with the beauty of nature and learn about the fascinating wonders that Mother Earth has to offer.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>

    </main>
@endsection
