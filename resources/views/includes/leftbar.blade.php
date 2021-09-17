<div class="left-column col-2 px-0">
    <div class="left-top">
        <a href="{{ url('/dashboard') }}" class="justify-content-center align-items-center d-flex m-0 py-4 h3"
            style="font-weight:bold; letter-spacing:2px">MADCRAFT</a>
    </div>
    {{-- left menu bar --}}
    <div class="left-menu p-2">
        <a href="{{ route('admin.dashboard') }}" class="menu-item"> <i class="fas fa-columns"></i>
            dashboard
        </a>
        <a href="{{ route('admin.new-admission') }}" class="menu-item"> <i class="fas fa-user-graduate"></i>
            new
            admission </a>
        <a href="{{ route('admin.active-students') }}" class="menu-item"> <i class="fas fa-chart-line"></i>
            active
            students </a>
        <a href="{{ route('admin.all-students') }}" class="menu-item "> <i class="fas fa-users"></i> all
            students
        </a>
        <a href="{{ route('admin.batches') }}" class="menu-item"> <i class="fas fa-restroom"></i>
            batches
        </a>
        <a href="{{ route('admin.courses') }}" class="menu-item"> <i class="fas fa-book"></i>
            courses
        </a>
        <a href="{{ route('admin.fee-status') }}" class="menu-item"> <i class="fas fa-rupee-sign "></i> fee
            status </a>
        <a href="{{ route('admin.report') }}" class="menu-item"> <i class="fas fa-file-invoice "></i>
            report</a>
        <a href="{{ route('admin.studymaterial') }}" class="menu-item"> <i class="fas fa-upload "></i>
            upload material </a>
        <a href="{{ route('admin.notifications') }}" class="menu-item"> <i class="fas fa-bell "></i>
            notifications <span class="badge badge-danger">new</span> </a>
    </div>
</div>
