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
                                    <form class="space-y-4" action="{{ route('products.update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <div class="input-area relative">
                                            <label for="largeInput" class="form-label">Tên Sản phẩm</label>
                                            <input type="text" name="nameProduct" class="form-control" value="{{ old('nameProduct',$data->name) }}" placeholder="Full Title">
                                            @error('nameProduct')
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
                                            <label for="largeInput" class="form-label">Ảnh Đại diện</label>
                                            <div class="multiFilePreview">
                                                <label>
                                                    <input type="file" class=" w-full hidden" name="imagesProductsAvatar"  accept=".jpg, .jpeg, .png">
                                                    <span class="w-full h-[40px] file-control flex items-center custom-class">
                  <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                    <span id="placeholder" class="text-slate-400">Choose a file or drop it here...</span>
                              </span>
                              <span class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                              </span>
                                                </label>
                                                <div id="file-preview">
                                                    @if(!empty($data->images))
                                                        <img src="{{ asset($data->images) }}" alt="">
                                                    @endif
                                                </div>
                                            </div>
                                            @error('imagesProducts')
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
                                            <label for="largeInput" class="form-label">Ảnh Sản phẩm</label>
                                            <div class="multiFilePreviews">
                                                <label>
                                                    <input type="file" class=" w-full hidden" name="imagesProducts[]" multiple accept=".jpg, .jpeg, .png">
                                                    <span class="w-full h-[40px] file-control flex items-center custom-class">
                  <span class="flex-1 overflow-hidden text-ellipsis whitespace-nowrap">
                    <span id="placeholders" class="text-slate-400">Choose a file or drop it here...</span>
                              </span>
                              <span class="file-name flex-none cursor-pointer border-l px-4 border-slate-200 dark:border-slate-700 h-full inline-flex items-center bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400 text-sm rounded-tr rounded-br font-normal">Browse</span>
                              </span>
                                                </label>
                                                <div id="file-previews">
                                                    @if(!empty($data->image_avatar))
                                                        @php
                                                        $dataImg = json_decode($data->image_avatar);
                                                        @endphp
                                                        @foreach($dataImg as $value)
                                                            <img src="{{ asset($value) }}" alt="">
                                                        @endforeach

                                                    @endif
                                                </div>
                                            </div>
                                            @error('imagesProducts')
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
                                            <label for="largeInput" class="form-label">Giá</label>
                                            <input type="text" name="price" class="form-control" value="{{ old('price',$data->price) }}" placeholder="Full Price">
                                            @error('price')
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
                                            <label for="largeInput" class="form-label">Giảm Giá</label>
                                            <input type="text" name="sale" class="form-control" value="{{ old('sale',$data->discount_price) }}" placeholder="Full Title">
                                            @error('sale')
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
                                            <label for="select" class="form-label">Danh mục</label>
                                            <select id="select" name="categories" class="form-control">
                                                <option value="0" selected class="dark:bg-slate-700">--Chọn Danh Mục--</option>
                                                @foreach($categories as $value)
                                                    <option value="{{ $value->id }}" {{ old('categories',$data->category_id) == $value->id ? 'selected' : '' }} class="dark:bg-slate-700">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('categories')
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
                                            <label for="select" class="form-label">Nhãn hàng</label>
                                            <select id="select" name="brand_id" class="form-control">
                                                <option value="0" selected class="dark:bg-slate-700">--Chọn Trạng Thái--</option>
                                                @foreach($brands as $value)
                                                    <option value="{{ $value->id }}" {{ old('brand_id',$data->brand_id) == $value->id ? 'selected' : '' }} class="dark:bg-slate-700">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('brand_id')
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
                                                <option value="1" {{ old('status',$data->status) == 1 ? 'selected' : '' }} class="dark:bg-slate-700">Không Kích hoạt</option>
                                                <option value="2" {{ old('status',$data->status) == 2 ? 'selected' : '' }} class="dark:bg-slate-700">Kích hoạt</option>
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
