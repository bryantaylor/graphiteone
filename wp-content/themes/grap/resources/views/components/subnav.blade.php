
<nav class="subnav">
  <div class="subnav__inner container">
    <h5>On This Page:</h5>
    <div class="subnav__menu">
      @foreach ($subnav as $navitem)
          <a class="subnav__menu__item secondary-button-light small"
             href="{{ $navitem['anchor_link'] }}"
          >{{ $navitem['title'] }}</a>
      @endforeach
    </div>
  </div>
</nav>
