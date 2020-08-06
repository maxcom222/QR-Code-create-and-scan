<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <div class="sidenav-menu-heading">Campaigns</div>

                    <a class="nav-link" href="/">
                        <div class="nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link" href="/campaign">
                        <div class="nav-link-icon"><i class="fas fa-qrcode"></i></div>
                        Start Campaign
                    </a>

                    <a class="nav-link" href="/viewcampaigns">
                        <div class="nav-link-icon"><i class="fas fa-qrcode"></i></div>
                        View Campaigns
                    </a>

            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{auth()->user()->name}} {{auth()->user()->surname}}</div>
            </div>
        </div>
    </nav>
</div>