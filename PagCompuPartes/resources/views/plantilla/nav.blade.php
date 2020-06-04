<section class="menu cid-rSk81IhPGX" once="menu" id="menu1-1">
    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a @click="menu=0">
                         <img src="img/logowhite250x50-250x50.png"  title="" style="height: 3.8rem;">
                    </a>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                <li @click="menu=3" class="nav-item">
                    <a class="nav-link link text-white display-4" @click="menu=3"><span class="mbrib-question mbr-iconfont mbr-iconfont-btn"></span>
                        ¿Quiénes Somos?</a>
                </li>
                <li @click="menu=2" class="nav-item"><a class="nav-link link text-white display-4" @click="menu=2"><span class="mbrib-briefcase mbr-iconfont mbr-iconfont-btn"></span>
                        Soluciones</a>
                </li>
                <li @click="menu=4" class="nav-item"><a class="nav-link link text-white display-4" @click="menu=4"><span class="mbrib-sale mbr-iconfont mbr-iconfont-btn"></span>
                        Outlet</a>
                </li>
                <li @click="menu=5" class="nav-item">
                    <a class="nav-link link text-white display-4"@click="menu=5"><span class="mbrib-help mbr-iconfont mbr-iconfont-btn"></span>
                        Contacto &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</a>
                </li>
            </ul>
        </div>
    </nav>
</section>