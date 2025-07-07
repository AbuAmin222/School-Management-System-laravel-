    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="{{ route('school.dashboard.view.light') }}"><i class="bi bi-circle"></i>light Dashboard</a>
                </li>
                <li> <a href="{{ route('school.dashboard.view.dark') }}"><i class="bi bi-circle"></i>Dark Dashboard</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-grid-fill"></i>
                </div>
                <div class="menu-title">Application</div>
            </a>
            <ul>
                <li> <a href="app-emailbox.html"><i class="bi bi-circle"></i>Email</a>
                </li>
                <li> <a href="app-chat-box.html"><i class="bi bi-circle"></i>Chat Box</a>
                </li>
                <li> <a href="app-file-manager.html"><i class="bi bi-circle"></i>File Manager</a>
                </li>
                <li> <a href="app-to-do.html"><i class="bi bi-circle"></i>Todo List</a>
                </li>
                <li> <a href="app-invoice.html"><i class="bi bi-circle"></i>Invoice</a>
                </li>
                <li> <a href="app-fullcalender.html"><i class="bi bi-circle"></i>Calendar</a>
                </li>
            </ul>
        </li>
        @if (!auth()->user()->teacher)
            <li class="menu-label">Adminstrator Tools</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">Owners</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.owner.index') }}"><i class="bi bi-circle"></i>All
                            Owners</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">Teachers</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.teacher.index') }}"><i class="bi bi-circle"></i>All
                            Teachers</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">Sections</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.section.index') }}"><i class="bi bi-circle"></i>All
                            Sections</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                    </div>
                    <div class="menu-title">Grades</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.grade.index') }}"><i class="bi bi-circle"></i>All
                            Grades</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">Subjects</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.subject.index') }}"><i class="bi bi-circle"></i>All
                            Subjects</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">Lectures</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.lecture.index') }}"><i class="bi bi-circle"></i>All
                            Lectures</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">Students</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.student.index') }}"><i class="bi bi-circle"></i>All
                            Students</a>
                    </li>
                </ul>
            </li>
        @else
            <li class="menu-label">Teachers Tools</li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">Sections</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.section.index') }}"><i class="bi bi-circle"></i>All
                            Sections</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                    </div>
                    <div class="menu-title">Grades</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.grade.index') }}"><i class="bi bi-circle"></i>All
                            Grades</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">Subjects</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.subject.index') }}"><i class="bi bi-circle"></i>All
                            Subjects</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">Lectures</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.lecture.index') }}"><i class="bi bi-circle"></i>All
                            Lectures</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                    </div>
                    <div class="menu-title">Students</div>
                </a>
                <ul>
                    <li> <a href="{{ route('school.dashboard.student.index') }}"><i class="bi bi-circle"></i>All
                            Students</a>
                    </li>
                </ul>
            </li>
        @endif


        <li class="menu-label">Others</li>
        <li>
            <a href="https://europa.eu/europass/eportfolio/api/eprofile/shared-profile/e.g+diaeldin-habib/a043ab2c-68ad-4f43-8f11-757e0f9c3264?view=html"
                target="_blank">
                <div class="parent-icon"><i class="bi bi-file-code-fill"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>
        <li>
            <a href="https://europa.eu/europass/eportfolio/api/eprofile/shared-profile/e.g+diaeldin-habib/a043ab2c-68ad-4f43-8f11-757e0f9c3264?view=html"
                target="_blank">
                <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
