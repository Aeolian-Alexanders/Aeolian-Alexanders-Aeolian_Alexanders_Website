<?php

echo '<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="/aeolis"><img src="/aeolis/img/aeolis_logo.svg" style="height:50px;">Home</a>

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
  <li class="nav-item">
    <a class="nav-link" href="https://github.com/Aeolian-Alexanders/jupyter_notebooks" target = "_blank">Die Study</a>
  </li>
    <li class="nav-item">
      <a class="nav-link" href="https://github.com/Aeolian-Alexanders/jupyter_notebooks" target = "_blank">Jupyter Notebooks / GitHub Site</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/aeolis/coincat">Coin Catalog</a>
    </li>
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        Coin Network Demonstrations
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/aeolis/temnos_net">Temnos</a>
        <a class="dropdown-item" href="/aeolis/myrina_net">Myrina</a>
        <a class="dropdown-item" href="/aeolis/kyme_net">Kyme</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/aeolis/credits">Credits</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
  <li class="nav-item">
  <span class="text-muted">
    <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">
      <img alt="Creative Commons License" width="80px", style="border-width:0; float: right;" src="https://mirrors.creativecommons.org/presskit/buttons/88x31/svg/by.svg" /></a>
      <span style="font-size:10px; float: right; clear: right;"><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a></span>.
  </span>
  </li>
</ul>
</nav>'

?>
