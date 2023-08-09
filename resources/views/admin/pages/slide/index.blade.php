@extends('admin.layout.layout')
@section('title-page','Quản lí slide')
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
                                Basic-Table
                            </li>
                        </ul>
                    </div>
                    <!-- END: BreadCrumb -->


                    <div class=" space-y-5">
                        <div class="card">
                            <header class=" card-header noborder">
                                <h4 class="card-title">Advanced Table Two
                                </h4>
                                <button onclick="location.href='{{ route('admin.slide.add') }}'"
                                        class="btn inline-flex justify-center btn-outline-dark capitalize">Thêm
                                </button>
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
                                                        title slider
                                                    </th>

                                                    <th scope="col" class=" table-th ">
                                                        title sale
                                                    </th>

                                                    <th scope="col" class=" table-th ">
                                                        link image
                                                    </th>

                                                    <th scope="col" class=" table-th ">
                                                        Status
                                                    </th>

                                                    <th scope="col" class=" table-th ">
                                                        Action
                                                    </th>

                                                </tr>
                                                </thead>
                                                <tbody
                                                    class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                @foreach($data as $key=>$value)
                                                <tr id="record-{{$value->id}}">
                                                    <td class="table-td">{{ $key+1 }}</td>
                                                    <td class="table-td ">{{ $value->title_slider }}</td>
                                                    <td class="table-td ">{{ $value->title_sale }}</td>
                                                    <td class="table-td">
                                                        <img src="{{ asset($value->link_image) }}" style="object-fit: cover;" alt="">
                                                    </td>
                                                    <td class="table-td ">
                                                        <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                                            <input type="checkbox" value="" {{ $value->status == 2 ? 'checked' : '' }} data-id="{{ $value->id }}" class="sr-only peer btnStatus">
                                                            <div class="w-14 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-500"></div>
                                                        </label>
                                                    </td>
                                                    <td class="table-td ">
                                                        <div class="flex space-x-3 rtl:space-x-reverse">
                                                            <button class="action-btn" onclick="location.href='{{ route('admin.slide.edit',['id' => $value->id]) }}'" type="button">
                                                                <iconify-icon
                                                                    icon="heroicons:pencil-square"></iconify-icon>
                                                            </button>
                                                            <button class="action-btn btnDelete" data-id="{{ $value->id }}" type="button">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
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
                        url: `delete/slide/${id}`,
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
<script>
    const btnStatus = document.querySelectorAll('.btnStatus');
    for (const btnStatus1 of btnStatus) {
        btnStatus1.addEventListener('change',()=>{
            const id = btnStatus1.getAttribute('data-id');
            const status = btnStatus1.checked == true ? 2 : 1;
            console.log(id,status)
            $.ajax({
                url: "{{ route('admin.slide.status') }}",
                method: 'POST',
                data: { id : id,id_status : status},
                success:function(response)
                {
                    new Notify({
                        status: 'success',
                        title: 'Cập nhật',
                        text: `${response.data.message}`,
                        effect: 'fade',
                        speed: 300,
                        customClass: null,
                        customIcon: null,
                        showIcon: true,
                        showCloseButton: true,
                        autoclose: true,
                        autotimeout: 3000,
                        gap: 20,
                        distance: 20,
                        type: 1,
                        position: 'right top'
                    })
                },
                error: function(response) {
                    new Notify({
                        status: 'error',
                        title: 'Cập nhật',
                        text: `${response.responseJSON.data.message}`,
                        effect: 'fade',
                        speed: 300,
                        customClass: null,
                        customIcon: null,
                        showIcon: true,
                        showCloseButton: true,
                        autoclose: true,
                        autotimeout: 3000,
                        gap: 20,
                        distance: 20,
                        type: 1,
                        position: 'right top'
                    })
                    btnStatus1.checked = 0;
                }
            });
        })
    }
</script>
@endsection
