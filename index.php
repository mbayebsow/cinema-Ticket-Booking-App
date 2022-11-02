        <?php include('includes/header.php'); ?>

        <div id="page-wrapper"></div>

        <div class="nav-bottom">
            <div id="menuactive"></div>
            <button class="tablink" id="Home"><i class="fas fa-th-large"></i><span>Home</span></button>
            <button class="tablink" id="Ticket"><i class="fas fa-receipt"></i><span>Tickets</span></button>
            <button class="tablink" id="User"><i class="fas fa-user"></i><span>Compte</span></button>
        </div>
        <script>
            HomePage();
            $("#Home").click(function () {
                HomePage();
            });
            $("#Ticket").click(function () {
                TicketPage()
            });
            $("#User").click(function () {
                UserPage();
            });
        </script>
    </body>
</html>
