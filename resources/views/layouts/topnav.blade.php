
        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu" >
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>

                </div>
               
                <nav class="nav navbar-nav" style="padding: 0">
                <ul class=" navbar-right" >
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    @php
                    
                      $user=App\Models\User::has('profile')->find(Auth::user()->id);

                    
                    @endphp


                    @if($user && $user->profile->membership_type==100)
                     <span style="padding-right: 50px;font-weight: bold;color: orange;font-size: 16px" title="At the moment this application is free for you.">Free Mode</span>
                     @endif
                 @if($user && $user->profile->membership_type==null)
                    <a href="{{URL('packages')}}" class="btn btn-success" style="position: fixed;bottom: 10px;right: 10px;z-index: 9999">Pay</a>
                     @endif
                        
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      {{\Auth::user()->email}}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      @if(!Auth::user()->hasRole('Administrator'))
                     <a class="dropdown-item"   href="{{ URL('/edit_profile//').'/'.\Auth::user()->id }}"><i class="fa fa-sign-out pull-right"></i>Edit Profile</a>
                     @endif
                      <a class="dropdown-item"   href="{{ URL('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->
