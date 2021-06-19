<div class="sidenav custom-sidenav" id="sidenav-main">
    <!-- Sidenav header -->
    <div class="sidenav-header d-flex align-items-center">
        <a href="{{ route('home') }}" class="navbar-brand">
            <img src="{{asset(Storage::url('logo/logo-blue.png'))}}" class="sidebar-logo" alt="{{ env('APP_NAME') }}" height="35">
        </a>
        <div class="ml-auto">
            <!-- Sidenav toggler -->
            <div class="sidenav-toggler sidenav-toggler-dark d-md-none" data-action="sidenav-unpin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="scrollbar-inner">
        <div class="div-mega">
            <ul class="navbar-nav navbar-nav-docs">
                <li class="nav-item">
                    <a class="nav-link {{ (Request::route()->getName() == 'home' || Request::route()->getName() == NULL || Request::route()->getName() == 'client.home') ? ' active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                @if(isset($currentWorkspace) && $currentWorkspace)
                    @auth('web')
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::route()->getName() == 'projects.index' || Request::segment(2) == 'projects') ? ' active' : '' }}" href="{{ route('projects.index',$currentWorkspace->slug) }}">
                                <i class="fas fa-briefcase"></i>
                                <span> {{ __('Projects') }} </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::route()->getName() == 'tasks.index') ? ' active' : '' }}" href="{{ route('tasks.index',$currentWorkspace->slug) }}">
                                <i class="fas fa-list"></i>
                                <span> {{ __('Tasks') }} </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::route()->getName() == 'timesheet.index') ? ' active' : '' }}" href="{{route('timesheet.index',$currentWorkspace->slug)}}">
                                <i class="fas fa-clock"></i>
                                <span> {{ __('Timesheet') }} </span>
                            </a>
                        </li>
                        @if($currentWorkspace->creater->id == Auth::user()->id)
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::route()->getName() == 'invoices.index' || Request::segment(2) == 'invoices') ? ' active' : '' }}" href="{{ route('invoices.index',$currentWorkspace->slug) }}">
                                    <i class="fas fa-print"></i>
                                    <span> {{ __('Invoices') }} </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::route()->getName() == 'clients.index') ? ' active' : '' }}" href="{{ route('clients.index',$currentWorkspace->slug) }}">
                                    <i class="fas fa-network-wired"></i>
                                    <span> {{ __('Clients') }} </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::route()->getName() == 'invoice.report') || (Request::route()->getName() == 'timesheet.report') || (Request::route()->getName() == 'task.report') ? ' active' : '' }}"
                                   href="#navbar-reports" data-toggle="collapse" role="button"
                                   aria-expanded=""
                                   aria-controls="navbar-reports">
                                    <i class="fas fa-list"></i>{{ __('Reports') }}
                                    <i class="fas fa-sort-up"></i>
                                </a>
                                <div class="collapse"
                                     id="navbar-reports">
                                    <ul class="nav flex-column submenu-ul">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('invoice.report',$currentWorkspace->slug) }}">{{ __('Invoice Report') }}</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('task.report',$currentWorkspace->slug) }}">{{ __('Task Report') }}</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link" href="{{ route('timesheet.report',$currentWorkspace->slug) }}">{{ __('Timesheet Report') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::route()->getName() == 'users.index') ? ' active' : '' }}" href="{{ route('users.index',$currentWorkspace->slug) }}">
                                <i class="fas fa-user"></i>
                                <span> {{ __('Users') }} </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::route()->getName() == 'calender.index') ? ' active' : '' }}" href="{{route('calender.index',$currentWorkspace->slug)}}">
                                <i class="fas fa-calendar"></i>
                                <span> {{ __('Calender') }} </span>
                            </a>
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{ (Request::route()->getName() == 'notes.index') ? ' active' : '' }}" href="{{route('notes.index',$currentWorkspace->slug)}}">--}}
{{--                                <i class="fas fa-clipboard"></i>--}}
{{--                                <span> {{ __('Notes') }} </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        @if(env('CHAT_MODULE') == 'yes')
                            <li class="nav-item">
                                <a class="nav-link {{ (Request::route()->getName() == 'chats') ? ' active' : '' }}" href="{{ route('chats') }}">
                                    <i class="fas fa-comment"></i>
                                    <span> {{ __('Chat') }} </span>
                                </a>
                            </li>
                        @endif
                    @elseauth
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::route()->getName() == 'client.projects.index' || Request::segment(3) == 'projects') ? ' active' : '' }}" href="{{ route('client.projects.index',$currentWorkspace->slug) }}">
                                <i class="fas fa-briefcase"></i>
                                <span> {{ __('Projects') }} </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::route()->getName() == 'client.timesheet.index') ? ' active' : '' }}" href="{{route('client.timesheet.index',$currentWorkspace->slug)}}">
                                <i class="fas fa-clock"></i>
                                <span> {{ __('Timesheet') }} </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::route()->getName() == 'client.invoices.index') ? ' active' : '' }}" href="{{ route('client.invoices.index',$currentWorkspace->slug) }}">
                                <i class="fas fa-print"></i>
                                <span> {{ __('Invoices') }} </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Request::route()->getName() == 'client.calender.index') ? ' active' : '' }}" href="{{route('client.calender.index',$currentWorkspace->slug)}}">
                                <i class="fas fa-calendar"></i>
                                <span> {{ __('Calender') }} </span>
                            </a>
                        </li>
                    @endauth
                @endif
                @if(Auth::user()->type == 'admin')
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link {{ (Request::route()->getName() == 'lang_workspace') ? ' active' : '' }}" href="{{ route('lang_workspace') }}">--}}
{{--                            <i class="fas fa-globe"></i>--}}
{{--                            <span> {{ __('Languages') }} </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::route()->getName() == 'settings.index') ? ' active' : '' }}" href="{{ route('settings.index') }}">
                            <i class="fas fa-cog"></i>
                            <span> {{ __('Settings') }} </span>
                        </a>
                    </li>
                @endif

                @if(isset($currentWorkspace) && $currentWorkspace && $currentWorkspace->creater->id == Auth::user()->id && Auth::user()->getGuard() != 'client')
                    <li class="nav-item">
                        <a class="nav-link {{ (Request::route()->getName() == 'workspace.settings') ? ' active' : '' }}" href="{{ route('workspace.settings',$currentWorkspace->slug) }}">
                            <i class="fas fa-cogs"></i>
                            <span> {{ __('Workspace Settings') }} </span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
