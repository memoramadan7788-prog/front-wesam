<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Vacancy | Hirebridge</title>
    <style>
        :root{--navy:#173252;--blue:#2859d9;--bg:#f4f7fb;--text:#172b45;--muted:#718096;--border:#e1e8f0;--white:#fff;--green:#16845b;--red:#c0392b}
        *{box-sizing:border-box} 
        
        /* إيقاف الـ Scrolling تماماً وتثبيت الصفحة على الشاشة */
        html, body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--bg);
            color: var(--text);
            font-size: 13px;
        }
        
        .app{height: 100vh; display: flex; flex-direction: row; overflow: hidden;}

        /* تنسيقات السايدبار المشتركة */
        .sidebar{width:190px;flex-shrink:0;background:var(--navy);color:#d7e2ef;padding:22px 14px;display:flex;flex-direction:column;height: 100vh;}
        .brand{font-size:21px;font-weight:700;color:#fff;letter-spacing:-.5px;margin:0 0 35px 7px}
        .workspace{font-size:9px;letter-spacing:.8px;color:#b5c5d9;margin:0 7px 14px}
        .company{font-size:11px;margin:0 7px 22px;color:#fff}
        .nav{display:flex;flex-direction:column;gap:4px}
        .nav a{color:#d7e2ef;text-decoration:none;padding:10px 9px;border-radius:5px;font-size:11px;display:block;}
        .nav a:hover,.nav a.active{background:#284765;color:#fff}
        .nav a.active:before{content:'•';color:#8eb0ff;margin-right:7px}
        .nav-bottom{margin-top:auto;padding-top:25px}

        /* تنسيقات الهيدر العلوي */
        .main{flex:1;min-width:0;display:flex;flex-direction:column;height: 100vh; overflow: hidden;}
        .topbar{height:54px;background:#fff;border-bottom:1px solid #e8edf4;display:flex;align-items:center;justify-content:space-between;padding:0 28px;color:var(--muted);font-size:11px;flex-shrink:0;}
        .search{color:#8996a7}
        .top-actions{display:flex;align-items:center;gap:18px}
        .profile{color:#334861}

        /* محتوى الصفحة بدون scroll */
        .content{max-width:1150px;margin:0 auto;padding:20px 28px;width:100%;flex:1;overflow:hidden;}
        .crumb{font-size:10px;color:#8a97a8;margin-bottom:12px}
        .heading-row{display:flex;align-items:flex-start;justify-content:space-between;gap:20px;margin-bottom:16px}
        .heading-row h1{font-size:22px;letter-spacing:-.6px;margin:0 0 5px;font-weight:700}
        .subtitle{font-size:11px;color:var(--muted);margin:0;line-height:1.5}
        
        .layout{display:grid;grid-template-columns:minmax(0,1.6fr) minmax(240px,1fr);gap:18px;align-items:start}
        .card{background:#fff;border:1px solid #e6ebf2;border-radius:7px;padding:18px 22px;box-shadow:0 1px 2px #1d35570a;margin-bottom:14px}
        .card h2{font-size:14px;margin:0 0 5px}
        .card-intro{font-size:11px;line-height:1.5;color:var(--muted);margin:0 0 16px}
        
        .field{margin-bottom:14px}
        .field label{display:block;font-size:11px;font-weight:700;margin-bottom:6px;color:#33465d}
        .field input, .field select, .field textarea{width:100%;height:38px;border:1px solid #dbe3ed;border-radius:5px;padding:0 12px;font:12px Arial,sans-serif;color:var(--text);outline:none;background:#fff}
        .field textarea{height:60px;padding-top:8px;resize:none}
        .field input:focus, .field select:focus, .field textarea:focus{border-color:var(--blue);box-shadow:0 0 0 3px #2859d915}
        
        .row-grid{display:grid;grid-template-columns:1fr 1fr;gap:15px}
        .actions{display:flex;align-items:center;gap:12px;margin-top:18px}
        .btn{border:0;border-radius:5px;padding:10px 15px;font-size:11px;font-weight:700;cursor:pointer}
        .btn-primary{background:var(--blue);color:#fff}
        .btn-primary:hover{background:#1e49bd}
        .btn-secondary{background:#fff;color:#40536b;border:1px solid var(--border)}
        
        .side-card h3{font-size:12px;margin:0 0 6px}
        .side-card p{font-size:11px;color:var(--muted);line-height:1.6;margin:0}
        @media(max-width:900px){.layout{grid-template-columns:1fr}}
    </style>
</head>
<body>
<div class="app">
    <!-- استدعاء السايدبار المشترك -->
    @include('layouts.sidebar')

    <main class="main">
        <!-- استدعاء الهيدر العلوي المشترك -->
        @include('layouts.topbar')
        
        <section class="content">
            <div class="crumb">Company workspace / Jobs / <strong>Create Vacancy</strong></div>
            <div class="heading-row">
                <div>
                    <h1>Create New Vacancy</h1>
                    <p class="subtitle">Publish a new job requisition to attract qualified candidates.</p>
                </div>
            </div>

            <div class="layout">
                <section class="card">
                    <h2>Job Requisition Details</h2>
                    <p class="card-intro">Enter the core specifications, department, and requirements for this position.</p>
                    
                    <form action="#" method="POST">
                        @csrf
                        <div class="field">
                            <label for="jobTitle">Job Title</label>
                            <input id="jobTitle" name="title" type="text" placeholder="e.g. Senior Frontend Developer" required>
                        </div>

                        <div class="row-grid">
                            <div class="field">
                                <label for="department">Department</label>
                                <select id="department" name="department_id" required>
                                    <option value="">Select Department</option>
                                    <option value="1">Engineering &amp; Tech</option>
                                    <option value="2">Product &amp; Design</option>
                                    <option value="3">Human Resources</option>
                                </select>
                            </div>
                            <div class="field">
                                <label for="jobType">Employment Type</label>
                                <select id="jobType" name="job_type" required>
                                    <option value="full-time">Full-time</option>
                                    <option value="part-time">Part-time</option>
                                    <option value="remote">Remote</option>
                                    <option value="contract">Contract</option>
                                </select>
                            </div>
                        </div>

                        <div class="row-grid">
                            <div class="field">
                                <label for="location">Location</label>
                                <input id="location" name="location" type="text" placeholder="e.g. Cairo, Egypt (Hybrid)" required>
                            </div>
                            <div class="field">
                                <label for="openings">Number of Openings</label>
                                <input id="openings" name="openings" type="number" value="1" min="1" required>
                            </div>
                        </div>

                        <div class="field">
                            <label for="description">Job Description</label>
                            <textarea id="description" name="description" placeholder="Provide a summary of the role and key responsibilities..."></textarea>
                        </div>

                        <div class="actions">
                            <button type="submit" class="btn btn-primary">Publish Vacancy</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </form>
                </section>

                <aside>
                    <section class="card side-card">
                        <h3>Recruitment Tip</h3>
                        <p>Clear and descriptive job titles combined with precise location details attract up to 40% more qualified applicant submissions.</p>
                    </section>
                </aside>
            </div>

            <!-- استدعاء الفوتر المشترك -->
            @include('layouts.footer')
        </section>
    </main>
</div>
</body>
</html>