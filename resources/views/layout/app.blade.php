   <!DOCTYPE html>
   <html lang="en">

   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Mandiri jaya makmur</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
      <link rel="stylesheet" href="{{ asset('css/barang.css') }}">
      <link rel="stylesheet" href="{{ asset('css/about.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

      @stack('styles')
      <style>
         body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, rgb(221, 239, 246), rgb(250, 255, 255));
            /* warna bisa diganti */
            background-attachment: fixed;
            background-size: cover;
         }

         .about,

         .our_room {
            background-color: transparent;
            padding: 5px 0;
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
         }

         .gallery,
         .blog {
            background-color: transparent;
            padding: 80px 0;
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
         }

         .contact {
            background-color: transparent;
            padding: 100px 0 60px 0;
            /* atas lebih besar, bawah normal */
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
         }

         #contact .titlepage h2 {
            margin-top: 40px;
            /* atau 60px jika masih kurang */
         }


         /* Optional: blur efek kaca */
         .about,
         .our_room,
         .gallery,
         .blog,
         .contact {
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
         }

         html {
            scroll-behavior: smooth;
         }
      </style>

   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
      </div>
      <!-- end loader -->
      @include('layout.v_nav1')

      <div class="content">
         @yield('content')
      </div>

      <!-- Javascript files-->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>

      <script src="{{asset('Template1')}}/js/jquery.min.js"></script>
      <script src="{{asset('Template1')}}/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('Template1')}}/js/jquery-3.0.0.min.js"></script>
      <script src="{{asset('Template1')}}/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="{{asset('Template1')}}/js/custom.js"></script>

      <script>
         function decrement(button) {
            const input = button.parentNode.querySelector(".quantity");
            let currentValue = parseInt(input.value);
            if (currentValue > 1) {
               input.value = currentValue - 1;
               updateCheckoutQuantity(button.closest('.bed_room'), input.value);
            }
         }

         function increment(button) {
            const input = button.parentNode.querySelector(".quantity");
            let currentValue = parseInt(input.value);
            const maxStok = parseInt(input.dataset.maxStok) || 100;
            if (currentValue < maxStok) {
               input.value = currentValue + 1;
               updateCheckoutQuantity(button.closest('.bed_room'), input.value);
            } else {
               alert('Jumlah melebihi stok yang tersedia.');
            }
         }

         // Fungsi untuk mengupdate quantity di form Beli Sekarang (opsional)
         function updateCheckoutQuantity(productCard, quantity) {
            const checkoutQuantityInput = productCard.querySelector('.checkout-quantity');
            if (checkoutQuantityInput) {
               checkoutQuantityInput.value = quantity;
            }
         }

         // Gunakan event listener untuk tombol keranjang agar lebih bersih
         document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', function() {
               const productId = this.dataset.productId;
               const productName = this.dataset.productName;
               const productPrice = parseInt(this.dataset.productPrice);
               const productImage = this.dataset.productImage;
               const quantityInput = this.closest('.bed_room').querySelector('.quantity');
               const quantity = parseInt(quantityInput.value);
               const maxStok = parseInt(quantityInput.dataset.maxStok);

               if (quantity > maxStok) {
                  alert('Jumlah yang diminta melebihi stok yang tersedia.');
                  quantityInput.value = maxStok;
                  return;
               }

               // Kirim data ke server
               fetch("{{ url('/keranjang/tambah') }}", {
                     method: "POST",
                     headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                     },
                     body: JSON.stringify({
                        id_produk: productId,
                        nama_produk: productName,
                        harga: productPrice,
                        jumlah: quantity
                     })
                  })
                  .then(data => {
                     alert(data.message || "Produk berhasil ditambahkan ke keranjang!");
                     // Di sini Anda bisa update tampilan jumlah item di ikon keranjang navbar jika ada
                     if (data.cart_count !== undefined) {
                        // Contoh: document.getElementById('cart-item-count').innerText = data.cart_count;
                     }
                  })
                  .catch(error => {
                     let errorMessage = "Terjadi kesalahan saat menambahkan ke keranjang.";
                     if (error && error.message) {
                        errorMessage = error.message;
                     } else if (typeof error === 'string') {
                        errorMessage = error;
                     }
                     alert(errorMessage);
                     console.error("Error adding to cart:", error);
                  });
            });
         });

         // Update quantity di form "Beli Sekarang" setiap kali quantity di +/- diubah
         document.querySelectorAll('.quantity').forEach(input => {
            input.addEventListener('change', function() {
               updateCheckoutQuantity(this.closest('.bed_room'), this.value);
            });
            // Inisialisasi untuk form "Beli Sekarang"
            updateCheckoutQuantity(input.closest('.bed_room'), input.value);
         });
      </script>

      @stack('scripts')
   </body>

   </html>