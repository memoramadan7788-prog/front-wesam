<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password | Hirebridge</title>
    <style>
        :root{--navy:#173252;--blue:#2859d9;--bg:#f4f7fb;--text:#172b45;--muted:#718096;--border:#e1e8f0;--white:#fff;--green:#16845b;--red:#c0392b}
        *{box-sizing:border-box} 
        body{margin:0;font-family:Arial,Helvetica,sans-serif;background:var(--bg);color:var(--text);font-size:13px}
        
        .app{min-height:100vh;display:flex;flex-direction:row;}

        /* تنسيقات الهيكل العام والـ Layouts */
        .sidebar{width:190px;flex-shrink:0;background:var(--navy);color:#d7e2ef;padding:22px 14px;display:flex;flex-direction:column;min-height:100vh;}
        .brand{font-size:21px;font-weight:700;color:#fff;letter-spacing:-.5px;margin:0 0 35px 7px}
        .workspace{font-size:9px;letter-spacing:.8px;color:#b5c5d9;margin:0 7px 14px}
        .company{font-size:11px;margin:0 7px 22px;color:#fff}
        .nav{display:flex;flex-direction:column;gap:4px}
        .nav a{color:#d7e2ef;text-decoration:none;padding:10px 9px;border-radius:5px;font-size:11px;display:block;}
        .nav a:hover,.nav a.active{background:#284765;color:#fff}
        .nav a.active:before{content:'•';color:#8eb0ff;margin-right:7px}
        .nav-bottom{margin-top:auto;padding-top:25px}

        .main{flex:1;min-width:0;display:flex;flex-direction:column;}
        .topbar{height:54px;background:#fff;border-bottom:1px solid #e8edf4;display:flex;align-items:center;justify-content:space-between;padding:0 28px;color:var(--muted);font-size:11px}
        .search{color:#8996a7}
        .top-actions{display:flex;align-items:center;gap:18px}
        .profile{color:#334861}

        /* تنسيقات صفحة تغيير كلمة المرور */
        .content{max-width:1150px;margin:0 auto;padding:25px 28px 32px;width:100%;}
        .crumb{font-size:10px;color:#8a97a8;margin-bottom:18px}
        .heading-row{display:flex;align-items:flex-start;justify-content:space-between;gap:20px;margin-bottom:24px}
        .heading-row h1{font-size:25px;letter-spacing:-.6px;margin:0 0 7px;font-weight:700}
        .subtitle{font-size:12px;color:var(--muted);margin:0;line-height:1.6}
        
        .layout{display:grid;grid-template-columns:minmax(0,1.6fr) minmax(240px,1fr);gap:18px;align-items:start}
        .card{background:#fff;border:1px solid #e6ebf2;border-radius:7px;padding:22px;box-shadow:0 1px 2px #1d35570a}
        .card h2{font-size:15px;margin:0 0 7px}
        .card-intro{font-size:11px;line-height:1.6;color:var(--muted);margin:0 0 22px}
        
        .field{margin-bottom:19px}
        .field label{display:block;font-size:11px;font-weight:700;margin-bottom:8px;color:#33465d}
        .input-wrap{position:relative}
        .field input{width:100%;height:42px;border:1px solid #dbe3ed;border-radius:5px;padding:0 43px 0 12px;font:12px Arial,sans-serif;color:var(--text);outline:none;background:#fff}
        .field input:focus{border-color:var(--blue);box-shadow:0 0 0 3px #2859d915}
        
        .toggle{position:absolute;right:10px;top:50%;transform:translateY(-50%);border:0;background:transparent;color:#6d7e93;cursor:pointer;font-size:11px;padding:5px}
        .hint{font-size:10px;color:#8793a3;margin-top:7px;line-height:1.5}
        .actions{display:flex;align-items:center;gap:12px;margin-top:25px}
        .btn{border:0;border-radius:5px;padding:11px 17px;font-size:11px;font-weight:700;cursor:pointer}
        .btn-primary{background:var(--blue);color:#fff}
        .btn-primary:hover{background:#1e49bd}
        .btn-secondary{background:#fff;color:#40536b;border:1px solid var(--border)}
        
        .requirements{background:#f8faff;border:1px solid #e5ebf5;border-radius:6px;padding:15px;margin:0 0 21px}
        .requirements h3{font-size:11px;margin:0 0 12px}
        .requirement{display:flex;gap:8px;align-items:center;font-size:10px;color:#728096;margin:9px 0}
        .dot{width:7px;height:7px;border-radius:50%;background:#cbd5e1;flex-shrink:0}
        .requirement.met{color:var(--green)}
        .requirement.met .dot{background:var(--green)}
        
        .side-card{margin-bottom:16px}
        .side-title{display:flex;align-items:center;gap:9px;margin-bottom:13px}
        .side-icon{width:30px;height:30px;border-radius:7px;background:#edf3ff;color:var(--blue);display:grid;place-items:center;font-size:15px}
        .side-card h3{font-size:12px;margin:0}
        .side-card p{font-size:11px;color:var(--muted);line-height:1.65;margin:0}
        .security-list{padding:0;margin:14px 0 0;list-style:none}
        .security-list li{font-size:10px;color:#66778c;margin-top:10px;line-height:1.5}
        .security-list li:before{content:'✓';color:var(--green);font-weight:bold;margin-right:8px}
        
        .notice{display:none;border-radius:5px;padding:11px 12px;font-size:11px;line-height:1.5;margin:0 0 17px}
        .notice.error{display:block;background:#fff1f0;color:#a62d25;border:1px solid #ffd7d4}
        .notice.success{display:block;background:#ecfdf5;color:#087348;border:1px solid #bbf7d0}

        @media(max-width:900px){.layout{grid-template-columns:1fr}.side-column{display:grid;grid-template-columns:1fr 1fr;gap:14px}.side-card{margin:0}}
    </style>
</head>
<body>
<div class="app">
    <!-- استدعاء السايدبار الموحد -->
    @include('layouts.sidebar')

    <main class="main">
        <!-- استدعاء الهيدر العلوي الموحد -->
        @include('layouts.topbar')
        
        <section class="content">
            <div class="crumb">Company workspace / Settings / <strong>Change password</strong></div>
            <div class="heading-row">
                <div>
                    <h1>Change password</h1>
                    <p class="subtitle">Keep your account secure by updating your password regularly.</p>
                </div>
            </div>

            <div class="layout">
                <section class="card">
                    <h2>Password settings</h2>
                    <p class="card-intro">Enter your current password, then choose and confirm a new password.</p>
                    
                    @if(session('success'))
                        <div class="notice success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="notice error">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('password.update') }}" method="POST" id="changePasswordForm">
                        @csrf
                        <div class="field">
                            <label for="currentPassword">Current password</label>
                            <div class="input-wrap">
                                <input id="currentPassword" name="current_password" type="password" autocomplete="current-password" placeholder="Enter current password" required>
                                <button class="toggle" type="button" data-target="currentPassword">Show</button>
                            </div>
                        </div>

                        <div class="field">
                            <label for="newPassword">New password</label>
                            <div class="input-wrap">
                                <input id="newPassword" name="new_password" type="password" autocomplete="new-password" placeholder="Enter new password" required>
                                <button class="toggle" type="button" data-target="newPassword">Show</button>
                            </div>
                            <div class="hint">Use a password you don't use on other websites.</div>
                        </div>

                        <div class="field">
                            <label for="confirmPassword">Confirm new password</label>
                            <div class="input-wrap">
                                <input id="confirmPassword" name="confirm_password" type="password" autocomplete="new-password" placeholder="Re-enter new password" required>
                                <button class="toggle" type="button" data-target="confirmPassword">Show</button>
                            </div>
                        </div>

                        <div class="requirements">
                            <h3>Password requirements</h3>
                            <div class="requirement" id="lengthRule"><span class="dot"></span>At least 8 characters</div>
                            <div class="requirement" id="upperRule"><span class="dot"></span>At least one uppercase letter</div>
                            <div class="requirement" id="numberRule"><span class="dot"></span>At least one number</div>
                            <div class="requirement" id="matchRule"><span class="dot"></span>Passwords match</div>
                        </div>

                        <div class="actions">
                            <button type="submit" class="btn btn-primary">Change password</button>
                            <button type="reset" class="btn btn-secondary" id="cancelButton">Clear fields</button>
                        </div>
                    </form>
                </section>

                <aside class="side-column">
                    <section class="card side-card">
                        <div class="side-title">
                            <div class="side-icon">♙</div>
                            <h3>Protect your account</h3>
                        </div>
                        <p>A strong, unique password helps protect your company workspace and hiring data.</p>
                        <ul class="security-list">
                            <li>Never share your password with anyone.</li>
                            <li>Avoid using predictable personal information.</li>
                            <li>Update your password if you suspect any unauthorized access.</li>
                        </ul>
                    </section>
                </aside>
            </div>

            <!-- استدعاء الفوتر الموحد -->
            @include('layouts.footer')
        </section>
    </main>
</div>
</body>
</html>