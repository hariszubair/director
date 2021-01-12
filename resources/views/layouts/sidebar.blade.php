         <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  @hasanyrole('Director|Company|Administrator')
                  <li><a href="{{URL('/')}}"><i class="fas fa-home"></i> Home </a>
                  </li>
                   @endhasanyrole
                    @hasanyrole('Director|Company')
                  <li><a href="{{URL('/reports')}}"><i class="far fa-newspaper"></i> All past searches</a>
                  </li>
                   @endhasanyrole
                    @if(\Auth::user()->hasRole(['DataEntry|Administrator']))
                   <li><a href="{{route('company')}}"><i class="fas fa-building"></i></i> Entered Companies</a></li>
                   @endif
                    @hasrole('Administrator')
                  <li><a href="{{URL('/directors')}}"><i class="fas fa-users"></i> Directors </a>
                  </li>
                   <li><a href="{{URL('/companies')}}"><i class="far fa-building"></i> Registered Companies </a>
                  </li>
                   @endhasanyrole
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>
