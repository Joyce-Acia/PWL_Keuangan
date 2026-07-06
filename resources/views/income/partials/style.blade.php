<style>
        .form-root { font-family: 'Montserrat', sans-serif; background: #fffaed; min-height: 100vh; }

        .breadcrumb {
            display: flex; align-items: center; gap: 6px;
            font-size: 0.78rem; color: #b87a3a;
            margin-bottom: 20px;
        }
        .breadcrumb a { color: #FE914D; text-decoration: none; font-weight: 600; }
        .breadcrumb a:hover { text-decoration: underline; }
        .breadcrumb-sep { color: #FEAF52; }

        .form-card {
            background: #fff;
            border-radius: 18px;
            border: 1.5px solid #FEAF52;
            overflow: hidden;
        }

        .form-card-header {
            background: #FE914D;
            padding: 18px 24px;
            display: flex; align-items: center; gap: 10px;
        }
        .form-card-header-icon {
            width: 34px; height: 34px;
            background: rgba(255,255,255,0.22);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            color: #fff;
        }
        .form-card-title { font-size: 1rem; font-weight: 700; color: #fff; }
        .form-card-sub { font-size: 0.75rem; color: rgba(255,255,255,0.82); margin-top: 1px; }

        .form-card-body { padding: 28px 24px; }

        .id-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #FFF2CC;
            border: 1px solid #FEAF52;
            color: #FE914D;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-family: monospace;
        }

        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
        @media (max-width: 640px) { .form-grid { grid-template-columns: 1fr; } }

        .form-group { display: flex; flex-direction: column; gap: 5px; }
        .form-group.full { grid-column: 1 / -1; }
        @media (max-width: 640px) { .form-group.full { grid-column: span 1; } }

        .form-label {
            font-size: 0.7rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.05em;
            color: #FE914D;
        }
        .form-label span { color: #FD593D; margin-left: 2px; }

        .form-input, .form-select, .form-textarea {
            font-family: 'Montserrat', sans-serif;
            font-size: 0.875rem; color: #3a2a18;
            background: #FFFAED;
            border: 1.5px solid #FEAF52;
            border-radius: 10px;
            padding: 10px 13px;
            width: 100%; outline: none;
            transition: border-color 0.15s, background 0.15s, box-shadow 0.15s;
        }
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            border-color: #FF941D;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(255,148,29,0.15);
        }
        .form-input.nominal {
            font-weight: 700; font-size: 1rem;
            color: #3cc26d; padding-left: 34px;
        }
        .form-textarea { resize: vertical; min-height: 88px; }

        .input-prefix-wrap { position: relative; }
        .input-prefix {
            position: absolute; left: 12px; top: 50%;
            transform: translateY(-50%);
            font-weight: 700; font-size: 0.82rem;
            color: #FEAF52; pointer-events: none;
        }

        /* .input-suffix-wrap {
            position: relative;
        }

        .input-suffix {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: 700;
            color: #FEAF52;
            pointer-events: none;
        }

        .form-input.with-suffix {
            padding-right: 32px;
        } */

        .form-divider {
            grid-column: 1 / -1;
            border: none; border-top: 1.5px dashed #FFF2CC;
            margin: 4px 0;
        }
        @media (max-width: 640px) { .form-divider { grid-column: span 1; } }

        .sumber-pills {
            display: flex; flex-wrap: wrap; gap: 8px;
            margin-top: 2px;
        }
        .sumber-pill input[type="radio"] { display: none; }
        .sumber-pill label {
            display: inline-block;
            font-size: 0.78rem; font-weight: 600;
            padding: 6px 14px; border-radius: 20px;
            border: 1.5px solid #FEAF52;
            background: #FFF2CC; color: #b87a3a;
            cursor: pointer;
            transition: background 0.15s, color 0.15s, border-color 0.15s;
        }
        .sumber-pill input[type="radio"]:checked + label {
            background: #FF941D; border-color: #FF941D; color: #fff;
        }
        .sumber-pill label:hover { background: #FEAF52; color: #fff; border-color: #FEAF52; }

        .alert-error {
            margin-bottom: 20px; padding: 12px 16px;
            background: rgba(253,89,61,0.08); border: 1px solid rgba(253,89,61,0.3);
            color: #FD593D; border-radius: 10px; font-size: 0.84rem;
        }
        .alert-error ul { list-style: disc; padding-left: 16px; margin-top: 4px; }
        .field-error { font-size: 0.72rem; color: #FD593D; margin-top: 3px; }
        .form-input.err, .form-select.err, .form-textarea.err { border-color: #FD593D; background: #fff5f5; }

        .form-card-footer {
            padding: 16px 24px;
            background: #FFF2CC;
            border-top: 1.5px solid #FEAF52;
            display: flex; align-items: center;
            justify-content: space-between; gap: 12px;
            flex-wrap: wrap;
        }
        .footer-hint { font-size: 0.75rem; color: #b87a3a; }
        .footer-actions { display: flex; gap: 10px; }

        .btn-cancel {
            display: inline-flex; align-items: center; gap: 6px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.82rem; font-weight: 700;
            padding: 9px 18px; border-radius: 10px;
            background: #fff; border: 1.5px solid #FEAF52;
            color: #b87a3a; text-decoration: none;
            transition: background 0.15s, color 0.15s;
        }
        .btn-cancel:hover { background: #FEAF52; color: #fff; }

        .btn-save {
            display: inline-flex; align-items: center; gap: 6px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.82rem; font-weight: 700;
            padding: 9px 22px; border-radius: 10px;
            background: #FD593D; border: none;
            color: #fff; cursor: pointer;
            transition: background 0.15s;
        }
        .btn-save:hover { background: #e04428; }
</style>