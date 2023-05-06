<div id="dw-s1" class="bmd-layout-drawer bg-faded">
    <div class="container-fluid side-bar-container">
        <header class="pb-0">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <span class="logo">D</span> Dashboard
            </a>
        </header>
        <p class="side-comment"><a href="{{ route('dashboard') }}">Dashboard</a></p>
        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-palette mr-1"></i> Themes
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container ">
                <li class="side-item">
                    <a href="{{ route('show_themes') }}">
                        <i class="fas fa-angle-right mr-2"></i> Show themes
                    </a>
                </li>
            </div>
        </ul>

        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-newspaper mr-1"></i> posts
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container ">
                <li class="side-item">
                    <a href="{{ route('posts_show') }}">
                        <i class="fas fa-angle-right mr-2"></i>Show Posts
                    </a>
                </li>
                <li class="side-item">
                    <a href="{{ route('add_post') }}">
                        <i class="fas fa-angle-right mr-2"></i> add post
                    </a>
                </li>
            </div>
        </ul>

        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-tags mr-1"></i> categories
                <!-- <span	class="badge badge-success">4</span> -->
                <i class="fas fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container ">
                <li class="side-item">
                    <a href="{{ route('show_categories') }}">
                        <i class="fas fa-angle-right mr-2"></i>Show categories
                    </a>
                </li>
                <li class="side-item">
                    <a href="{{ route('add_cat') }}">
                        <i class="fas fa-angle-right mr-2"></i> add category
                    </a>
                </li>
            </div>
        </ul>

        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-users mr-1"></i> Users
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container ">
                <li class="side-item">
                    <a href="{{ route('show_user') }}">
                        <i class="fas fa-angle-right mr-2"></i> Show users
                    </a>
                </li>
                <li class="side-item">
                    <a href="{{ route('add_user') }}"><i class="fas fa-angle-right mr-2"></i>add user</a>
                </li>
            </div>
        </ul>

        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-user mr-1"></i> Rules
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container ">
                <li class="side-item">
                    <a href="{{ route('show_role') }}">
                        <i class="fas fa-angle-right mr-2"></i> Show Rules
                    </a>
                </li>
            </div>
        </ul>
        
        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-file mr-1"></i> Pages
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container ">
                <li class="side-item">
                    <a href="{{ route('page') }}">
                        <i class="fas fa-angle-right mr-2"></i> Show pages
                    </a>
                </li>
                <li class="side-item">
                    <a href="{{ route('add_page') }}"><i class="fas fa-angle-right mr-2"></i>add page</a>
                </li>
            </div>
        </ul>

        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-comments mr-1"></i> Comments
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container ">
                <li class="side-item">
                    <a href="{{ route('show_comments') }}">
                        <i class="fas fa-angle-right mr-2"></i> Show comments
                    </a>
                </li>
            </div>
        </ul>

        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-address-card mr-1"></i> Messages 
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container ">
                <li class="side-item">
                    <a href="{{ route('show_contact_us') }}">
                        <i class="fas fa-angle-right mr-2"></i> Show messages
                    </a>
                </li>
            </div>
        </ul>

        <ul class="side a-collapse short">
            <a class="ul-text"><i class="fas fa-trash mr-1"></i> Recycle Bin 
                <!-- <span class="badge badge-info">4</span> -->
                <i class="fas fa-chevron-down arrow"></i></a>
            <div class="side-item-container ">
                <li class="side-item">
                    <a href="{{ route('show_recycle') }}">
                        <i class="fas fa-angle-right mr-2"></i> open Recycle Bin
                    </a>
                </li>
            </div>
        </ul>
    </div>
</div>