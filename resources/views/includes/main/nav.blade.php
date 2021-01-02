<nav class="nav">

    <div class="nav__brand">
        <h1>
            {{ config('app.name') }}
        </h1>
        <h4 class="nav__brand--subtitle">
            The pomeranian breed kennel
        </h4>
    </div>

    <a class="nav__close" href="#">
        <svg>
            <use xlink:href="/sprite.svg#x"></use>
        </svg>
    </a>

    <div class="nav__sections">
        <!-- Welcome -->
        <ul class="nav__sections--ul">
            <h3 class="nav__sections--ul--title">
                Welcome
            </h3>
            <li>
                <a href="#" class="active">
                    Home
                </a>
            </li>
        </ul>
        
        <!-- News -->
        <ul class="nav__sections--ul">
            <h3 class="nav__sections--ul--title">
                News
            </h3>
            <li>
                <a href="#">
                    Some news
                </a>
            </li>
            <li>
                <a href="#">
                    Some news
                </a>
            </li>
        </ul>

        <!-- Pomeranian -->
        <ul class="nav__sections--ul">
            <h3 class="nav__sections--ul--title">
                Pomeranian
            </h3>
            <li>
                <a href="#">
                    Males
                </a>
            </li>
            <li>
                <a href="#">
                    Females
                </a>
            </li>
            <li>
                <a href="#">
                    Children
                </a>
            </li>
            <li>
                <a href="#">
                    Adopted
                </a>
            </li>
            <li>
                <a href="#">
                    Grandparents
                </a>
            </li>
        </ul>

        <!-- Undefined -->
        <ul class="nav__sections--ul">
            <h3 class="nav__sections--ul--title">
                Undefined
            </h3>
            <li>
                <a href="#">
                    Undefined
                </a>
            </li>
            <li>
                <a href="#">
                    Undefined
                </a>
            </li>
            <li>
                <a href="#">
                    Undefined
                </a>
            </li>
        </ul>
        
        <!-- Undefined -->
        <ul class="nav__sections--ul">
            <h3 class="nav__sections--ul--title">
                Contact
            </h3>
            <li>
                <a href="#">
                    Contact
                </a>
            </li>
            <li>
                <a href="#">
                    Instagram
                </a>
            </li>
            <li>
                <a href="#">
                    Facebook
                </a>
            </li>
        </ul>
    </div>
</nav>