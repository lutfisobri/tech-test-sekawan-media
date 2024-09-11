<div class="layout">

    <!-- Header END -->

    <!-- Side Nav START -->
    <div class="side-nav">
        <div class="side-nav-inner">
            <ul class="side-nav-menu scrollable">
                @php
                    if (auth()->user()->role == 'admin') {
                        $menu = [
                            'Dashboard' => [
                                'icon' => 'anticon anticon-home',
                                'url' => '/',
                            ],
                            'Driver' => [
                                'icon' => 'anticon anticon-user',
                                'url' => '/driver',
                            ],
                            'Vehicle' => [
                                'icon' => 'anticon anticon-car',
                                'url' => '/vehicle',
                            ],
                            'Booking' => [
                                'icon' => 'anticon anticon-calendar',
                                'url' => '/booking',
                            ],
                            'Task' => [
                                'icon' => 'anticon anticon-check-square',
                                'url' => '/task',
                            ],
                            'Log' => [
                                'icon' => 'anticon anticon-file',
                                'url' => '/log',
                            ],
                        ];
                    } else {
                        $menu = [
                            'Dashboard' => [
                                'icon' => 'anticon anticon-home',
                                'url' => '/',
                            ],
                            'Task' => [
                                'icon' => 'anticon anticon-file',
                                'url' => '/task',
                            ],
                            'Log' => [
                                'icon' => 'anticon anticon-file',
                                'url' => '/log',
                            ],
                        ];
                    }
                @endphp

                {{-- <li class="nav-item dropdown open active">
                    <a href="">
                        <span class="icon-holder">
                            <i class="anticon anticon-home"></i>
                        </span>
                        <span class="title">
                            @if (Request::is('/'))
                                <strong>Dashboard</strong>
                            @else
                                Dashboard
                            @endif
                        </span>
                    </a>
                </li> --}}



                @foreach ($menu as $title => $data)
                    @php
                        $route = $data['url'];
                        if ($route == '/') {
                            $route = '/';
                        } else {
                            $route = $route . '*';
                            $route = str_replace('/', '', $route);
                        }
                    @endphp

                    <li class="nav-item dropdown">
                        <a href="{{ $data['url'] }}">
                            <span class="icon-holder">
                                <i class="{{ $data['icon'] }}"></i>
                            </span>
                            <span class="title">
                                @if (Request::is($route))
                                    <strong>
                                        {{ $title }}
                                    </strong>
                                @else
                                    {{ $title }}
                                @endif
                            </span>

                            {{-- <span class="icon-holder">
                                <i class="{{ $data['icon'] }}"></i>
                            </span>
                            <span class="title">{{ $title }}</span> --}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- Side Nav END -->
