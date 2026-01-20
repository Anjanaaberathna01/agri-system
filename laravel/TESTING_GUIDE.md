# Quick Testing Guide - Product Request System

## 🚀 Quick Start

### Prerequisites

✅ Database migration completed
✅ Storage link created
✅ Routes registered
✅ Supplier account with product_type set

---

## 📋 Test Case 1: Supplier Submits Product Request

### Step 1: Login as Supplier

```
URL: http://localhost:8000/supplier/login
Email: test@supplier.com
Password: [your changed password]
```

### Step 2: Check Dashboard

After login, you should see:

- ✅ "Add Product Request" button (prominent gradient button)
- ✅ Request statistics cards (Pending: 0, Approved: 0, Rejected: 0)
- ✅ "View All My Requests" button

### Step 3: Submit a Product Request

1. Click "Add Product Request" button
2. Fill in the form:
    - **Title**: "Premium Garden Trowel"
    - **Description**: "Stainless steel garden trowel with ergonomic handle"
    - **Price**: 299.99
    - **Image**: Upload a tool image
3. Click "Submit Request"
4. ✅ Should redirect to requests list
5. ✅ Should show success message
6. ✅ Request should appear with "Pending" status (orange badge)

---

## 📋 Test Case 2: Admin Reviews and Approves Request

### Step 1: Login as Admin

```
URL: http://localhost:8000/login
Email: admin@gmail.com
Password: 12345678
```

### Step 2: Check Admin Dashboard

You should see:

- ✅ Pending Product Requests card showing count "1"
- ✅ "Pending Product Requests" section with table
- ✅ Your submitted request in the table with "Review" button

### Step 3: Navigate to Product Requests Page

1. Click "View All Requests" button
2. ✅ Should see three tabs: Pending (1), Approved (0), Rejected (0)
3. ✅ "Pending" tab should be active by default
4. ✅ Should see the product request with image, supplier name, type, price

### Step 4: Approve the Request

1. Click "Approve" button on the request
2. Modal should appear titled "Approve Product Request"
3. Enter admin notes (optional): "Good quality product, approved for listing"
4. Click "Approve Request" button
5. ✅ Page should refresh
6. ✅ Request should move to "Approved" tab (green badge)
7. ✅ Success message should appear

### Step 5: Verify Product Added to Catalog

1. Navigate to "Tools Management" section in admin dashboard
   (or Fertilizers/Crops depending on supplier's product_type)
2. ✅ Should see the new product "Premium Garden Trowel"
3. ✅ Product should have all details from the request
4. ✅ Image should be displayed

---

## 📋 Test Case 3: Admin Rejects Request

### Step 1: Submit Another Request (as Supplier)

1. Login as supplier
2. Submit new request:
    - Title: "Cheap Plastic Trowel"
    - Description: "Low quality plastic tool"
    - Price: 49.99
3. Logout

### Step 2: Reject Request (as Admin)

1. Login as admin
2. Go to Product Requests page
3. Find the new pending request
4. Click "Reject" button
5. Modal appears titled "Reject Product Request"
6. Enter rejection reason: "Product quality does not meet our standards"
7. Click "Reject Request" button
8. ✅ Page refreshes
9. ✅ Request moves to "Rejected" tab (red badge)

### Step 3: Verify Supplier Can See Rejection

1. Logout from admin
2. Login as supplier
3. Go to "View All My Requests"
4. ✅ Should see rejected request with red badge
5. ✅ Admin notes column should show: "Product quality does not meet our standards"

---

## 🎯 Expected Results Summary

### Supplier Dashboard

```
┌─────────────────────────────────────────────────┐
│ Welcome to Your Supplier Dashboard             │
├─────────────────────────────────────────────────┤
│ [+ Add Product Request]                         │
│                                                 │
│ ┌───────────┐ ┌───────────┐ ┌───────────┐    │
│ │ Pending: 1│ │Approved: 1│ │Rejected: 1│    │
│ └───────────┘ └───────────┘ └───────────┘    │
│                                                 │
│ [View All My Requests]                          │
└─────────────────────────────────────────────────┘
```

### Admin Dashboard

```
┌─────────────────────────────────────────────────┐
│ Admin Panel Dashboard                           │
├─────────────────────────────────────────────────┤
│ ┌───────┐ ┌───────┐ ┌───────┐ ┌──────────┐   │
│ │Tools:5│ │Fert:10│ │Crops:8│ │Pending: 1│   │
│ └───────┘ └───────┘ └───────┘ └──────────┘   │
│                                                 │
│ ━━━ Pending Product Requests ━━━               │
│ ┌─────────────────────────────────────────┐   │
│ │ Image │ Title │ Supplier │ Type │ Price │   │
│ └─────────────────────────────────────────┘   │
│ [View All Requests]                             │
└─────────────────────────────────────────────────┘
```

### Product Requests Page (Admin)

```
┌──────────────────────────────────────────────────────┐
│ Product Requests Management                          │
├──────────────────────────────────────────────────────┤
│ [Pending: 1] [Approved: 1] [Rejected: 1]            │
│                                                      │
│ ┌────────────────────────────────────────────────┐ │
│ │ Product    │ Supplier  │ Type │ Price │ Action│ │
│ ├────────────────────────────────────────────────┤ │
│ │ 🖼️ Trowel  │ John Doe  │Tools │ 299  │[Review]│ │
│ └────────────────────────────────────────────────┘ │
└──────────────────────────────────────────────────────┘
```

---

## ⚠️ Common Issues & Solutions

### Issue 1: Routes Not Found (404)

**Solution**: Make sure you've cleared the route cache

```bash
php artisan route:clear
php artisan route:cache
```

### Issue 2: Images Not Displaying

**Solution**: Ensure storage link exists

```bash
php artisan storage:link
```

### Issue 3: "Column not found" Error

**Solution**: Run migrations

```bash
php artisan migrate
```

### Issue 4: Supplier Cannot Submit (Wrong Product Type)

**Check**: Supplier's product_type in database

```sql
SELECT id, full_name, product_type FROM suppliers;
```

### Issue 5: Approved Product Not Appearing

**Check**:

1. Verify product_type matches (tools, fertilizer, crops)
2. Check the respective table (tools, fertilizers, crops)
3. Look for error messages in logs

---

## 🔍 Database Verification Queries

### Check Product Requests

```sql
SELECT id, supplier_id, product_type, title, status, created_at
FROM product_requests
ORDER BY created_at DESC;
```

### Check Approved Products in Tools

```sql
SELECT id, title, supplier_id, created_at
FROM tools
WHERE supplier_id IS NOT NULL
ORDER BY created_at DESC;
```

### Count Requests by Status

```sql
SELECT status, COUNT(*) as count
FROM product_requests
GROUP BY status;
```

---

## ✅ Success Checklist

- [ ] Supplier can login successfully
- [ ] Supplier dashboard shows request statistics
- [ ] Supplier can submit product request
- [ ] Request appears in supplier's requests list with "Pending" status
- [ ] Admin dashboard shows pending request count
- [ ] Admin can see request in Product Requests page
- [ ] Admin can approve request
- [ ] Approved product appears in correct product catalog (Tools/Fertilizers/Crops)
- [ ] Admin can reject request with reason
- [ ] Supplier can see rejection reason
- [ ] Images upload and display correctly
- [ ] All routes work without 404 errors
- [ ] Success messages display correctly
- [ ] Tab switching works in admin interface

---

**Ready to Test!** 🎉

Start with Test Case 1 and work through each step. If everything passes, your Product Request System is working perfectly!
