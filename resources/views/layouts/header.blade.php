<div class="header">
    <div class="logo">
        <a href="index.html">
            <h1 class="tw-font-semibold tw-text-lg lg:tw-text-2xl mt-2">Kateru Riyu</h1>
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
        </ul>
        <ul class="nav-right">
            <li class="dropdown dropdown-animated scale-left mr-2">
                <div class="pointer" data-toggle="dropdown">
                    <div class="avatar avatar-text bg-primary">
                        <span>{{ auth()->user()->name[0] }}</span>
                    </div>
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            <div class="avatar avatar-text bg-primary">
                                <span>{{ auth()->user()->name[0] }}</span>
                            </div>
                            <div class="m-l-10 d-flex align-items-center">
                                <p class="m-b-0 text-dark font-weight-semibold">{{ auth()->user()->name }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="logout" class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                <span class="m-l-10">Logout</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>