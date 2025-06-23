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
        <li class="menu-label">UI Elements</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-basket2-fill"></i>
                </div>
                <div class="menu-title">Owners</div>
            </a>
            <ul>
                <li> <a href="{{ route('school.dashboard.owner.index') }}"><i class="bi bi-circle"></i>All Owners</a>
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
                <li> <a href="{{ route('school.dashboard.teacher.index') }}"><i class="bi bi-circle"></i>All Teachers</a>
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
                <li> <a href="{{ route('school.dashboard.section.index') }}"><i class="bi bi-circle"></i>All Sections</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bi bi-droplet-fill"></i>
                </div>
                <div class="menu-title">Level`s</div>
            </a>
            <ul>
                <li> <a href="{{ route('school.dashboard.grade.index') }}"><i class="bi bi-circle"></i>All Level`s</a>
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
                <li> <a href="{{ route('school.dashboard.subject.index') }}"><i class="bi bi-circle"></i>All Subjects</a>
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
                <li> <a href="{{ route('school.dashboard.lecture.index') }}"><i class="bi bi-circle"></i>All Lectures</a>
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
                <li> <a href="{{ route('school.dashboard.student.index') }}"><i class="bi bi-circle"></i>All Students</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Pages</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-lock-fill"></i>
                </div>
                <div class="menu-title">Authentication</div>
            </a>
            <ul>
                <li> <a href="authentication-signin.html" target="_blank"><i class="bi bi-circle"></i>Sign In</a>
                </li>
                <li> <a href="authentication-signup.html" target="_blank"><i class="bi bi-circle"></i>Sign Up</a>
                </li>
                <li> <a href="authentication-signin-with-header-footer.html" target="_blank"><i
                            class="bi bi-circle"></i>Sign In with Header & Footer</a>
                </li>
                <li> <a href="authentication-signup-with-header-footer.html" target="_blank"><i
                            class="bi bi-circle"></i>Sign Up with Header & Footer</a>
                </li>
                <li> <a href="authentication-forgot-password.html" target="_blank"><i class="bi bi-circle"></i>Forgot
                        Password</a>
                </li>
                <li> <a href="authentication-reset-password.html" target="_blank"><i class="bi bi-circle"></i>Reset
                        Password</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="pages-user-profile.html">
                <div class="parent-icon"><i class="bi bi-person-lines-fill"></i>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>
        <li>
            <a href="pages-timeline.html">
                <div class="parent-icon"><i class="bi bi-collection-play-fill"></i>
                </div>
                <div class="menu-title">Timeline</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <div class="menu-title">Errors</div>
            </a>
            <ul>
                <li> <a href="pages-errors-404-error.html" target="_blank"><i class="bi bi-circle"></i>404 Error</a>
                </li>
                <li> <a href="pages-errors-500-error.html" target="_blank"><i class="bi bi-circle"></i>500 Error</a>
                </li>
                <li> <a href="pages-errors-coming-soon.html" target="_blank"><i class="bi bi-circle"></i>Coming Soon</a>
                </li>
                <li> <a href="pages-blank-page.html" target="_blank"><i class="bi bi-circle"></i>Blank Page</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="pages-faq.html">
                <div class="parent-icon"><i class="bi bi-question-lg"></i>
                </div>
                <div class="menu-title">FAQ</div>
            </a>
        </li>
        <li>
            <a href="pages-pricing-tables.html">
                <div class="parent-icon"><i class="bi bi-tags-fill"></i>
                </div>
                <div class="menu-title">Pricing Tables</div>
            </a>
        </li>
        <li class="menu-label">Charts & Maps</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-bar-chart-line-fill"></i>
                </div>
                <div class="menu-title">Charts</div>
            </a>
            <ul>
                <li> <a href="charts-apex-chart.html"><i class="bi bi-circle"></i>Apex</a>
                </li>
                <li> <a href="charts-chartjs.html"><i class="bi bi-circle"></i>Chartjs</a>
                </li>
                <li> <a href="charts-highcharts.html"><i class="bi bi-circle"></i>Highcharts</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bi bi-pin-map-fill"></i>
                </div>
                <div class="menu-title">Maps</div>
            </a>
            <ul>
                <li> <a href="map-google-maps.html"><i class="bi bi-circle"></i>Google Maps</a>
                </li>
                <li> <a href="map-vector-maps.html"><i class="bi bi-circle"></i>Vector Maps</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Others</li>
        <li>
            <a href="https://europa.eu/europass/eportfolio/api/eprofile/shared-profile/e.g+diaeldin-habib/a043ab2c-68ad-4f43-8f11-757e0f9c3264?view=html" target="_blank">
                <div class="parent-icon"><i class="bi bi-file-code-fill"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>
        <li>
            <a href="https://europa.eu/europass/eportfolio/api/eprofile/shared-profile/e.g+diaeldin-habib/a043ab2c-68ad-4f43-8f11-757e0f9c3264?view=html" target="_blank">
                <div class="parent-icon"><i class="bi bi-telephone-fill"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
