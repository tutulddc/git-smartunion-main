<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class=" ai-icon" href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">ড্যাশবোর্ড</span>
                </a>
            </li>

            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-internet"></i>
                    <span class="nav-text">দপ্তরসমূহ</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('backend') }}/ecom-product-grid.html">উপজেলা নির্বাহী অফিসারের কার্যালয়</a></li>
                    <li><a href="{{ asset('backend') }}/ecom-product-list.html">উপজেলা সমাজসেবা কার্যালয়</a></li>
                    <li><a href="{{ asset('backend') }}/ecom-product-detail.html">উপজেলা সমবায় অফিস</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">ইউজার</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('user.list') }}">ইউজারদের তালিকা</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">প্রতিবেদন</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('backend') }}/ecom-product-grid.html">পেশা ভিত্তিক প্রতিবেদন</a></li>
                    <li><a href="{{ asset('backend') }}/ecom-product-list.html">ভাতার প্রতিবেদন</a></li>
                    <li><a href="{{ asset('backend') }}/ecom-product-detail.html">আর্থসামাজিক প্রতিবেদন</a></li>
                </ul>
            </li>
            {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-television"></i>
                    <span class="nav-text">Apps</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('backend') }}/app-profile.html">Profile</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ asset('backend') }}/email-compose.html">Compose</a></li>
                            <li><a href="{{ asset('backend') }}/email-inbox.html">Inbox</a></li>
                            <li><a href="{{ asset('backend') }}/email-read.html">Read</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ asset('backend') }}/app-calender.html">Calendar</a></li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
                        <ul aria-expanded="false">
                            <li><a href="{{ asset('backend') }}/ecom-product-grid.html">Product Grid</a></li>
                            <li><a href="{{ asset('backend') }}/ecom-product-list.html">Product List</a></li>
                            <li><a href="{{ asset('backend') }}/ecom-product-detail.html">Product Details</a></li>
                            <li><a href="{{ asset('backend') }}/ecom-product-order.html">Order</a></li>
                            <li><a href="{{ asset('backend') }}/ecom-checkout.html">Checkout</a></li>
                            <li><a href="{{ asset('backend') }}/ecom-invoice.html">Invoice</a></li>
                            <li><a href="{{ asset('backend') }}/ecom-customers.html">Customers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-controls-3"></i>
                    <span class="nav-text">Charts</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('backend') }}/chart-flot.html">Flot</a></li>
                    <li><a href="{{ asset('backend') }}/chart-morris.html">Morris</a></li>
                    <li><a href="{{ asset('backend') }}/chart-chartjs.html">Chartjs</a></li>
                    <li><a href="{{ asset('backend') }}/chart-chartist.html">Chartist</a></li>
                    <li><a href="{{ asset('backend') }}/chart-sparkline.html">Sparkline</a></li>
                    <li><a href="{{ asset('backend') }}/chart-peity.html">Peity</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-internet"></i>
                    <span class="nav-text">Bootstrap</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('backend') }}/ui-accordion.html">Accordion</a></li>
                    <li><a href="{{ asset('backend') }}/ui-alert.html">Alert</a></li>
                    <li><a href="{{ asset('backend') }}/ui-badge.html">Badge</a></li>
                    <li><a href="{{ asset('backend') }}/ui-button.html">Button</a></li>
                    <li><a href="{{ asset('backend') }}/ui-modal.html">Modal</a></li>
                    <li><a href="{{ asset('backend') }}/ui-button-group.html">Button Group</a></li>
                    <li><a href="{{ asset('backend') }}/ui-list-group.html">List Group</a></li>
                    <li><a href="{{ asset('backend') }}/ui-media-object.html">Media Object</a></li>
                    <li><a href="{{ asset('backend') }}/ui-card.html">Cards</a></li>
                    <li><a href="{{ asset('backend') }}/ui-carousel.html">Carousel</a></li>
                    <li><a href="{{ asset('backend') }}/ui-dropdown.html">Dropdown</a></li>
                    <li><a href="{{ asset('backend') }}/ui-popover.html">Popover</a></li>
                    <li><a href="{{ asset('backend') }}/ui-progressbar.html">Progressbar</a></li>
                    <li><a href="{{ asset('backend') }}/ui-tab.html">Tab</a></li>
                    <li><a href="{{ asset('backend') }}/ui-typography.html">Typography</a></li>
                    <li><a href="{{ asset('backend') }}/ui-pagination.html">Pagination</a></li>
                    <li><a href="{{ asset('backend') }}/ui-grid.html">Grid</a></li>

                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-heart"></i>
                    <span class="nav-text">Plugins</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('backend') }}/uc-select2.html">Select 2</a></li>
                    <li><a href="{{ asset('backend') }}/uc-nestable.html">Nestedable</a></li>
                    <li><a href="{{ asset('backend') }}/uc-noui-slider.html">Noui Slider</a></li>
                    <li><a href="{{ asset('backend') }}/uc-sweetalert.html">Sweet Alert</a></li>
                    <li><a href="{{ asset('backend') }}/uc-toastr.html">Toastr</a></li>
                    <li><a href="{{ asset('backend') }}/map-jqvmap.html">Jqv Map</a></li>
                    <li><a href="{{ asset('backend') }}/uc-lightgallery.html">Lightgallery</a></li>
                </ul>
            </li>
            <li><a href="widget-basic.html" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Widget</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-notepad"></i>
                    <span class="nav-text">Forms</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ asset('backend') }}/form-element.html">Form Elements</a></li>
                    <li><a href="{{ asset('backend') }}/form-wizard.html">Wizard</a></li>
                    <li><a href="{{ asset('backend') }}/form-editor-summernote.html">Summernote</a></li>
                    <li><a href="form-pickers.html">Pickers</a></li>
                    <li><a href="form-validation-jquery.html">Jquery Validate</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-network"></i>
                    <span class="nav-text">Table</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="table-bootstrap-basic.html">Bootstrap</a></li>
                    <li><a href="table-datatable-basic.html">Datatable</a></li>
                </ul>
            </li> --}}
            <li>
                {{-- <a class=" ai-icon" href="#" aria-expanded="false">
                    <i class="flaticon-logout-arrow"></i>
                    <span class="nav-text">লগআউট</span>
                </a> --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a onclick="event.preventDefault();
                            this.closest('form').submit();" href="{{ route('logout') }}" class="dropdown-item ai-icon">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                            width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span class="ml-2">লগআউট </span>
                    </a>
                </form>

            </li>
        </ul>
        {{-- <div class="add-menu-sidebar">
            <img src="{{ asset('backend') }}/images/calendar.png" alt="" class="mr-3">
            <p class="	font-w500 mb-0">Create Workout Plan Now</p>
        </div> --}}
        <div class="copyright">
            <p><strong>Smart Union Admin Dashboard</strong> © 2024 All Rights Reserved</p>
            <p>Made with <span class="heart"></span> by DexignZone</p>
        </div>
    </div>
</div>
