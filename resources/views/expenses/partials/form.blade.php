<div class="form-grid">

                            <div class="form-group">
                                <label class="form-label" for="tanggal">Tanggal <span>*</span></label>
                                <input
                                    type="date" id="tanggal" name="tanggal"
                                    value="{{ old('tanggal', $expense->tanggal ?? date('Y-m-d')) }}"
                                    class="form-input {{ $errors->has('tanggal') ? 'err' : '' }}"
                                    required>
                                @error('tanggal')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="nama_admin">Nama Admin <span>*</span></label>
                                <select
                                    id="nama_admin" name="nama_admin"
                                    class="form-select {{ $errors->has('nama_admin') ? 'err' : '' }}"
                                    required>
                                    <option value="">— Pilih Nama Admin —</option>
                                    @foreach(['Ratna','Dera','Joyce','David'] as $option)
                                        <option value="{{ $option }}" {{ old('nama_admin', $expense->nama_admin ?? '') === $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('nama_admin')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label">Kategori Pengeluaran <span>*</span></label>

                                <div class="kategori-pills">
                                    @foreach([
                                        'Pembelian Stok',
                                        'Transportasi',
                                        'Gaji/Upah',
                                        'Perlengkapan & Marketing'
                                    ] as $option)

                                        <div class="kategori-pill">
                                            <input
                                                type="radio"
                                                id="kategori-{{ $loop->index }}"
                                                name="kategori_pengeluaran"
                                                value="{{ $option }}"
                                                {{ old('kategori_pengeluaran', $expense->kategori_pengeluaran ?? '') === $option ? 'checked' : '' }}
                                            >

                                            <label for="kategori-{{ $loop->index }}">
                                                {{ $option }}
                                            </label>
                                        </div>

                                    @endforeach
                                </div>

                                @error('kategori_pengeluaran')
                                    <div class="field-error">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label" for="nominal">Nominal <span>*</span></label>
                                <div class="input-prefix-wrap">
                                    <span class="input-prefix">Rp</span>
                                    <input
                                        type="number" step="1" id="nominal" name="nominal"
                                        value="{{ old('nominal', $expense->nominal ?? '') }}"
                                        placeholder="0"
                                        class="form-input nominal {{ $errors->has('nominal') ? 'err' : '' }}"
                                        required>
                                </div>
                                @error('nominal')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

                            <hr class="form-divider">

                            <div class="form-group full">
                                <label class="form-label" for="keterangan">Keterangan <span style="color:#b87a3a;font-weight:400;text-transform:none;">(opsional)</span></label>
                                <textarea
                                    id="keterangan" name="keterangan"
                                    placeholder="Catatan singkat tentang transaksi ini..."
                                    class="form-textarea {{ $errors->has('keterangan') ? 'err' : '' }}">{{ old('keterangan', $expense->keterangan ?? '') }}</textarea>
                                @error('keterangan')<div class="field-error">{{ $message }}</div>@enderror
                            </div>

</div>