@foreach ($data as $data)
								<!--begin::Col-->
								<div class="col-sm-6 col-xl-4">
									<!--begin::Card-->
									<div class="card h-100 px-9 pt-6 pb-8">
										<!--begin::Card body-->
										<div class="card-body d-flex p-0 mb-3">
											<div class="image-food symbol">
												<img class="p-3 bg-abu symbol" src="{{ asset('/images/foodimg/' . $data->foto_makanan) }}" alt="{{ $data->foto_makanan }}">
											</div>
											<div class="desc-food w-100">
												<div class="fs-1 fw-bold mb-2 ms-3">{{ $data->nama_makanan }}</div>
												<label class="fs-4 ms-3 fw-semibold text-hover-primary text-gray-600 m-0">Rp.{{ number_format($data->harga, 0, ',', '.') }}</label>
												<div class="fw-semibold text-gray-400 ms-3"> Makanan Berat {{ $data->kategori }}</div>
												<div class="fw-semibold text-gray-400 ms-3"> Tersedia : {{ $data->stock }}</div>
											</div>
										</div>
										<div class="d-flex align-items-center fw-semibold">
											{{-- <span class="badge bg-light text-gray-700 px-3 py-2 me-2">40%</span> --}}
											<div class="badge badge-light-danger px-3 py-2 me-2">Tidak tersedia</div>
											{{-- <span class="text-gray-400 fs-7">Impressions</span> --}}
											<div class="action">
												<a class="badge badge-primary cur-p" data-bs-toggle="modal" data-bs-target="#modaledit{{ $data->id }}">Edit</a>
												<a class="badge badge-danger cur-p" href="/menu-makanandelete/{{ $data->id }}">Hapus</a>
											</div>
										</div>
										<!--end::Card body-->
										<!--begin::Card footer-->
										<!--end::Card footer-->
									</div>
									<!--end::Card-->
								</div>
								<!--end::Col-->
								{{-- begin::modal edit --}}
								<div class="modal fade" id="modaledit{{ $data->id }}" tabindex="-1" aria-hidden="true">
									<!--begin::Modal dialog-->
									<div class="modal-dialog modal-dialog-centered mw-650px">
										<!--begin::Modal content-->
										<div class="modal-content">
											<!--begin::Modal header-->
											<div class="modal-header">
												<!--begin::Modal title-->
												<h2>Edit Menu Makanan</h2>
												<!--end::Modal title-->
												<!--begin::Close-->
												<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
													<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
													<span class="svg-icon svg-icon-1">
														<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
															<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
															<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</div>
												<!--end::Close-->
											</div>
											<!--end::Modal header-->
											<!--begin::Modal body-->
											<div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
												<!--begin::Form-->
												<form id="kt_modal_new_card_form" class="form needs-validation" method="post" action="/menu-makananedit/{{ $data->id }}" novalidate="novalidate" enctype="multipart/form-data"> @csrf
													<!--begin::Input group-->
													<div class="d-flex flex-column mb-0 fv-row">
														<!--begin::Label-->
														<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
															<span class="required">Foto Makanan</span>
															{{-- <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                        title="Masukkan nama kategori seperti contoh dibawah ini"></i> --}}
														</label>
														<!--end::Label-->
														<!--begin::Image input-->
														<div class="image-input image-input-empty w-fc image-input-outline image-input-placeholder mb-4" data-kt-image-input="true">
															<!--begin::Image preview wrapper-->
															<div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('images/foodimg/' . $data->foto_makanan) }}')"></div>
															<!--end::Image preview wrapper-->
															<!--begin::Edit button-->
															<label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Change avatar">
																<i class="bi bi-pencil-fill fs-7"></i>
																<!--begin::Inputs-->
																<input id="img_input" type="file" name="foto_makanan" accept=".png, .jpg, .jpeg" />
																<input type="hidden" name="foto_makanan_remove" />
																<!--end::Inputs-->
															</label>
															<!--end::Edit button-->
															<!--begin::Cancel button-->
															<span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Cancel avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
															<!--end::Cancel button-->
															<!--begin::Remove button-->
															<span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove avatar">
																<i class="bi bi-x fs-2"></i>
															</span>
															<!--end::Remove button-->
														</div>
														<!--end::Image input-->
														<!--begin::Label-->
														<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
															<span class="required">Nama Makanan</span>
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Makanan seperti contoh dibawah ini"></i>
														</label>
														<!--end::Label-->
														<div class="input-group mb-5">
															<input type="text" class="form-control form-control-solid" placeholder="Cimol syntax" name="nama_makanan" value="{{ $data->nama_makanan }}" required />
															<div class="invalid-feedback"> Harap isi bidang ini </div>
														</div>
														<!--begin::Label-->
														<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
															<span class="required">Harga</span>
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Makanan seperti contoh dibawah ini"></i>
														</label>
														<!--end::Label-->
														<div class="input-group mb-5">
															<span class="input-group-text border-0">Rp.</span>
															<input type="text" class="form-control form-control-solid harga_makanan" placeholder="10.000" name="harga" value="{{ number_format($data->harga, 0, ',', '.') }}" required />
															<div class="invalid-feedback"> Harap isi bidang ini </div>
														</div>
														<!--begin::Label-->
														<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
															<span class="required">Kategori</span>
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Makanan seperti contoh dibawah ini"></i>
														</label>
														<!--end::Label-->
														<div class="input-group mb-5">
															<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Pilih Kategori Makanan" name="kategori_id">
																<option value="">Select user...</option>
																<option value="1" selected>Makanan Ringan</option>
																<option value="2">Makanan Berat</option>
															</select>
														</div>
														<!--begin::Label-->
														<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
															<span class="required">Stock Makanan</span>
															<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukkan Nama Makanan seperti contoh dibawah ini"></i>
														</label>
														<!--end::Label-->
														<div class="input-group mb-5">
															<span class="input-group-text border-0">Stock : </span>
															<input type="number" id="harga_makanan" class="form-control form-control-solid" placeholder="10" name="stock" value="{{ $data->stock }}" required />
															<div class="invalid-feedback"> Harap isi bidang ini </div>
														</div>
													</div>
													<!--end::Input group-->
													<!--begin::Actions-->
													<div class="text-center pt-15">
														<button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3"> Batal </button>
														<button type="submit" id="kt_modal_new_card_submit" class="btn btn-primary">
															<span class="indicator-label"> Kirim </span>
															<span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
															</span>
														</button>
													</div>
													<!--end::Actions-->
												</form>
												<!--end::Form-->
											</div>
											<!--end::Modal body-->
										</div>
										<!--end::Modal content-->
									</div>
									<!--end::Modal dialog-->
								</div>
								{{-- end::modal edit --}}
                                @endforeach
