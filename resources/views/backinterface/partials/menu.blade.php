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
                        <a href="index2.html"> Satış analizleri </a>
                    </li>
                    <li>
                        <a href="index2.html"> APP analizleri </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a
                    href="#categories"
                    data-toggle="collapse"
                    class="dropdown-toggle"
                    {{ Request::path() == 'kategori' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'kategori' ? ' aria-expanded=true' : 'aria-expanded="false"' }}
                    {{ Request::path() == 'kategori/ekle' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'kategori/ekle' ? ' aria-expanded=true' : 'aria-expanded="false"' }}
                >
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        <span>Kategoriler</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled
                    {{ Request::path() == 'kategori' ? 'show' : '' }}
                    {{ Request::path() == 'kategori/ekle' ? 'show' : '' }}

                    " id="categories" data-parent="#accordionExample">
                    <li
                        {{ Request::path() == 'kategori' ? 'class=active' : '' }}
                    >
                        <a href="/kategori"> Kategoriler </a>
                    </li>
                    <li
                        {{ Request::path() == 'kategori/ekle' ? 'class=active' : '' }}
                    >
                        <a href="/kategori/ekle"> Kategori ekle </a>
                    </li>
                    <li>
                        <a href="/kategori/analiz"> Kategori analizleri </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a
                    href="#brands"
                    data-toggle="collapse"
                    class="dropdown-toggle"
                    {{ Request::path() == 'marka' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'marka' ? ' aria-expanded=true' : 'aria-expanded="false"' }}
                    {{ Request::path() == 'marka/ekle' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'marka/ekle' ? ' aria-expanded=true' : 'aria-expanded="false"' }}
                >
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>Markalar</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled
                    {{ Request::path() == 'marka' ? 'show' : '' }}
                    {{ Request::path() == 'marka/ekle' ? 'show' : '' }}

                    " id="brands" data-parent="#accordionExample">
                    <li
                        {{ Request::path() == 'marka' ? 'class=active' : '' }}
                    >
                        <a href="/marka"> Markalar </a>
                    </li>
                    <li
                        {{ Request::path() == 'marka/ekle' ? 'class=active' : '' }}
                    >
                        <a href="/marka/ekle"> Marka ekle </a>
                    </li>
                    <li>
                        <a href="/marka/analiz"> Marka analizleri </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a
                    href="#products"
                    data-toggle="collapse"
                    class="dropdown-toggle"
                    {{ Request::path() == 'urun' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'urun' ? ' aria-expanded=true' : 'aria-expanded="false"' }}
                    {{ Request::path() == 'urun/ekle' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'urun/ekle' ? ' aria-expanded=true' : 'aria-expanded="false"' }}
                >
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span>Ürünler</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled
                    {{ Request::path() == 'urun' ? 'show' : '' }}
                    {{ Request::path() == 'urun/ekle' ? 'show' : '' }}

                    " id="products" data-parent="#accordionExample">
                    <li
                        {{ Request::path() == 'urun' ? 'class=active' : '' }}
                    >
                        <a href="/urun"> Ürünler </a>
                    </li>
                    <li
                        {{ Request::path() == 'urun/ekle' ? 'class=active' : '' }}
                    >
                        <a href="/urun/ekle"> Ürün ekle </a>
                    </li>
                    <li>
                        <a href="/kategori/analiz"> Ürün analizleri </a>
                    </li>
                </ul>
            </li>

            <li class="menu">
                <a
                    href="#orders"
                    data-toggle="collapse"
                    class="dropdown-toggle"

                    {{ Request::path() == 'siparisler' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'siparisler' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                >
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        <span>Siparişler</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <ul class="collapse submenu list-unstyled
                    {{ Request::path() == 'siparisler' ? 'show' : '' }}
                " id="orders" data-parent="#accordionExample">
                    <li
                        {{ Request::path() == 'siparisler' ? 'class=active' : '' }}
                    >
                        <a href="/siparisler"> Canlı siparişler </a>
                    </li>


                </ul>
            </li>

            <li class="menu">
                <a
                    href="#coupon"
                    data-toggle="collapse"
                    class="dropdown-toggle"

                    {{ Request::path() == 'kupon' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'kupon' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                    {{ Request::path() == 'kupon/olustur' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'kupon/olustur' ? ' aria-expanded=true' : 'aria-expanded="false"' }}


                >
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-zap"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                        <span>Kupon</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <ul class="collapse submenu list-unstyled
                    {{ Request::path() == 'kupon' ? 'show' : '' }}
                    {{ Request::path() == 'kupon/olustur' ? 'show' : '' }}
                " id="coupon" data-parent="#accordionExample">
                    <li
                        {{ Request::path() == 'kupon' ? 'class=active' : '' }}
                    >
                        <a href="/kupon"> Kuponlar </a>
                    </li>
                    <li
                        {{ Request::path() == 'kupon/olustur' ? 'class=active' : '' }}
                    >
                        <a href="/kupon/olustur"> Kupon oluştur  </a>
                    </li>

                </ul>
            </li>


            <li class="menu">
                <a
                    href="#interactions"
                    data-toggle="collapse"
                    class="dropdown-toggle"

                    {{ Request::path() == 'etkilesim' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'etkilesim' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                    {{ Request::path() == 'etkilesim/bildirim-gonder' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'etkilesim/bildirim-gonder' ? ' aria-expanded=true' : 'aria-expanded="false"' }}


                >
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                        <span>Etkileşim</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <ul class="collapse submenu list-unstyled
                    {{ Request::path() == 'etkilesim' ? 'show' : '' }}
                    {{ Request::path() == 'etkilesim/bildirim-gonder' ? 'show' : '' }}
                " id="interactions" data-parent="#accordionExample">
                    <li
                        {{ Request::path() == 'profilim' ? 'class=active' : '' }}
                    >
                        <a href="/profilim"> Geçmiş bildirimler </a>
                    </li>
                    <li
                        {{ Request::path() == 'etkilesim/bildirim-gonder' ? 'class=active' : '' }}
                    >
                        <a href="/etkilesim/bildirim-gonder"> Bildirim gönder  </a>
                    </li>

                </ul>
            </li>

            <li class="menu">
                <a
                    href="#users"
                    data-toggle="collapse"
                    class="dropdown-toggle"

                    {{ Request::path() == 'kullanicilar' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'kullanicilar' ? ' aria-expanded=true' : 'aria-expanded="false"' }}


                >
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>                        <span>Kullanıcılar</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>

                <ul class="collapse submenu list-unstyled
                    {{ Request::path() == 'kullanicilar' ? 'show' : '' }}
                    " id="users" data-parent="#accordionExample">
                    <li
                        {{ Request::path() == 'kullanicilar' ? 'class=active' : '' }}
                    >
                        <a href="/kullanicilar"> Kullanıcı listesi </a>
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

                    {{ Request::path() == 'log' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'log' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                    {{ Request::path() == 'bildirim-ayarlari' ? ' data-active=true' : '' }}
                    {{ Request::path() == 'bildirim-ayarlari' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

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
                    {{ Request::path() == 'bildirim-ayarlari' ? 'show' : '' }}
                    {{ Request::path() == 'log' ? 'show' : '' }}
                " id="settings" data-parent="#accordionExample">
                    <li
                        {{ Request::path() == 'profilim' ? 'class=active' : '' }}
                    >
                        <a href="/profilim"> Profil ayarları </a>
                    </li>
                    <li
                        {{ Request::path() == 'sube-bilgilerim' ? 'class=active' : '' }}
                    >
                        <a href="/sube-bilgilerim"> Şube bilgileri  </a>
                    </li>

                    <li
                        {{ Request::path() == 'tercihlerim' ? 'class=active' : '' }}
                    >
                        <a href="/tercihlerim"> Tercihler  </a>
                    </li>

                    <li
                        {{ Request::path() == 'bildirim-ayarlari' ? 'class=active' : '' }}
                    >
                        <a href="/bildirim-ayarlari"> Bildirim ayarları  </a>
                    </li>

                    <li
                        {{ Request::path() == 'log' ? 'class=active' : '' }}
                    >
                        <a href="/log"> Log Geçmişi  </a>
                    </li>

                    <li
                        {{ Request::path() == 'sifre-degistir' ? 'class=active' : '' }}
                    >
                        <a href="/sifre-degistir"> Şifre değiştir  </a>
                    </li>

                    <li
                        {{ Request::path() == 'cıkıs' ? 'class=active' : '' }}
                    >
                        <a href="/cikis"> Çıkış yap  </a>
                    </li>

                </ul>
            </li>



        </ul>
        <!-- <div class="shadow-bottom"></div> -->

    </nav>

</div>
