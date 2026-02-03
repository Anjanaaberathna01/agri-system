# Supplier Authentication - Quick Reference

## Test Credentials

```
Email:    test@supplier.com
Password: 12345678

Email:    fertilizer@supplier.com
Password: 12345678
```

## Login Flow

1. Visit: `http://localhost/login`
2. Select "**Supplier**" tab (third option)
3. Enter test email and password
4. Click "Sign In"
5. You'll be redirected to change password page
6. Enter:
    - Current Password: `12345678`
    - New Password: Any password (min 8 chars)
    - Confirm: Same as new password
7. Click "Update Password"
8. You'll be redirected to supplier dashboard
9. Dashboard shows your information

## Key Routes

| Route                       | Method | Purpose                          |
| --------------------------- | ------ | -------------------------------- |
| `/login`                    | GET    | Login page (select Supplier tab) |
| `/supplier/login`           | POST   | Process supplier login           |
| `/supplier/logout`          | POST   | Logout supplier                  |
| `/supplier/dashboard`       | GET    | Supplier dashboard               |
| `/supplier/change-password` | GET    | Password change form             |
| `/supplier/change-password` | POST   | Process password change          |

## Database Table: suppliers

New fields added:

- `password` (hashed)
- `must_change_password` (true on first login)
- `password_changed_at` (timestamp)

## Authentication Guard

Guard name: `supplier`

Usage in code:

```php
auth()->guard('supplier')->user()  // Get current supplier
Auth::guard('supplier')->login($supplier)  // Login
Auth::guard('supplier')->logout()  // Logout
```

## Creating New Supplier via Admin

1. Admin panel → Admin Login
2. Dashboard → Quick Actions → "Add Supplier" (or Admin → Suppliers)
3. Fill form and click "Save Supplier"
4. System automatically:
    - Sets password to `12345678`
    - Sets `must_change_password` to `true`
5. Share email with supplier
6. Supplier logs in with default password
7. System forces password change on first login

## Security Features

✅ Passwords hashed with bcrypt
✅ First login forces password change
✅ Session-based authentication
✅ Protected routes require auth:supplier middleware
✅ Password change records timestamp
✅ Default password cannot be reused

## Troubleshooting

**Issue: "The provided credentials do not match our records"**

- Verify email is correct
- Verify password is correct (12345678 for new suppliers)
- Check supplier exists in database

**Issue: Redirected to change password every time**

- Normal behavior - must change password once first
- Then can login normally

**Issue: "You must change your password before continuing"**

- This is the intended message on first login
- Change password to proceed

**Issue: Routes not found (404)**

- Run: `php artisan config:clear`
- Clear browser cache
- Verify routes with: `php artisan route:list | Select-String supplier`

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/
│   │   │   └── SupplierAuthController.php
│   │   └── SupplierController.php
│   └── Middleware/
│       └── SupplierMustChangePassword.php
├── Models/
│   └── Supplier.php
└── ...

config/
└── auth.php (updated with supplier guard)

routes/
└── web.php (supplier routes added)

resources/views/supplier/
├── dashboard.blade.php
├── change-password.blade.php
└── ...

database/
├── migrations/
│   └── 2026_01_20_*_add_password_to_suppliers_table.php
└── seeders/
    └── SupplierSeeder.php
```

## Testing Checklist

- [ ] Navigate to login page
- [ ] Verify 3 tabs visible: User, Admin, Supplier
- [ ] Click Supplier tab
- [ ] Enter test email and 12345678
- [ ] Click Sign In
- [ ] Verify redirected to change password page
- [ ] See message: "You must change your password"
- [ ] Enter current password (12345678)
- [ ] Enter new password (8+ chars)
- [ ] Enter confirmation password (same)
- [ ] Click "Update Password"
- [ ] Verify redirected to dashboard
- [ ] Verify dashboard shows supplier info
- [ ] Click logout
- [ ] Verify redirected to login
- [ ] Login with new password
- [ ] Verify goes directly to dashboard (no password change)

## Notes

- Default password: **12345678**
- Minimum new password length: **8 characters**
- Passwords must match confirmation
- Each supplier has unique email
- Session expires according to config
- All operations logged (password change timestamp stored)

---

**Created:** January 20, 2026
**System:** Govi Saviya LK - Agricultural Platform
**Component:** Supplier Authentication with Mandatory First Login Password Change
