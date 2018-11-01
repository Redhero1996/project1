<div class="sidebar-fixed position-fixed">
    <a class="logo-wrapper waves-effect ml-5 mt-2">
        <h1>Admin</h1>
    </a>
    <div class="list-group list-group-flush">
        <p class="list-group-item list-group-item-action waves-effect btn-info">
            <i class="fas fa-users mr-3"></i>Roles</p>
        <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action waves-effect">
            All Roles</a>
        <a href="{{ route('roles.create') }}" class="list-group-item list-group-item-action waves-effect">
            Add Role</a>
        <p class="list-group-item list-group-item-action waves-effect btn-info">
            <i class="fas fa-user mr-3"></i>Users</p>
        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action waves-effect">
            All Users</a>
        <a href="{{ route('users.create') }}" class="list-group-item list-group-item-action waves-effect">
            Add User</a>
        <p class="list-group-item list-group-item-action waves-effect btn-info">
            <i class="far fa-bookmark mr-3"></i>Categories</p>
        <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action waves-effect">
            All Categories</a>
        <a href="{{ route('categories.create') }}" class="list-group-item list-group-item-action waves-effect">
            Add Category</a>
        <p class="list-group-item list-group-item-action waves-effect btn-info">
            <i class="fas fa-cubes mr-3"></i>Topics</p>
        <a href="{{ route('topics.index') }}" class="list-group-item list-group-item-action waves-effect">
            All Topics</a>
        <a href="{{ route('topics.create') }}" class="list-group-item list-group-item-action waves-effect">
            Add Topic</a>
        <p class="list-group-item list-group-item-action waves-effect btn-info">
            <i class="far fa-question-circle mr-3"></i></i>Questions</p>
        <a href="{{ route('questions.index') }}" class="list-group-item list-group-item-action waves-effect">
            All Questions</a>
        <a href="{{ route('questions.create') }}" class="list-group-item list-group-item-action waves-effect">
            Add Question</a>
    </div>

</div>
