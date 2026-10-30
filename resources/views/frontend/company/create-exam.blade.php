<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Exam | Hirebridge</title>
    <style>
        :root{--navy:#173252;--blue:#2859d9;--bg:#f4f7fb;--text:#172b45;--muted:#718096;--border:#e1e8f0;--white:#fff;--green:#16845b;--red:#c0392b}
        *{box-sizing:border-box} 
        body{margin:0;font-family:Arial,Helvetica,sans-serif;background:var(--bg);color:var(--text);font-size:13px}
        
        /* الهيكل العام للصفحة لجعل السايدبار بجانب المحتوى */
        .app{min-height:100vh;display:flex;flex-direction:row;}

        /* تنسيقات السايدبار المشتركة */
        .sidebar{width:190px;flex-shrink:0;background:var(--navy);color:#d7e2ef;padding:22px 14px;display:flex;flex-direction:column;min-height:100vh;}
        .brand{font-size:21px;font-weight:700;color:#fff;letter-spacing:-.5px;margin:0 0 35px 7px}
        .workspace{font-size:9px;letter-spacing:.8px;color:#b5c5d9;margin:0 7px 14px}
        .company{font-size:11px;margin:0 7px 22px;color:#fff}
        .nav{display:flex;flex-direction:column;gap:4px}
        .nav a{color:#d7e2ef;text-decoration:none;padding:10px 9px;border-radius:5px;font-size:11px;display:block;}
        .nav a:hover,.nav a.active{background:#284765;color:#fff}
        .nav a.active:before{content:'•';color:#8eb0ff;margin-right:7px}
        .nav-bottom{margin-top:auto;padding-top:25px}

        /* تنسيقات الهيدر العلوي */
        .main{flex:1;min-width:0;display:flex;flex-direction:column;}
        .topbar{height:54px;background:#fff;border-bottom:1px solid #e8edf4;display:flex;align-items:center;justify-content:space-between;padding:0 28px;color:var(--muted);font-size:11px}
        .search{color:#8996a7}
        .top-actions{display:flex;align-items:center;gap:18px}
        .profile{color:#334861}

        /* محتوى الصفحة والألواح الداخلية */
        .content{max-width:1150px;margin:0 auto;padding:25px 28px 32px;width:100%;}
        .crumb{font-size:10px;color:#8a97a8;margin-bottom:18px}
        .heading-row{display:flex;align-items:flex-start;justify-content:space-between;gap:20px;margin-bottom:24px}
        .heading-row h1{font-size:25px;letter-spacing:-.6px;margin:0 0 7px;font-weight:700}
        .subtitle{font-size:12px;color:var(--muted);margin:0;line-height:1.6}
        
        .layout{display:grid;grid-template-columns:minmax(0,1.6fr) minmax(240px,1fr);gap:18px;align-items:start}
        .card{background:#fff;border:1px solid #e6ebf2;border-radius:7px;padding:22px;box-shadow:0 1px 2px #1d35570a;margin-bottom:18px}
        .card h2{font-size:15px;margin:0 0 7px}
        .card-intro{font-size:11px;line-height:1.6;color:var(--muted);margin:0 0 22px}
        
        .field{margin-bottom:19px}
        .field label{display:block;font-size:11px;font-weight:700;margin-bottom:8px;color:#33465d}
        .field input, .field select, .field textarea{width:100%;height:42px;border:1px solid #dbe3ed;border-radius:5px;padding:0 12px;font:12px Arial,sans-serif;color:var(--text);outline:none;background:#fff}
        .field textarea{height:80px;padding-top:10px;resize:vertical}
        .field input:focus, .field select:focus, .field textarea:focus{border-color:var(--blue);box-shadow:0 0 0 3px #2859d915}
        
        .row-grid{display:grid;grid-template-columns:1fr 1fr;gap:15px}
        .actions{display:flex;align-items:center;gap:12px;margin-top:25px}
        .btn{border:0;border-radius:5px;padding:11px 17px;font-size:11px;font-weight:700;cursor:pointer}
        .btn-primary{background:var(--blue);color:#fff}
        .btn-primary:hover{background:#1e49bd}
        .btn-secondary{background:#fff;color:#40536b;border:1px solid var(--border)}
        
        .side-card h3{font-size:12px;margin:0 0 8px}
        .side-card p{font-size:11px;color:var(--muted);line-height:1.65;margin:0}
        @media(max-width:900px){.layout{grid-template-columns:1fr}}
    </style>
</head>
<body>
<div class="app">
    <!-- استدعاء السايدبار الموحد من مجلد layouts -->
    @include('layouts.sidebar')

    <main class="main">
        <!-- استدعاء الهيدر العلوي الموحد من مجلد layouts -->
        @include('layouts.topbar')
        
        <section class="content">
            <div class="crumb">Company workspace / Jobs / <strong>Create Exam</strong></div>
            <div class="heading-row">
                <div>
                    <h1>Create New Exam</h1>
                    <p class="subtitle">Set up technical or behavioral assessments for candidate evaluation.</p>
                </div>
            </div>

            <div class="layout">
                <section class="card">
                    <h2>Exam Details</h2>
                    <p class="card-intro">Configure the basic parameters, duration, and target job for this assessment.</p>
                    
                    <form action="#" method="POST">
                        @csrf
                        <div class="field">
                            <label for="examTitle">Exam Title</label>
                            <input id="examTitle" name="title" type="text" placeholder="e.g. Senior Frontend Developer Assessment" required>
                        </div>

                        <div class="row-grid">
                            <div class="field">
                                <label for="jobRole">Target Job Requisition</label>
                                <select id="jobRole" name="job_id">
                                    <option value="">Select Job Role</option>
                                    <option value="1">Senior Frontend Developer</option>
                                    <option value="2">UX/UI Designer</option>
                                    <option value="3">Backend Engineer</option>
                                </select>
                            </div>
                            <div class="field">
                                <label for="duration">Duration (Minutes)</label>
                                <input id="duration" name="duration" type="number" placeholder="e.g. 45" required>
                            </div>
                        </div>

                        <div class="field">
                            <label for="description">Instructions &amp; Description</label>
                            <textarea id="description" name="description" placeholder="Enter instructions for candidates taking this exam..."></textarea>
                        </div>

                        <div class="row-grid">
                            <div class="field">
                                <label for="passingScore">Passing Score (%)</label>
                                <input id="passingScore" name="passing_score" type="number" value="70" min="1" max="100">
                            </div>
                        </div>

                        <div class="actions">
                            <button type="submit" class="btn btn-primary">Save &amp; Add Questions</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </form>
                </section>

                <aside>
                    <section class="card side-card">
                        <h3>Assessment Tips</h3>
                        <p>Keep technical exams focused on core skills required for the role. Clear instructions reduce candidate friction and support fair evaluations.</p>
                    </section>
                </aside>
            </div>

            <!-- استدعاء الفوتر من مجلد layouts -->
            @include('layouts.footer')
        </section>
    </main>
</div>
</body>
</html>