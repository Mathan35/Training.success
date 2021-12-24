<div class="col-md-2 ml-4 shadow ">
    <div class="header-link">
        <h1>
            <a href="{{route('home')}}">Home</a>
        </h1>

        {{-- check admin --}}
        @can('check-Admin')
        
        @can('createRole','App\Models\Role')
        <h1>
            <a href="{{route('Role.create')}}">Create Roles</a>
        </h1>
        @endcan

        @can('create-user')
        <h1>
            <a href="{{route('User.create')}}">Create Users</a>
        </h1>
        @endcan

        @can('create-internal-user')
        <h1>
            <a href="{{route('internal-user')}}">Create Internal Users</a>
        </h1>
        @endcan
        @can('createOrganization','App\Models\Organization')
        <h1>
            <a href="{{route('organization')}}">Create Organization</a>
        </h1>
        @endcan
        @can('view-users')
        <h1>
            <a href="{{route('view-organizations')}}">View Organization</a>
        </h1>
        @endcan

        @can('view-internal-users')
        <h1>
            <a href="{{route('view-internal-user')}}">View Internal Users</a>
        </h1>
        @endcan <br>

        @else

        @can('createRole','App\Models\Role')
        <h1>
            <a href="{{route('organization-role')}}">Create Roles</a>
        </h1>
        @endcan

        @can('create-user')
        <h1>
            <a href="{{route('organization-users')}}">Create Users</a>
        </h1>
        @endcan
        
        @can('view-users')
        <h1>
            <a href="{{route('view-organization-users')}}">View Users</a>
        </h1>
        @endcan
<br>
        @endcan
    </div>
</div>
