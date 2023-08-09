@extends('admin.layout.layout')
@section('title-page','Quản lí slide')
@section('content')
    <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px] margin-0" id="content_wrapper">
        <div class="page-content">
            <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">

                    <!-- BEGIN: Breadcrumb -->
                    <div class="mb-5">
                        <ul class="m-0 p-0 list-none">
                            <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                                <a href="index.html">
                                    <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                                    <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                                </a>
                            </li>
                            <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                                Forms
                                <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                            </li>
                            <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                Form Vaidation</li>
                        </ul>
                    </div>
                    <!-- END: BreadCrumb -->
                    <div class="grid xl:grid-cols-1 grid-cols-1 gap-6">
                        <div class="card">
                            <div class="card-body flex flex-col p-6">
                                <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                    <div class="flex-1">
                                        <div class="card-title text-slate-900 dark:text-white">Thêm Banner</div>
                                    </div>
                                </header>
                                <div class="card-text h-full ">
                                    <form class="space-y-4" action="{{ route('admin.slide.update') }}" method="post" enctype="multipart/form-data">
                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-7">
                                            @csrf
                                            <input type="hidden" name="idSlider" value="{{ $data->id }}">
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Tiêu đề banner</label>
                                                <input type="text" name="titleBanner" class="form-control" value="{{ old('titleBanner',$data->title_slider) }}" placeholder="Full Title">
                                                @error('titleBanner')
                                                <div class="py-[18px] mt-4 px-6 font-normal font-Inter text-sm rounded-md bg-danger-500 bg-opacity-[14%] text-danger-500">
                                                    <div class="flex items-start space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-1">
                                                            {{ $message }}
                                                        </div>
                                                    </div>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Mô tả giảm giá</label>
                                                <input type="text" name="titleSale" class="form-control" value="{{ old('titleSale',$data->title_sale) }}" placeholder="Title Sale">
                                                @error('titleSale')
                                                <div class="py-[18px] mt-4 px-6 font-normal font-Inter text-sm rounded-md bg-danger-500 bg-opacity-[14%] text-danger-500">
                                                    <div class="flex items-start space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-1">
                                                            {{ $message }}
                                                        </div>
                                                    </div>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="input-area relative">
                                                <label for="largeInput" class="form-label">Ảnh Banner</label>
                                                <div class="multiFilePreview">
                                                    <label>
                                                        <input type="file" class=" w-full hidden" name="inputBanner" accept=".jpg, .jpeg, .png">
                                                        <span class="w-full h-[40px] file-control flex items-center custom-class">
                  <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                    <span id="placeholder" class="text-slate-400">Choose a file or drop it here...</span>
                              </span>
                              <span class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                              </span>
                                                    </label>
                                                    <div id="file-preview">
                                                        <img src="{{ asset(old('inputBanner',$data->link_image)) }}">
                                                    </div>
                                                </div>
                                                @error('inputBanner')
                                                <div class="py-[18px] mt-4 px-6 font-normal font-Inter text-sm rounded-md bg-danger-500 bg-opacity-[14%] text-danger-500">
                                                    <div class="flex items-start space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-1">
                                                            {{ $message }}
                                                        </div>
                                                    </div>
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="input-area">
                                                <label for="select" class="form-label">Trạng thái</label>
                                                <select id="select" name="status" class="form-control">
                                                    <option value="0" selected class="dark:bg-slate-700">--Chọn Trạng Thái--</option>
                                                    <option value="1" {{ old('status',$data->status) == 1 ? 'selected' : '' }} class="dark:bg-slate-700">Ẩn</option>
                                                    <option value="2" {{ old('status',$data->status) == 2 ? 'selected' : '' }} class="dark:bg-slate-700">Hiện</option>
                                                </select>
                                                @error('status')
                                                <div class="py-[18px] mt-4 px-6 font-normal font-Inter text-sm rounded-md bg-danger-500 bg-opacity-[14%] text-danger-500">
                                                    <div class="flex items-start space-x-3 rtl:space-x-reverse">
                                                        <div class="flex-1">
                                                            {{ $message }}
                                                        </div>
                                                    </div>
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <button class="btn inline-flex justify-center btn-dark">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
