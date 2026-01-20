# Testing Guide - Supplier Edit/Delete & Review Features

## 🧪 Complete Test Scenarios

---

## Test Scenario 1: Supplier Edit Request

### Prerequisites

- Supplier account created with product_type set
- Product request in "Pending" status

### Steps

1. **Login as Supplier**

    ```
    URL: http://localhost:8000/supplier/login
    Email: test@supplier.com
    ```

2. **Navigate to Requests**
    - Click "View All My Requests" on dashboard
    - Should see list of requests

3. **Click "View" on a Pending Request**
    - See full request details
    - Image, title, description, price displayed
    - Status badge shows "Pending"
    - Admin notes section (if any)

4. **Click "Edit Request"**
    - Form opens pre-filled with current values
    - Product type shows as locked (cannot change)
    - Current image displays

5. **Make Changes**
    - Update title: "Premium Garden Trowel v2"
    - Update description: "Improved ergonomic handle"
    - Update price: "349.99"
    - Upload new image (optional)

6. **Submit**
    - ✅ Should redirect to requests list
    - ✅ Success message: "Product request updated successfully!"
    - ✅ Request shows updated title/price

7. **Verify in Admin Dashboard**
    - Login as admin
    - Check Product Requests page
    - ✅ Should see updated request details

---

## Test Scenario 2: Supplier Delete Request

### Prerequisites

- Supplier has pending product request

### Steps

1. **Navigate to Requests List**
    - Go to "View All My Requests"
    - Find a pending request

2. **Click "Delete" Button**
    - Confirmation modal appears
    - Shows product name
    - Warning: "This action cannot be undone"

3. **Click "Cancel"**
    - Modal closes
    - Request still in list

4. **Click "Delete" Again**
    - Modal appears again

5. **Click "Delete" in Modal**
    - ✅ Success message: "Product request deleted successfully!"
    - ✅ Redirected to requests list
    - ✅ Request no longer in list
    - ✅ Image file deleted from storage

6. **Verify Image Deleted**
    - Check storage: `storage/app/public/product_requests/`
    - Old image file should be gone

---

## Test Scenario 3: Supplier Cannot Edit Approved Request

### Prerequisites

- Admin has approved a supplier's request

### Steps

1. **Navigate to Requests List**
    - Go to "View All My Requests"
    - Find approved request (green badge)

2. **Click on Request**
    - Detail page shows
    - Status: "Approved"

3. **Look for Edit Button**
    - ❌ No "Edit Request" button
    - Only "Back" button available

4. **Manually Try to Access Edit URL**
    ```
    http://localhost:8000/supplier/requests/{id}/edit
    ```

    - ❌ Should redirect with error message
    - Message: "Cannot edit approved or rejected requests."

---

## Test Scenario 4: Supplier Cannot Delete Rejected Request

### Prerequisites

- Admin has rejected a supplier's request

### Steps

1. **Navigate to Requests List**
    - Find rejected request (red badge)

2. **Click on Request**
    - Sees admin rejection reason
    - Status: "Rejected"

3. **Look for Delete Button**
    - ❌ No "Delete" button in action buttons
    - Only "View" button and "Locked" badge

4. **Manually Try to Access Delete URL**
    ```
    DELETE /supplier/requests/{id}
    ```

    - ❌ Should redirect with error message
    - Message: "Cannot delete approved or rejected requests."

---

## Test Scenario 5: View Request Details & Review

### Prerequisites

- Product request with full details

### Steps

1. **Navigate to Requests List**
    - Go to "My Requests"

2. **Click "View" Button**
    - Detail page opens
    - Shows:
        - Product image (if uploaded)
        - Title
        - Description (in styled box)
        - Price (highlighted)
        - Product type (as badge)
        - Submission date
        - Admin notes (if approved/rejected)
        - Status badge

3. **For Pending Requests**
    - See alert: "This request is pending admin review..."
    - Edit and Delete buttons available

4. **For Approved Requests**
    - No alert
    - Only Back button

5. **For Rejected Requests**
    - See admin rejection reason in yellow box
    - Can review feedback
    - Only Back button

---

## Test Scenario 6: Admin Dashboard Pending Requests

### Prerequisites

- Multiple product requests submitted by suppliers

### Steps

1. **Login as Admin**

    ```
    URL: http://localhost:8000/login
    Email: admin@gmail.com
    ```

2. **View Dashboard**
    - Stats grid shows "Pending Product Requests" count
    - Below stats: "Pending Product Requests" section visible

3. **See Preview Table**
    - Top 5 pending requests displayed
    - Shows: Image, Title, Supplier, Type, Price, Date, Action

4. **Click "Review Now" Link**
    - Redirects to Product Requests management page
    - Pending tab is active

5. **On Product Requests Page**
    - Three tabs: Pending (count), Approved (count), Rejected (count)
    - Table shows full pending requests
    - Action buttons: Approve, Reject

---

## Test Scenario 7: Admin Approve Request with Updated Details

### Prerequisites

- Supplier edited request after submission

### Steps

1. **Go to Product Requests Page**
    - Navigate to /admin/product-requests
    - Pending tab active

2. **Find Edited Request**
    - Should show latest version (updated title/price)
    - Updated submission time

3. **Click "Approve"**
    - Approval modal appears
    - Optional admin notes field

4. **Add Notes**

    ```
    "Good quality product, meets standards. Approved for listing."
    ```

5. **Click "Approve Request"**
    - ✅ Success message
    - ✅ Request moves to "Approved" tab
    - ✅ Product appears in Tools/Fertilizers/Crops

6. **Verify Product in Catalog**
    - Go to admin dashboard
    - Tools/Fertilizers/Crops section
    - ✅ New product visible with all details

---

## Test Scenario 8: Admin Reject Request with Reason

### Prerequisites

- Pending product request

### Steps

1. **Go to Pending Requests**
    - Find any pending request

2. **Click "Reject"**
    - Rejection modal appears
    - Reason field (optional but recommended)

3. **Add Rejection Reason**

    ```
    "Product image quality is too low. Please resubmit with better photos."
    ```

4. **Click "Reject Request"**
    - ✅ Success message
    - ✅ Request moves to "Rejected" tab
    - ✅ Sets reviewed_at timestamp

5. **Supplier Views Rejection**
    - Logout from admin
    - Login as supplier
    - Go to requests list
    - ✅ Request shows red "Rejected" badge
    - ✅ Can view rejection reason in detail page

---

## Test Scenario 9: Tab Switching in Admin Page

### Prerequisites

- Multiple requests in different statuses

### Steps

1. **Go to Product Requests Page**
    - Default to Pending tab

2. **Check Tab Counts**
    - Pending: X requests
    - Approved: X requests
    - Rejected: X requests

3. **Click "Approved" Tab**
    - ✅ Table updates to show approved requests only
    - ✅ No action buttons (already processed)

4. **Click "Rejected" Tab**
    - ✅ Table updates to show rejected requests
    - ✅ Shows rejection reasons in notes

5. **Click Back to "Pending"**
    - ✅ Shows pending requests again

---

## Test Scenario 10: Image Handling - Edit

### Prerequisites

- Request with existing image

### Steps

1. **Edit Request**
    - Open edit form
    - Current image displays

2. **Upload New Image**
    - Select different image file
    - Preview shows new image

3. **Submit**
    - ✅ New image saved
    - ✅ Old image deleted from storage
    - ✅ Detail page shows new image

4. **Verify Storage**
    - Old image file deleted
    - New image in product_requests folder

---

## Test Scenario 11: Supplier Dashboard Statistics

### Prerequisites

- Supplier has multiple requests in different statuses

### Steps

1. **Login as Supplier**
    - Go to dashboard

2. **Check Statistics**
    - Pending card shows count (orange)
    - Approved card shows count (green)
    - Rejected card shows count (red)

3. **Submit New Request**
    - Pending count +1
    - ✅ Statistics update correctly

4. **Go to Admin**
    - Approve request

5. **Return to Supplier Dashboard**
    - Refresh page
    - Pending count -1
    - Approved count +1
    - ✅ Statistics updated

---

## 🐛 Common Issues & Solutions

### Issue 1: Edit Button Not Showing

**Solution**: Ensure request status is "pending"

```sql
SELECT id, title, status FROM product_requests WHERE status = 'pending';
```

### Issue 2: Edited Request Still Shows Old Data

**Solution**: Clear cache

```bash
php artisan cache:clear
php artisan config:clear
```

### Issue 3: Image Not Deleting on Edit

**Solution**: Check storage permissions

```bash
chmod -R 775 storage/app/public
```

### Issue 4: Cannot Delete Approved Request

**Expected Behavior**: This is correct! Only pending requests can be deleted.

### Issue 5: Statistics Not Updating

**Solution**: Refresh page or clear cache

```bash
php artisan cache:clear
```

---

## ✅ Success Criteria

All tests pass when:

✅ Suppliers can view request details  
✅ Suppliers can edit pending requests  
✅ Suppliers can delete pending requests  
✅ Suppliers cannot edit/delete approved/rejected requests  
✅ Admin can see pending requests on dashboard  
✅ Admin can approve requests  
✅ Admin can reject requests with reason  
✅ Approved products appear in catalog  
✅ Images upload and delete correctly  
✅ Statistics update in real-time  
✅ Tabs switch correctly on admin page  
✅ No errors in browser console  
✅ Database updated correctly  
✅ Storage files managed correctly

---

## 📝 Test Log Template

```
Test Date: ___________
Tester: ___________
Browser: ___________

Test Case 1: ☐ Pass ☐ Fail | Notes: _______
Test Case 2: ☐ Pass ☐ Fail | Notes: _______
Test Case 3: ☐ Pass ☐ Fail | Notes: _______

Overall Status: ☐ Pass ☐ Fail

Issues Found:
1. ________________
2. ________________
```

---

**Ready to Test!** 🚀

Follow each scenario step by step. If any step fails, check the "Common Issues" section or create a bug report with the steps to reproduce.
