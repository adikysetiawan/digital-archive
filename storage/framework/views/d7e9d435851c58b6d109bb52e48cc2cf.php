<?php $__env->startSection('title', 'Data Arsip - SI-ARSIP DPMPTSP'); ?>

<?php $__env->startSection('header-title', 'Sistem Informasi Arsip Surat Keputusan'); ?>
<?php $__env->startSection('header-subtitle', 'Data Arsip'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* Hide search bar in top-header for this page only */
    .search-container {
        display: none !important;
    }
    /* Pagination beautify (works with Tailwind/Laravel default) */
    nav[role="navigation"] a,
    nav[role="navigation"] span {
        font-size: 14px !important;
        color: #2c3e50;
    }
    nav[role="navigation"] .flex.items-center.justify-between > div:first-child { display:none; }
    nav[role="navigation"] .flex.items-center.justify-between { justify-content: center !important; gap: 8px; }
    nav[role="navigation"] .hidden.sm\:flex-1.sm\:flex { display:none !important; }
    nav[role="navigation"] .relative.z-0.inline-flex.rounded-md.shadow-sm > * {
        border: 1px solid #e9ecef !important; background:#fff; color:#2c3e50; padding:8px 12px; margin:0 3px; border-radius:8px !important;
    }
    nav[role="navigation"] .relative.z-0.inline-flex.rounded-md.shadow-sm > span[aria-current="page"] {
        background: linear-gradient(135deg, #365F8D, #2A4A6B) !important; color:#fff !important; border-color:transparent !important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<style>
    .page-header {
        margin-bottom: 30px;
    }
    
    .page-title {
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    
    .page-subtitle {
        font-size: 16px;
        color: #6c757d;
        margin-bottom: 0;
    }
    
    .content-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        border: 1px solid #e9ecef;
        margin-bottom: 30px;
    }
    
    .section-title {
        font-size: 20px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
    }
    
    .btn-primary-custom {
        background: linear-gradient(135deg, #365F8D 0%, #2A4A6B 100%);
        border: none;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }
    
    .btn-primary-custom:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(54, 95, 141, 0.3);
        color: white;
    }
    
    .search-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 16px;
    }
    
    .filter-dropdown {
        position: relative;
        display: inline-block;
    }
    
    .filter-btn {
        background: #f8f9fa;
        border: 2px solid #e9ecef;
        color: #6c757d;
        padding: 12px 16px;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    
    .filter-btn:hover {
        border-color: #365F8D;
        color: #365F8D;
    }
    
    .filter-dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background: white;
        min-width: 200px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        border-radius: 8px;
        border: 1px solid #e9ecef;
        z-index: 1000;
        margin-top: 4px;
    }
    
    .filter-dropdown-content.show {
        display: block;
    }
    
    .filter-option {
        display: block;
        padding: 12px 16px;
        color: #2c3e50;
        text-decoration: none;
        font-size: 14px;
        border-bottom: 1px solid #f8f9fa;
        transition: background 0.2s;
    }
    
    .filter-option:hover {
        background: #f8f9fa;
        color: #365F8D;
    }
    
    .filter-option:last-child {
        border-bottom: none;
    }
    
    .search-input {
        flex: 1;
        max-width: 400px;
        padding: 12px 16px;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
    }
    
    .search-input:focus {
        outline: none;
        border-color: #365F8D;
        box-shadow: 0 0 0 3px rgba(54, 95, 141, 0.1);
    }
    
    .table-container {
        overflow-x: auto;
        border-radius: 12px;
        border: 1px solid #e9ecef;
    }
    
    .custom-table {
        width: 100%;
        margin: 0;
        background: white;
    }
    
    .custom-table th {
        background: #f8f9fa;
        color: #2c3e50;
        font-weight: 600;
        padding: 16px;
        border-bottom: 2px solid #e9ecef;
        font-size: 14px;
        text-align: left;
    }
    
    .custom-table td {
        padding: 16px;
        border-bottom: 1px solid #f1f3f4;
        vertical-align: middle;
        font-size: 14px;
    }
    
    .custom-table tbody tr:hover {
        background: #f8f9fa;
    }
    
    .custom-table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .custom-table th:nth-child(1), .custom-table td:nth-child(1) { min-width: 220px; white-space: nowrap; }
    .custom-table th:nth-child(2), .custom-table td:nth-child(2) { min-width: 240px; }
    .custom-table th:nth-child(3), .custom-table td:nth-child(3) { min-width: 120px; white-space: nowrap; }
    .custom-table th:nth-child(4), .custom-table td:nth-child(4) { min-width: 150px; }
    .custom-table th:nth-child(5), .custom-table td:nth-child(5) { min-width: 220px; }
    .custom-table th:nth-child(6), .custom-table td:nth-child(6) { min-width: 220px; }
    .custom-table th:nth-child(7), .custom-table td:nth-child(7) { min-width: 120px; }

    .action-buttons {
        display: flex;
        gap: 8px;
    }
    
    .btn-action {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }
    
    .btn-view {
        background: #e3f2fd;
        color: #1976d2;
        border: 1px solid #bbdefb;
    }
    
    .btn-view:hover {
        background: #1976d2;
        color: white;
    }
    
    .btn-download {
        background: #e8f5e8;
        color: #2e7d32;
        border: 1px solid #c8e6c9;
    }
    
    .btn-download:hover {
        background: #2e7d32;
        color: white;
    }
    
    .btn-edit {
        background: #fff3e0;
        color: #f57c00;
        border: 1px solid #ffcc02;
    }
    
    .btn-edit:hover {
        background: #f57c00;
        color: white;
    }
    
    .btn-delete {
        background: #ffebee;
        color: #d32f2f;
        border: 1px solid #ffcdd2;
    }
    
    .btn-delete:hover {
        background: #d32f2f;
        color: white;
    }
    
    .category-badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 600;
        line-height: 1;
        color: #fff;
        white-space: nowrap;
    }
    
    .document-title {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 4px;
    }
    
    .document-meta {
        font-size: 12px;
        color: #6c757d;
    }
    
    @media (max-width: 768px) {
        .search-section {
            flex-direction: column;
            align-items: stretch;
        }
        
        .search-input {
            max-width: none;
        }
        .search-section > div { width:100%; display:flex; gap:10px; }
        .search-section .filter-dropdown > button,
        .search-section a.btn-primary-custom { flex:1; justify-content:center; }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .custom-table th,
        .custom-table td {
            padding: 12px 8px;
            font-size: 12px;
        }
    }
</style>

<div class="page-header">
    <h2 class="page-title">Data Arsip</h2>
    <p class="page-subtitle">Kelola dan akses dokumen arsip digital</p>
</div>

<!-- Main Content Card -->
<div class="content-card">
    <div class="search-section">
        <h3 class="section-title" style="margin-bottom: 0;">Semua Arsip</h3>
        <div style="display: flex; gap: 12px; align-items: center;">
            <form method="GET" action="<?php echo e(route('documents.index')); ?>" style="display: flex; gap: 12px; align-items: center; position:relative;">
                <i class="fas fa-search" style="position:absolute; left:10px; color:#6c757d; font-size:13px;"></i>
                <input type="text" name="search" class="search-input" 
                       placeholder="Cari dokumen, kategori..." 
                       value="<?php echo e(request('search')); ?>"
                       style="max-width: 300px; padding-left:30px;">
                <button type="submit" style="display: none;"></button>
            </form>
            
            <!-- Filter Dropdown -->
            <div class="filter-dropdown">
                <button type="button" class="filter-btn" onclick="toggleFilterDropdown()">
                    <i class="fas fa-filter"></i>
                    Filter
                    <i class="fas fa-chevron-down" style="font-size: 12px;"></i>
                </button>
                <div id="filterDropdown" class="filter-dropdown-content" style="min-width:280px;">
                    <form id="filterForm" method="GET" action="<?php echo e(route('documents.index')); ?>" style="padding:8px 0;">
                        <div style="padding:8px 16px; font-weight:700; color:#2c3e50;">Jenis Data</div>
                        <a href="#" class="filter-option" onclick="setCategory('')"><i class="fas fa-list" style="margin-right: 8px; color: #6c757d;"></i> Semua Kategori</a>
                        <?php $__currentLoopData = ($categories ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $slug = Str::slug($cat->name); ?>
                            <a href="#" class="filter-option" onclick="setCategory('<?php echo e($slug); ?>', <?php echo e($cat->id); ?>)">
                                <i class="fas fa-folder" style="margin-right: 8px; color: #6c757d;"></i>
                                <?php echo e($cat->name); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div style="padding:8px 16px; font-weight:700; color:#2c3e50; border-top:1px solid #f1f3f4;">Periode</div>
                        <div style="display:flex; gap:8px; padding:8px 16px;">
                            <button type="button" class="presetBtn" data-range="week" style="flex:1; padding:8px 10px; border:1px solid #e9ecef; border-radius:8px; background:#f8f9fa;">1 Minggu</button>
                            <button type="button" class="presetBtn" data-range="month" style="flex:1; padding:8px 10px; border:1px solid #e9ecef; border-radius:8px; background:#f8f9fa;">1 Bulan</button>
                            <button type="button" class="presetBtn" data-range="year" style="flex:1; padding:8px 10px; border:1px solid #e9ecef; border-radius:8px; background:#f8f9fa;">1 Tahun</button>
                        </div>
                        <div style="display:flex; gap:8px; padding:0 16px 12px;">
                            <input type="date" id="date_from" name="date_from" class="form-control" style="flex:1; border:1px solid #e9ecef; border-radius:8px; padding:8px 10px;">
                            <input type="date" id="date_to" name="date_to" class="form-control" style="flex:1; border:1px solid #e9ecef; border-radius:8px; padding:8px 10px;">
                        </div>
                        <input type="hidden" name="category" id="catInput" value="<?php echo e(request('category','')); ?>">
                        <input type="hidden" name="category_id" id="catIdInput" value="<?php echo e(request('category_id','')); ?>">
                        <input type="hidden" name="range" id="rangeInput" value="<?php echo e(request('range','')); ?>">
                        <input type="hidden" name="search" value="<?php echo e(request('search')); ?>">
                        <input type="hidden" name="sort" value="<?php echo e(request('sort','recent')); ?>">
                        <input type="hidden" name="per" value="<?php echo e(request('per', $documents->perPage())); ?>">
                        <div style="padding:8px 16px 12px; display:flex; gap:8px;">
                            <button type="button" onclick="resetFilter()" style="flex:1; border:1px solid #e9ecef; background:#fff; border-radius:8px; padding:8px 10px;">Reset</button>
                            <button type="submit" style="flex:1; background:linear-gradient(135deg,#365F8D,#2A4A6B); color:#fff; border:none; border-radius:8px; padding:8px 10px; font-weight:600;">Terapkan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Sort Dropdown (moved here between Filter and Tambah) -->
            <div class="filter-dropdown">
                <button type="button" class="filter-btn" onclick="toggleSortDropdown()">
                    <i class="fas fa-arrow-up-wide-short"></i>
                    Sortir
                    <i class="fas fa-chevron-down" style="font-size: 12px;"></i>
                </button>
                <div id="sortDropdown" class="filter-dropdown-content">
                    <?php $sort = request('sort','recent'); ?>
                    <a href="<?php echo e(route('documents.index', array_merge(request()->query(), ['sort'=>'recent']))); ?>" class="filter-option <?php echo e($sort==='recent'?'active':''); ?>">Terbaru</a>
                    <a href="<?php echo e(route('documents.index', array_merge(request()->query(), ['sort'=>'oldest']))); ?>" class="filter-option <?php echo e($sort==='oldest'?'active':''); ?>">Terlama</a>
                    <a href="<?php echo e(route('documents.index', array_merge(request()->query(), ['sort'=>'popular']))); ?>" class="filter-option <?php echo e($sort==='popular'?'active':''); ?>">Paling Populer</a>
                    <a href="<?php echo e(route('documents.index', array_merge(request()->query(), ['sort'=>'title_asc']))); ?>" class="filter-option <?php echo e($sort==='title_asc'?'active':''); ?>">Judul A-Z</a>
                    <a href="<?php echo e(route('documents.index', array_merge(request()->query(), ['sort'=>'title_desc']))); ?>" class="filter-option <?php echo e($sort==='title_desc'?'active':''); ?>">Judul Z-A</a>
                </div>
            </div>
            
            <a href="<?php echo e(route('documents.create')); ?>" class="btn-primary-custom">
                <i class="fas fa-plus"></i>
                Tambah
            </a>
        </div>
    </div>

    <!-- Show entries info -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; font-size: 14px; color: #6c757d; gap:12px; flex-wrap:wrap;">
        <div>
            Show 
            <select onchange="applyPer(this.value)" style="border: 1px solid #e9ecef; border-radius: 6px; padding: 6px 10px; margin: 0 8px;">
                <?php $per = (int) request('per', $documents->perPage()); ?>
                <?php $__currentLoopData = [10,25,50,100,250,500]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($opt); ?>" <?php echo e($per===$opt ? 'selected' : ''); ?>><?php echo e($opt); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            entries
        </div>
        <div style="margin-left:auto; display:flex; gap:12px; align-items:center;"></div>
    </div>

    <!-- Table -->
    <div class="table-container">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Instansi</th>
                    <th>Bidang Penelitian</th>
                    <th>Judul / Tema</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if($documents->count() > 0): ?>
                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(str_pad($document->id, 3, '0', STR_PAD_LEFT)); ?>.16.74.1 / S / <?php echo e($document->id); ?> / <?php echo e(date('Y')); ?></td>
                        <td>
                            <div class="document-title"><?php echo e($document->title); ?></div>
                            <div class="document-meta"><?php echo e($document->uploader->name ?? 'Unknown'); ?></div>
                        </td>
                        <td><?php echo e(optional($document->uploaded_at ?? $document->created_at)->format('d M Y')); ?></td>
                        <td><?php echo e('DPMPTSP KOTA'); ?></td>
                        <td>
                            <span class="category-badge" style="background-color: <?php echo e(optional($document->documentType->subCategory->category)->color ?? '#365F8D'); ?>;">
                                <?php echo e(optional($document->documentType->subCategory->category)->name ?? 'Umum'); ?>

                            </span>
                        </td>
                        <td><?php echo e(Str::limit($document->documentType->name ?? $document->title, 50)); ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="<?php echo e(route('documents.show', $document)); ?>" class="btn-action btn-view">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('documents.download', $document)); ?>" class="btn-action btn-download">
                                    <i class="fas fa-download"></i>
                                </a>
                                <?php if(Auth::user()->id === ($document->uploaded_by ?? null) || Auth::user()->is_admin): ?>
                                <a href="<?php echo e(route('documents.edit', $document)); ?>" class="btn-action btn-edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="<?php echo e(route('documents.destroy', $document)); ?>" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus dokumen ini?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-action btn-delete" style="border: none; cursor: pointer;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: #6c757d;">
                            <i class="fas fa-folder-open" style="font-size: 3rem; margin-bottom: 16px; display: block;"></i>
                            <div style="font-size: 18px; font-weight: 600; margin-bottom: 8px;">Tidak ada dokumen ditemukan</div>
                            <div style="margin-bottom: 20px;">Coba ubah filter pencarian atau unggah dokumen baru.</div>
                            <a href="<?php echo e(route('documents.create')); ?>" class="btn-primary-custom">
                                <i class="fas fa-plus"></i>
                                Unggah Dokumen Pertama
                            </a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <?php if($documents->hasPages()): ?>
    <div style="margin-top: 20px; display: flex; justify-content: center;">
        <?php echo e($documents->appends(request()->query())->links()); ?>

    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Auto-submit search form on input
    document.addEventListener('DOMContentLoaded', function() {
        const searchInputs = document.querySelectorAll('input[name="search"]');
        searchInputs.forEach(input => {
            let timeout;
            input.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    this.form.submit();
                }, 500);
            });
        });
    });

    // ---- Controls helpers ----
    function toggleFilterDropdown() {
        const dropdown = document.getElementById('filterDropdown');
        dropdown.classList.toggle('show');
    }
    function toggleSortDropdown() {
        const dropdown = document.getElementById('sortDropdown');
        dropdown.classList.toggle('show');
    }
    function applyPer(val) {
        const params = new URLSearchParams(window.location.search);
        params.set('per', val);
        window.location.search = params.toString();
    }
    function setCategory(slug) {
        const cat = document.getElementById('catInput');
        if (cat) cat.value = slug || '';
    }
    function resetFilter() {
        const cat = document.getElementById('catInput');
        const rng = document.getElementById('rangeInput');
        const df = document.getElementById('date_from');
        const dt = document.getElementById('date_to');
        if (cat) cat.value = '';
        if (rng) rng.value = '';
        if (df) df.value = '';
        if (dt) { dt.value = ''; dt.disabled = false; }
        document.querySelectorAll('.presetBtn').forEach(b => b.style.background = '#f8f9fa');
    }

    // Preset logic: when a preset is selected, lock end-date and auto-calc from start
    document.querySelectorAll('.presetBtn').forEach(btn => {
        btn.addEventListener('click', function(){
            document.querySelectorAll('.presetBtn').forEach(b => b.style.background = '#f8f9fa');
            this.style.background = '#eef4fb';
            const range = this.getAttribute('data-range');
            const rng = document.getElementById('rangeInput');
            const df = document.getElementById('date_from');
            const dt = document.getElementById('date_to');
            if (rng) rng.value = range;
            if (dt) dt.disabled = true;
            if (df) {
                const recalc = () => {
                    if (!df.value || !dt) return;
                    const start = new Date(df.value);
                    const add = range === 'week' ? 6 : (range === 'month' ? 29 : 364);
                    const end = new Date(start); end.setDate(start.getDate() + add);
                    dt.value = end.toISOString().slice(0,10);
                };
                recalc();
                df.addEventListener('change', recalc, { once: true });
            }
        });
    });

    // If user clears preset (by typing date range manually), re-enable date_to
    const dateFromEl = document.getElementById('date_from');
    const dateToEl = document.getElementById('date_to');
    if (dateFromEl) {
        dateFromEl.addEventListener('input', function(){
            const rng = document.getElementById('rangeInput');
            if (rng && !rng.value && dateToEl) dateToEl.disabled = false;
        });
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        const filterDropdown = document.getElementById('filterDropdown');
        const sortDropdown = document.getElementById('sortDropdown');
        const isFilterBtn = event.target.closest('.filter-btn');
        const insideFilter = filterDropdown && filterDropdown.contains(event.target);
        const insideSort = sortDropdown && sortDropdown.contains(event.target);
        if (!isFilterBtn && !insideFilter) filterDropdown?.classList.remove('show');
        if (!isFilterBtn && !insideSort) sortDropdown?.classList.remove('show');
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\arsip-digital\resources\views/documents/index.blade.php ENDPATH**/ ?>