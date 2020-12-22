         <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    @if(\Auth::user()->hasRole(['NonEntry']))
                  <li><a href="{{URL('/')}}"><i class="fas fa-home"></i> Home </a>
                  </li>
                   @endif
                    @if(\Auth::user()->hasRole(['DataEntry']))
                   <li><a href="{{route('company')}}"><i class="fas fa-building"></i></i> Company</a></li>
                   @endif
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>
