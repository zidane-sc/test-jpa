<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Power Meter</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Select Devices</li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="menu-item-icon nav-icon fas fa-microchip"></i>
                        <p>
                            @isset($setDevice)
                                @foreach ($devices as $device)
                                    @if ($device->id == $setDevice->id)
                                        {{ $device->name }}
                                    @endif
                                @endforeach
                            @endisset
                            @empty($setDevice)
                                {{ $devices['0']->name }}
                            @endempty
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach ($devices as $device)
                            <li class="nav-item active">
                                <a href="{{ route('devices.set', $device->id) }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $device->name }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                <li class="nav-header">Navigation</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="menu-item-icon nav-icon fas ion-speedometer"></i>
                        <p>
                            Monitoring
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('trending.show', 3) }}"
                        class="nav-link {{ (request()->segment(1) == 'trending') ? 'active' : ''}}">
                        <i class="menu-item-icon nav-icon fas ion-stats-bars"></i>
                        <p>
                            Trending
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="menu-item-icon nav-icon fas ion-arrow-graph-up-right"></i>
                        <p>
                            Consumption
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="menu-item-icon nav-icon fas ion-cash"></i>
                        <p>
                            Billing
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="menu-item-icon nav-icon fas ion-folder"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Department</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (request()->segment(2) == 'devices') ? 'menu-open' : ''}}">
                    <a href="#" class="nav-link {{ (request()->segment(1) == 'settings') ? 'active' : ''}}">
                        <i class="menu-item-icon nav-icon fas ion-ios-gear"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('devices.index') }}"
                                class="nav-link {{ (request()->segment(2) == 'devices') ? 'active' : ''}}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Device</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/mailbox/compose.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Price</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="menu-item-icon nav-icon fas ion-soup-can"></i>
                        <p>
                            Database Backup
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>