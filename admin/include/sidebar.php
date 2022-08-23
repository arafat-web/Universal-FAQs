<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link <?php echo $page == "dashboard" ? '' : 'collapsed'; ?> " href="index.php">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo $page == "addfaq" ? '' : 'collapsed'; ?>" href="addfaq.php">
                <i class="bi bi-plus-square"></i>
                <span>Add FAQ</span>
            </a>
        </li><!-- End Sales Page Nav -->

        <li class="nav-item">
            <a class="nav-link <?php echo $page == "managefaq" ? '' : 'collapsed'; ?>" href="managefaq.php">
                <i class="bi bi-journal-text"></i>
                <span>Manage FAQ</span>
            </a>
        </li><!-- End Buy Page Nav -->
        <li class="nav-item">
            <a class="nav-link <?php echo $page == "admin-profile" ? '' : 'collapsed'; ?>" href="admin-profile.php">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->
    </ul>

</aside><!-- End Sidebar-->