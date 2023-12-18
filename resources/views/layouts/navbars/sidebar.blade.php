<?php use App\Models\User; ?>
<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="https://isglobal.co/" class="simple-text logo-normal">
            {{ __('E-Invoice System') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
           @if(User::isUserCanRegisterUser() == '1')
           <li class="nav-item{{ $activePage == 'registeruser' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('registeruser') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Register User') }}</p>
                </a>
           </li>
           @endif

           @if(User::isUserCanProvidePagesAccess() == '1')
           <li class="nav-item{{ $activePage == 'pagesaccess' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('pagesaccess') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Pages Access') }}</p>
                </a>
           </li>
           @endif

           <li class="nav-item{{ $activePage == 'einvoiceb2b' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('einvoiceb2b') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Electronic Invoices B2B') }}</p>
                </a>
           </li>
           <li class="nav-item{{ $activePage == 'einvoiceb2c' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('einvoiceb2c') }}">
                    <i class="material-icons">content_paste</i>
                    <p>{{ __('Electronic Invoices B2C') }}</p>
                </a>
           </li>
           <li class="nav-item{{ $activePage == 'einvoiceadd' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('einvoiceadd') }}">
                      <i class="material-icons">library_books</i>
                        <p>{{ __('E-Invoice.Add B2C') }}</p>
                    </a>
           </li>
           <li class="nav-item{{ $activePage == 'einvoiceaddb2b' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('einvoiceaddb2b') }}">
                      <i class="material-icons">library_books</i>
                        <p>{{ __('E-Invoice.Add B2B') }}</p>
                    </a>
           </li>
           <li class="nav-item{{ $activePage == 'itemmaster' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('itemmaster') }}">
                      <i class="material-icons">library_books</i>
                        <p>{{ __('Item Master') }}</p>
                    </a>
           </li>
           <li class="nav-item{{ $activePage == 'servicemaster' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('servicemaster') }}">
                      <i class="material-icons">library_books</i>
                        <p>{{ __('Service Master') }}</p>
                    </a>
           </li>
           <li class="nav-item{{ $activePage == 'vendormaster' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('vendormaster') }}">
                      <i class="material-icons">library_books</i>
                        <p>{{ __('Vendor Master') }}</p>
                    </a>
           </li>
           <li class="nav-item{{ $activePage == 'customermasterb2b' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('customermasterb2b') }}">
                      <i class="material-icons">library_books</i>
                        <p>{{ __('Customer Master B2B') }}</p>
                    </a>
           </li>
           <li class="nav-item{{ $activePage == 'customermasterb2c' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('customermasterb2c') }}">
                      <i class="material-icons">library_books</i>
                        <p>{{ __('Customer Master B2C') }}</p>
                    </a>
           </li>
           <li class="nav-item{{ $activePage == 'itemvendor' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('itemvendor') }}">
                      <i class="material-icons">library_books</i>
                        <p>{{ __('Item Vendor') }}</p>
                    </a>
           </li>
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
                <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
                    <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
                    <p>{{ __('Adminstration') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExample">
                    <ul class="nav">
                        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini"> UP </span>
                                <span class="sidebar-normal">{{ __('User profile') }} </span>
                            </a>
                        </li>
                        <!--            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                                      <a class="nav-link" href="{{ route('user.index') }}">
                                        <span class="sidebar-mini"> UM </span>
                                        <span class="sidebar-normal"> {{ __('User Management') }} </span>
                                      </a>
                                    </li>-->
                    </ul>
                </div>
            </li>



<!--           <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('typography') }}">
                      <i class="material-icons">library_books</i>
                        <p>{{ __('Typography') }}</p>
                    </a>
           </li>-->
            <!--      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('icons') }}">
                      <i class="material-icons">bubble_chart</i>
                      <p>{{ __('Icons') }}</p>
                    </a>
                  </li>-->
            <!--      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('map') }}">
                      <i class="material-icons">location_ons</i>
                        <p>{{ __('Maps') }}</p>
                    </a>
                  </li>-->
            <!--      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
                    <a class="nav-link" href="{{ route('notifications') }}">
                      <i class="material-icons">notifications</i>
                      <p>{{ __('Notifications') }}</p>
                    </a>
                  </li>-->
<!--            <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('language') }}">
                    <i class="material-icons">language</i>
                    <p>{{ __('Switch to Arabic') }}</p>
                </a>
            </li>-->

            <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Switch to Arabic') }}</p>
                </a>
            </li>

            <!--      <li class="nav-item active-pro{{ $activePage == 'upgrade' ? ' active' : '' }}">
                    <a class="nav-link text-white bg-danger" href="{{ route('upgrade') }}">
                      <i class="material-icons text-white">unarchive</i>
                      <p>{{ __('Upgrade to PRO') }}</p>
                    </a>
                  </li>-->
        </ul>
    </div>
</div>
