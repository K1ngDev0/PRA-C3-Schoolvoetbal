<div>
    <header>
        <nav class="navbar navbar-expand-lg px-3 d-flex align-items-center justify-content-between" style="background-color: #007a33; color: white;">
            <!-- Logo links -->
            <a href="/" class="navbar-brand">
                <img src="images/image.png" alt="Logo" style="height: 40px;">
            </a>

            <!-- Navigatie-items gecentreerd -->
            <ul class="nav nav-pills mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/">Homepage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Wedstrijden van nu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Aankomende wedstrijden</a>
                </li>
            </ul>

            <!-- Offcanvas menu knop rechts -->
            <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu" 
                style="border: 2px solid white; border-radius: 5px; color: white; padding: 5px 20px; background-color: transparent;">
                Account
            </button>
        </nav>

        <!-- Offcanvas-menu -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel" style="background-color: #007a33; color: white; padding-top: 10px;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasMenuLabel">Account</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Sluiten"></button>
            </div>
            <div class="offcanvas-body">
                <nav>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('login') }}" class="text-decoration-none text-white">Login</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}" class="text-decoration-none text-white">Account aanmaken</a>
                        </li>
                        <li>
                            <a href="/contact" class="text-decoration-none text-white">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</div>
