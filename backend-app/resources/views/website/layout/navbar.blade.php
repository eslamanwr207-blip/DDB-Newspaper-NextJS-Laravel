{{-- resources/views/components/navbar.blade.php --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
    <div class="container d-flex justify-content-center mx-auto">
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav w-100 d-flex justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" id="home" href="{{ url('/') }}">
                        @php
                            $lang = app()->getLocale();
                            $homeLabel = $lang === 'ar' ? 'الرئيسية' : ($lang === 'fr' ? 'Accueil' : 'Home');
                        @endphp
                        {{ $homeLabel }}
                    </a>
                </li>

                {{-- استدعاء الأقسام --}}
                @include('website.layout.categories')

                {{-- اختيار اللغة --}}

                <!-- ✅ Language Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                       role="button" data-bs-toggle="dropdown">

                        @php
                            $lang = app()->getLocale();
                            $language = $lang === 'ar' ? 'اللغة' : ($lang === 'fr' ? 'Language' : 'Language');
                        @endphp
                        {{ $language }}

                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ url('/en') }}">English</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ url('/ar') }}">العربية</a>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ url('/fr') }}">French</a>
                        </li>





{{--                <li class="nav-item">--}}
{{--                    <form action="{{ route('language.change') }}" method="POST" class="d-flex align-items-center ms-3">--}}
{{--                        @csrf--}}
{{--                        <select name="language" class="form-select" onchange="this.form.submit()">--}}
{{--                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>--}}
{{--                            <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>--}}
{{--                            <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected' : '' }}>Français</option>--}}
{{--                        </select>--}}
{{--                    </form>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</nav>
