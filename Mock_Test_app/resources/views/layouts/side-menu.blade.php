<div class="row">
    <div class="col-md-12 headers">
        <div class = "header-content">
            <div class = "admin">
            <a href="{{route('admin-dashboard')}}">Admin</a>
            </div>
            <div class = "logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>      
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class = "side-menu">
            <li class = "{{ Request::routeIs('admin-dashboard') ? 'current-url' : '' }}"><a href="{{route('admin-dashboard')}}">Dashboard</a></li>
            <li class = "{{ Request::routeIs('technology') ? 'current-url' : '' }}"><a href="{{route('technology')}}">Technology</a></li>
            <li class = "{{ Request::routeIs('mock_banks') ? 'current-url' : '' }}"><a href="{{route('mock_banks')}}">Mock Banks</a></li>
            <li class = "{{ Request::routeIs('mock_banks_questions') ? 'current-url' : '' }}"><a href="{{route('mock_banks_questions')}}">Mock Bank Questions</a></li>
            <li class = "{{ Request::routeIs('mock_exams') ? 'current-url' : '' }}"><a href="{{route('mock_exams')}}">Mock Exams</a></li>
            <li class = "{{ Request::routeIs('tags') ? 'current-url' : '' }}"><a href="{{route('tags')}}">Tags</a></li>
            <li class = "{{ Request::routeIs('tags_banks') ? 'current-url' : '' }}"><a href="{{route('tags_banks')}}">Tags Banks</a></li>
            <li class = "{{ Request::routeIs('assignments') ? 'current-url' : '' }}"><a href="{{route('assignments')}}">Assignments</a></li>
            <li class = "{{ Request::routeIs('assignments_images') ? 'current-url' : '' }}"><a href="{{route('assignments_images')}}">Add Assignment Images</a></li>
            <li class = "{{ Request::routeIs('assignments_students') ? 'current-url' : '' }}"><a href="{{route('assignments_students')}}">Assignment Students</a></li>
            <li class = "{{ Request::routeIs('submitted_assignments') ? 'current-url' : '' }}"><a href="{{route('submitted_assignments')}}">Submitted Assignments</a></li>
        </div>
    </div>
