

<div class="sidebar-wrapper sidebar-theme">
    @php
        $pageTabArray = array_column(json_decode(auth()->user()->user_authority, true), 'tab');
        $pageUrlArray = array_column(json_decode(auth()->user()->user_authority, true), 'page_url');
    @endphp
    <nav id="sidebar">
        <ul class="list-unstyled menu-categories" id="accordionExample">

                        @if(array_search(1, $pageTabArray) !== false)
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
                            @if(array_search('anasayfa', $pageUrlArray) !== false)
                                <li
                                    {{ Request::path() == 'anasayfa' ? 'class=active' : '' }}
                                >
                                    <a href="/anasayfa"> Genel Bilgiler </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                        @endif

                        @if(array_search(2, $pageTabArray) !== false)
                             <li class="menu">
                    <a
                        href="#categories"
                        data-toggle="collapse"
                        class="dropdown-toggle"
                        {{ Request::path() == 'kategori' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'kategori' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'kategori/ekle' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'kategori/ekle' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'kategori/tag/ekle' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'kategori/tag/ekle' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'kategori/analiz' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'kategori/analiz' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

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
                        {{ Request::path() == 'kategori/tag/ekle' ? 'show' : '' }}
                        {{ Request::path() == 'kategori/analiz' ? 'show' : '' }}

                        " id="categories" data-parent="#accordionExample">

                        @if(array_search('kategori', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'kategori' ? 'class=active' : '' }}
                            >
                                <a href="/kategori"> Kategoriler </a>
                            </li>
                        @endif

                        @if(array_search('kategori/ekle', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'kategori/ekle' ? 'class=active' : '' }}
                            >
                                <a href="/kategori/ekle"> Kategori ekle </a>
                            </li>
                        @endif

                            @if(array_search('kategori/tag/ekle', $pageUrlArray) !== false)
                                <li
                                    {{ Request::path() == 'kategori/tag/ekle' ? 'class=active' : '' }}
                                >
                                    <a href="/kategori/tag/ekle"> Alt kategori ekle </a>
                                </li>
                            @endif

                            @if(array_search('kategori/analiz', $pageUrlArray) !== false)
                                <li
                                    {{ Request::path() == 'kategori/analiz' ? 'class=active' : '' }}
                                >
                                    <a href="/kategori/analiz"> Kategori analizi </a>
                                </li>
                            @endif


                    </ul>
                </li>
                        @endif

                        @if(array_search(3, $pageTabArray) !== false)
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

                        @if(array_search('marka', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'marka' ? 'class=active' : '' }}
                            >
                                <a href="/marka"> Markalar </a>
                            </li>
                        @endif

                        @if(array_search('marka/ekle', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'marka/ekle' ? 'class=active' : '' }}
                            >
                                <a href="/marka/ekle"> Marka ekle </a>
                            </li>
                        @endif

                    </ul>
                </li>
                        @endif

                        @if(array_search(4, $pageTabArray) !== false)
                            <li class="menu">
                    <a
                        href="#products"
                        data-toggle="collapse"
                        class="dropdown-toggle"
                        {{ Request::path() == 'urun' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'urun' ? ' aria-expanded=true' : 'aria-expanded="false"' }}
                        {{ Request::path() == 'urun/ekle' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'urun/ekle' ? ' aria-expanded=true' : 'aria-expanded="false"' }}
                        {{ Request::path() == 'urun/analiz' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'urun/analiz' ? ' aria-expanded=true' : 'aria-expanded="false"' }}
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
                        {{ Request::path() == 'urun/analiz' ? 'show' : '' }}

                        " id="products" data-parent="#accordionExample">

                        @if(array_search('urun', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'urun' ? 'class=active' : '' }}
                            >
                                <a href="/urun"> Ürünler </a>
                            </li>
                        @endif

                        @if(array_search('urun/ekle', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'urun/ekle' ? 'class=active' : '' }}
                            >
                                <a href="/urun/ekle"> Ürün ekle </a>
                            </li>
                        @endif

                        @if(array_search('urun/analiz', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'urun/analiz' ? 'class=active' : '' }}
                            >
                                <a href="/urun/analiz"> Ürün analizleri </a>
                            </li>
                        @endif

                    </ul>
                </li>
                        @endif

                        @if(array_search(5, $pageTabArray) !== false)
                            <li class="menu">
                    <a
                        href="#orders"
                        data-toggle="collapse"
                        class="dropdown-toggle"

                        {{ Request::path() == 'siparisler' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'siparisler' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'siparisler/gecmis' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'siparisler/gecmis' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                    >
                        <div class="">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            <span>Siparişler</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>

                    <ul class="collapse submenu list-unstyled
                        {{ Request::path() == 'siparisler' ? 'show' : '' }}
                        {{ Request::path() == 'siparisler/gecmis' ? 'show' : '' }}
                    " id="orders" data-parent="#accordionExample">

                        @if(array_search('siparisler', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'siparisler' ? 'class=active' : '' }}
                            >
                                <a href="/siparisler"> Canlı siparişler </a>
                            </li>
                        @endif

                        @if(array_search('siparisler/gecmis', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'siparisler/gecmis' ? 'class=active' : '' }}
                            >
                                <a href="/siparisler/gecmis"> Geçmiş siparişler </a>
                            </li>
                        @endif


                    </ul>
                </li>
                        @endif

                        @if(array_search(6, $pageTabArray) !== false)
                            <li class="menu">
                    <a
                        href="#campaigns"
                        data-toggle="collapse"
                        class="dropdown-toggle"

                        {{ Request::path() == 'kampanya' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'kampanya' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'kampanya/olustur' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'kampanya/olustur' ? ' aria-expanded=true' : 'aria-expanded="false"' }}


                    >
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                            <span>Kampanya</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>

                    <ul class="collapse submenu list-unstyled
                        {{ Request::path() == 'kampanya' ? 'show' : '' }}
                        {{ Request::path() == 'kampanya/olustur' ? 'show' : '' }}
                    " id="campaigns" data-parent="#accordionExample">

                        @if(array_search('kampanya', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'kampanya' ? 'class=active' : '' }}
                            >
                                <a href="/kampanya"> Kampanyalar  </a>
                            </li>
                        @endif

                        @if(array_search('kampanya/olustur', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'kampanya/olustur' ? 'class=active' : '' }}
                            >
                                <a href="/kampanya/olustur"> Kampanya oluştur  </a>
                            </li>
                         @endif

                    </ul>
                </li>
                        @endif

                        @if(array_search(7, $pageTabArray) !== false)
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

                        @if(array_search('kupon', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'kupon' ? 'class=active' : '' }}
                            >
                                <a href="/kupon"> Kuponlar  </a>
                            </li>
                         @endif

                            @if(array_search('kupon/olustur', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'kupon/olustur' ? 'class=active' : '' }}
                            >
                                <a href="/kupon/olustur"> Kupon oluştur  </a>
                            </li>
                         @endif

                    </ul>
                </li>
                        @endif

                        @if(array_search(8, $pageTabArray) !== false)
                            <li class="menu">
                    <a
                        href="#interactions"
                        data-toggle="collapse"
                        class="dropdown-toggle"

                        {{ Request::path() == 'etkilesim/sms-gonder' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'etkilesim/sms-gonder' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

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
                        {{ Request::path() == 'etkilesim/sms-gonder' ? 'show' : '' }}
                        {{ Request::path() == 'etkilesim/bildirim-gonder' ? 'show' : '' }}
                    " id="interactions" data-parent="#accordionExample">

                        @if(array_search('etkilesim/sms-gonder', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'etkilesim/sms-gonder' ? 'class=active' : '' }}
                            >
                                <a href="/etkilesim/sms-gonder"> SMS gönder  </a>
                            </li>
                        @endif

                        @if(array_search('etkilesim/bildirim-gonder', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'etkilesim/bildirim-gonder' ? 'class=active' : '' }}
                            >
                                <a href="/etkilesim/bildirim-gonder"> Bildirim gönder  </a>
                            </li>
                        @endif

                    </ul>
                </li>
                        @endif

                        @if(array_search(9, $pageTabArray) !== false)
                            <li class="menu">
                    <a
                        href="#news"
                        data-toggle="collapse"
                        class="dropdown-toggle"

                        {{ Request::path() == 'haberler' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'haberler' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'haberler/olustur' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'haberler/olustur' ? ' aria-expanded=true' : 'aria-expanded="false"' }}


                    >
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            <span>Haber</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>

                    <ul class="collapse submenu list-unstyled
                        {{ Request::path() == 'haberler' ? 'show' : '' }}
                        {{ Request::path() == 'haberler/olustur' ? 'show' : '' }}
                    " id="news" data-parent="#accordionExample">

                        @if(array_search('haberler', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'haberler' ? 'class=active' : '' }}
                            >
                                <a href="/haberler"> Haberler  </a>
                            </li>
                        @endif

                        @if(array_search('haberler/olustur', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'haberler/olustur' ? 'class=active' : '' }}
                            >
                                <a href="/haberler/olustur"> Haber oluştur  </a>
                            </li>
                        @endif

                    </ul>
                </li>
                        @endif

                        @if(array_search(10, $pageTabArray) !== false)
                            <li class="menu">
                    <a
                        href="#users"
                        data-toggle="collapse"
                        class="dropdown-toggle"

                        {{ Request::path() == 'kullanicilar' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'kullanicilar' ? ' aria-expanded=true' : 'aria-expanded="false"' }}


                    >
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                            <span>Kullanıcı</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>

                    <ul class="collapse submenu list-unstyled
                        {{ Request::path() == 'kullanicilar' ? 'show' : '' }}
                        " id="users" data-parent="#accordionExample">

                        @if(array_search('kullanicilar', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'kullanicilar' ? 'class=active' : '' }}
                            >
                                <a href="/kullanicilar"> Kullanıcı listesi </a>
                            </li>
                        @endif


                    </ul>
                </li>
                        @endif

                        @if(array_search(11, $pageTabArray) !== false)
                            <li class="menu">
                    <a
                        href="#mybranch"
                        data-toggle="collapse"
                        class="dropdown-toggle"

                        {{ Request::path() == 'bayim' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayim' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'bayim/ayarlar' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayim/ayarlar' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'bayim/operatorler' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayim/operatorler' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'bayim/operator/ekle' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayim/operator/ekle' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'bayim/sikayetler' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayim/sikayetler' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Str::contains(Request::path(), 'bayim/operatorler/duzenle') ? 'data-active=true' : '' }}
                        {{ Str::contains(Request::path(), 'bayim/operatorler/duzenle') ? 'aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Str::contains(Request::path(), 'bayim/log') ? 'data-active=true' : '' }}
                        {{ Str::contains(Request::path(), 'bayim/log') ? 'aria-expanded=true' : 'aria-expanded="false"' }}

                    >
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pie-chart"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
                            <span>Bayim</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>

                    <ul class="collapse submenu list-unstyled
                        {{ Request::path() == 'bayim' ? 'show' : '' }}
                        {{ Request::path() == 'bayim/ayarlar' ? 'show' : '' }}
                        {{ Request::path() == 'bayim/operatorler' ? 'show' : '' }}
                        {{ Request::path() == 'bayim/operator/ekle' ? 'show' : '' }}
                        {{ Request::path() == 'bayim/sikayetler' ? 'show' : '' }}
                        {{ Request::path() == 'bayim/log' ? 'show' : '' }}
                        " id="mybranch" data-parent="#accordionExample">

                        @if(array_search('bayim', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayim' ? 'class=active' : '' }}
                            >
                                <a href="/bayim"> Bayi bilgileri </a>

                            </li>
                        @endif

                        @if(array_search('bayim/ayarlar', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayim/ayarlar' ? 'class=active' : '' }}
                            >
                                <a href="/bayim/ayarlar"> Bayi ayarları </a>

                            </li>
                        @endif

                        @if(array_search('bayim/operatorler', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayim/operatorler' ? 'class=active' : '' }}
                            >
                                <a href="/bayim/operatorler"> Operatörler </a>

                            </li>
                        @endif

                        @if(array_search('bayim/operator/ekle', $pageUrlArray) !== false)
                          <li
                            {{ Request::path() == 'bayim/operator/ekle' ? 'class=active' : '' }}
                            >
                            <a href="/bayim/operator/ekle"> Operatör ekle </a>
                          </li>
                        @endif

                        @if(array_search('bayim/sikayetler', $pageUrlArray) !== false)
                          <li
                            {{ Request::path() == 'bayim/sikayetler' ? 'class=active' : '' }}
                            >
                            <a href="/bayim/sikayetler"> Şikayetler </a>
                          </li>
                        @endif

                    </ul>
                </li>
                        @endif

                        @if(array_search(12, $pageTabArray) !== false)
                            <li class="menu">
                    <a
                        href="#branch"
                        data-toggle="collapse"
                        class="dropdown-toggle"
                        {{ Request::path() == 'bayi' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayi' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'bayi/ekle' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayi/ekle' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'bayi/operatorler' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayi/operatorler' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'bayi/operator/ekle' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayi/operator/ekle' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'bayi/sikayetler' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayi/sikayetler' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'bayi/kullanicilar' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayi/kullanicilar' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'bayi/istek' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'bayi/istek' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Str::contains(Request::path(), 'bayi/duzenle') ? 'data-active=true' : '' }}
                        {{ Str::contains(Request::path(), 'bayi/duzenle') ? 'aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Str::contains(Request::path(), 'bayi/operatorler/duzenle') ? 'data-active=true' : '' }}
                        {{ Str::contains(Request::path(), 'bayi/operatorler/duzenle') ? 'aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Str::contains(Request::path(), 'bayi/log') ? 'data-active=true' : '' }}
                        {{ Str::contains(Request::path(), 'bayi/log') ? 'aria-expanded=true' : 'aria-expanded="false"' }}

                    >
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                            <span>Bayi sistemi</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>

                    <ul class="collapse submenu list-unstyled
                        {{ Request::path() == 'bayi' ? 'show' : '' }}
                        {{ Request::path() == 'bayi/ekle' ? 'show' : '' }}
                        {{ Request::path() == 'bayi/operatorler' ? 'show' : '' }}
                        {{ Request::path() == 'bayi/operator/ekle' ? 'show' : '' }}
                        {{ Request::path() == 'bayi/sikayetler' ? 'show' : '' }}
                        {{ Request::path() == 'bayi/kullanicilar' ? 'show' : '' }}
                        {{ Request::path() == 'bayi/log' ? 'show' : '' }}
                        {{ Request::path() == 'bayi/istek' ? 'show' : '' }}
                        {{ Str::contains(Request::path(), 'bayi/') ? 'show' : '' }}

                        " id="branch" data-parent="#accordionExample">

                        @if(array_search('bayi', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayi' ? 'class=active' : '' }}
                                {{ Str::contains(Request::path(), 'bayi/duzenle/') ? 'class=active' : '' }}

                            >
                                <a href="/bayi"> Bayiler  </a>
                            </li>
                        @endif

                        @if(array_search('bayi/ekle', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayi/ekle' ? 'class=active' : '' }}
                            >
                                <a href="/bayi/ekle"> Bayi ekle  </a>
                            </li>
                        @endif

                        @if(array_search('bayi/operatorler', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayi/operatorler' ? 'class=active' : '' }}
                            >
                                <a href="/bayi/operatorler"> Bayi operatörleri  </a>
                            </li>
                        @endif

                        @if(array_search('bayi/operator/ekle', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayi/operator/ekle' ? 'class=active' : '' }}
                            >
                                <a href="/bayi/operator/ekle"> Operatör ekle  </a>
                            </li>
                        @endif


                            @if(array_search('bayi/kullanicilar', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayi/kullanicilar' ? 'class=active' : '' }}
                            >
                                <a href="/bayi/kullanicilar"> Kullanıcı listesi  </a>
                            </li>
                        @endif

                        @if(array_search('bayi/sms', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayi/sms' ? 'class=active' : '' }}
                            >
                                <a href="/bayi/sms"> SMS gönder  </a>
                            </li>
                        @endif

                        @if(array_search('bayi/bildirim', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayi/bildirim' ? 'class=active' : '' }}
                            >
                                <a href="/bayi/bildirim"> Bildirim gönder  </a>
                            </li>
                        @endif

                        @if(array_search('bayi/sikayetler', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayi/sikayetler' ? 'class=active' : '' }}
                            >
                                <a href="/bayi/sikayetler"> Şikayetler  </a>
                            </li>
                        @endif

                        @if(array_search('bayi/istek', $pageUrlArray) !== false)
                            <li
                                {{ Request::path() == 'bayi/istek' ? 'class=active' : '' }}
                            >
                                <a href="/bayi/istek"> Bayilik istekleri  </a>
                            </li>
                        @endif



                    </ul>
                </li>
                        @endif

                        @if(array_search(13, $pageTabArray) !== false)
                            <li class="menu">
                    <a
                        href="#settings"
                        data-toggle="collapse"
                        class="dropdown-toggle"
                        {{ Request::path() == 'ayarlar/profilim' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'ayarlar/profilim' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'ayarlar/tercihlerim' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'ayarlar/tercihlerim' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'ayarlar/sifre-degistir' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'ayarlar/sifre-degistir' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'ayarlar/log' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'ayarlar/log' ? ' aria-expanded=true' : 'aria-expanded="false"' }}

                        {{ Request::path() == 'ayarlar/bildirim-ayarlari' ? ' data-active=true' : '' }}
                        {{ Request::path() == 'ayarlar/bildirim-ayarlari' ? ' aria-expanded=true' : 'aria-expanded="false"' }}


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
                        {{ Request::path() == 'ayarlar/profilim' ? 'show' : '' }}
                        {{ Request::path() == 'ayarlar/tercihlerim' ? 'show' : '' }}
                        {{ Request::path() == 'ayarlar/sifre-degistir' ? 'show' : '' }}
                        {{ Request::path() == 'ayarlar/log' ? 'show' : '' }}
                        {{ Request::path() == 'ayarlar/bildirim-ayarlari' ? 'show' : '' }}
                    " id="settings" data-parent="#accordionExample">
                        @if(array_search('ayarlar/profilim', $pageUrlArray) !== false)
                        <li
                            {{ Request::path() == 'ayarlar/profilim' ? 'class=active' : '' }}
                        >
                            <a href="/ayarlar/profilim"> Profil ayarları </a>
                        </li>
                        @endif
                        @if(array_search('ayarlar/tercihlerim', $pageUrlArray) !== false)
                        <li
                            {{ Request::path() == 'ayarlar/tercihlerim' ? 'class=active' : '' }}
                        >
                            <a href="/ayarlar/tercihlerim"> Tercihler  </a>
                        </li>
                        @endif
                        @if(array_search('ayarlar/bildirim-ayarlari', $pageUrlArray) !== false)
                        <li
                            {{ Request::path() == 'ayarlar/bildirim-ayarlari' ? 'class=active' : '' }}
                        >
                            <a href="/ayarlar/bildirim-ayarlari"> Bildirim ayarları  </a>
                        </li>
                        @endif

                        @if(array_search('ayarlar/log', $pageUrlArray) !== false)
                        <li
                            {{ Request::path() == 'ayarlar/log' ? 'class=active' : '' }}
                        >
                            <a href="/ayarlar/log"> Log geçmişi  </a>
                        </li>
                        @endif

                        @if(array_search('ayarlar/sifre-degistir', $pageUrlArray) !== false)
                        <li
                            {{ Request::path() == 'ayarlar/sifre-degistir' ? 'class=active' : '' }}
                        >
                            <a href="/ayarlar/sifre-degistir"> Şifre değiştir  </a>
                        </li>
                        @endif

                        <li
                            {{ Request::path() == 'cıkıs' ? 'class=active' : '' }}
                        >
                            <a href="/cikis"> Çıkış yap  </a>
                        </li>

                    </ul>
                </li>
                        @endif

        </ul>
         <div class="shadow-bottom"></div>

    </nav>

</div>
