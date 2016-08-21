<header>
    <!-- A container div for the header elements. Used to provide flexbox implementation while keeping inside header- padding -->
    <div>
        <!-- A container element for left-justified elements in the header -->
        <div>
            <img id="header-logo" src="resources/images/header.png" alt="Header Logo"/>
            <h1>Josh Thomas</h1>
        </div>
        <!-- The navigation element -->
        <nav class="flex-responsive">
            <?php include 'menu-items.php';?>
        </nav>
    </div>
</header>