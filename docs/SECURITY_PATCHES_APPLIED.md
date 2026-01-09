# ============================================
# SECURITY CONFIGURATION PATCHES
# Apply these changes to your Config files
# ============================================

## FILE: app/Config/App.php

### PATCH 1: Enable Force HTTPS (Line 160)
```php
// BEFORE:
public bool $forceGlobalSecureRequests = false;

// AFTER (for production):
public bool $forceGlobalSecureRequests = true;  // ✅ Force HTTPS
```

### PATCH 2: Enable CSP (Line 201)
```php
// BEFORE:
public bool $CSPEnabled = false;

// AFTER:
public bool $CSPEnabled = true;  // ✅ Enable Content Security Policy
```

---

## FILE: app/Config/Security.php

### PATCH 1: CSRF Settings (Lines 20-30)
```php
// Keep these as is (already good):
public string $csrfProtection = 'cookie';
public string $tokenName = 'csrf_token_name';
public string $headerName = 'X-CSRF-TOKEN';
public string $cookieName = 'csrf_cookie_name';
public int $expires = 7200;
public bool $regenerate = true;  // ✅ Good for security
public bool $redirect = true;
public string $samesite = 'Lax';  // ✅ Good
```

### PATCH 2: Token Randomize (Line 74)
```php
// BEFORE:
public bool $tokenRandomize = false;

// AFTER:
public bool $tokenRandomize = true;  // ✅ More secure (but may cause issues, test first)
```

---

## FILE: app/Config/Database.php

### PATCH 1: Production Settings (Lines 35-46)
```php
// BEFORE:
'pConnect'     => false,
'DBDebug'      => true,
'charset'      => 'utf8mb4',
'DBCollat'     => 'utf8mb4_general_ci',
'strictOn'     => false,
'compress'     => false,

// AFTER:
'pConnect'     => false,  // ✅ Keep false (prevent connection exhaustion)
'DBDebug'      => ENVIRONMENT !== 'production',  // ✅ Disable in production
'charset'      => 'utf8mb4',  // ✅ Good
'DBCollat'     => 'utf8mb4_unicode_ci',  // ✅ Better collation
'strictOn'     => true,   // ✅ Enable strict mode
'compress'     => true,   // ✅ Enable compression
```

---

## FILE: .env (Production)

### COMPLETE PRODUCTION .env FILE:
```env
#--------------------------------------------------------------------
# ENVIRONMENT
#--------------------------------------------------------------------

CI_ENVIRONMENT = production  # ✅ CRITICAL: Set to production

#--------------------------------------------------------------------
# APP
#--------------------------------------------------------------------

app.baseURL = 'https://jagakarsajaksel.com/'  # ✅ Use your domain with HTTPS

# Encryption key (generate with: php spark key:generate)
encryption.key = YOUR_GENERATED_KEY_HERE  # ✅ CRITICAL: Generate this!

#--------------------------------------------------------------------
# DATABASE
#--------------------------------------------------------------------

database.default.hostname = localhost
database.default.database = your_production_db
database.default.username = your_production_user
database.default.password = your_strong_password  # ✅ Use strong password!
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306

#--------------------------------------------------------------------
# SESSION (Enhanced Security)
#--------------------------------------------------------------------

# Use database for sessions (more secure)
app.sessionDriver = 'CodeIgniter\Session\Handlers\DatabaseHandler'
app.sessionCookieName = 'jgk_session'
app.sessionExpiration = 7200  # 2 hours
app.sessionSavePath = 'ci_sessions'  # table name
app.sessionMatchIP = true  # ✅ CRITICAL: Match IP for security
app.sessionTimeToUpdate = 300  # Regenerate every 5 minutes
app.sessionRegenerateDestroy = true

#--------------------------------------------------------------------
# COOKIE SECURITY
#--------------------------------------------------------------------

app.cookiePrefix = 'jgk_'
app.cookieDomain = ''
app.cookiePath = '/'
app.cookieSecure = true  # ✅ CRITICAL: HTTPS only
app.cookieHTTPOnly = true  # ✅ CRITICAL: No JavaScript access
app.cookieSameSite = 'Lax'  # ✅ CSRF protection

#--------------------------------------------------------------------
# PUSH NOTIFICATIONS (VAPID)
#--------------------------------------------------------------------

VAPID_PUBLIC_KEY = 'BEl62iUYgUivxIkv69yViEuiBIa-Ib9-SkvMeAtA3LFgDzkrxZJjSgSnfckjBJuBkr3qBUYIHBQFLXYp5Nksh8U'
VAPID_PRIVATE_KEY = 'UUxI4O8-FbRouADVXc-hK9e8XH4VKnXPzr7eUdtYQFk'
VAPID_SUBJECT = 'mailto:admin@jagakarsa.jakarta.go.id'

#--------------------------------------------------------------------
# SECURITY
#--------------------------------------------------------------------

# Force HTTPS
app.forceGlobalSecureRequests = true

# Enable CSP
app.CSPEnabled = true

# Disable error display
CI_DEBUG = false
```

---

## CRITICAL COMMANDS TO RUN:

### 1. Generate Encryption Key
```bash
php spark key:generate
```

### 2. Clear Cache
```bash
php spark cache:clear
```

### 3. Set Permissions
```bash
# Windows (PowerShell as Admin)
icacls writable /grant Users:F /T

# Linux/Mac
chmod -R 777 writable/
chmod 644 .env
```

### 4. Test Configuration
```bash
# Check if encryption key is set
php -r "echo getenv('encryption.key') ? 'OK' : 'NOT SET';"

# Check environment
php -r "echo ENVIRONMENT;"
```

---

## VERIFICATION CHECKLIST:

After applying patches, verify:

- [ ] `.htaccess` has security headers
- [ ] HTTPS is enforced
- [ ] Encryption key is generated
- [ ] `CI_ENVIRONMENT = production` in `.env`
- [ ] Session security enabled (matchIP, HTTPOnly, Secure)
- [ ] Database debug disabled in production
- [ ] File upload has 10-layer security
- [ ] Security tables created
- [ ] All tests pass
- [ ] No errors in logs

---

## ROLLBACK PLAN:

If something breaks:

```bash
# Restore .htaccess
cp public/.htaccess.backup public/.htaccess

# Restore image_helper.php
cp app/Helpers/image_helper.php.backup app/Helpers/image_helper.php

# Set environment back to development
# Edit .env: CI_ENVIRONMENT = development

# Clear cache
php spark cache:clear
```

---

**IMPORTANT**: Test all patches in development/staging environment first!

**Last Updated**: 2026-01-09
**Security Level**: PRODUCTION READY
