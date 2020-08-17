<nav class="nav flex-column">
  @foreach ($listMenu as $menu)
  <a href="#" class="nav-link">
    {{ $menu['label'] }}
  </a>
  @endforeach
</nav>