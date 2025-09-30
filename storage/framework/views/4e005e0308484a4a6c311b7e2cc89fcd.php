<?php $__env->startSection('title', 'Dashboard - SI-ARSIP DPMPTSP'); ?>

<?php $__env->startSection('header-title', 'Sistem Informasi Arsip Surat Keputusan'); ?>
<?php $__env->startSection('header-subtitle', 'Overview & Statistik'); ?>

<?php $__env->startSection('content'); ?>
<style>
    @media (max-width: 768px) {
        .dashboard-title {
            font-size: 24px !important;
        }
        
        .dashboard-subtitle {
            font-size: 14px !important;
        }
        
        .stats-grid {
            grid-template-columns: 1fr !important;
            gap: 16px !important;
        }
        
        .stat-card {
            padding: 20px !important;
        }
        
        .stat-number {
            font-size: 28px !important;
        }
        
        .chart-section {
            padding: 20px !important;
        }
        
        .chart-header {
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 16px !important;
        }
        
        .chart-buttons {
            flex-direction: column !important;
            width: 100% !important;
            gap: 8px !important;
        }
        
        .chart-buttons a, .chart-buttons button {
            width: 100% !important;
            justify-content: center !important;
        }
        
        .chart-container {
            height: 300px !important;
        }
    }
    
    @media (max-width: 480px) {
        .stats-grid {
            gap: 12px !important;
        }
        
        .stat-card {
            padding: 16px !important;
        }
        
        .chart-section {
            padding: 16px !important;
        }
    }
</style>

<h2 class="dashboard-title" style="font-size: 32px; font-weight: 700; color: #2c3e50; margin-bottom: 8px;">Dashboard</h2>
<p class="dashboard-subtitle" style="font-size: 16px; color: #6c757d; margin-bottom: 30px;">Selamat datang, <?php echo e(Auth::user()->name); ?>! Berikut adalah ringkasan sistem arsip digital.</p>

<!-- Statistics Cards -->
<div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 24px; margin-bottom: 30px;">
    <div class="stat-card" style="background: linear-gradient(135deg, #365F8D 0%, #2A4A6B 100%); color: white; border-radius: 16px; padding: 24px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); border: 1px solid #e9ecef; transition: all 0.3s ease;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
            <div>
                <div class="stat-number" style="font-size: 36px; font-weight: 700; line-height: 1; margin-bottom: 4px;"><?php echo e(\App\Models\Document::count()); ?></div>
                <div style="font-size: 14px; opacity: 0.9;">Total Arsip</div>
            </div>
            <a href="<?php echo e(url('/documents')); ?>" title="Lihat semua arsip" style="width: 48px; height: 48px; border-radius: 12px; background: rgba(255, 255, 255, 0.25); display: flex; align-items: center; justify-content: center; font-size: 20px; color: #fff; text-decoration:none; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.25);">
                <i class="fas fa-archive"></i>
            </a>
        </div>
    </div>
    
    <div class="stat-card" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; border-radius: 16px; padding: 24px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); border: 1px solid #e9ecef; transition: all 0.3s ease; position: relative;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
            <div>
                <div class="stat-number" style="font-size: 36px; font-weight: 700; line-height: 1; margin-bottom: 4px;"><?php echo e(\App\Models\Service::whereNull('parent_id')->count()); ?></div>
                <div style="font-size: 14px; opacity: 0.9;">Jenis Data</div>
            </div>
            <div id="jenisDataIcon" style="width: 48px; height: 48px; border-radius: 12px; background: rgba(255, 255, 255, 0.25); display: flex; align-items: center; justify-content: center; font-size: 20px; cursor: pointer; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.25);">
                <i class="fas fa-layer-group"></i>
            </div>
        </div>
        <!-- Dropdown Jenis Data -->
        <div id="jenisDataDropdown" style="display:none; position:absolute; top:72px; right:24px; background:#fff; color:#2c3e50; border:1px solid #e9ecef; border-radius:12px; box-shadow:0 10px 24px rgba(0,0,0,0.15); min-width:240px; overflow:hidden; z-index:10;">
            <div style="padding:10px 14px; font-size:13px; color:#6c757d; background:#f9fbfd; border-bottom:1px solid #f1f3f4;">Pilih Jenis Data</div>
            <a href="<?php echo e(url('/documents')); ?>" style="display:block; padding:10px 14px; text-decoration:none; color:#2c3e50;">
                <i class="fas fa-list" style="margin-right:8px; color:#6c757d;"></i> Semua Jenis
            </a>
            <?php $__currentLoopData = \App\Models\Service::whereNull('parent_id')->get(['id','name']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url('/documents?category_id='.$cat->id)); ?>" style="display:block; padding:10px 14px; text-decoration:none; color:#2c3e50;">
                <i class="fas fa-folder" style="margin-right:8px; color:#6c757d;"></i> <?php echo e($cat->name); ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    
    <div class="stat-card" style="background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%); color: white; border-radius: 16px; padding: 24px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); border: 1px solid #e9ecef; transition: all 0.3s ease;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 16px;">
            <div>
                <div class="stat-number" style="font-size: 36px; font-weight: 700; line-height: 1; margin-bottom: 4px;"><?php echo e(\App\Models\Document::whereDate('created_at', today())->count()); ?></div>
                <div style="font-size: 14px; opacity: 0.9;">Data Hari Ini</div>
            </div>
            <div id="todayIcon" style="width: 48px; height: 48px; border-radius: 12px; background: rgba(255, 255, 255, 0.25); display: flex; align-items: center; justify-content: center; font-size: 20px; cursor:pointer; box-shadow: inset 0 0 0 1px rgba(255,255,255,0.25);">
                <i class="fas fa-calendar-day"></i>
            </div>
        </div>
    </div>
</div>

<!-- Chart Section -->
<div class="chart-section" style="background: white; border-radius: 16px; padding: 30px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); border: 1px solid #e9ecef; margin-bottom: 30px;">
    <div class="chart-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; gap: 16px; position: relative;">
        <h3 style="font-size: 20px; font-weight: 600; color: #2c3e50; white-space: nowrap; padding: 8px 14px; border-radius: 10px;">Informasi Data Statistik</h3>
        <div class="chart-buttons" style="display: flex; gap: 12px; align-items:center; flex-wrap:nowrap;">
            <div id="filterWrap" style="position: relative;">
                <button id="filterBtn" type="button" aria-haspopup="true" aria-expanded="false" style="padding: 10px 16px; border-radius: 8px; font-size: 14px; border: 1px solid #e1e8ed; background:#ffffff; color:#2c3e50; cursor: pointer; transition: all 0.2s ease; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 1px 2px rgba(0,0,0,0.04);">
                    <i class="fas fa-filter" style="font-size: 14px; color:#6c757d;"></i>
                    <span>Filter</span>
                    <i class="fas fa-chevron-down" style="font-size:12px; color:#6c757d;"></i>
                </button>
                <div id="filterDropdown" style="display:none; position:absolute; top:110%; right:0; width:340px; background:#fff; border:1px solid #e9ecef; border-radius:14px; box-shadow:0 12px 28px rgba(0,0,0,0.12); padding:14px; z-index:20;">
                    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:10px;">
                        <div style="display:flex; align-items:center; gap:8px; color:#2c3e50; font-weight:700;">
                            <i class="fas fa-filter" style="color:#365F8D;"></i> <span>Filter</span>
                        </div>
                        <button type="button" id="filterReset" style="background:none; border:none; color:#365F8D; font-weight:600; cursor:pointer;">Reset</button>
                    </div>
                    <div style="margin-bottom:10px;">
                        <div style="font-size:12px; color:#6c757d; margin-bottom:6px;">Jenis Data</div>
                        <div style="display:grid; grid-template-columns: 1fr; gap:8px;">
                            <?php $fixedCats = ['Permohonan Magang','Arsip','Dinas Kesehatan','Dinas Perhubungan']; ?>
                            <?php $__currentLoopData = $fixedCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cname): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                                <input type="radio" name="f_category" value="<?php echo e(\Illuminate\Support\Str::slug($cname,'_')); ?>" style="accent-color:#365F8D;">
                                <span style="color:#2c3e50; font-size:14px;"><?php echo e($cname); ?></span>
                            </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                                <input type="radio" name="f_category" value="all" checked style="accent-color:#365F8D;">
                                <span style="color:#2c3e50; font-size:14px;">Semua</span>
                            </label>
                        </div>
                    </div>
                    <div style="margin-bottom:12px;">
                        <div style="font-size:12px; color:#6c757d; margin-bottom:6px;">Periode</div>
                        <div style="display:flex; gap:8px; margin-bottom:8px;">
                            <button type="button" class="presetBtn" data-range="week" style="flex:1; padding:8px 10px; border:1px solid #e1e8ed; background:#f9fbfd; color:#2c3e50; border-radius:8px; cursor:pointer;">1 Minggu</button>
                            <button type="button" class="presetBtn" data-range="month" style="flex:1; padding:8px 10px; border:1px solid #e1e8ed; background:#f9fbfd; color:#2c3e50; border-radius:8px; cursor:pointer;">1 Bulan</button>
                            <button type="button" class="presetBtn" data-range="year" style="flex:1; padding:8px 10px; border:1px solid #e1e8ed; background:#f9fbfd; color:#2c3e50; border-radius:8px; cursor:pointer;">1 Tahun</button>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <div style="flex:1; display:flex; flex-direction:column; gap:6px;">
                                <label for="f_from" style="font-size:12px; color:#6c757d;">Tanggal Awal</label>
                                <input type="date" id="f_from" style="padding:8px 10px; border:1px solid #e1e8ed; border-radius:8px;">
                            </div>
                            <div style="flex:1; display:flex; flex-direction:column; gap:6px;">
                                <label for="f_to" style="font-size:12px; color:#6c757d;">Tanggal Akhir</label>
                                <input type="date" id="f_to" style="padding:8px 10px; border:1px solid #e1e8ed; border-radius:8px;">
                            </div>
                        </div>
                    </div>
                    <div style="display:flex; gap:10px;">
                        <button type="button" id="filterApply" style="flex:1; padding:10px 12px; border:none; border-radius:10px; background:linear-gradient(135deg,#365F8D,#2A4A6B); color:#fff; font-weight:700; cursor:pointer;">Terapkan</button>
                    </div>
                </div>
            </div>
            <a href="#" style="padding: 12px 22px; border-radius: 8px; font-size: 14px; font-weight: 500; text-decoration: none; color: #fff; background: linear-gradient(135deg, #365F8D 0%, #2A4A6B 100%); cursor: pointer; transition: transform .15s ease, box-shadow .15s ease; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 6px 16px rgba(54,95,141,.18);">
                <i class="fas fa-download" style="font-size:14px;"></i>
                Download
            </a>
        </div>
    </div>
    <div class="chart-container" style="position: relative; height: 400px;">
        <canvas id="statisticsChart"></canvas>
    </div>
</div>

<?php
    $todayDocs = \App\Models\Document::with('documentType.service.parent')
        ->whereDate('created_at', today())
        ->orderByDesc('created_at')
        ->get();
    $targetCats = ['Permohonan Magang','Arsip','Dinas Kesehatan','Dinas Perhubungan'];
    $countsMap = [];
    foreach ($targetCats as $c) { $countsMap[$c] = 0; }
    foreach ($todayDocs as $doc) {
        $catName = optional(optional(optional($doc->documentType)->service)->parent)->name;
        if (in_array($catName, $targetCats, true)) {
            $countsMap[$catName]++;
        }
    }
    $labelsToday = array_keys($countsMap);
    $countsToday = array_values($countsMap);
?>

<div id="data-hari-ini" class="chart-section" style="background: white; border-radius: 16px; padding: 30px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); border: 1px solid #e9ecef; margin-bottom: 30px;">
    <div class="chart-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h3 style="font-size: 20px; font-weight: 600; color: #2c3e50;">Data Hari Ini</h3>
    </div>
    <div style="display:flex; gap:24px; align-items:flex-start; flex-wrap:wrap;">
        <div class="chart-container" style="position: relative; height: 360px; flex:1 1 480px;">
            <canvas id="todayBarChart"></canvas>
        </div>
        <div style="flex:1 1 360px; max-height:360px; overflow:auto; border:1px solid #e9ecef; border-radius:12px;">
            <table style="width:100%; border-collapse: collapse; font-size:14px;">
                <thead>
                    <tr style="background:#f9fbfd; color:#2c3e50;">
                        <th style="text-align:left; padding:10px 12px; border-bottom:1px solid #e9ecef; width:56px;">NO</th>
                        <th style="text-align:left; padding:10px 12px; border-bottom:1px solid #e9ecef;">NAMA DOKUMEN</th>
                        <th style="text-align:left; padding:10px 12px; border-bottom:1px solid #e9ecef; width:160px;">WAKTU MASUK</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $todayDocs->take(20); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td style="padding:10px 12px; border-bottom:1px solid #f3f4f6; color:#6c757d;"><?php echo e($i+1); ?></td>
                        <td style="padding:10px 12px; border-bottom:1px solid #f3f4f6;">
                            <a href="#" style="color:#2c3e50; font-weight:600; text-decoration:none;"><?php echo e($doc->title); ?></a>
                        </td>
                        <td style="padding:10px 12px; border-bottom:1px solid #f3f4f6;">
                            <a href="#" style="color:#2c3e50; text-decoration:none;"><?php echo e(optional($doc->created_at)->format('d M Y H:i')); ?></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3" style="padding:14px 12px; text-align:center; color:#6c757d;">Belum ada data hari ini</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Line Chart with filterable dummy data
    const ctx = document.getElementById('statisticsChart').getContext('2d');
    const BLUE = '#365F8D';
    const RED = '#e74c3c';
    const areaBlue = 'rgba(54, 95, 141, 0.10)';
    const areaRed = 'rgba(231, 76, 60, 0.10)';

    function labelsByRange(range){
        if(range === 'week') return ['Sen','Sel','Rab','Kam','Jum','Sab','Min'];
        if(range === 'year') return ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
        return ['M1','M2','M3','M4']; // month (4 segments)
    }
    function randomSeries(n, base=50){
        return Array.from({length:n}, (_,i)=> Math.max(0, Math.round(base + 35*Math.sin((i+1)/n*3.14*2) + (Math.random()*16-8))));
    }
    function seedForCategory(key){
        switch(key){
            case 'permohonan_magang': return 60;
            case 'arsip': return 50;
            case 'dinas_kesehatan': return 55;
            case 'dinas_perhubungan': return 45;
            default: return 52;
        }
    }
    function buildData(range, categoryKey){
        const labels = labelsByRange(range);
        const n = labels.length;
        const seed = seedForCategory(categoryKey);
        return {
            labels,
            datasets: [
                { label: 'Total Dokumen', data: randomSeries(n, seed), borderColor: BLUE, backgroundColor: areaBlue, borderWidth: 3, fill: true, tension: 0.4, pointRadius: 3, pointHoverRadius: 5 },
                { label: 'Download', data: randomSeries(n, seed-10), borderColor: RED, backgroundColor: areaRed, borderWidth: 3, fill: true, tension: 0.4, pointRadius: 3, pointHoverRadius: 5 }
            ]
        };
    }

    let currentRange = 'month';
    let currentCategory = 'all';

    const chart = new Chart(ctx, {
        type: 'line',
        data: buildData(currentRange, currentCategory),
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: true, position: 'bottom', labels: { usePointStyle: true, pointStyle: 'circle', boxWidth: 8, boxHeight: 8, color: '#2c3e50', padding: 12, font: { size: 12, weight: 600 } } }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    min: 0,
                    grid: { color: 'rgba(0,0,0,0.1)' },
                    ticks: { stepSize: 20 }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            },
            elements: {
                point: {
                    radius: 3,
                    hoverRadius: 5
                }
            }
        }
    });

    // Filter panel JS
    const filterBtn = document.getElementById('filterBtn');
    const filterDropdown = document.getElementById('filterDropdown');
    const filterApply = document.getElementById('filterApply');
    const filterReset = document.getElementById('filterReset');
    const presetBtns = document.querySelectorAll('#filterDropdown .presetBtn');
    const inputFrom = document.getElementById('f_from');
    const inputTo = document.getElementById('f_to');

    function closeFilter(){ filterDropdown.style.display = 'none'; filterBtn.setAttribute('aria-expanded','false'); }
    function openFilter(){ filterDropdown.style.display = 'block'; filterBtn.setAttribute('aria-expanded','true'); }

    filterBtn.addEventListener('click', function(e){
        e.stopPropagation();
        const visible = filterDropdown.style.display === 'block';
        visible ? closeFilter() : openFilter();
    });
    document.addEventListener('click', function(e){ if(!filterDropdown.contains(e.target) && e.target !== filterBtn){ closeFilter(); }});

    presetBtns.forEach(btn=>{
        btn.addEventListener('click', function(){
            presetBtns.forEach(b=> b.style.background='#f9fbfd');
            this.style.background='#eef4fb';
            currentRange = this.getAttribute('data-range');
        });
    });

    filterApply.addEventListener('click', function(){
        const selected = document.querySelector('input[name="f_category"]:checked');
        currentCategory = selected ? selected.value : 'all';
        // Dates are not used yet for dummy; kept for future real data
        chart.data = buildData(currentRange, currentCategory);
        chart.update();
        closeFilter();
    });
    filterReset.addEventListener('click', function(){
        document.querySelectorAll('input[name="f_category"]').forEach(r=> r.checked = (r.value==='all'));
        presetBtns.forEach(b=> b.style.background='#f9fbfd');
        currentRange = 'month';
        inputFrom.value = '';
        inputTo.value = '';
        chart.data = buildData(currentRange, 'all');
        chart.update();
    });

    // --- Interactions for stats cards ---
    const jenisIcon = document.getElementById('jenisDataIcon');
    const jenisDropdown = document.getElementById('jenisDataDropdown');
    if (jenisIcon && jenisDropdown) {
        jenisIcon.addEventListener('click', function(e){
            e.stopPropagation();
            jenisDropdown.style.display = jenisDropdown.style.display === 'none' || jenisDropdown.style.display === '' ? 'block' : 'none';
        });
        document.addEventListener('click', function(e){
            if (!jenisDropdown.contains(e.target) && e.target !== jenisIcon) {
                jenisDropdown.style.display = 'none';
            }
        });
    }

    const todayIcon = document.getElementById('todayIcon');
    if (todayIcon) {
        todayIcon.addEventListener('click', function(){
            const el = document.getElementById('data-hari-ini');
            if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    }

    // --- Today Bar Chart ---
    const todayCtx = document.getElementById('todayBarChart').getContext('2d');
    const todayLabels = <?php echo json_encode($labelsToday, 15, 512) ?>;
    const todayCounts = <?php echo json_encode($countsToday, 15, 512) ?>;
    const gradient = todayCtx.createLinearGradient(0, 0, 0, 320);
    gradient.addColorStop(0, 'rgba(54, 95, 141, 0.95)');
    gradient.addColorStop(1, 'rgba(42, 74, 107, 0.75)');
    const capColor = 'rgba(255,255,255,0.65)';
    new Chart(todayCtx, {
        type: 'bar',
        data: {
            labels: todayLabels,
            datasets: [
                { // Main bar
                    label: 'Jumlah Dokumen',
                    data: todayCounts,
                    backgroundColor: gradient,
                    hoverBackgroundColor: 'rgba(54, 95, 141, 1)',
                    borderColor: 'rgba(54,95,141,0.9)',
                    borderWidth: 1,
                    borderRadius: { topLeft: 12, topRight: 12, bottomLeft: 8, bottomRight: 8 },
                    borderSkipped: false,
                    maxBarThickness: 38,
                    categoryPercentage: 0.55,
                    barPercentage: 0.8,
                    stack: 'stack1'
                },
                { // top cap overlay ~ 15% of bar for modern look
                    label: 'Cap',
                    data: todayCounts.map(v=> Math.max(0.15*v, v>0?0.6:0)),
                    backgroundColor: capColor,
                    borderColor: 'rgba(255,255,255,0.9)',
                    borderWidth: 1,
                    borderRadius: { topLeft: 12, topRight: 12 },
                    borderSkipped: false,
                    maxBarThickness: 38,
                    categoryPercentage: 0.55,
                    barPercentage: 0.8,
                    stack: 'stack1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: { duration: 700, easing: 'easeOutQuart' },
            plugins: { legend: { display: false } },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0,0,0,0.08)' },
                    ticks: { stepSize: 1, precision: 0 },
                },
                x: { grid: { display: false } }
            }
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\arsip-digital\resources\views/home.blade.php ENDPATH**/ ?>