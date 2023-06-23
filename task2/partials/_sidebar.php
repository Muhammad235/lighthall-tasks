<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="user-profile">
          <div class="user-image">
            <img src="images/profile.png">
          </div>
          <div class="user-name">
          <?=$_SESSION['username']?>
          </div>
          <!-- <div class="user-designation">
              Developer
          </div> -->
        </div>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="admin.php">
              <i class="icon-box menu-icon"></i>
              <span class="menu-title">Tasklist</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inc/logout.php?logout=true">
              <i class="icon-book menu-icon"></i>
              <span class="menu-title">logout</span>
            </a>
          </li>
        </ul>
      </nav>