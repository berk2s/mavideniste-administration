<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a
                    href="#dashboard"
                    data-toggle="collapse"
                    class="dropdown-toggle"
                    {{ Request::path() == 'anasayfa' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'anasayfa' ? ' aria-expanded=true' : 'aria-expanded="false"' }}
                >
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Anasayfa</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled
                    {{ Request::path() == 'anasayfa' ? 'show' : '' }}

                    " id="dashboard" data-parent="#accordionExample">
                    <li
                        {{ Request::path() == 'anasayfa' ? 'class=active' : '' }}
                    >
                        <a href="/anasayfa"> Genel Bilgiler </a>
                    </li>
                    <li>
                        <a href="index2.html"> Satış Analizleri </a>
                    </li>
                    <li>
                        <a href="index2.html"> APP Analizleri </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a
                    href="#settings"
                    data-toggle="collapse"
                    class="dropdown-toggle"
                    {{ Request::path() == 'profilim' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'profilim' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                    {{ Request::path() == 'tercihlerim' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'tercihlerim' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                    {{ Request::path() == 'sifre-degistir' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'sifre-degistir' ? ' aria-expanded=true' : 'aria-expanded="false"' }}
                >
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-center"><line x1="18" y1="10" x2="6" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="18" y1="18" x2="6" y2="18"></line></svg><span class="icon-name"> </span>
                        <span>Ayarlar</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled
                    {{ Request::path() == 'profilim' ? 'show' : '' }}
                    {{ Request::path() == 'tercihlerim' ? 'show' : '' }}
                    {{ Request::path() == 'sifre-degistir' ? 'show' : '' }}
                " id="settings" data-parent="#accordionExample">
                    <li
                        {{ Request::path() == 'profilim' ? 'class=active' : '' }}
                    >
                        <a href="/profilim"> Profil Ayarları </a>
                    </li>
                    <li
                        {{ Request::path() == 'sube-bilgilerim' ? 'class=active' : '' }}
                    >
                        <a href="/sube-bilgilerim"> Şube Bilgileri  </a>
                    </li>

                    <li
                        {{ Request::path() == 'tercihlerim' ? 'class=active' : '' }}
                    >
                        <a href="/tercihlerim"> Tercihler  </a>
                    </li>

                    <li
                        {{ Request::path() == 'sifre-degistir' ? 'class=active' : '' }}
                    >
                        <a href="/sifre-degistir"> Şifre Değiştir  </a>
                    </li>

                </ul>
            </li>



        </ul>
        <!-- <div class="shadow-bottom"></div> -->

    </nav>

</div>
