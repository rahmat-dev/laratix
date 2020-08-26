<nav class="nav flex-column">
  @foreach ($listMenu as $menu)
  <a href="{{ route($menu['route']) }}" class="nav-link {{ $isActive($menu['label']) ? 'active' : '' }}">
    <i class="{{ $menu['icon'] }} mr-2"></i>{{ $menu['label'] }}
  </a>
  @endforeach
</nav>