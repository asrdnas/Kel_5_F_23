<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="{{ asset('assets/img/flashnews.png') }}">
  <link href="{{ asset('assets/css/output.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
  <div class="w-full">
    @include('includes.navbar')

    @yield('content')
  </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('assets/js/swiper.js') }}"></script>

</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let searchInput = document.getElementById("searchInput");
        let searchIcon = document.getElementById("searchIcon"); // Ikon pencarian jika ada

        // Pastikan input ditemukan sebelum menambahkan event listener
        if (searchInput) {
            searchInput.addEventListener("keypress", function (event) {
                if (event.key === "Enter") {
                    performSearch();
                }
            });
        }

        // Pastikan ikon bisa diklik untuk pencarian
        if (searchIcon) {
            searchIcon.addEventListener("click", function () {
                performSearch();
            });
        }
    });

    function performSearch() {
        let query = document.getElementById("searchInput").value.trim();
        if (query === "") {
            alert("Harap masukkan kata kunci sebelum mencari!");
            return;
        }

        window.location.href = "/search?query=" + encodeURIComponent(query);
    }
</script>

</html>
