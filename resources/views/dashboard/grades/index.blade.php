@extends('dashboard.light.master')

@section('title')
    Learn School | The root page for level`s
@endsection

@section('content')
    <!--start content-->
    <main class="page-content">

        <!--Start Section Modal-->
        <div class="modal fade" id="sectionModal" tabindex="-1" aria-labelledby="stagesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="stagesModalLabel">Sections</h5>
                        <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>
                    <form id="tableContent">
                        <div class="modal-body">

                            <div class="container">

                                <!-- Activation necessary sctions -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <label class="form-label fw-bold mb-0" for="primary-master">
                                            Activation necessary sctions: </label>
                                    </div>
                                    <input value="" type="hidden" name="gradetag" id="gradetag">
                                    <div class="d-flex flex-wrap gap-3 primary-group">
                                        <div class="form-check">
                                            <input data-name = "الصف الاول" data-section = "1"
                                                class="form-check-input section-checkbox" type="checkbox" id="primary1">
                                            <label class="form-check-label" for="primary1">Section 1</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف الثاني" data-section = "2"
                                                class="form-check-input section-checkbox" type="checkbox" id="primary2">
                                            <label class="form-check-label" for="primary2">Section 2</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف الثالث" data-section = "3"
                                                class="form-check-input section-checkbox" type="checkbox" id="primary3">
                                            <label class="form-check-label" for="primary3">Section 3</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف الرابع" data-section = "4"
                                                class="form-check-input section-checkbox" type="checkbox" id="primary4">
                                            <label class="form-check-label" for="primary4">Section 4</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف الخامس" data-section = "5"
                                                class="form-check-input section-checkbox" type="checkbox" id="primary5">
                                            <label class="form-check-label" for="primary5">Section 5</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف السادس" data-section = "6"
                                                class="form-check-input section-checkbox" type="checkbox" id="primary6">
                                            <label class="form-check-label" for="primary6">Section 6</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف السابع" data-section = "7"
                                                class="form-check-input section-checkbox" type="checkbox" id="primary6">
                                            <label class="form-check-label" for="primary6">Section 7</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary col-12" data-bs-dismiss="modal">إغلاق</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!--End Section Modal-->

        <!--Start Grade Modal-->
        <div class="modal fade" id="stagesModal" tabindex="-1" aria-labelledby="stagesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content text-center">
                    <div class="modal-header justify-content-between">
                        <h5 class="modal-title text-center w-100" id="stagesModalLabel">Activation Grades</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
                    </div>

                    <form id="tableContent">
                        <div class="modal-body">

                            <div class="container">

                                <!-- المرحلة الابتدائية -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <input data-tag = "p" class="form-check-input me-2 master-checkbox"
                                            type="checkbox" id="primary-master" data-target=".primary-group">
                                        <label class="form-label fw-bold mb-0" for="primary-master">Primary Stage</label>
                                    </div>
                                    <div class="d-flex flex-wrap gap-3 primary-group">
                                        <div class="form-check">
                                            <input data-name = "الصف الاول" data-stage = "p" data-grade = "1"
                                                class="form-check-input grade-checkbox" type="checkbox" id="primary1">
                                            <label class="form-check-label" for="primary1">First Grade</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف الثاني" data-stage = "p" data-grade = "2"
                                                class="form-check-input grade-checkbox" type="checkbox" id="primary2">
                                            <label class="form-check-label" for="primary2">Secound Grade</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف الثالث" data-stage = "p" data-grade = "3"
                                                class="form-check-input grade-checkbox" type="checkbox" id="primary3">
                                            <label class="form-check-label" for="primary3">Third Grade</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف الرابع" data-stage = "p" data-grade = "4"
                                                class="form-check-input grade-checkbox" type="checkbox" id="primary4">
                                            <label class="form-check-label" for="primary4">Fourth Grade</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف الخامس" data-stage = "p" data-grade = "5"
                                                class="form-check-input grade-checkbox" type="checkbox" id="primary5">
                                            <label class="form-check-label" for="primary5">Fifth Grade</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف السادس" data-stage = "p" data-grade = "6"
                                                class="form-check-input grade-checkbox" type="checkbox" id="primary6">
                                            <label class="form-check-label" for="primary6">Sixth Grade</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- المرحلة الإعدادية -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <input data-tag = "m" class="form-check-input me-2 master-checkbox"
                                            type="checkbox" id="prep-master" data-target=".prep-group">
                                        <label class="form-label fw-bold mb-0" for="prep-master">Preparatory Stage</label>
                                    </div>
                                    <div class="d-flex flex-wrap gap-3 prep-group">
                                        <div class="form-check">
                                            <input data-name = "الصف السابع" data-stage = "m" data-grade = "7"
                                                class="form-check-input grade-checkbox" type="checkbox" id="prep1">
                                            <label class="form-check-label" for="prep1">Seventh Grade</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف الثامن" data-stage = "m" data-grade = "8"
                                                class="form-check-input grade-checkbox" type="checkbox" id="prep2">
                                            <label class="form-check-label" for="prep2">Eightth Grade</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف التاسع" data-stage = "m" data-grade = "9"
                                                class="form-check-input grade-checkbox" type="checkbox" id="prep3">
                                            <label class="form-check-label" for="prep3">Nineth Grade</label>
                                        </div>
                                    </div>
                                </div>

                                <!-- المرحلة الثانوية -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <input data-tag = "h" class="form-check-input me-2 master-checkbox"
                                            type="checkbox" id="sec-master" data-target=".sec-group">
                                        <label class="form-label fw-bold mb-0" for="sec-master">Secondary Stage</label>
                                    </div>
                                    <div class="d-flex flex-wrap gap-3 sec-group">
                                        <div class="form-check">
                                            <input data-name = "الصف العاشر" data-stage = "h" data-grade = "10"
                                                class="form-check-input grade-checkbox" type="checkbox" id="sec3">
                                            <label class="form-check-label" for="sec3">Tenth Grade</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف الحادي عشر" data-stage = "h" data-grade = "11"
                                                class="form-check-input grade-checkbox" type="checkbox" id="sec1">
                                            <label class="form-check-label" for="sec1">Eleventh Grade</label>
                                        </div>
                                        <div class="form-check">
                                            <input data-name = "الصف الثاني عشر" data-stage = "h" data-grade = "12"
                                                class="form-check-input grade-checkbox" type="checkbox" id="sec2">
                                            <label class="form-check-label" for="sec2">Twelfth Grade</label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary col-12"
                                data-bs-dismiss="modal">إغلاق</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!--End Grade Modal-->

        <!--start row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent text-center">
                        <div class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <h5 class="mb-0">All Level`s</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary col-12" data-bs-toggle="modal" data-bs-target="#stagesModal">
                            View the acadimec levels
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

        <!--start row-->
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header bg-transparent text-center">
                        <div class="row g-3 align-items-center justify-content-center">
                            <div class="col-auto">
                                <h5 class="mb-0">All Level`s</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Name</th>
                                        <th>Stage-ID</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->

    </main>
    <!--end page main-->

@stop

@section('js')
    <script>
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,

            ajax: {
                url: "{{ route('school.dashboard.grade.getdata') }}",
            },

            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'name',
                    name: 'name',
                    title: 'Name',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'stage',
                    name: 'stage_id',
                    title: 'Stages',
                    orderable: true,
                    searchable: true,
                },
                {
                    data: 'status',
                    name: 'status',
                    title: 'Status',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'action',
                    name: 'action',
                    title: 'Actions',
                    orderable: false,
                    searchable: false,
                },
            ],
            // Arabic language
            // language:{
            //     url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json',
            // },
        });

        // ============ تحميل الحالة الحالية من الخادم ============

        $(document).ready(function() {
            loadActiveGrades();
            loadActiveStages();
            // ============ أحداث الماستر ============

            $('.master-checkbox').on('change', function() {
                const targetClass = $(this).data('target');
                const isChecked = $(this).is(':checked');

                const checkboxes = $(targetClass).find('input[type=checkbox]');
                checkboxes.prop('disabled', !isChecked).prop('checked', isChecked);

                checkboxes.each(function() {
                    $(this).trigger('change');
                });
            });
            // ============ حدث تغيير الصف ============

            $('.grade-checkbox').on('change', function() {
                const checkbox = $(this);
                const isChecked = checkbox.is(':checked') ? 1 : 0;

                const data = {
                    _token: "{{ csrf_token() }}",
                    name: checkbox.data('name'),
                    stage: checkbox.data('stage'),
                    tag: checkbox.data('grade'),
                    status: isChecked,
                };

                $.post("{{ route('school.dashboard.grade.add') }}", data, function(res) {
                    toastr.success(res.success);
                    table.draw();
                });
            });
            // ============ تحميل الأقسام حسب الصف ============

            $(document).on('click', '.btn-add-section', function(e) {
                e.preventDefault();
                const gradeId = $(this).data('grade-id');
                $('#gradetag').val($(this).data('grade'));

                $.ajax({
                    url: "{{ route('school.dashboard.grade.getactive.section') }}",
                    type: 'GET',
                    data: {
                        gradeId
                    },
                    success: function(res) {
                        const activeSections = res.names.map(Number);

                        $('.section-checkbox').each(function() {
                            const checkbox = $(this);
                            const sectionId = checkbox.data('section');

                            checkbox.prop('checked', activeSections.includes(
                                sectionId));
                            checkbox.prop('disabled', false);
                        });
                    }
                });
            });
            // ============ تفعيل/تعطيل الأقسام ============

            $('.section-checkbox').on('change', function() {
                const checkbox = $(this);
                const isChecked = checkbox.is(':checked') ? 1 : 0;
                const data = {
                    _token: "{{ csrf_token() }}",
                    section: checkbox.data('section'),
                    gradetag: $('#gradetag').val(),
                    status: isChecked,
                };

                $.post("{{ route('school.dashboard.grade.addsection') }}", data, function(res) {
                    toastr.success(res.success);
                    table.draw();
                });
            });
        });


        function loadActiveGrades() {
            $.get("{{ route('school.dashboard.grade.getactive') }}", function(res) {
                const activeTags = res.tags.map(Number);
                $('.grade-checkbox').each(function() {
                    const checkbox = $(this);
                    const gradeId = checkbox.data('grade');
                    if (activeTags.includes(gradeId)) {
                        checkbox.prop('checked', true).prop('disabled', false);
                    }
                });
            });
        }

        function loadActiveStages() {
            $.get("{{ route('school.dashboard.grade.getactive.stage') }}", function(res) {
                const activeStages = res.tags;
                $('.master-checkbox').each(function() {
                    const checkbox = $(this);
                    const stageTag = checkbox.data('tag');
                    const target = checkbox.data('target');

                    if (activeStages.includes(stageTag)) {
                        checkbox.prop('checked', true).prop('disabled', false);
                    } else {
                        checkbox.prop('checked', false);
                        $(target).find('input[type=checkbox]').prop('disabled', true);
                    }
                });
            });
        }
    </script>

    {{-- <script>
        $(document).ready(function() {

            // عند تغيير الماستر
            $('.master-checkbox').on('change', function() {
                const targetClass = $(this).data('target');
                const isChecked = $(this).is(':checked');

                const checkboxes = $(targetClass).find('input[type=checkbox]');

                checkboxes.prop('disabled', !isChecked); // تمكين/تعطيل
                checkboxes.prop('checked', isChecked); // تحديد/إلغاء تحديد

                checkboxes.each(function() {
                    $(this).trigger('change'); // إرسال Ajax تلقائيًا
                });
            });

            // عند تغيير تشيك بوكس صف معين
            $('.grade-checkbox').on('change', function() {
                const checkbox = $(this);
                const isChecked = checkbox.is(':checked') ? 1 : 0;

                const data = {
                    _token: "{{ csrf_token() }}",
                    name: checkbox.data('name'),
                    stage: checkbox.data('stage'),
                    tag: checkbox.data('grade'),
                    status: isChecked,
                };

                $.post("{{ route('school.dashboard.grade.add') }}", data, function(res) {
                    toastr.success(res.success);
                    table.draw(); // إعادة تحميل الجدول إذا كنت تستخدم DataTables
                });
            });

            // إعداد زر إضافة قسم
            $(document).on('click', '.btn-add-section', function(e) {
                e.preventDefault();
                const gradetag = $(this).data('grade');
                $('#gradetag').val(gradetag);
            });
        });

        // $('.master-checkbox').on('change', function() {
        //     var target = $(this).data('target');
        //     var checked = $(this).prop('checked');
        //     let isChecked = $(this).is(':checked');


        //     if (!checked) {
        //         $(target).find('input[type=checkbox]').prop('disabled', true); // تعطيل التشيك بوكسات
        //     } else {
        //         $(target).find('input[type=checkbox]').prop('disabled', false); // تمكين التشيك بوكسات
        //     }
        // });
        $('.grade-checkbox').on('change', function() {
            var checkbox = $(this);
            var ischeck = checkbox.is(':checked') ? 1 : 0;

            var stage = checkbox.data('stage');
            var tag = checkbox.data('grade');
            var name = checkbox.data('name');
            $.ajax({
                url: "{{ route('school.dashboard.grade.add') }}",
                type: 'post',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'name': name,
                    'stage': stage,
                    'status': ischeck,
                    'tag': tag,
                },
                success: function(res) {
                    // console.log(res.message);
                    toastr.success(res.success);
                    table.draw();
                },
            });

        });
        $.ajax({
            url: "{{ route('school.dashboard.grade.getactive') }}",
            type: 'GET',
            success: function(res) {
                var activeTags = res.tags.map(Number);
                $('.grade-checkbox').not('.master-checkbox').each(function() {
                    var checkbox = $(this);
                    var datagrade = checkbox.data('grade');
                    if (activeTags.includes(datagrade)) {
                        checkbox.prop('checked', true);
                        checkbox.prop('disabled', false);
                    }
                })
            },
        });
        $.ajax({
            url: "{{ route('school.dashboard.grade.getactive.stage') }}",
            type: 'GET',
            success: function(res) {
                var activeTags = res.tags;
                // alert(activeTags);
                $('.master-checkbox').each(function() {
                    var checkbox = $(this);
                    var datastage = checkbox.data('tag');
                    if (activeTags.includes(datastage)) {
                        checkbox.prop('checked', true);
                        checkbox.prop('disabled', false);
                    } else {
                        checkbox.prop('checked', false);
                        var target = $(this).data('target');
                        $(target).find('input[type=checkbox]').prop('disabled',
                            true); // تعطيل التشيك بوكسات
                    }
                })
            },
        });

        $(document).ready(function() {
            $(document).on('click', '.btn-add-section', function(e) {
                e.preventDefault();
                var button = $(this);
                var gradetag = button.data('grade');
                // alert(gradetag);
                $('#gradetag').val(gradetag);

            })
        });
        // $('.master-checkbox').on('change', function() {
        //     var checkbox = $(this);
        //     var status = checkbox.is(':checked') ? 1 : 0;
        //     var tag = checkbox.data('tag');

        //     $.ajax({
        //         url: "{{ route('school.dashboard.grade.changemaster') }}",
        //         type: 'post',
        //         data: {
        //             '_token': "{{ csrf_token() }}",
        //             'tag': tag,
        //             'status': status,
        //         },
        //         success: function(res) {
        //             toastr.success(res.success);
        //             table.draw();
        //         },
        //     });

        // });
        $('.section-checkbox').on('change', function() {
            var checkbox = $(this);
            var status = checkbox.is(':checked') ? 1 : 0;

            var section = checkbox.data('section');
            var gradetag = $('#gradetag').val();
            $.ajax({
                url: "{{ route('school.dashboard.grade.addsection') }}",
                type: 'post',
                data: {
                    '_token': "{{ csrf_token() }}",
                    'section': section,
                    'gradetag': gradetag,
                    'status': status,
                },
                success: function(res) {
                    toastr.success(res.success);
                    table.draw();
                },
            });

        });
        $(document).ready(function() {
            $(document).on('click', '.btn-add-section', function(e) {
                e.preventDefault();
                var button = $(this);
                var gradeId = button.data('grade-id');

                $.ajax({
                    url: "{{ route('school.dashboard.grade.getactive.section') }}",
                    type: 'GET',
                    data: {
                        'gradeId': gradeId,
                    },
                    success: function(res) {
                        var activeSections = res.names.map(Number);

                        $('.section-checkbox').not('.master-checkbox').each(function() {
                            var checkbox = $(this);
                            var datasection = checkbox.data('section');

                            if (activeSections.includes(datasection)) {
                                checkbox.prop('checked', true);
                                checkbox.prop('disabled', false);
                            } else {
                                checkbox.prop('checked', false);
                            }
                        })
                    },
                    error: function(res) {
                        alert("Errors occured");
                    },

                });

            })
        });
    </script> --}}
@endsection
