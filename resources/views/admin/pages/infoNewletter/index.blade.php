@extends('admin.layout.layout')
@section('title-page','Quản lí thông tin')
@section('content')
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.css" />

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/simple-notify@0.5.5/dist/simple-notify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
        <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="mb-5">
                        <ul class="m-0 p-0 list-none">
                            <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                                <a href="index.html">
                                    <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                                    <iconify-icon icon="heroicons-outline:chevron-right"
                                                  class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                                </a>
                            </li>
                            <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                                Table
                                <iconify-icon icon="heroicons-outline:chevron-right"
                                              class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                            </li>
                            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                Danh mục
                            </li>
                        </ul>
                    </div>
                    <!-- END: BreadCrumb -->
                    <div class=" space-y-5">
                        <div class="card">
                            <header class=" card-header noborder">
                                <h4 class="card-title">Thông tin khách hàng
                                </h4>
                            </header>
                            <div class="card-body px-6 pb-6">
                                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                    <span class=" col-span-8  hidden"></span>
                                    <span class="  col-span-4 hidden"></span>
                                    <div class="inline-block min-w-full align-middle">
                                        <div class="overflow-hidden ">
                                            <table
                                                class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                                <thead class=" bg-slate-200 dark:bg-slate-700">
                                                <tr>

                                                    <th scope="col" class=" table-th ">
                                                        Id
                                                    </th>
                                                    <th scope="col" class=" table-th ">
                                                        Email
                                                    </th>

                                                    <th scope="col" class=" table-th ">
                                                        Chức năng
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody
                                                    class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                @foreach($data as $key=>$value)
                                                    <tr id="record-{{$value->id}}">
                                                        <td class="table-td">{{ $key+1 }}</td>
                                                        <td class="table-td ">{{ $value->email }}</td>
                                                        <td class="table-td ">
                                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                                <button class="action-btn btnDelete" data-id="{{ $value->id }}" type="button">
                                                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            {{ $data->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts-body')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    {{--    <script>--}}
    {{--        const config = {--}}
    {{--            "title_form_add": 'Thêm slide',--}}
    {{--            'urlAdd': document.querySelector('#formAdd').getAttribute('action')--}}
    {{--        };--}}

    {{--    </script>--}}
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}

    {{--    <script src="{{ asset('admin/assets/js/pluginAjax.js') }}"></script>--}}
    {{--    <script src="{{ asset('admin/assets/js/ajaxCRUD.js') }}"></script>--}}
    <script>
        const btnDeletes = document.querySelectorAll('.btnDelete');
        console.log(btnDeletes);
        for (const btnDelete of btnDeletes) {
            btnDelete.addEventListener('click',()=> {
                const id = btnDelete.dataset.id;
                Swal.fire({
                    title: 'Bạn có chắc?',
                    text: "Bạn chắc chắn muốn xóa đi bản ghi này !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `infoNewsletter/delete/${id}`,
                            method: 'DELETE',
                            dataType: 'json',
                            success:function(response)
                            {
                                Swal.fire(
                                    'Deleted!',
                                    `${response.data.message}`,
                                    'success'
                                )
                                const elm =  document.getElementById(`record-${response.data.id}`);
                                var seconds = 2000/1000;
                                elm.style.transition = "opacity "+seconds+"s ease";
                                elm.style.opacity = 0;
                                setTimeout(function() {
                                    elm.remove()
                                }, 2000);
                            },
                            error: function(response) {
                            }
                        });

                    }
                })
            })
        }

    </script>
@endsection
