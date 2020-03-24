<div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                              <i class="fas fa-tasks"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <div class="breadcome-heading">
                                              <form role="search" class="">
                                                <input type="text" placeholder="Search..." class="form-control">
                                                <a href=""><i class="fas fa-search"></i></a>
                                              </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                              <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                              <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                      <i class="fas fa-user"></i>
                                                      <span class="admin-name">{{ Auth::user()->name }} Account</span>
                                                      <!-- <i class="icon nalika-down-arrow nalika-angle-dw"></i> -->
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    <li class="nav-item dropdown">
                               

                                                        <a  href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                          document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>

                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                             
                            
                                                        <!-- <li><a href="login.html"><span class="icon nalika-unlocked author-log-ic"></span> Log Out</a>
                                                        </li> -->
                                                    </ul>
                                                </li>
                                              </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>