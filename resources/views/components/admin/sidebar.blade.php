
<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <h4 class="logo-text">Redaksiya UZ</h4>
        </div>
        <div class="toggle-icon ms-auto"><ion-icon name="menu-sharp"></ion-icon>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}" class="has-arrow">
                <div class="parent-icon"><ion-icon name="home-sharp"></ion-icon>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.categories.index')}}" class="has-arro">
                <div class="parent-icon"><i class="fadeIn animated bx bx-list-ol"></i>
                </div>
                <div class="menu-title">Katigoriyalar</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.post.index')}}" class="has-arro">
                <div class="parent-icon"><i class="fadeIn animated bx bx-comment-detail"></i>
                </div>
                <div class="menu-title">Postlar</div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.tag.index')}}" class="has-arro">
                <div class="parent-icon"><i class="fadeIn animated bx bx-comment-detail"></i>
                </div>
                <div class="menu-title">Teglar</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</aside>