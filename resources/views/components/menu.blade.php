<nav class="nav flex-column">
  @foreach ($listMenu as $menu)
  <a href="#" class="nav-link {{ $isActive($menu['label']) ? 'active' : '' }}">
    {{ $menu['label'] }}
  </a>
  @endforeach
</nav>