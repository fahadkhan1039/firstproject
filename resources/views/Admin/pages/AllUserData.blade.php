@extends('admin.layout.app')
@section('title', 'Admin')

@section('content')

    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Toolbar-->
        <div id="kt_docs_header" class="docs-header align-items-stretch mb-2 mb-lg-10">
            <!--begin::Container-->
            <div class="container">
                <div class="d-flex align-items-stretch justify-content-between py-3 h-75px">
                    <!--begin::Aside toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n2 me-1" title="Show aside menu">
                        <div class="btn btn-icon btn-flex btn-active-color-primary" id="kt_docs_aside_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-1 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                        fill="currentColor" />
                                    <path opacity="0.3"
                                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                    </div>
                    <!--end::Aside toggle-->
                    <!--begin::Logo-->
                    <div class="d-flex d-lg-none align-items-center flex-grow-1 flex-lg-grow-0 me-3 me-lg-15">
                        <a href="../../demo1/dist/index.html">
                            <img alt="Logo" src="assets/admin/media/logos/logo-1.svg"
                                class="d-none d-lg-block h-25px" />
                            <img alt="Logo" src="assets/admin/media/logos/logo-2.svg" class="d-lg-none h-35px" />
                        </a>
                    </div>
                    <!--end::Logo-->
                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-center justify-content-between flex-lg-grow-1">
                        <!--begin::Header title-->
                        <div class="d-flex align-items-center" id="kt_docs_header_title">
                            <!--begin::Page title-->
                            <div class="docs-page-title d-flex flex-column flex-lg-row align-items-lg-center py-5 mb-lg-0"
                                data-kt-swapper="true" data-kt-swapper-mode="prepend"
                                data-kt-swapper-parent="{default: '#kt_docs_content_container', 'lg': '#kt_docs_header_title'}">
                                <!--begin::Title-->
                                <h1 class="d-flex align-items-center text-dark my-1 fs-4">Documentation
                                    <a href="../../demo1/dist/documentation/getting-started/changelog.html"
                                        class="badge fw-bold fs-9 px-2 ms-2 badge-white text-hover-primary shadow-sm">v8.0.38</a>
                                </h1>
                                <!--end::Title-->
                                <!--begin::Separator-->
                                <span class="d-none d-lg-block bullet h-20px w-1px bg-secondary mx-4"></span>
                                <!--end::Separator-->
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-6 my-1">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-600">Getting Started</li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <span class="bullet w-5px h-2px"></span>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-dark">Overview</li>
                                    <!--end::Item-->
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Page title-->
                        </div>
                        <!--end::Header title-->
                        <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                            <!--begin::Menu wrapper-->
                            <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                                data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                <img src="assets/admin/media/avatars/300-1.jpg" alt="user" />
                            </div>
                            <!--begin::User account menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="Logo" src="assets/admin/media/avatars/300-1.jpg" />
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Username-->
                                        <div class="d-flex flex-column">
                                            <div class="fw-bolder d-flex align-items-center fs-5">Max Smith
                                                <span
                                                    class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
                                            </div>
                                            <a href="#"
                                                class="fw-bold text-muted text-hover-primary fs-7">max@kt.com</a>
                                        </div>
                                        <!--end::Username-->
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="../../demo1/dist/account/overview.html" class="menu-link px-5">My Profile</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="../../demo1/dist/apps/projects/list.html" class="menu-link px-5">
                                        <span class="menu-text">My Projects</span>
                                        <span class="menu-badge">
                                            <span class="badge badge-light-danger badge-circle fw-bolder fs-7">3</span>
                                        </span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5" data-kt-menu-trigger="hover"
                                    data-kt-menu-placement="left-start">
                                    <a href="#" class="menu-link px-5">
                                        <span class="menu-title">My Subscription</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/account/referrals.html"
                                                class="menu-link px-5">Referrals</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/account/billing.html"
                                                class="menu-link px-5">Billing</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/account/statements.html"
                                                class="menu-link px-5">Payments</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/account/statements.html"
                                                class="menu-link d-flex flex-stack px-5">Statements
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                    title="View your statements"></i></a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3">
                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                    <input class="form-check-input w-30px h-20px" type="checkbox"
                                                        value="1" checked="checked" name="notifications" />
                                                    <span class="form-check-label text-muted fs-7">Notifications</span>
                                                </label>
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="../../demo1/dist/account/statements.html" class="menu-link px-5">My
                                        Statements</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5" data-kt-menu-trigger="hover"
                                    data-kt-menu-placement="left-start">
                                    <a href="#" class="menu-link px-5">
                                        <span class="menu-title position-relative">Language
                                            <span
                                                class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">English
                                                <img class="w-15px h-15px rounded-1 ms-2"
                                                    src="assets/admin/media/flags/united-states.svg"
                                                    alt="" /></span></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/account/settings.html"
                                                class="menu-link d-flex px-5 active">
                                                <span class="symbol symbol-20px me-4">
                                                    <img class="rounded-1"
                                                        src="assets/admin/media/flags/united-states.svg" alt="" />
                                                </span>English</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/account/settings.html"
                                                class="menu-link d-flex px-5">
                                                <span class="symbol symbol-20px me-4">
                                                    <img class="rounded-1" src="assets/admin/media/flags/spain.svg"
                                                        alt="" />
                                                </span>Spanish</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/account/settings.html"
                                                class="menu-link d-flex px-5">
                                                <span class="symbol symbol-20px me-4">
                                                    <img class="rounded-1" src="assets/admin/media/flags/germany.svg"
                                                        alt="" />
                                                </span>German</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/account/settings.html"
                                                class="menu-link d-flex px-5">
                                                <span class="symbol symbol-20px me-4">
                                                    <img class="rounded-1" src="assets/admin/media/flags/japan.svg"
                                                        alt="" />
                                                </span>Japanese</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="../../demo1/dist/account/settings.html"
                                                class="menu-link d-flex px-5">
                                                <span class="symbol symbol-20px me-4">
                                                    <img class="rounded-1" src="assets/admin/media/flags/france.svg"
                                                        alt="" />
                                                </span>French</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5 my-1">
                                    <a href="../../demo1/dist/account/settings.html" class="menu-link px-5">Account
                                        Settings</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="../../demo1/dist/authentication/flows/basic/sign-in.html"
                                        class="menu-link px-5">Sign Out</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <div class="menu-content px-5">
                                        <label
                                            class="form-check form-switch form-check-custom form-check-solid pulse pulse-success"
                                            for="kt_user_menu_dark_mode_toggle">
                                            <input class="form-check-input w-30px h-20px" type="checkbox" value="1"
                                                name="mode" id="kt_user_menu_dark_mode_toggle"
                                                data-kt-url="../../demo1/dist/index.html" />
                                            <span class="pulse-ring ms-n1"></span>
                                            <span class="form-check-label text-gray-600 fs-7">Dark Mode</span>
                                        </label>
                                    </div>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::User account menu-->
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::Toolbar-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <div class="border-gray-300 border-bottom border-bottom-dashed"></div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Header-->
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">ALl Users</span>
                            {{-- <span class="text-muted mt-1 fw-bold fs-7">Over 500 new products</span> --}}
                        </h3>
                        <div class="card-toolbar">
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-3 position-absolute ms-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor">
                                        </rect>
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" id="search"
                                    class="form-control form-control-solid form-select-sm w-250px ps-9"
                                    placeholder="Search Order">
                            </div>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body pt-3">
                        <!--begin::Table container-->
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table id="table"
                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-0">
                                        <th class="p-0">ID</th>
                                        <th class="p-0 min-w-150px">Name</th>
                                        <th class="p-0 min-w-200px">Email</th>
                                        <th class="p-0 min-w-150px">Phone</th>
                                        <th class="p-0 min-w-100px ">Actions</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody>

                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Table container-->
                    </div>
                    <!--begin::Body-->
                </div>
            </div>
        </div>
        <!--end::Post-->
    </div>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm " style="max-width: 50%; ">
            <div class="modal-content">
                <form id="updateForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden input for ID -->
                        <input type="hidden" id="edit_id" name="id">
    
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Name</span>
                                <span class="ms-1" data-bs-toggle="tooltip" aria-label="Specify a target name for future usage and reference" data-bs-original-title="Specify a target name for future usage and reference" data-kt-initialized="1">
                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                </span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Your Name" id="edit_name" name="name" required>
                        </div>
    
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Email</span>
                            </label>
                            <input type="email" class="form-control form-control-solid" placeholder="Enter Your Email" id="edit_email" name="email" required>
                        </div>
    
                        <div class="d-flex flex-column mb-8 fv-row fv-plugins-icon-container">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Phone</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="Enter Your Phone Number" id="edit_phone" name="phone" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection
@push('js')
    <!-- Include SweetAlert2 for confirmation popup -->

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('users.view_all_user') }}',
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            // Edit button click
            $(document).on('click', '.edit-btn', function() {
                var userId = $(this).data('id');
                $.ajax({
                    url: '/users/edit/' + userId, // Backend endpoint for fetching user data
                    method: 'GET',
                    success: function(response) {
                        // Assuming response is an object with properties: id, name, email, and phone
                        $('#edit_id').val(response.id); // Correct ID for hidden input
                        $('#edit_name').val(response.name);
                        $('#edit_email').val(response.email);
                        $('#edit_phone').val(response.phone);

                        // Show the modal
                        $('#editModal').modal('show');
                    },
                    error: function() {
                        alert('Failed to fetch user data. Please try again.');
                    }
                });
            });


            // Update user
            $('#editForm').on('submit', function(e) {
                e.preventDefault();
                var userId = $('#userId').val();
                $.ajax({
                    url: '/users/update/' + userId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        name: $('#name').val(),
                        email: $('#email').val(),
                        phone: $('#phone').val()
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Updated!', response.message, 'success');
                            table.ajax.reload();
                            $('#editModal').modal('hide');
                        } else {
                            Swal.fire('Error!', response.message, 'error');
                        }
                    }
                });
            });

            // Delete button click
            $(document).on('click', '.delete-btn', function() {
                var userId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/users/delete/' + userId,
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'POST'
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Deleted!', response.message, 'success');
                                    table.ajax.reload();
                                } else {
                                    Swal.fire('Error!', response.message, 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Error!',
                                    'An error occurred while deleting the user.',
                                    'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
