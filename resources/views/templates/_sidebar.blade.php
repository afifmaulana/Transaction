<aside id="leftsidebar" class="sidebar">
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="sidebar-user-panel active">
                <div class="user-panel">
                    <div class=" image">
                        <img src="{{ asset('assets/images/user/user3.jpg') }}" class="img-circle user-img-circle" alt="User Image" />
                    </div>
                </div>
                <div class="profile-usertitle">
                    <div class="sidebar-userpic-name"> Nama ADMIN </div>
                    <div class="profile-usertitle-job ">Staff Admin Sekolah </div>
                </div>
            </li>
            <li>
                <a href="{{ route('dashboard.index') }}">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a href="{{ route('category.index') }}">
                    <i class="fa fa-list-alt"></i>
                    <span>Categories</span>
                </a>
            </li>
            <li>
                <a href="{{ route('transaction.index') }}">
                    <i class="fa fa-exchange-alt"></i>
                    <span>Transactions</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- #Menu -->
</aside>
