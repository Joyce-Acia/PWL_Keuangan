<div class="form-grid">

                            <div class="form-group">
                                <label class="form-label" for="tanggal">Tanggal <span>*</span></label>
                                <input
                                    type="date" id="tanggal" name="tanggal"
                                    value="{{ old('tanggal', $income->tanggal ?? date('Y-m-d')) }}"
                                    class="form-input {{ $errors->has('tanggal') ? 'err' : '' }}"
                                    required>
                                @error('tanggal')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="nama_pelanggan">Nama Pihak <span>*</span></label>
                                <input
                                    type="text" id="nama_pelanggan" name="nama_pelanggan"
                                    value="{{ old('nama_pelanggan', $income->nama_pelanggan ?? '') }}"
                                    placeholder="Contoh: Budi Santoso"
                                    class="form-input {{ $errors->has('nama_pelanggan') ? 'err' : '' }}"
                                    required>
                                @error('nama_pelanggan')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label">Sumber <span>*</span></label>
                                <div class="sumber-pills">
                                    @foreach(['Penjualan Utama', 'Modal', 'Donasi atau Sponsor', 'Lain-lain'] as $opt)
                                        <div class="sumber-pill">
                                            <input
                                                type="radio" id="sumber-{{ $loop->index }}"
                                                name="sumber" value="{{ $opt }}"
                                                {{ old('sumber', $income -> sumber ?? '') === $opt ? 'checked' : '' }}>
                                            <label for="sumber-{{ $loop->index }}">{{ $opt }}</label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('sumber')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label" for="nominal"> Nominal <span>*</span></label>
                                <div class="input-prefix-wrap">
                                    <span class="input-prefix">Rp</span>
                                    <input
                                        type="number" step="1" id="nominal" name="nominal"
                                        value="{{ old('nominal', $income->nominal ?? '') }}"
                                        placeholder="0"
                                        class="form-input nominal {{ $errors->has('nominal') ? 'err' : '' }}"
                                        required>
                                </div>
                                @error('nominal')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <!-- <div class="form-group">
                                <label class="form-label" for="diskon">Diskon</label>

                                <div class="input-suffix-wrap">
                                    <input
                                        type="number"
                                        id="diskon"
                                        name="diskon"
                                        min="0"
                                        max="100"
                                        step="0.01"
                                        value="{{ old('diskon', $income->diskon ?? '') }}"
                                        placeholder="0"
                                        class="form-input nominal with-suffix">
                                    <span class="input-suffix">%</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="ongkir">Ongkir</label>

                                <div class="input-prefix-wrap">
                                    <span class="input-prefix">Rp</span>

                                    <input
                                        type="number"
                                        id="ongkir"
                                        name="ongkir"
                                        value="{{ old('ongkir', $income->ongkir ?? '') }}"
                                        placeholder="0"
                                        class="form-input nominal with-prefix">
                                </div>
                            </div>

                            <div class="form-group full">
                                <label class="form-label">Total Bersih</label>

                                <div class="input-prefix-wrap">
                                    <span class="input-prefix">Rp</span>

                                    <input
                                        type="text"
                                        id="total_bersih"
                                        class="form-input nominal with-prefix"
                                        readonly>
                                </div>
                            </div> -->

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label" for="keterangan">Keterangan <span style="color:#b87a3a;font-weight:400;text-transform:none;">(opsional)</span></label>
                                <textarea
                                    id="keterangan" name="keterangan"
                                    placeholder="Catatan singkat tentang transaksi ini..."
                                    class="form-textarea {{ $errors->has('keterangan') ? 'err' : '' }}">{{ old('keterangan', $income->keterangan ?? '') }}</textarea>
                                @error('keterangan')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

</div>