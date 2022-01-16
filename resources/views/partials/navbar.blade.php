<header class="flex justify-between items-center py-5">
    <div>LOGO</div>
    <nav>
        <livewire:search />
        <a href="{{ route('jobs.index') }}" class="hover:text-green-500">Nos missions</a>
        @guest
            <a href="{{ route('login') }}" class="mr-5 hover:text-green-500" >Se connecter</a>
            <a href="{{ route('register') }}" class="mr-5 hover:text-green-500">S'enregistrer</a>
        @else
            <a href="{{ route('home') }}" class="mr-5 hover:text-green-500">Tableau de bord</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); getElementById('logout-form').submit();" class=" hover:text-green-500 ">Se déconnecter</a>
            <form action="{{ route('logout') }}" style="display: none;" method="POST" id="logout-form" > @csrf</form>
        @endguest
    </nav>
</header>