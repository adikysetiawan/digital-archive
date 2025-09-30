<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'SI-ARSIP DPMPTSP'); ?></title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <?php echo $__env->yieldPushContent('styles'); ?>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8f9fa;
            color: #2c3e50;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #365F8D 0%, #2A4A6B 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 24px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-logo {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        .sidebar-title {
            font-size: 20px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .sidebar-nav {
            padding: 20px 0 100px 0;
        }

        .nav-item {
            margin-bottom: 8px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left-color: white;
        }

        .nav-link i {
            width: 20px;
            margin-right: 12px;
            font-size: 16px;
        }

        .logout-section {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 600;
            gap: 8px;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(255, 255, 255, 0.1);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 280px;
            background: #f8f9fa;
        }

        .top-header {
            background: white;
            padding: 20px 30px;
            border-bottom: 1px solid #e9ecef;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left h1 {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }

        .header-left p {
            font-size: 14px;
            color: #6c757d;
            margin: 4px 0 0 0;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .search-container {
            position: relative;
        }

        .search-input {
            width: 320px;
            height: 48px;
            padding: 0 16px 0 40px;
            border: 2px solid #e9ecef;
            border-radius: 16px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .search-input:focus {
            outline: none;
            border-color: #365F8D;
            box-shadow: 0 0 0 3px rgba(54, 95, 141, 0.1);
            background: white;
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 14px;
        }

        .profile-section {
            position: relative;
            display: flex;
            align-items: center;
            padding: 6px;
            border-radius: 50%;
            background: #f8f9fa;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .profile-section:hover {
            background: #e9ecef;
        }

        .profile-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            margin-top: 8px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
            border: 1px solid #e9ecef;
            min-width: 180px;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .profile-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: #495057;
            text-decoration: none;
            transition: all 0.2s ease;
            border-bottom: 1px solid #f8f9fa;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item:hover {
            background: #f8f9fa;
            color: #365F8D;
        }

        .dropdown-item i {
            width: 20px;
            margin-right: 12px;
            font-size: 14px;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #365F8D 0%, #2A4A6B 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        .content-area {
            padding: 30px;
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: #365F8D;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .top-header {
                padding: 15px 20px;
                padding-left: 70px;
            }

            .header-right {
                gap: 10px;
            }

            .search-input {
                width: 200px;
                height: 40px;
            }

            .profile-avatar {
                width: 36px;
                height: 36px;
                font-size: 14px;
            }

            .content-area {
                padding: 20px 15px;
            }
        }

        @media (max-width: 480px) {
            .header-left h1 {
                font-size: 18px;
            }

            .header-left p {
                font-size: 12px;
            }

            .search-input {
                width: 150px;
            }

            .header-right {
                gap: 8px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .top-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }
            
            .header-right {
                width: 100%;
                justify-content: space-between;
            }
            
            .search-input {
                width: 200px;
            }
            
            .content-area {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <?php if(auth()->guard()->check()): ?>
    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <div class="app-container">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <img src="<?php echo e(asset('assets/logos/logo_dpmptsp.jpg')); ?>" alt="Logo DPMPTSP" class="sidebar-logo">
                <div class="sidebar-title">SI-ARSIP</div>
            </div>
            
            <nav class="sidebar-nav">
                <div class="nav-item">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </div>
                <div class="nav-item">
                    <a href="<?php echo e(route('documents.index')); ?>" class="nav-link <?php echo e((request()->routeIs('documents.index') || request()->routeIs('documents.show') || request()->routeIs('documents.edit')) ? 'active' : ''); ?>">
                        <i class="fas fa-folder-open"></i>
                        Data Arsip
                    </a>
                </div>
                <div class="nav-item">
                    <a href="<?php echo e(route('documents.create')); ?>" class="nav-link <?php echo e(request()->routeIs('documents.create') ? 'active' : ''); ?>">
                        <i class="fas fa-file-circle-plus"></i>
                        Tambah Dokumen
                    </a>
                </div>
                <div class="nav-item">
                    <a href="<?php echo e(route('profile.show')); ?>" class="nav-link <?php echo e(request()->routeIs('profile.*') ? 'active' : ''); ?>">
                        <i class="fas fa-cog"></i>
                        Pengaturan Akun
                    </a>
                </div>
            </nav>
            
            <div class="logout-section">
                <a href="<?php echo e(route('logout')); ?>" class="logout-btn" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    Log Out
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="top-header">
                <div class="header-left">
                    <h1><?php echo $__env->yieldContent('header-title', 'Sistem Informasi Arsip Surat Keputusan'); ?></h1>
                    <p><?php echo $__env->yieldContent('header-subtitle', 'Overview & Statistik'); ?></p>
                </div>
                <div class="header-right">
                    <div class="search-container" style="min-width:320px;">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="search-input" placeholder="Cari dokumen, kategori..." id="globalSearch" autocomplete="off">
                        <!-- Suggestions dropdown -->
                        <div id="searchSuggestions" style="position:absolute; top:52px; left:0; right:0; background:#fff; border:1px solid #e9ecef; border-radius:12px; box-shadow:0 8px 24px rgba(0,0,0,0.12); display:none; overflow:auto; z-index:1002; max-height:380px;">
                            <div id="suggestDocs"></div>
                            <div id="suggestCategories" style="border-top:1px solid #f1f3f4;"></div>
                            <div id="suggestSeeAll" style="border-top:1px solid #f1f3f4;">
                                <a href="#" id="seeAllLink" style="display:block; padding:10px 14px; text-decoration:none; color:#365F8D; font-weight:600;">Lihat semua hasil</a>
                            </div>
                        </div>
                    </div>
                    <div class="profile-section" onclick="toggleProfileDropdown()">
                        <div class="profile-avatar">
                            <?php echo e(strtoupper(substr(Auth::user()->name, 0, 1))); ?>

                        </div>
                        <div class="profile-dropdown" id="profileDropdown">
                            <a href="<?php echo e(route('profile.show')); ?>" class="dropdown-item">
                                <i class="fas fa-user"></i>
                                Profile
                            </a>
                            <a href="<?php echo e(route('logout')); ?>" class="dropdown-item" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content-area">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    <?php else: ?>
        <?php echo $__env->yieldContent('content'); ?>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
    
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
        
        function toggleProfileDropdown() {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('show');
        }
        
        // --- Smart Search Suggestions ---
        const searchInput = document.getElementById('globalSearch');
        const box = document.getElementById('searchSuggestions');
        const docsBox = document.getElementById('suggestDocs');
        const catBox = document.getElementById('suggestCategories');
        const seeAllLink = document.getElementById('seeAllLink');

        let searchDebounce;
        let suggestPage = 1;
        let suggestHasMore = false;
        let currentQuery = '';
        let loadingMore = false;
        function hideSuggestions(){ box.style.display = 'none'; }
        function showSuggestions(){ box.style.display = 'block'; }

        async function fetchSuggestions(q, page=1){
            const url = `/search/suggest?q=${encodeURIComponent(q)}&page=${page}&per=8`;
            const res = await fetch(url, { headers: { 'Accept':'application/json' } });
            if(!res.ok) return {documents:[], categories:[]};
            return await res.json();
        }

        function renderSuggestions(payload, append=false){
            const {documents=[], categories=[], has_more=false} = payload || {};
            // Documents
            if(!append){
                docsBox.innerHTML = '';
            }
            if(!append && documents.length){
                docsBox.innerHTML += '<div style="padding:8px 12px; font-size:12px; color:#6c757d;">Dokumen</div>';
            }
            if(documents.length){
                let html = '';
                documents.forEach(d => {
                    const label = `${d.title}`;
                    html += `<a href="/documents?search=${encodeURIComponent(label)}" class="suggest-item" style="display:block; padding:10px 14px; text-decoration:none; color:#2c3e50;">
                                <div style=\"font-weight:600;\">${label}</div>
                                <div style=\"font-size:12px; color:#6c757d;\">${d.type ? d.type+' · ' : ''}${d.category || ''}</div>
                             </a>`;
                });
                docsBox.innerHTML += html;
            }
            // Categories
            if(!append){
                catBox.innerHTML = '';
                if(categories.length){
                    let html = '<div style="padding:8px 12px; font-size:12px; color:#6c757d;">Kategori Terkait</div>';
                    categories.forEach(c => {
                        html += `<a href="/documents?category_id=${encodeURIComponent(c.id)}" class="suggest-item" style="display:block; padding:10px 14px; text-decoration:none; color:#2c3e50;">
                                    <i class=\"fas fa-folder\" style=\"margin-right:8px; color:#6c757d;\"></i>${c.name}
                                 </a>`;
                    });
                    catBox.innerHTML = html;
                }
            }
            // See all
            seeAllLink.onclick = (e)=>{ e.preventDefault(); window.location.href = `/documents?search=${encodeURIComponent(searchInput.value.trim())}` };

            suggestHasMore = !!has_more;
            if(!documents.length && !categories.length && !append){ hideSuggestions(); } else { showSuggestions(); }
        }

        searchInput.addEventListener('input', function(){
            const q = this.value.trim();
            clearTimeout(searchDebounce);
            if(q.length < 2){ hideSuggestions(); return; }
            searchDebounce = setTimeout(async ()=>{
                try {
                    suggestPage = 1; currentQuery = q; loadingMore = false;
                    const data = await fetchSuggestions(q, suggestPage);
                    renderSuggestions(data, false);
                }
                catch(e){ hideSuggestions(); }
            }, 250);
        });
        searchInput.addEventListener('focus', function(){ if((this.value||'').trim().length>=2){ box.style.display='block'; }});
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.mobile-menu-toggle');
            const profileSection = document.querySelector('.profile-section');
            const profileDropdown = document.getElementById('profileDropdown');
            
            // Close sidebar on mobile
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target) && 
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
            
            // Close profile dropdown
            if (!profileSection.contains(event.target)) {
                profileDropdown.classList.remove('show');
            }

            // Close search suggestions when clicking outside
            const searchWrap = document.querySelector('.search-container');
            if (searchWrap && !searchWrap.contains(event.target)) {
                hideSuggestions();
            }
        });

        // Infinite scroll within suggestions box
        box.addEventListener('scroll', async function(){
            if(!suggestHasMore || loadingMore) return;
            const nearBottom = box.scrollTop + box.clientHeight >= box.scrollHeight - 40;
            if(nearBottom){
                loadingMore = true;
                try{
                    const nextPage = suggestPage + 1;
                    const data = await fetchSuggestions(currentQuery, nextPage);
                    renderSuggestions(data, true);
                    suggestPage = nextPage;
                } finally {
                    loadingMore = false;
                }
            }
        });
        
        // Handle Enter key in search -> go to full results
        document.getElementById('globalSearch').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const term = this.value.trim();
                if(term.length){ window.location.href = '/documents?search=' + encodeURIComponent(term); }
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\arsip-digital\resources\views/layouts/app.blade.php ENDPATH**/ ?>